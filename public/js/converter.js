$(function () {
    let filesArray = [];
    const dropzone = $('#dropzone');
    const fileInput = $('#images');
    const preview = $('#imagePreview');
    const alertArea = $('#alertArea');
    const progressBar = $('#progressBar');
    const progressContainer = $('#uploadProgress');
    const downloadCard = $('#downloadCard');
    const downloadLink = $('#downloadLink');
    const newConversion = $('#newConversion');

    // Prevent recursion flag
    let isTriggeringFileInput = false;

    // Drag & drop events
    dropzone.on('click keypress', function (e) {
        if ((e.type === 'click' || e.key === 'Enter' || e.key === ' ') && !isTriggeringFileInput) {
            isTriggeringFileInput = true;
            fileInput.trigger('click');
            setTimeout(() => { isTriggeringFileInput = false; }, 100);
        }
    });
    dropzone.on('dragover', function (e) {
        e.preventDefault();
        dropzone.addClass('dropzone-hover');
    });
    dropzone.on('dragleave drop', function (e) {
        e.preventDefault();
        dropzone.removeClass('dropzone-hover');
    });
    dropzone.on('drop', function (e) {
        e.preventDefault();
        const droppedFiles = e.originalEvent.dataTransfer.files;
        // Append dropped files
        handleFiles(droppedFiles, true);
    });
    fileInput.on('change', function () {
        // Replace filesArray with new selection
        handleFiles(this.files, false);
    });

    function handleFiles(fileList, append = false) {
        if (!append) filesArray = [];
        for (let i = 0; i < fileList.length; i++) {
            const file = fileList[i];
            // Prevent duplicates by name and size
            if (!filesArray.some(f => f.name === file.name && f.size === file.size)) {
                if (file.type.match('image.*')) {
                    filesArray.push(file);
                }
            }
        }
        renderPreview();
        updateFileInput();
        // Always clear file input value to allow re-selection of same files
        fileInput.val('');
    }

    function renderPreview() {
        preview.empty();
        filesArray.forEach((file, idx) => {
            const reader = new FileReader();
            reader.onload = function (e) {
                const thumb = $(`
                    <div class="col-6 col-md-3 preview-image position-relative" draggable="true" data-idx="${idx}">
                        <img src="${e.target.result}" alt="Preview" class="img-thumbnail mb-1" style="height:120px;object-fit:cover;">
                        <button type="button" class="btn btn-sm btn-danger position-absolute top-0 end-0 m-1 remove-btn" title="Remove" aria-label="Remove image">&times;</button>
                        <span class="drag-handle position-absolute bottom-0 start-0 m-1 text-secondary" style="cursor:move;">&#x2630;</span>
                    </div>
                `);
                preview.append(thumb);
            };
            reader.readAsDataURL(file);
        });
    }

    // Remove image
    preview.on('click', '.remove-btn', function () {
        const idx = $(this).closest('.preview-image').data('idx');
        filesArray.splice(idx, 1);
        renderPreview();
        updateFileInput();
    });

    // Drag & drop reorder
    let dragSrcIdx = null;
    preview.on('dragstart', '.preview-image', function (e) {
        dragSrcIdx = $(this).data('idx');
        e.originalEvent.dataTransfer.effectAllowed = 'move';
    });
    preview.on('dragover', '.preview-image', function (e) {
        e.preventDefault();
        $(this).addClass('drag-over');
    });
    preview.on('dragleave', '.preview-image', function () {
        $(this).removeClass('drag-over');
    });
    preview.on('drop', '.preview-image', function (e) {
        e.preventDefault();
        $(this).removeClass('drag-over');
        const targetIdx = $(this).data('idx');
        if (dragSrcIdx !== null && dragSrcIdx !== targetIdx) {
            const moved = filesArray.splice(dragSrcIdx, 1)[0];
            filesArray.splice(targetIdx, 0, moved);
            renderPreview();
            updateFileInput();
        }
        dragSrcIdx = null;
    });

    function updateFileInput() {
        // Update the file input to match filesArray
        const dataTransfer = new DataTransfer();
        filesArray.forEach(file => dataTransfer.items.add(file));
        fileInput[0].files = dataTransfer.files;
    }

    // Form submission with progress
    $('#pdfForm').on('submit', function (e) {
        e.preventDefault();
        alertArea.addClass('d-none').text('');
        progressContainer.removeClass('d-none');
        progressBar.css('width', '0%');
        const btn = $('#convertBtn');
        const btnText = $('#btnText');
        const btnSpinner = $('#btnSpinner');
        btn.prop('disabled', true);
        btnText.text('Processing...');
        btnSpinner.removeClass('d-none');

        const formData = new FormData(this);
        // Add files in order
        filesArray.forEach(file => formData.append('images[]', file));

        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            xhr: function () {
                const xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener('progress', function (evt) {
                    if (evt.lengthComputable) {
                        const percent = Math.round((evt.loaded / evt.total) * 100);
                        progressBar.css('width', percent + '%');
                    }
                }, false);
                xhr.responseType = 'blob'; // Expect PDF as blob
                return xhr;
            },
            success: function (data, status, xhr) {
                // Get filename from Content-Disposition header
                let filename = 'converted_images.pdf';
                const disposition = xhr.getResponseHeader('Content-Disposition');
                if (disposition && disposition.indexOf('attachment') !== -1) {
                    const matches = /filename="?([^";]+)"?/.exec(disposition);
                    if (matches != null && matches[1]) filename = matches[1];
                }
                // Store blob and filename for manual download
                window._pdfBlob = new Blob([data], { type: 'application/pdf' });
                window._pdfFilename = filename;
                // Remove any previous object URL
                if (window._pdfBlobUrl) {
                    window.URL.revokeObjectURL(window._pdfBlobUrl);
                }
                window._pdfBlobUrl = window.URL.createObjectURL(window._pdfBlob);
                // Set download link href and filename
                downloadLink.attr('href', window._pdfBlobUrl);
                downloadLink.attr('download', window._pdfFilename);
                // Show download card
                downloadCard.removeClass('d-none');
                $('#converterCard').addClass('d-none'); // Hide the entire card (heading + form)
                $('#pdfForm')[0].reset();
                filesArray = [];
                renderPreview();
            },
            error: function (xhr) {
                let errorMessage = 'An error occurred during conversion.';
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMessage = xhr.responseJSON.message;
                }
                showError(errorMessage);
            },
            complete: function () {
                btn.prop('disabled', false);
                btnText.text('Convert to PDF');
                btnSpinner.addClass('d-none');
                progressContainer.addClass('d-none');
                progressBar.css('width', '0%');
            }
        });
    });

    function showError(msg) {
        alertArea.removeClass('d-none').text(msg);
    }

    // New conversion
    newConversion.on('click', function () {
        downloadCard.addClass('d-none');
        $('#converterCard').removeClass('d-none'); // Show the entire card again
        filesArray = [];
        renderPreview();
        $('#pdfForm')[0].reset();
    });

    // Download PDF on button click
    downloadLink.on('click', function (e) {
        if (!window._pdfBlobUrl || !window._pdfBlob) {
            e.preventDefault();
            return;
        }
        // The anchor already has href and download set, so default action will download
    });
});
