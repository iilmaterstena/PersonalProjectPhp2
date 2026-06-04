<?php include_once "includes/header.php"; ?>

<div class="container my-5 py-5">
    <div class="row justify-content-center">
        <div class="col-md-5 card shadow p-4 border-0 rounded-0">
            <h3 class="mb-4 text-center text-uppercase fw-bold">Sign In</h3>
            
            <form action="" method="POST">
                <div class="mb-3">
                    <label class="form-label">Username or Email</label>
                    <input type="text" name="identity" class="form-control rounded-0" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control rounded-0" required>
                </div>
                
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" id="remember">
                    <label class="form-check-label" for="remember">Remember me</label>
                </div>

                <button type="submit" name="login" class="btn btn-fenty w-100">Login</button>
                <p class="small text-center mt-3 mb-0">Don't have an account? <a href="register.php" class="text-dark fw-bold">Register</a></p>
            </form>
        </div>
    </div>
</div>

<?php include_once "includes/footer.php"; ?>