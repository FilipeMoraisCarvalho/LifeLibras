<?php
include('nav.php');
?>

<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content=>
    <title>LiveLIBRAS</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style2.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">

</head>

<body>
    <?php
    $id = 4;
    while ($id < 5) {
        $query = "SELECT * FROM licao WHERE idCategoria = $id ORDER BY id";
        echo $query;
        $id++;
    }
    include('./includes/licao.php');
    ?>

</body>

</html>