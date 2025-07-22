$(document).ready(function () {
    // Image preview functionality
    $('#images').on('change', function () {
        const files = this.files;
        const preview = $('#imagePreview');
        preview.empty();

        if (files.length > 0) {
            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                if (file.type.match('image.*')) {
                    const reader = new FileReader();

                    reader.onload = function (e) {
                        const imgElement = $('<div class="col-6 col-md-3 preview-image">' +
                            '<img src="' + e.target.result + '" alt="Preview">' +
                            '<button type="button" class="remove-btn" data-index="' + i + '">&times;</button>' +
                            '</div>');

                        preview.append(imgElement);
                    }

                    reader.readAsDataURL(file);
                }
            }
        }
    });

    // Remove image from preview
    $(document).on('click', '.remove-btn', function () {
        const index = $(this).data('index');
        const input = $('#images')[0];
        const files = Array.from(input.files);

        files.splice(index, 1);

        // Create new DataTransfer and update files
        const dataTransfer = new DataTransfer();
        files.forEach(file => dataTransfer.items.add(file));
        input.files = dataTransfer.files;

        // Update preview
        $('#images').trigger('change');
    });

    // Form submission
    $('#pdfForm').on('submit', function (e) {
        e.preventDefault();

        const btn = $('#convertBtn');
        const btnText = $('#btnText');
        const btnSpinner = $('#btnSpinner');

        // Show loading state
        btn.prop('disabled', true);
        btnText.text('Processing...');
        btnSpinner.removeClass('d-none');

        // Submit form via AJAX
        const formData = new FormData(this);

        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                if (response.success) {
                    // Show download card
                    const downloadCard = $('#downloadCard');
                    const downloadLink = $('#downloadLink');

                    downloadLink.attr('href', response.download_url);
                    downloadCard.removeClass('d-none');

                    // Reset form
                    $('#pdfForm')[0].reset();
                    $('#imagePreview').empty();
                } else {
                    alert('Error: ' + response.message);
                }
            },
            error: function (xhr) {
                let errorMessage = 'An error occurred during conversion.';
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMessage = xhr.responseJSON.message;
                }
                alert(errorMessage);
            },
            complete: function () {
                // Reset button state
                btn.prop('disabled', false);
                btnText.text('Convert to PDF');
                btnSpinner.addClass('d-none');
            }
        });
    });
});
