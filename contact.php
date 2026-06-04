<?php include_once "includes/header.php"; ?>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8 card shadow p-5 border-0 rounded-0">
            <h2 class="text-center text-uppercase fw-bold mb-4">Contact Us</h2>
            <p class="text-center text-muted mb-4">Have any questions about Fenty Beauty products? Fill out the form below!</p>
            
            <form action="" method="POST">
                <div class="mb-3">
                    <label class="form-label fw-bold">Full Name</label>
                    <input type="text" name="name" class="form-control rounded-0" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Email Address</label>
                    <input type="email" name="email" class="form-control rounded-0" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Message</label>
                    <textarea name="message" rows="5" class="form-control rounded-0" required></textarea>
                </div>
                <button type="submit" class="btn btn-fenty w-100 mt-2">Send Message</button>
            </form>
        </div>
    </div>
</div>

<?php include_once "includes/footer.php"; ?>