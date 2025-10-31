    <footer class="fancy-footer text-white text-center py-4 mt-5">
        <div class="container">
            <div class="mb-3">
                <a href="#" class="footer-icon"><i class="bi bi-facebook"></i></a>
                <a href="#" class="footer-icon"><i class="bi bi-instagram"></i></a>
                <a href="#" class="footer-icon"><i class="bi bi-twitter-x"></i></a>
                <a href="#" class="footer-icon"><i class="bi bi-envelope-fill"></i></a>
            </div>
            <p class="mb-0 small">
                &copy; <?php echo date('Y'); ?> <strong>OnlineShop</strong>. All Rights Reserved.
            </p>
        </div>
    </footer>

    <!-- Generic Modal Structure (Hidden by default) -->
    <div class="modal fade" id="genericModal" tabindex="-1" aria-labelledby="genericModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-3 border-0 shadow-lg">
                <div class="modal-header bg-primary text-white border-0">
                    <h5 class="modal-title" id="genericModalLabel"></h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-4" id="modalContentArea">
                    <!-- Form or other content will be loaded here by JavaScript -->
                </div>
            </div>
        </div>
    </div>

    <style>
        /* ===== Fancy Footer ===== */
        .fancy-footer {
            background: linear-gradient(135deg, #2b1055, #7597de);
            box-shadow: 0 -4px 15px rgba(0, 0, 0, 0.3);
            position: relative;
            overflow: hidden;
            animation: fadeInUp 0.6s ease-in-out;
        }

        .footer-icon {
            display: inline-block;
            color: #fff;
            font-size: 1.4rem;
            margin: 0 10px;
            transition: all 0.3s ease;
        }

        .footer-icon:hover {
            color: #ffd369;
            transform: translateY(-4px);
        }

        footer p {
            color: #f1f1f1;
            font-weight: 400;
        }

        /* ===== Modal Styling ===== */
        .modal-content {
            animation: fadeIn 0.4s ease;
        }

        @keyframes fadeIn {
            from {opacity: 0; transform: scale(0.95);}
            to {opacity: 1; transform: scale(1);}
        }

        @keyframes fadeInUp {
            from {opacity: 0; transform: translateY(30px);}
            to {opacity: 1; transform: translateY(0);}
        }

        /* ===== Responsive Spacing ===== */
        @media (max-width: 576px) {
            .footer-icon {
                font-size: 1.2rem;
                margin: 0 8px;
            }
        }
    </style>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
