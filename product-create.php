<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produto</title>
</head>

<body>
    <div class="container mt-5">
        <?php include('message.php') ?>
        <?php
        ?>
        <div class="row">
            <div class="col-md12">
                <div class="card">
                    <div class="card-header">
                        <h4>Adicionar Produto
                            <a href="index.php" class="btn btn-danger float-end">Voltar</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST">
                            <div class="mb-3">
                                <label>Nome do Produto</label>
                                <input type="text" name="pname" class="form-control">
                                <label>Quantidade</label>
                                <input type="number" name="quantity" class="form-control">
                                <label>Preço</label>
                                <input type="number" name="price" class="form-control">
                                <label>Descrição</label>
                                <input type="text" name="description" class="form-control">
                                <label>Data do cadastro</label>
                                <input type="date" name="date" class="form-control">
                                <label>Hora</label>
                                <input type="time" name="hour" class="form-control">
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="save_product" class="btn btn-primary">Salvar Produto<img src="./public/salvar.svg" width="30" height="20"></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>