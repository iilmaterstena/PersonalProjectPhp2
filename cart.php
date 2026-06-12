<?php 
// Startojmë sesionin që PHP të ketë qasje te produktet e shportës
session_start();

include "config/db.php"; 
include "includes/header.php"; 

// 1. Logjika për fshirjen e një produkti nga shporta
if (isset($_POST['remove_item'])) {
    $remove_id = $_POST['product_id'];
    
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $key => $item) {
            if ($item['id'] == $remove_id) {
                unset($_SESSION['cart'][$key]);
                // Rirregullojmë indeksat e vargut (array) pas fshirjes
                $_SESSION['cart'] = array_values($_SESSION['cart']);
                break;
            }
        }
    }
    // Rifreskojmë faqen që të largohet produkti menjëherë vizualisht
    header("Location: cart.php");
    exit();
}

// 2. Logjika për zbrazjen e plotë të shportës
if (isset($_POST['clear_cart'])) {
    unset($_SESSION['cart']);
    header("Location: cart.php");
    exit();
}

// Llogaritja e totalit të pagesës
$total_price = 0;
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $item) {
        $total_price += $item['price'] * $item['quantity'];
    }
}
?>

<div class="container my-5 py-3" style="min-height: 60vh;">
    <h2 class="text-uppercase fw-bold mb-4">🛒 Your Shopping Cart</h2>

    <?php if (!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0): ?>
        <div class="alert alert-light border-0 shadow-sm p-5 text-center rounded-3">
            <h4 class="fw-bold text-secondary mb-3">Your cart is currently empty!</h4>
            <p class="text-muted">Explore our luxury makeup and skincare collection to add products.</p>
            <a href="products.php" class="btn btn-dark rounded-0 text-uppercase fw-bold mt-2 px-4 py-2">Go to Products</a>
        </div>
    <?php else: ?>
        <div class="row g-4">
            
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm rounded-3 p-4 bg-white">
                    <div class="table-responsive">
                        <table class="table table-borderless align-middle m-0">
                            <thead>
                                <tr class="border-bottom text-muted text-uppercase small" style="letter-spacing: 1px;">
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th class="text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($_SESSION['cart'] as $item): ?>
                                <tr class="border-bottom">
                                    <td class="py-3">
                                        <div class="d-flex align-items-center">
                                            <img src="<?= $item['image']; ?>" alt="<?= htmlspecialchars($item['name']); ?>" class="rounded-0 me-3" style="width: 70px; height: 70px; object-fit: cover;">
                                            <div>
                                                <h6 class="fw-bold m-0"><?= htmlspecialchars($item['name']); ?></h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>$<?= number_format($item['price'], 2); ?></td>
                                    <td>
                                        <span class="badge bg-light text-dark border px-3 py-2 fw-bold fs-6 rounded-0"><?= $item['quantity']; ?></span>
                                    </td>
                                    <td class="text-end">
                                        <form action="" method="POST" class="m-0">
                                            <input type="hidden" name="product_id" value="<?= $item['id']; ?>">
                                            <button type="submit" name="remove_item" class="btn btn-sm btn-outline-danger rounded-0 px-3">Remove</button>
                                        </form>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="d-flex justify-content-between mt-4">
                        <a href="products.php" class="btn btn-outline-dark rounded-0 text-uppercase fw-bold px-3 btn-sm">← Continue Shopping</a>
                        <form action="" method="POST" class="m-0">
                            <button type="submit" name="clear_cart" class="btn btn-link text-danger text-uppercase fw-bold text-decoration-none small">Clear Entire Cart</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card border-0 shadow-sm rounded-3 p-4 bg-white">
                    <h5 class="fw-bold text-uppercase mb-4">Order Summary</h5>
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted">Items Count:</span>
                        <span class="fw-bold"><?= count($_SESSION['cart']); ?></span>
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <span class="text-muted">Shipping:</span>
                        <span class="text-success fw-bold">FREE</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <span class="fs-5 fw-bold">Total Price:</span>
                        <span class="fs-4 fw-bold text-dark">$<?= number_format($total_price, 2); ?></span>
                    </div>
                    <a href="checkout.php" class="btn btn-dark w-100 rounded-0 text-uppercase fw-bold py-3 fs-6">Proceed to Checkout</a>
                </div>
            </div>

        </div>
    <?php endif; ?>
</div>

<?php 
// RREGULLIMI KRYESOR: Ndryshuar nga "footer.php" në "includes/footer.php"
include "includes/footer.php"; 
?>