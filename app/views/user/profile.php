<?php require_once __DIR__ . '/../partials/header.php'; ?>

<div class="container">
    <h1>User Profile</h1>
    <div class="profile-info">
        <p><strong>Username:</strong> <?php echo htmlspecialchars($user['username']); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
        <p><strong>Role:</strong> <?php echo htmlspecialchars($user['role']); ?></p>
    </div>
</div>

<?php require_once __DIR__ . '/../partials/footer.php'; ?>