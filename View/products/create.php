<?php
require(__DIR__ . '/../../Config/init.php');

$productController = new ProductController();
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate product_name
    if (empty($_POST["product_name"])) {
        $errors['product_name'] = "Product Name is required";
    } else {
        $product_name = $_POST["product_name"];
    }

    // If there are no validation errors, proceed with creating the category
    if (empty($errors)) {
        $data = ['product_name' => $product_name];

        if ($categoryController->create($data)) {
            echo "<script>alert('Product added successfully!')</script>";
            header("Location: ../../index.php");
            exit();
        } else {
            echo "<script>alert('Failed to add product!')</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>
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
        <h1>Create Product</h1>
        
        <form method="POST">
            <div class="mb-3">
                <label for="product_name" class="form-label">Product Name</label>
                <input type="text" name="product_name" class="form-control" id="product_name" value="<?php echo htmlspecialchars($category_name ?? ''); ?>">
                <?php if (isset($errors['product_name'])): ?>
                    <div class="text-danger"><?php echo $errors['product_name']; ?></div>
                <?php endif; ?>
            </div>

            <button type="submit" class="btn btn-primary">Create Product</button>
            <a href="../../index.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>

</html>
