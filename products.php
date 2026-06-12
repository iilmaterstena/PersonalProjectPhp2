<?php 
// Startojmë sesionin në mënyrë që PHP të mbajë mend shportën
session_start();

include "config/db.php"; 
include "includes/header.php"; 

// Nëse dikush ka klikuar butonin për të shtuar në shportë
if (isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];

    // Krijojmë një strukturë për produktin
    $cart_item = [
        'id' => $product_id,
        'name' => $product_name,
        'price' => $product_price,
        'image' => $product_image,
        'quantity' => 1
    ];

    // Nëse shporta nuk ekziston ende në sesion, e krijojmë si varg (array) të zbrazët
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Kontrollojmë nëse produkti është shtuar një herë, nëse po, ia rrisim sasinë
    $found = false;
    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item['id'] == $product_id) {
            $_SESSION['cart'][$key]['quantity'] += 1;
            $found = true;
            break;
        }
    }

    // Nëse është produkt i ri në shportë, e shtojmë
    if (!$found) {
        $_SESSION['cart'][] = $cart_item;
    }

    // Kjo shërben që JavaScript ta dijë emrin e produktit të shtuar për Alert
    echo "<script>var addedProduct = '" . htmlspecialchars($product_name) . "';</script>";
}

// Marrja e produkteve nga databaza
try {
    $stmt = $connection->query("SELECT * FROM products");
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    die("Gabim gjatë marrjes së produkteve: " . $e->getMessage());
}
?>

<style>
    .rreshti-fenty {
        display: flex;
        flex-wrap: wrap;
        gap: 24px; /* Hapësira mes kartelave */
    }
    .kolona-fenty {
        flex: 0 0 calc(20% - 20px); /* Kjo i detyron saktësisht 5 produkte në rresht */
        min-width: 200px; /* E mbron dizajnin në ekrane më të vogla */
    }
</style>

<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-5">
        <h2 class="text-uppercase fw-bold m-0">Our Collection</h2>
        <a href="cart.php" class="btn btn-outline-dark rounded-0 fw-bold">🛒 View Cart (<?= isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0; ?>)</a>
    </div>

<<<<<<< HEAD
    <div class="rreshti-fenty">
        <?php foreach($products as $product): ?>
        
        <div class="kolona-fenty">
            <div class="card h-100 border-0 shadow-sm text-center card-product">
                
=======
    <div class="row g-4">
        <?php foreach($products as $product): ?>
        <div class="col-md-3">
            <div class="card h-100 border-0 shadow-sm text-center" style="transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                <!-- Imazhi i produktit me rregullim që të duken të gjitha barabartë -->
>>>>>>> 88b0b7dd611ecaef5fd9f22a06f9d2e0086a02a0
                <img src="<?= $product['image_url']; ?>" class="card-img-top rounded-0" alt="<?= htmlspecialchars($product['name']); ?>" style="height: 280px; object-fit: cover;">
                
                <div class="card-body d-flex flex-column justify-content-between">
                    <div>
<<<<<<< HEAD
                        <span class="badge-category d-inline-block mb-2"><?= htmlspecialchars($product['category']); ?></span>
                        
                        <h5 class="card-title fw-bold mt-1" style="font-size: 1.05rem; min-height: 45px;"><?= htmlspecialchars($product['name']); ?></h5>
=======
                        <span class="text-muted small text-uppercase" style="letter-spacing: 1px;"><?= htmlspecialchars($product['category']); ?></span>
                        <h5 class="card-title fw-bold mt-1" style="font-size: 1.1rem; min-height: 45px;"><?= htmlspecialchars($product['name']); ?></h5>
>>>>>>> 88b0b7dd611ecaef5fd9f22a06f9d2e0086a02a0
                        <p class="card-text text-secondary small" style="min-height: 40px;"><?= htmlspecialchars($product['description']); ?></p>
                    </div>
                    
                    <div class="mt-3">
                        <p class="fw-bold fs-5 mb-2">$<?= number_format($product['price'], 2); ?></p>
                        
                        <form action="" method="POST">
                            <input type="hidden" name="product_id" value="<?= $product['id']; ?>">
                            <input type="hidden" name="product_name" value="<?= htmlspecialchars($product['name']); ?>">
                            <input type="hidden" name="product_price" value="<?= $product['price']; ?>">
                            <input type="hidden" name="product_image" value="<?= $product['image_url']; ?>">
<<<<<<< HEAD
                            <button type="submit" name="add_to_cart" class="btn btn-fenty btn-sm w-100 text-uppercase fw-bold py-2">Add to Cart</button>
=======
                            <button type="submit" name="add_to_cart" class="btn btn-dark btn-sm w-100 rounded-0 text-uppercase fw-bold py-2">Add to Cart</button>
>>>>>>> 88b0b7dd611ecaef5fd9f22a06f9d2e0086a02a0
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <?php endforeach; ?>
    </div>
</div>

<script>
<<<<<<< HEAD
// Shfaq alert-in kur produkti shtohet me sukses
=======
// Nëse variabla addedProduct është krijuar nga PHP, shfaq Alert-in automatikasht
>>>>>>> 88b0b7dd611ecaef5fd9f22a06f9d2e0086a02a0
if (typeof addedProduct !== 'undefined') {
    alert("✨ " + addedProduct + " u shtua në shportën tënde me sukses!");
}
</script>

<<<<<<< HEAD
<?php 
// U rregullua rruga e saktë për skedarin e footer-it këtu:
include "includes/footer.php"; 
?>
=======
<?php include "includes/footer.php"; ?>
>>>>>>> 88b0b7dd611ecaef5fd9f22a06f9d2e0086a02a0
