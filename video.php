<?php
include('nav.php');

?>

<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content=>

  <script src="https://kit.fontawesome.com/yourcode.js"></script>
  <link rel="stylesheet" href="./css/style2.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
</head>

<body>
  <div class="card card-text" style="text-align: center;">
    <p style="text-align: center; font-size:15px; margin-top: 15%;">Insira as insformações:</p>
    <div style= "margin-top: 20px">
     
      <input type="text" name='descricao' id='descricao' placeholder="Titulo" required />
    </div>
    <div style= "margin-top: 10px">
      
      <input type="text" name='URL' id='URL' placeholder="URL do Video" required />
    </div>
  
<p>     <select name="categoria" style= "margin-top: 2%; margin-right: 20%">
        <option value="">Categoria:</option>       
        <?php
        $sql = "SELECT * FROM categoria ORDER BY id_cat";
        $result = $conexao->query($sql);
        while ($line = mysqli_fetch_array($result)) {

        ?>
          <option value="<?= $line['id_cat']; ?>"><?= $line['nome']; ?></option>
          
               
            </p>

         <?php } ?>
         </select>

         <p>     <select name="subcategoria" style= "margin-top: -2.8%; margin-left: 20%">
        <option value="">SubCategoria:</option>       
        <?php
        $sql = "SELECT * FROM subcategoria ORDER BY id_sub";
        $result = $conexao->query($sql);
        while ($line = mysqli_fetch_array($result)) {

        ?>
          <option value="<?= $line['id_sub']; ?>"><?= $line['nome']; ?></option>
          
               
            </p>

         <?php } ?>
         </select>
        


          <div>
    <button type="button" onclick="video()" style= "margin-top:5%" class="btn btn-second" >Enviar Video</button>
    <p style="text-align: center; font-size:15px; margin-top: 2%; padding: 10px;">Clique a baixo para saber como pegar a URL de forma correta</p>
    <a href="https://support.google.com/youtube/answer/171780?hl=pt-BR" style="text-align:center" target="_blank" cent>Tutorial URL</a>
    </div>
  </div>
  
  </div>
  
</body>

<script>
  function video() {
    var descricao1 = document.getElementById('descricao').value;
    var URL1 = document.getElementById('URL').value;
    var idcategoria1 = document.getElementById('idcategoria').value;
    var idsubcategoria1 = document.getElementById('idsubcategoria').value;
    if (!descricao1 || !URL1 || !idcategoria1 || !idsubcategoria1) {
      alert('Titulo, url, categoria ou subcategoria invalido')

    } else {

      $.ajax({
        type: 'POST',
        dataType: 'html',
        URL: 'salvar_video.php',
        data: {
          descricao: descricao1,
          URL: URL1,
          idcategoria: idcategoria1,
          idsubcategoria: idsubcategoria1

        },
        success: function(result) {
          alert('Video Enviado com Sucesso')
        },
        error: function(result) {
          alert('Video ou Descrição ja existentes')
        }


      });


    }
  }
</script>