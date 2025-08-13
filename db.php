<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "padaria";

$conn = new mysqli($servername,$username,$password,$dbname);

if ($conn -> connect_error){
    die("Conexao Falhou: " . $connect_error);
};

?>