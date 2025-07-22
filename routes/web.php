<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;

Route::get('/', [PdfController::class, 'index'])->name('home');
Route::post('/convert-to-pdf', [PdfController::class, 'convertToPdf'])->name('convert.to.pdf');
Route::view('/privacy-policy', 'privacy-policy')->name('privacy.policy');
Route::view('/terms', 'terms')->name('terms');
Route::view('/contact', 'contact')->name('contact');
Route::view('/blog', 'blog.index')->name('blog.index');
Route::view('/blog/how-to-convert-images', 'blog.how-to-convert-images')->name('blog.how-to-convert-images');
Route::view('/blog/faq', 'blog.faq')->name('blog.faq');
Route::view('/blog/troubleshooting', 'blog.troubleshooting')->name('blog.troubleshooting');
Route::view('/blog/features', 'blog.features')->name('blog.features');
Route::view('/blog/about', 'blog.about')->name('blog.about');
