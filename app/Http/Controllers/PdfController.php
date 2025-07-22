<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function convertToPdf(Request $request)
    {
        $request->validate([
            'images' => 'required|array|min:1',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            'pdf_name' => 'required|string|max:100',
            'page_size' => 'required|in:a4,letter,legal,a3',
            'orientation' => 'required|in:portrait,landscape',
            'margin' => 'required|integer|min:0|max:50',
            'border' => 'required|integer|min:0|max:20',
            'layout' => 'required|in:single,double',
            'compress' => 'nullable',
        ], [
            'images.required' => 'Please upload at least one image.',
            'images.*.image' => 'Each file must be an image.',
            'images.*.mimes' => 'Images must be jpeg, png, jpg, gif, or svg.',
            'images.*.max' => 'Each image must not exceed 5MB.',
            'pdf_name.required' => 'Please provide a name for the PDF.',
        ]);

        try {
            $images = $request->file('images');
            if (!$images || count($images) === 0) {
                return response()->json([
                    'success' => false,
                    'message' => 'No images uploaded.'
                ], 422);
            }
            $pdfName = preg_replace('/[^a-zA-Z0-9_-]/', '_', $request->input('pdf_name')) . '.pdf';
            $tempDir = 'temp/' . uniqid();
            $tempPath = storage_path('app/public/' . $tempDir);

            if (!file_exists($tempPath)) {
                mkdir($tempPath, 0755, true);
            }

            $processedImages = [];
            foreach ($images as $image) {
                $img = \Intervention\Image\Facades\Image::make($image);
                if ((int)$request->border > 0) {
                    $img->resizeCanvas(
                        $img->width() + 2 * (int)$request->border,
                        $img->height() + 2 * (int)$request->border,
                        'center',
                        false,
                        '#ffffff'
                    );
                }
                $filename = uniqid() . '.jpg';
                $imgPath = $tempPath . '/' . $filename;
                $img->save($imgPath, $request->boolean('compress') ? 70 : 100);
                $processedImages[] = $imgPath;
            }

            $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('pdf-template', [
                'images' => $processedImages,
                'layout' => $request->layout,
                'pageSize' => $request->page_size,
                'orientation' => $request->orientation,
                'margin' => $request->margin,
            ]);
            $pdf->setPaper($request->page_size, $request->orientation);

            // Remove all DomPDF default margins if margin is 0
            if ((int)$request->margin === 0) {
                $pdf->getDomPDF()->set_option('defaultMediaType', 'all');
                $pdf->getDomPDF()->set_option('isHtml5ParserEnabled', true);
                $pdf->getDomPDF()->set_option('isPhpEnabled', true);
                $pdf->getDomPDF()->set_option('margin_top', 0);
                $pdf->getDomPDF()->set_option('margin_right', 0);
                $pdf->getDomPDF()->set_option('margin_bottom', 0);
                $pdf->getDomPDF()->set_option('margin_left', 0);
                $pdf->getDomPDF()->set_paper($request->page_size, $request->orientation);
            }

            $pdfContent = $pdf->output();

            array_map('unlink', glob("$tempPath/*"));
            rmdir($tempPath);

            return response($pdfContent, 200, [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'attachment; filename="' . $pdfName . '"',
                'Content-Length' => strlen($pdfContent),
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => $e->validator->errors()->first(),
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}
