<?php
require_once(__DIR__ . '/Config/init.php');

$productController = new ProductController();

// Retrieve all products to display
$products = $productController->index();


// Handle restoring all deleted products
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["restoreProductId"])) {
    $productController->restore($_POST["restoreProductId"]);
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1>Product List</h1>
        <div class="d-flex justify-content-end mb-3">
            <a href="View/category/create.php" class="btn btn-primary">Add New Product</a>
            <a href="categories.php" class="btn btn-primary mx-3">Category List</a>
        </div>
        
        <?php if (!empty($products)): ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Product Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $product): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($product['id']); ?></td>
                            <td><?php echo htmlspecialchars($product['product_name']); ?></td>
                            <td>
                                <a href="View/products/detail.php?id=<?php echo $product['id']; ?>" class="btn btn-warning btn-sm">Detail</a>
                                <a href="View/products/update.php?id=<?php echo $product['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="View/products/delete.php?id=<?php echo $product['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No products found.</p>
        <?php endif; ?>

        <form method="POST">
            <input type="hidden" name="restoreProductId" value="<?php echo $product['id']; ?>">
            <button type="submit" class="btn btn-secondary">Restore</button>
        </form>
    </div>
</body>

</html>
