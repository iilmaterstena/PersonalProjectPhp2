<?php 
include_once "includes/header.php"; 

// Kontrollojmë nëse përdoruesi ka shtypur butonin "Send Message"
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    
    // Kjo shërben që JavaScript ta dijë emrin e personit që dërgoi mesazhin
    echo "<script>var senderName = '" . htmlspecialchars($name) . "';</script>";
}
?>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8 fenty-form-card shadow p-5 border-0">
            <h2 class="text-center text-uppercase fw-bold mb-4">Contact Us</h2>
            <p class="text-center text-muted mb-4">Have any questions about Fenty Beauty products? Fill out the form below!</p>
            
            <form action="" method="POST">
                <div class="mb-3">
                    <label class="form-label fw-bold">Full Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Email Address</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Message</label>
                    <textarea name="message" rows="5" class="form-control" required></textarea>
                </div>
                <button type="submit" class="btn btn-fenty w-100 mt-2">Send Message</button>
            </form>
        </div>
    </div>
</div>

<script>
// Nëse variabla senderName ekziston (që do të thotë se formulari u dërgua), shfaqet alerti
if (typeof senderName !== 'undefined') {
    alert("✨ Faleminderit " + senderName + ", mesazhi yt u dërgua me sukses! Do t'ju kthejmë përgjigje së shpejti.");
}
</script>

<?php include_once "includes/footer.php"; ?>