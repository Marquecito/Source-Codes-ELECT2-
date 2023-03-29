<?php

require_once "Product.php";
require_once "User.php";

$products = array(
    new Product("Apple", 1.50, 1.00),
    new Product("Banana", 0.50, 0.25),
    new Product("Orange", 2.00, 0.75),
    new Product("Grapes", 3.50, 0.50),
    new Product("Pineapple", 5.00, 2.00),
    new Product("Watermelon", 10.00, 5.00),
    new Product("Strawberries", 2.50, 0.25),
    new Product("Blueberries", 4.00, 0.50),
    new Product("Raspberries", 3.00, 0.30),
    new Product("Mango", 2.00, 0.75)
);

$user = null;

$selectedProducts = array();

if (isset($_POST['submit'])){

    if (
        isset($_POST['name']) &&
        isset($_POST['spending-limit']) &&
        isset($_POST['selected-products'])
    ){

        $selectedProductMark = $_POST['selected-products'];
        $selectedProducts = array();

        foreach ($selectedProductMark as $index => $selectedProductIndex) {
            $product = $products[$selectedProductIndex];
            $selectedProducts[$index] = $product;
        }

        $user = new User($_POST['name'], $_POST['spending-limit'], $selectedProducts);

    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
          crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
            crossorigin="anonymous"></script>
</head>
<body>

<div class="d-flex align-items-center justify-content-center vh-100" style="flex-direction: column;">
    <form method="POST">
        <div class="mb-3">
            <label
                    for="input-name"
                    class="form-label"
                    id="input-name-label">Username</label>
            <input
                    id="input-name"
                    class="form-control"
                    type="text"
                    name="name"
                    required>
        </div>
        <div class="mb-3">
            <label
                    for="input-spending-limit"
                    class="form-label"
                    id="input-spending-limit-label">Spending Limit</label>
            <input
                    id="input-spending-limit"
                    class="form-control"
                    type="number"
                    name="spending-limit"
                    step="0.01"
                    required>
        </div>
        <?php foreach ($products as $index => $product): ?>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="<?= $index ?>" id="flexCheckDefault"
                       name="selected-products[]"
                    <?php
                    if (isset($_POST['selected-products']) && in_array($index, $_POST['selected-products'])){
                        echo "checked";
                    }
                    ?>
                >
                <label class="form-check-label" for="flexCheckDefault">
                    <?= $product ?>
                </label>
            </div>
        <?php endforeach ?>

        <div style="text-align: center; margin-top: 10px">
            <input name="submit" value="Submit" type="submit" class="btn btn-primary">
        </div>
    </form>

    <div style="text-align: center; margin-top: 10px">
        <?php
        if (!empty($selectedProducts)){
            $totalPrice = $user->getSpendingLimit();
            if ($totalPrice > $user->getSpendingLimit()){
                echo "You have exceeded your spending limit.<br>";
                echo "Total price: $$totalPrice<br>";
                echo "Spending limit: $" . $user->getSpendingLimit() . "<br>";
            } else {
                foreach ($selectedProducts as $product) echo $product . "<br>";
                if ($totalPrice != null) echo "<br>Total price: $" . round($totalPrice, 2) . "<br>";
                echo "Spending limit: $" . round($user->getSpendingLimit(), 2) . "<br>";
                echo "Remaining balance: $" . round($user->getSpendingLimit() - $totalPrice, 2);
            }
        }
        ?>
    </div>
</div>

</body>

</html>
