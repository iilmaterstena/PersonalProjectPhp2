<?php 
session_start();

include "config/db.php"; 
include "includes/header.php"; 

// Kushi nëse shtypet butoni "Add to Cart"
if (isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];

    // Krijojmë një rresht me të dhënat e produktit
    $cart_item = [
        'id' => $product_id,
        'name' => $product_name,
        'price' => $product_price,
        'image' => $product_image,
        'quantity' => 1
    ];

    // Nëse shporta nuk ekziston në sesion, e krijojmë si një listë të zbrazët
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

    // Nëse është produkt i ri në shportë, e shtojmë te lista
    if (!$found) {
        $_SESSION['cart'][] = $cart_item;
    }

    // Kjo shërben që JavaScript ta dijë emrin e produktit për Alert
    echo "<script>var addedProduct = '" . $product_name . "';</script>";
}

$query = "SELECT * FROM products";
$stmt = $connection->query($query);
$pro ducts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-5">
        <h2 class="text-uppercase fw-bold m-0">Our Collection</h2>
        <a href="cart.php" class="btn btn-outline-dark rounded-0 fw-bold">
            🛒 View Cart (<?= isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0; ?>)
        </a>
    </div>

    <div class="row g-4">
        <?php foreach($products as $product): ?>
        
        <div class="col-md-3">
            <div class="card h-100 border-0 shadow-sm text-center card-product">
                <img src="<?= $product['image_url']; ?>" class="card-img-top rounded-0" style="height: 280px; object-fit: cover;">
                
                <div class="card-body d-flex flex-column justify-content-between">
                    <div>
                        <span class="badge-category d-inline-block mb-2"><?= $product['category']; ?></span>
                        <h5 class="card-title fw-bold mt-1"><?= $product['name']; ?></h5>
                        <p class="card-text text-secondary small"><?= $product['description']; ?></p>
                    </div>
                    
                    <div class="mt-3">
                        <p class="fw-bold fs-5 mb-2">$<?= $product['price']; ?></p>
                        
                        <form action="" method="POST">
                            <input type="hidden" name="product_id" value="<?= $product['id']; ?>">
                            <input type="hidden" name="product_name" value="<?= $product['name']; ?>">
                            <input type="hidden" name="product_price" value="<?= $product['price']; ?>">
                            <input type="hidden" name="product_image" value="<?= $product['image_url']; ?>">
                            <button type="submit" name="add_to_cart" class="btn btn-fenty btn-sm w-100 text-uppercase fw-bold py-2">Add to Cart</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <?php endforeach; ?>
    </div>
</div>

<script>
// Alert i thjeshtë kur shtohet produkti
if (typeof addedProduct !== 'undefined') {
    alert(addedProduct + " u shtua në shportë!");
}
</script>

<?php include "includes/footer.php"; ?>