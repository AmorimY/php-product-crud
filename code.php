<?php
session_start();
require 'dbcon.php';
//Checa a valida se o metodo POST é para deletar o produto
if (isset($_POST['delete_student'])) {
    $product_id = mysqli_real_escape_string($con, $_POST['delete_student']);
    $query = "DELETE FROM product WHERE id='$product_id'";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] =  "Produto deletado com sucesso";
        header("Location: index.php");
        exit(0);
    } else {
        $_SESSION['message'] =  "Produto não deletado";
        header("Location: index.php");
        exit(0);
    }
}
//Checa a valida se o metodo POST é para modificar o produto
if (isset($_POST['update_product'])) {
    //Pega os inputs do formulario
    $product_id = mysqli_real_escape_string($con, $_POST['product_id']);
    $name = mysqli_real_escape_string($con, $_POST['pname']);
    $quantity = mysqli_real_escape_string($con, $_POST['quantity']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $price = mysqli_real_escape_string($con, $_POST['price']);
    $date = mysqli_real_escape_string($con, $_POST['date']);
    $hour = mysqli_real_escape_string($con, $_POST['hour']);

    //Valida os dados para não ter alteração de nenhum produto com campo faltando
    if (empty($name) || empty($quantity) || empty($description) || empty($price) || empty($date) || empty($hour)) {
        if (empty($name)) {
            $_SESSION['message'] =  "Produto não alterado. Preencher campo : Nome";
            header("Location: index.php");
            exit(0);
        }
        if (empty($quantity)) {
            $_SESSION['message'] =  "Produto não alterado. Preencher campo : Quantidade";
            header("Location: index.php");
            exit(0);
        }
        if (empty($description)) {
            $_SESSION['message'] =  "Produto não alterado. Preencher campo : Descrição";
            header("Location: index.php");
            exit(0);
        }
        if (empty($price)) {
            $_SESSION['message'] =  "Produto não alterado. Preencher campo : Preço";
            header("Location: index.php");
            exit(0);
        }
        if (empty($date)) {
            $_SESSION['message'] =  "Produto não alterado. Preencher campo : Data do Cadastro";
            header("Location: index.php");
            exit(0);
        }
        if (empty($hour)) {
            $_SESSION['message'] =  "Produto não alterado. Preencher campo : Hora";
            header("Location: index.php");
            exit(0);
        }
    } else {
        //Query para alteração na tabela com os parametros
        $query = "UPDATE  product  SET name='$name', quantity='$quantity', description='$description', price='$price', date='$date', hour='$hour' WHERE id='$product_id'";
        //Executa a query
        $query_run = mysqli_query($con, $query);

        if ($query_run) {
            $_SESSION['message'] =  "Produto alterado com sucesso";
            header("Location: index.php");
            exit(0);
        } else {
            $_SESSION['message'] =  "Produto não alterado";
            header("Location: index.php");
            exit(0);
        }
    }
}

//Checa a valida se o metodo POST é para criar o produto
if (isset($_POST['save_product'])) {
    $name = mysqli_real_escape_string($con, $_POST['pname']);
    $quantity = mysqli_real_escape_string($con, $_POST['quantity']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $price = mysqli_real_escape_string($con, $_POST['price']);
    $date = mysqli_real_escape_string($con, $_POST['date']);
    $hour = mysqli_real_escape_string($con, $_POST['hour']);
    //Valida os dados para não ser criado nenhum produto com campo faltando
    if (empty($name) || empty($quantity) || empty($description) || empty($price) || empty($date) || empty($hour)) {
        if (empty($name)) {
            $_SESSION['message'] =  "Produto não criado. Preencher campo : Nome";
            header("Location: product-create.php");
            exit(0);
        }
        if (empty($quantity)) {
            $_SESSION['message'] =  "Produto não criado. Preencher campo : Quantidade";
            header("Location: product-create.php");
            exit(0);
        }
        if (empty($description)) {
            $_SESSION['message'] =  "Produto não criado. Preencher campo : Descrição";
            header("Location: product-create.php");
            exit(0);
        }
        if (empty($price)) {
            $_SESSION['message'] =  "Produto não criado. Preencher campo : Preço";
            header("Location: product-create.php");
            exit(0);
        }
        if (empty($date)) {
            $_SESSION['message'] =  "Produto não criado. Preencher campo : Data do Cadastro";
            header("Location: product-create.php");
            exit(0);
        }
        if (empty($hour)) {
            $_SESSION['message'] =  "Produto não criado. Preencher campo : Hora";
            header("Location: product-create.php");
            exit(0);
        }
    } else {
        //Query para criação na tabela 
        $query = "INSERT INTO product (name,quantity,description,price,date,hour) VALUES ('$name', '$quantity', '$description', '$price', '$date', '$hour')";
        //Executa a query
        $query_run = mysqli_query($con, $query);
        //Verifica se ela foi executada com sucesso ou não
        if ($query_run) {
            $_SESSION['message'] =  "Produto criado com sucesso";
            header("Location: product-create.php");
            exit(0);
        } else {
            $_SESSION['message'] =  "Produto não criado";
            header("Location: product-create.php");
            exit(0);
        }
    }
}
