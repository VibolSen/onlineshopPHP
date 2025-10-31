<?php 
$title = 'Contact Us';
require __DIR__ . '/../partials/header.php';
?>

<main class="contact-page d-flex align-items-center justify-content-center py-5">
    <div class="contact-card p-5 shadow-lg rounded-4 bg-white">
        <h1 class="text-center mb-4 text-primary display-5 fw-bold">Get in Touch</h1>
        <p class="lead text-center text-muted mb-5">
            Have a question, comment, or suggestion? We'd love to hear from you!
        </p>
        
        <form class="contact-form">
            <div class="form-group mb-4 position-relative">
                <label for="name" class="form-label fw-semibold">Name</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                    <input type="text" class="form-control" id="name" placeholder="Your Name" required>
                </div>
            </div>
            <div class="form-group mb-4 position-relative">
                <label for="email" class="form-label fw-semibold">Email</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    <input type="email" class="form-control" id="email" placeholder="name@example.com" required>
                </div>
            </div>
            <div class="form-group mb-4 position-relative">
                <label for="subject" class="form-label fw-semibold">Subject</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-tag"></i></span>
                    <input type="text" class="form-control" id="subject" placeholder="Subject of your message" required>
                </div>
            </div>
            <div class="form-group mb-4 position-relative">
                <label for="message" class="form-label fw-semibold">Message</label>
                <textarea class="form-control" id="message" rows="5" placeholder="Write your message..." required></textarea>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-gradient px-5 py-2 mt-2">Send Message</button>
            </div>
        </form>

        <div class="text-center mt-5 contact-info">
            <h4 class="fw-bold mb-3 text-secondary">Other Ways to Reach Us</h4>
            <p><i class="fas fa-envelope text-primary"></i> <a href="mailto:info@onlineshop.com">info@onlineshop.com</a></p>
            <p><i class="fas fa-phone text-primary"></i> +1 (123) 456-7890</p>
            <p><i class="fas fa-map-marker-alt text-primary"></i> 123 E-commerce St, Online City, OS 12345</p>
        </div>
    </div>
</main>

<?php require __DIR__ . '/../partials/footer.php'; ?>
