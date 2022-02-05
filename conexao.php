<?php
define('HOST', '127.0.0.1');
define('USUARIO', 'root');
define('SENHA', '');
define('DB', 'LiveLIBRAS');

$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die('Não foi possível conectar');
mysqli_query($conexao, "SET NAMES 'utf8'");
