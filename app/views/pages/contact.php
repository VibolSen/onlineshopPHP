<?php 
$title = 'Contact Us';
require __DIR__ . '/../partials/header.php';
?>

<main class="container mt-5 py-5">
    <h1 class="text-center mb-4 display-4">Contact Us</h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <p class="lead text-center mb-5">Have a question, comment, or suggestion? We'd love to hear from you! Please fill out the form below, and we'll get back to you as soon as possible.</p>
            
            <form>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" placeholder="name@example.com" required>
                </div>
                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" class="form-control" id="subject" placeholder="Subject of your message" required>
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea class="form-control" id="message" rows="5" placeholder="Your message here..." required></textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-block mt-4">Send Message</button>
            </form>

            <div class="text-center mt-5">
                <h3 class="mb-3">Other Ways to Reach Us</h3>
                <p><i class="fas fa-envelope"></i> Email: <a href="mailto:info@onlineshop.com">info@onlineshop.com</a></p>
                <p><i class="fas fa-phone"></i> Phone: +1 (123) 456-7890</p>
                <p><i class="fas fa-map-marker-alt"></i> Address: 123 E-commerce St, Online City, OS 12345</p>
            </div>
        </div>
    </div>
</main>

<?php require __DIR__ . '/../partials/footer.php'; ?>