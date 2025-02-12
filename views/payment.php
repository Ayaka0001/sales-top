<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>
</head>
<body>
    <?php 
        session_start();
        require "../classes/product.php";

        $product = new Product;
        $id = $_GET['id'];
        $product = $product -> findProduct($id);

        include_once "nav.php";
        ?>
                 
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-9">
                <div class="row">
                    <div class="col">
                    <h2 class="h1 mb-4 fw-bold">Payment</h2>
                    </div>
                    <div class="col text-end h1">
                        <a href="add-product.php" class="text-decoration-none text-info">
                            <i class="fa-solid fa-plus"></i>
                        </a>
                    </div>
                </div>

                <form action="../actions/payment.php" method="post">
                    <table class="table">
                        <thead class="table-dark text-start">
                            <tr>
                                <th>ID</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <input type="hidden" name="id" value="<?= $product['id']?>">
                                    <?= $product['id'] ?>
                                </td>
                                <td>
                                    <input type="hidden" name="product_name" value="<?= $product['product_name']?>">
                                    <?= $product['product_name'] ?>
                                </td>
                                <td>
                                    <input type="hidden" name="price" value="<?= $product['price']?>">
                                    <?= $product['price'] ?>
                                </td>
                                <td>
                                    <input type="hidden" name="buy_quantity" value="<?= $product['buy_quantity']?>">  
                                    <?= $product['buy_quantity'] ?>  
                                </td>
                                <td>
                                    $  <?= number_format($product['price'] * $product['buy_quantity'],2)?>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="row">
                        <div class="col text-end">
                            <label for="payment">Payment Amount: $ </label>
                            <input type="number" name="payment" id="payment" min="0" value="0" step="0.01">
                        </div>
                        <button type="submit" name="buy_product" class="btn btn-sm btn-primary ms-2 mt-3">
                        <i class="fa-solid fa-bag-shopping"></i>  Pay
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

 </body>
</html>