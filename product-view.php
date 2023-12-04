<?php
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
        <div class="row">
            <div class="col-md12">
                <div class="card">
                    <div class="card-header">
                        <h4>Vizualizar Informações do Produto
                            <a href="index.php" class="btn btn-danger float-end">Voltar</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php
                        if (isset($_GET['id'])) {
                            //Pega o id do produto
                            $product_id = mysqli_real_escape_string($con, $_GET['id']);
                            //Usa o id do que foi pego para fazer uma query buscando pelo id
                            $query = "SELECT * FROM product WHERE id='$product_id'";
                            $query_run = mysqli_query($con, $query);
                            if (mysqli_num_rows($query_run) > 0) {
                                $product = mysqli_fetch_array($query_run);
                                $formatDate= date("d/m/Y", strtotime($product['date']));
                        ?>
                                <form action="code.php" method="POST">
                                    <input type="hidden" name="product_id" value="<?= $product_id ?>">
                                    <div class="mb-3">
                                        <label>Nome do Produto</label>
                                        <p class="form-control">
                                            <?= $product['name'] ?>
                                        </p>
                                        <label>Quantidade</label>
                                        <p class="form-control">
                                            <?= $product['quantity'] ?>
                                        </p>
                                        <label>Preço</label>
                                        <p class="form-control">
                                            <?= $product['price'] ?>
                                        </p>
                                        <label>Descrição</label>
                                        <p class="form-control">
                                            <?= $product['description'] ?>
                                        </p>
                                        <label>Data do cadastro</label>
                                        <p class="form-control">
                                            <?= $formatDate ?>
                                        </p>
                                        <label>Hora</label>
                                        <p class="form-control">
                                            <?= $product['hour'] ?>
                                        </p>
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