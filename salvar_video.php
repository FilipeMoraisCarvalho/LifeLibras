<?php
include("conexao.php");

$descricao1 = mysqli_real_escape_string($conexao, $_POST['descricao']);
$URL1 = mysqli_real_escape_string($conexao, $_POST['URL']);
$idcategoria1 = mysqli_real_escape_string($conexao, $_POST['idcategoria']);
$idsubcategoria1 = mysqli_real_escape_string($conexao, $_POST['idsubcategoria']);

$query = "select licao from descricao and url where descricao = '{$descricao1}' or url = '{$URL1}'";

$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);

if ($row > 0) {
    http_response_code(500);
} else {
    mysqli_query($conexao, "insert into licao(descricao, url, idCategoria, idSubCategoria) values ('$descricao1','$URL1','$idcategoria1','$idsubcategoria1'))");
    http_response_code(200);
}
