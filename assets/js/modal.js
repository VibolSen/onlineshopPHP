document.addEventListener('DOMContentLoaded', () => {
    // Expose openModal function globally for use by other scripts or inline handlers
    window.openModal = function(contentHtml, title = 'Modal') {
        const modalElement = $('#genericModal');
        modalElement.find('.modal-title').text(title);
        modalElement.find('#modalContentArea').html(contentHtml);
        modalElement.modal('show');
    };

    // Clear modal content when hidden
    $('#genericModal').on('hidden.bs.modal', function (e) {
        $(this).find('#modalContentArea').html('');
        $(this).find('.modal-title').text('');
    });
});