<?php

    include 'db.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $name = $_POST['name'];
        $email = $_POST['email'];

        $sql = "insert into usuario (name,email) value ('$name','$email')";

        if($conn ->query($sql) === true){
            echo "Novo Registro no Banco";
        }else{
            echo "Erro: " . $sql . "<br>" . $conn->error;
        };
        $conn -> close();

    };


?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
</head>
<body>
    
    <form method="POST" action="create.php">
        <label for="name">Nome:</label>
        <input type="text" name="name" required>
        <br>
        <br>
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <br>
        <br>
        <input type="submit" name="create" value="Adicionar">
    </form>

    <div id="tabela_de_consulta">
    
    <a href="read.php">Ver Registro</a>   

    </div>

</body>
</html>