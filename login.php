<?php 
// Startojmë sesionin në mënyrë që uebsajti ta mbajë mend që jemi kyçur
session_start();

include "config/db.php"; 
include "includes/header.php"; 

$error = "";

// Kontrollojmë nëse përdoruesi ka klikuar butonin për t'u kyçur
if (isset($_POST['login'])) {
    $identity = $_POST['identity'];
    $password = $_POST['password'];

    // Merr përdoruesin direkt nga databaza (kontrollon username ose email)
    $stmt = $connection->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
    $stmt->execute([$identity, $identity]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Kontrollon fjalëkalimin e enkriptuar dhe të dërgon te Home automatikisht
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        
        header("Location: index.php");
        exit();
    } else {
        $error = "Username/Email ose fjalëkalimi është gabim!";
    }
}
?>

<div class="container my-5 py-5">
    <div class="row justify-content-center">
        <div class="col-md-5 fenty-form-card shadow p-4 border-0">
            <h3 class="mb-4 text-center text-uppercase fw-bold">Sign In</h3>
            
            <?php if ($error): ?>
                <div class="alert alert-danger small text-center py-2 mb-3"><?= $error; ?></div>
            <?php endif; ?>

            <form action="" method="POST">
                <div class="mb-3">
                    <label class="form-label fw-bold small">Username or Email</label>
                    <input type="text" name="identity" class="form-control" autocomplete="off" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold small">Password</label>
                    <input type="password" name="password" class="form-control" autocomplete="new-password" required>
                </div>
                
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" id="remember">
                    <label class="form-check-label small text-muted" for="remember">Remember me</label>
                </div>

                <button type="submit" name="login" class="btn btn-fenty w-100 text-uppercase fw-bold py-2">Login</button>
                <p class="small text-center mt-3 mb-0">Don't have an account? <a href="register.php" class="fw-bold text-decoration-none" style="color: var(--deep-pink);">Register</a></p>
            </form>
        </div>
    </div>
</div>

<?php include_once "includes/footer.php"; ?>