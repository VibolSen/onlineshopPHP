    <footer class="bg-dark text-white text-center py-3 mt-5">
        <p class="mb-0">&copy; <?php echo date('Y'); ?> Online Shop. All Rights Reserved.</p>
    </footer>

    <!-- Generic Modal Structure (Hidden by default) -->
    <div class="modal fade" id="genericModal" tabindex="-1" aria-labelledby="genericModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="genericModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="modalContentArea">
                    <!-- Form or other content will be loaded here by JavaScript -->
                </div>
            </div>
        </div>
    </div>

</body>
</html>