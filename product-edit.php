<?php
session_start();
require 'dbcon.php'
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edição de produto</title>
</head>

<body>

    <div class="container mt-5">
        <!--Busca o arquivo message para utilizar para mostrar as informações  !-->
        <?php include('message.php') ?>
        <div class="row">
            <div class="col-md12">
                <div class="card">
                    <div class="card-header">
                        <h4>Editar Produto
                            <a href="index.php" class="btn btn-danger float-end">Voltar</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php
                        //Pega o id escondido no input do fomulario para acessar o produto do mesmo id no banco de dados
                        if (isset($_GET['id'])) {
                            $product_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM product WHERE id='$product_id'";
                            $query_run = mysqli_query($con, $query);
                            if (mysqli_num_rows($query_run) > 0) {
                                $product = mysqli_fetch_array($query_run);
                        ?>
                                <form action="code.php" method="POST">
                                    <input type="hidden" name="product_id" value="<?= $product_id ?>">
                                    <div class="mb-3">
                                        <label>Nome do Produto</label>
                                        <input type="text" name="pname" value="<?= $product['name'] ?>" class="form-control">
                                        <label>Quantidade</label>
                                        <input type="number" name="quantity" value="<?= $product['quantity'] ?>" class="form-control">
                                        <label>Preço</label>
                                        <input type="number" name="price" value="<?= $product['price'] ?>" class="form-control">
                                        <label>Descrição</label>
                                        <input type="text" name="description" value="<?= $product['description'] ?>" class="form-control">
                                        <label>Data do cadastro</label>
                                        <input type="date" name="date" value="<?= $product['date'] ?>" class="form-control">
                                        <label>Hora</label>
                                        <input type="time" name="hour" value="<?= $product['hour'] ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" name="update_product" class="btn btn-primary">Atualiza Produto</button>
                                    </div>
                                </form>
                        <?php
                            } else {
                                echo "<h4>Nenhum Id encontrado</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>