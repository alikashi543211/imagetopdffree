<!DOCTYPE html>
<html>

<head>
    <style>
        @if (isset($margin) && $margin == 0)
            @page {
                margin: 0 !important;
                padding: 0 !important;
            }
        @endif

        body {
            margin: {{ isset($margin) && $margin == 0 ? '0' : $margin . 'mm' }};
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .page {
            page-break-after: always;

            @if (isset($margin) && $margin == 0)
                margin: 0 !important;
                padding: 0 !important;
            @endif
        }

        .page:last-child {
            page-break-after: avoid;
        }

        .single-image {
            width: 100%;
            height: auto;
            max-height: 100%;
            object-fit: contain;

            @if (isset($margin) && $margin == 0)
                margin: 0 !important;
                padding: 0 !important;
            @endif
        }

        .double-image-container {
            display: flex;
            width: 100%;
            height: 100%;
        }

        .double-image {
            width: 50%;
            height: auto;
            max-height: 100%;
            object-fit: contain;
            box-sizing: border-box;

            @if (isset($margin) && $margin == 0)
                margin: 0 !important;
                padding: 0 !important;
            @else
                padding: 5px;
            @endif
        }
    </style>
</head>

<body>
    @if ($layout == 'single')
        @foreach ($images as $image)
            <div class="page">
                <img src="{{ $image }}" class="single-image">
            </div>
        @endforeach
    @else
        @for ($i = 0; $i < count($images); $i += 2)
            <div class="page">
                <div class="double-image-container">
                    <img src="{{ $images[$i] }}" class="double-image">
                    @if (isset($images[$i + 1]))
                        <img src="{{ $images[$i + 1] }}" class="double-image">
                    @endif
                </div>
            </div>
        @endfor
    @endif
</body>

</html>
