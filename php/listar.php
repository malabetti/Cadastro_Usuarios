<?php

ini_set("display_errors", 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$hostname = "localhost";
$user = "root";
$password = "ifsp";
$database = "cadastro";

$conn = mysqli_connect($hostname, $user, $password, $database);

if (!$conn) {
    die("Conexão falhou: " . mysqli_connect_error());
}
echo "Conexão feita com sucesso";

$query = "select * from usuarios;";
$results = mysqli_query($conn, $query);
$index = 0;
while ($record = mysqli_fetch_row($results)) {
    $question = array(
        'id' => $record[0],
        'nome' => $record[1],
        'idusuario' => $record[2],
        'senha' => $record[3],
    );
    $questions[$index] = $question;
    $index++;
}


mysqli_close($conn);
$formattedData =  json_encode($questions, JSON_PRETTY_PRINT);
echo "<pre>" . $formattedData . "</pre>";

echo "<button onclick='history.go(-1);'>Retornar</button>";

?>