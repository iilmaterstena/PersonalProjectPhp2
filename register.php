<?php include_once "includes/header.php"; ?>

<div class="container my-5 py-5">
    <div class="row justify-content-center">
        <div class="col-md-6 card shadow p-4 border-0 rounded-0">
            <h3 class="mb-4 text-center text-uppercase fw-bold">Create Account</h3>
            
            <form action="registerLogic.php" method="POST">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" class="form-control rounded-0" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Surname</label>
                        <input type="text" name="surname" class="form-control rounded-0" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" name="username" class="form-control rounded-0" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control rounded-0" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control rounded-0" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Confirm Password</label>
                    <input type="password" name="confirm_password" class="form-control rounded-0" required>
                </div>
                
                <button type="submit" name="submit" class="btn btn-fenty w-100 mt-2">Register</button>
                <p class="small text-center mt-3 mb-0">Already have an account? <a href="login.php" class="text-dark fw-bold">Login</a></p>
            </form>
        </div>
    </div>
</div>

<?php include_once "includes/footer.php"; ?>