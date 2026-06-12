<?php include_once "includes/header.php"; ?>

<link rel="stylesheet" href="css/style.css">

<div class="hero-section">
    <div class="container">
        <h1 class="display-3 fw-bold text-uppercase">The New Era of Beauty</h1>
    
        <a href="products.php" class="btn btn-fenty btn-lg mt-3">Shop Now</a>
    </div>
</div>

<div class="container my-5 py-4">
    <h2 class="text-center text-uppercase fw-bold mb-5">Shop By Category</h2>
    <div class="row g-4">
        
        <div class="col-md-6">
            <div class="card card-category border-0 rounded-0">
                <img src="images/makeup.png" class="category-img" alt="Makeup">
                <div class="card-img-overlay d-flex flex-column justify-content-center align-items-center">
                    <h3 class="card-title fw-bold text-uppercase text-white">Makeup</h3>
                    <a href="products.php" class="btn btn-light rounded-0 fw-bold mt-2">Explore</a>
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="card card-category border-0 rounded-0">
                <img src="images/skincare.jpg" class="category-img" alt="Skincare">
                <div class="card-img-overlay d-flex flex-column justify-content-center align-items-center">
                    <h3 class="card-title fw-bold text-uppercase text-white">Skincare</h3>
                    <a href="products.php" class="btn btn-light rounded-0 fw-bold mt-2">Explore</a>
                </div>
            </div>
        </div>

    </div>
</div>

<?php include_once "includes/footer.php"; ?>