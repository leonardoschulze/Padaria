<?php

include 'db.php';

$id = $_GET['id'];

$sql = "delete from usuario where id=$id";

if($conn ->query($sql) === true){
            echo "Registro Excluído com Sucesso.";
        }else{
            echo "Erro: " . $sql . "<br>" . $conn->error;
        };

    $conn -> close();
    header("Location: create.php");

    exit();
?>