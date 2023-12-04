<?php
session_start();
require 'dbcon.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
</head>

<body>
    <div class="container mt-5">
        <?php include('message.php') ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Listagem de Produtos
                            <a href="product-create.php" class="btn btn-primary float-end">Adicionar <img src="./public/mark.svg" width="20" height="20"></a>
                        </h4>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-bordered tabled-striped ">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Produto </th>
                                    <th>Quantidade</th>
                                    <th>Preço</th>
                                    <th>Data do cadastro</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * FROM product";
                                $query_run = mysqli_query($con, $query);
                                //Valida se existe itens na tabela
                                if (mysqli_num_rows($query_run) > 0) {
                                    //Realiza um loop na query,retornando arrays com os dados
                                    foreach ($query_run as $product) {
                                        //Formata a data
                                        $formatDate= date("d/m/Y", strtotime($product['date']));
                                ?>
                                        <tr>
                                            <td><?= $product['id']; ?></td>
                                            <td><?= $product['name']; ?></td>
                                            <td><?= $product['quantity']; ?></td>
                                            <td>R$  <?= $product['price'];?></td>
                                            <td><?= $formatDate; ?></td>
                                            <td class="mx-auto p-2" style="width: 230px;">
                                                <a href="product-view.php?id=<?= $product['id']; ?>" class="btn btn-info btn-sm">Vizualizar</a>
                                                <a href="product-edit.php?id=<?= $product['id']; ?>" class="btn btn-success btn-sm">Editar</a>
                                                <form action="code.php" method="POST" class="d-inline">
                                                    <button type="submit" name="delete_student" value="<?= $product['id']?>" class="btn btn-danger btn-sm">Deletar</button>
                                                </form>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                } else {
                                    echo "<h5> Nenhum dado encontrado</h5>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>