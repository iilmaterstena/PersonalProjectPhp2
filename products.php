<?php 
// Nëse db.php është brenda folderit config, ndryshoje rrugën:
include "config/db.php"; 

// Nëse header.php është brenda folderit includes, ndryshoje rrugën:
include "includes/header.php"; 

// Marrja e produkteve nga databaza
try {
    $stmt = $connection->query("SELECT * FROM products");
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    die("Gabim gjatë marrjes së produkteve: " . $e->getMessage());
}
?>

<div class="container my-5">
    <h2 class="text-center text-uppercase fw-bold mb-5">Our Collection</h2>
    <div class="row g-4">
        <?php foreach($products as $product): ?>
        <div class="col-md-3">
            <div class="card h-100 border-0 shadow-sm text-center">
                <img src="<?= $product['image_url']; ?>" class="card-img-top rounded-0" alt="<?= htmlspecialchars($product['name']); ?>">
                <div class="card-body d-flex flex-column justify-content-between">
                    <div>
                        <span class="text-muted small text-uppercase"><?= htmlspecialchars($product['category']); ?></span>
                        <h5 class="card-title fw-bold mt-1"><?= htmlspecialchars($product['name']); ?></h5>
                        <p class="card-text text-secondary small"><?= htmlspecialchars($product['description']); ?></p>
                    </div>
                    <div class="mt-3">
                        <p class="fw-bold fs-5 mb-2">$<?= number_format($product['price'], 2); ?></p>
                        <button class="btn btn-dark btn-sm w-100 rounded-0 text-uppercase fw-bold">Add to Cart</button>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<?php include "footer.php"; ?>