<?php

ini_set("display_errors", 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$nome = $_POST['nome'];
$idusuario = $_POST['idusuario'];
$senha = $_POST['senha'];

if(strlen($nome) >= 1 && strlen($nome) <= 100) {
    $esp = count(explode(' ', $idusuario));
    if(strlen($idusuario) >= 1 && strlen($idusuario) <= 10 && $esp <= 1) {
        if(strlen($senha) >= 5 && strlen($senha) <= 10) {
            $hostname = "localhost"; 
            $user = "root";
            $password = "ifsp";
            $database = "cadastro";

            $conn = mysqli_connect($hostname, $user, $password, $database);

            if (!$conn) {
                die("Conexão falhou: " . mysqli_connect_error());
            }
            echo "Conexão feita com sucesso";

            $query = "insert into usuarios (nome, idusuario, senha) values ('$nome', '$idusuario', '$senha')";

            $res = mysqli_query($conn, $query);
            if($res){
                echo '<h2>Questão incluída com sucesso!!!</h2>';
            } else {
                echo '<h2>Questão não incluida!!!</h2>';
                var_dump(mysqli_error($conn));
            }
            mysqli_close($conn);
            //history.go(-1);
            header('Location: http://localhost:5500');
            exit();
        }
    }
}

echo "Ocorreu um erro no cadastro do usuário<br>";
echo "-> Garanta que o nome possui entre 1 e 100 caracteres<br>";
echo "-> Garanta que o id possui entre 1 e 10 caracteres<br>";
echo "-> Garanta que a senha possui entre 5 e 10 caracteres<br>";
echo "<button onclick='history.go(-1);'>Retornar</button>";
?>