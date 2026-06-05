<?php include_once "includes/header.php"; ?>

<div class="hero-section" style="background: linear-gradient(rgba(255,255,255,0.1), rgba(255, 240, 242, 0.8)), url('images/Fenty-Beauty1.jpg') no-repeat center center/cover; height: 500px; display: flex; align-items: center;">
    <div class="container text-center w-100">
        <h1 class="display-3 fw-bold text-uppercase">The New Era of Beauty</h1>
        <a href="products.php" class="btn btn-dark btn-lg mt-3 rounded-0 text-uppercase fw-bold">Shop Now</a>
    </div>
</div>

<div class="container my-5 py-4">
    <h2 class="text-center text-uppercase fw-bold mb-5">Shop By Category</h2>
    <div class="row g-4">
        
        <div class="col-md-6">
            <div class="card bg-dark text-white border-0 rounded-0 overflow-hidden" style="transition: transform 0.3s; box-shadow: 0 4px 15px rgba(0,0,0,0.1);" onmouseover="this.style.transform='scale(1.02)'" onmouseout="this.style.transform='scale(1)'">
                <img src="images/makeup,png.png" class="card-img opacity-75" alt="Makeup" style="height: 400px; width: 100%; object-fit: cover;">
                <div class="card-img-overlay d-flex flex-column justify-content-center align-items-center" style="background: rgba(0,0,0,0.25);">
                    <h3 class="card-title fw-bold text-uppercase mb-3" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.6); font-size: 2rem; letter-spacing: 2px;">Makeup</h3>
                    <a href="products.php?category=Makeup" class="btn btn-light rounded-0 fw-bold text-uppercase btn-sm px-4 py-2">Explore</a>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card bg-dark text-white border-0 rounded-0 overflow-hidden" style="transition: transform 0.3s; box-shadow: 0 4px 15px rgba(0,0,0,0.1);" onmouseover="this.style.transform='scale(1.02)'" onmouseout="this.style.transform='scale(1)'">
                <img src="images/skincare.jpg" class="card-img opacity-75" alt="Skincare" style="height: 400px; width: 100%; object-fit: cover;">
                <div class="card-img-overlay d-flex flex-column justify-content-center align-items-center" style="background: rgba(0,0,0,0.25);">
                    <h3 class="card-title fw-bold text-uppercase mb-3" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.6); font-size: 2rem; letter-spacing: 2px;">Skincare</h3>
                    <a href="products.php?category=Skincare" class="btn btn-light rounded-0 fw-bold text-uppercase btn-sm px-4 py-2">Explore</a>
                </div>
            </div>
        </div>

    </div>
</div>

<?php include_once "includes/footer.php"; ?>