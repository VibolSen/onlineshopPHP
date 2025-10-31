document.addEventListener('DOMContentLoaded', () => {
    const genericModal = document.getElementById('genericModal');
    const modalContentArea = document.getElementById('modalContentArea');
    const modalCloseButton = document.querySelector('.modal-close-button');

    // Function to open the modal
    function openModal(contentHtml) {
        modalContentArea.innerHTML = contentHtml;
        genericModal.classList.add('active');
    }

    // Function to close the modal
    function closeModal() {
        genericModal.classList.remove('active');
        modalContentArea.innerHTML = ''; // Clear content when closing
    }

    // Event listener for the close button
    if (modalCloseButton) {
        modalCloseButton.addEventListener('click', closeModal);
    }

    // Event listener for clicking outside the modal content to close it
    if (genericModal) {
        genericModal.addEventListener('click', (event) => {
            if (event.target === genericModal) {
                closeModal();
            }
        });
    }

    // Expose openModal function globally for use by other scripts or inline handlers
    window.openModal = openModal;
});