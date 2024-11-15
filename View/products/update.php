<?php
include(__DIR__ . '/../../Config/init.php');

$productController = new ProductController();
$errors = [];

// Get the product ID from the URL and retrieve product details
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $productDetails = $productController->show($id);
    $product_name = $productDetails['product_name'] ?? '';
}

// Handle form submission for updating the product
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate Product_name
    if (empty($_POST["product_name"])) {
        $errors['product_name'] = "Product Name is required";
    } else {
        $product_name = $_POST["product_name"];
    }

    // If there are no validation errors, proceed with updating the product
    if (empty($errors)) {
        $data = ['product_name' => $product_name];

        if ($productController->update($id, $data)) {
            header("Location: ../../index.php");
            exit();
        } else {
            echo "Error updating product.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding: 20px;
        }
        form {
            max-width: 600px;
            margin: auto;
        }
        label {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Update Product</h1>
        
        <form method="POST">
            <div class="mb-3">
                <label for="product_name" class="form-label">Product Name</label>
                <input type="text" name="product_name" class="form-control" id="product_name" value="<?php echo htmlspecialchars($category_name); ?>">
                <?php if (isset($errors['product_name'])): ?>
                    <div class="text-danger"><?php echo $errors['product_name']; ?></div>
                <?php endif; ?>
            </div>

            <button type="submit" class="btn btn-primary">Update Product</button>
            <a href="../../index.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>

</html>
