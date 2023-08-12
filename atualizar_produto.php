<?php
    session_start();
    if(isset($_SESSION['id_administrador'])){
?>


<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <style>
    body {
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background-color: #f2f2f2;
    }
    
    .login-container {
      width: 400px;
      background-color: #fff;
      padding: 20px;
      text-align: center;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    
    .login-title {
      font-size: 24px;
      margin-bottom: 20px;
    }
    
    .login-input {
      display: flex;
      align-items: center;
      margin-bottom: 15px;
    }
    
    .login-input i {
      margin-right: 10px;
    }
    
    .login-input input {
      flex: 1;
      padding: 8px;
      border: none;
      border-bottom: 1px solid #ccc;
      outline: none;
      width:40%;
    }
    
    .signup-button {
      font-size: 14px;
      color: #999;
      text-decoration: underline;
      cursor: pointer;
    }

    .upload-input {
        position: relative;
        width: 90px;
        height: 80px;
        border: 2px dashed #ccc;
        border-radius: 5px;
        display: flex;
        justify-content: center;
        align-items: center;
        overflow: hidden;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }

    .upload-input input[type="file"] {
        position: absolute;
        top: 0;
        left: 0;
        opacity: 0;
        width: 100%;
        height: 100%;
        cursor: pointer;
    }

    .upload-input label {
        font-size: 16px;
        color: #555;
        text-align: center;
    }

    #alinha_btn_img {
        display: flex;
    }

    .button-container {
        display: flex;
        align-items: center;
        justify-content:space-around;
    }

    .login-button-wrapper {
        display: flex;
        justify-content: center;
    }

    .login-button-wrapper .login-button {
        display: block;
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        background-color: #4CAF50;
        color: #fff;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
        text-align: center;
    }

    .custom-select {
        width: 100%;
        padding: 8px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 5px;
        outline: none;
        background-color: #fff;
        color: #555;
        }

      /* Estilos CSS para o popup */
    .popup_error {
        position: fixed;
        top: -100px;
        right: 10px;
        background-color: #ff0000;
        color: #fff;
        padding: 20px;
        transition: top 0.5s;
    }

    .popup_success {
        position: fixed;
        top: -100px;
        right: 10px;
        background-color: #4CAF50;
        color: #fff;
        padding: 20px;
        transition: top 0.5s;
    }

        /* configurações do header */

        header {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 15px;
        background-color: #f2f2f2;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .logo {
        display: flex;
        align-items: center;
    }

    .logo i {
        margin-right: 5px;
        color: #333;
        font-size: 20px;
    }

    .logo span {
        font-weight: bold;
        color: #333;
    }

    .menu-items {
        display: flex;
        align-items: center;
        padding-right: 30px;
    }

    .menu-item {
        margin-left: 15px;
        display: flex;
        align-items: center;
    }

    .menu-item a {
        text-decoration: none;
        color: #333;
        font-size: 14px;
        display: flex;
        align-items: center;
    }

    .menu-item i {
        margin-right: 5px;
    }

    .menu-item span {
        font-weight: bold;
    }

    .search-container {
        display: flex;
        align-items: center;
        border: 1px solid #ccc;
        border-radius: 20px;
        padding: 5px 10px;
        width: 300px;
    }

    .search-container input[type="text"] {
        flex: 1;
        border: none;
        outline: none;
        padding: 5px;
        background-color: transparent;
    }

    .search-container i {
        margin-right: 5px;
        color: #888;
    }

    .menu-item a:hover,
    .search-container input[type="text"]:focus {
        color: #555;
        border-color: #555;
    }
    /* Fechando configurações do header */
    #back-button {
      margin-top: 20px;
      padding: 10px 20px;
      background-color: #f1f1f1;
      border: none;
      border-radius: 4px;
      font-size: 16px;
      cursor: pointer;
    }

    #back-button:hover {
      background-color: #ddd;
    }

    #alinha_btns_footer{
      justify-content: center;
      width: 100%;
    }
  </style>
</head>
<body>
<header>
    <div class="menu-items">
        <div class="menu-item">
            <div class="logo">
                <img src="img/logo.jpg" style="width: 80px;">
            </div>
            <div class="menu-item">
                <a href="pagina_principal.php">
                <i class="fas fa-home"></i>
                <span>HOME</span>
                </a>
            </div>
        </div>
    </div>

    <div class="menu-items" style="width: 100px;">
    
      
    </div>
  </header>
<?php
        if(isset($_POST['id'])){
          $id = $_POST['id'];
      }
      if(isset($_POST['nome'])){
        $nome = $_POST['nome'];
    }
      if(isset($_POST['valor'])){
        $valor = $_POST['valor'];
      }
      if(isset($_POST['imagem'])){
        $imagem = $_POST['imagem'];
        }
      if(isset($_POST['nome_mercado'])){
          $nome_mercado = $_POST['nome_mercado'];
      }
      if(isset($_POST['categoria'])){
        $categoria = $_POST['categoria'];
      }

      if(isset($_GET['id'])){
          $id = $_GET['id'];
      }
      if(isset($_GET['nome'])){
          $nome = $_GET['nome'];
      }
      if(isset($_GET['valor'])){
          $valor = $_GET['valor'];
      }
      if(isset($_GET['imagem'])){
          $imagem = $_GET['imagem'];
      }
      if(isset($_GET['nome_mercado'])){
          $nome_mercado = $_GET['nome_mercado'];
      }
      if(isset($_GET['categoria'])){
          $categoria = $_GET['categoria'];
      }
      if(isset($_GET['nome_mercado'])){
        $mercado_1 = $_GET['nome_mercado'];
      }
      if(isset($_GET['valor'])){
        $valor_1 = $_GET['valor'];
      }
      if(isset($_GET['mercado_2'])){
        $mercado_2 = $_GET['mercado_2'];
      }
      if(isset($_GET['valor_2'])){
        $valor_2 = $_GET['valor_2'];
      }
      if(isset($_GET['mercado_3'])){
        $mercado_3 = $_GET['mercado_3'];
      }
      if(isset($_GET['valor_3'])){
        $valor_3 = $_GET['valor_3'];
      }
    ?>

  <div class="login-container">
    <div class="login-title">ATUALIZAR PRODUTO</div>
    <form method="POST" action="funcoes.php" enctype="multipart/form-data">
      <input type="hidden" value="atualizar_produto" name="action">
    <div class="login-input">
        <i class="fas fa-clipboard"></i>
          <select name="categoria" class="custom-select">
            <option value="PADARIA" <?php if($categoria == "PADARIA"){echo "selected";}?> >PADARIA E CONFEITARIA</option>
            <option value="ROTISSERIA" <?php if($categoria == "ROTISSERIA"){echo "selected";}?>>ROTISSERIA</option>
            <option value="ENLATADOS" <?php if($categoria == "ENLATADOS"){echo "selected";}?> >ENLATADOS</option>
            <option value="CONGELADOS" <?php if($categoria == "CONGELADOS"){echo "selected";}?>>CONGELADOS</option>
            <option value="BISCOITOS" <?php if($categoria == "BISCOITOS"){echo "selected";}?>>BISCOITOS</option>
            <option value="AÇOUGUE" <?php if($categoria == "AÇOUGUE"){echo "selected";}?>>AÇOUGUE</option>
            <option value="LATICÍNIOS" <?php if($categoria == "LATICÍNIOS"){echo "selected";}?>>LATICÍNIOS</option>
            <option value="PEIXARIA" <?php if($categoria == "PEIXARIA"){echo "selected";}?>>PEIXARIA</option>
            <option value="BEBIDAS" <?php if($categoria == "BEBIDAS"){echo "selected";}?>>BEBIDAS</option>
            <option value="HIGIENE" <?php if($categoria == "HIGIENE"){echo "selected";}?>>HIGIENE E BELEZA</option>
            <option value="LIMPEZA" <?php if($categoria == "LIMPEZA"){echo "selected";}?>>LIMPEZA</option>
            <option value="HORTIFRÚTI" <?php if($categoria == "HORTIFRÚTI"){echo "selected";}?>>HORTIFRÚTI</option>
            <option value="MERCEARIA" <?php if($categoria == "MERCEARIA"){echo "selected";}?>>MERCEARIA</option>
          </select>
        </div>

    <div class="login-input">
    <i class="fas fa-shopping-bag"></i>
      <input type="text" value="<?php echo $nome;?>" name="nome">
    </div>
    <div class="login-input">
      <i class="fas fa-store"></i>
      <input type="text" value="<?php echo $nome_mercado;?>" name="mercado_1">
      <i class="fas fa-money-bill-alt"></i>
      <input type="text" value="<?php echo $valor;?>" name="valor_1" step="0.01">
    </div>
    <input type="hidden" value="<?php echo $id?>" name="id_produto_1">
    <input type="hidden" value="<?php echo $categoria?>" name="categoria">
    <?php
    $servername = "localhost"; // Altere para o seu servidor
    $username = "root"; // Altere para o seu usuário
    $password = ""; // Altere para a sua senha
    $dbname = "banco_listou_comprou"; // Altere para o nome do seu banco de dados

    // Cria a conexão
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica a conexão
    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }

    if(!isset($_GET['id'])){
    // Consulta SQL para obter todos os registros da tabela
    $sql = "SELECT * FROM tb_produtos WHERE nome = '$nome'";
    $result = $conn->query($sql);
    $i = 2;
    
    if ($result->num_rows > 1) {
        
        while ($row = $result->fetch_assoc()) {
              if($row['ID_PRODUTO'] != $id){
            ?>
                  <input type="hidden" value="<?php echo $row['ID_PRODUTO'];?>" name="id_produto_<?php echo $i;?>">
                  <div class="login-input">
                      <i class="fas fa-store"></i>
                      <input type="text" value="<?php echo $row['NOME_MERCADO'];?>" name="mercado_<?php echo $i;?>">
                      <i class="fas fa-money-bill-alt"></i>
                      <input type="text" value="<?php echo $row['VALOR'];?>" name="valor_<?php echo $i;?>" step="0.01">
                      <input type="hidden" value="<?php echo $row['IMAGEM'];?>" name="imagem" >
                  </div>
    <?php     }
            $i++;
        }
    }
    }else{?>
      <?php if($mercado_2 != "" && $valor_2 != ""){?>
      <input type="hidden" value="<?php echo $id_produto_2;?>" name="id_produto_2">
      <div class="login-input">
          <i class="fas fa-store"></i>
          <input type="text" value="<?php echo $mercado_2;?>" name="mercado_2">
          <i class="fas fa-money-bill-alt"></i>
          <input type="text" value="<?php echo $valor_2;?>" name="valor_2" step="0.01">
      </div>
      <?php }
      if($mercado_3 != "" && $valor_3 != ""){?>
      <input type="hidden" value="<?php echo $id_produto_3;?>" name="id_produto_3">
      <div class="login-input">
          <i class="fas fa-store"></i>
          <input type="text" value="<?php echo $mercado_3;?>" name="mercado_3">
          <i class="fas fa-money-bill-alt"></i>
          <input type="text" value="<?php echo $valor_3;?>" name="valor_3" step="0.01">
      </div>
      <?php 
        }
            }
    ?>
    <input type="hidden" value="<?php ?>" name="conta_registros" >
    <div class="button-container">
        <div class="upload-input" style="background-image: url('<?php echo $imagem;?>'); ">
            <input type="file" id="image-upload" accept="image/*" >
        </div>
        <div class="login-button-wrapper">
            <button class="login-button">ATUALIZAR</button>
        </div>
    </div>
    <div id="alinha_btns_footer">
        <div><button id="back-button" type="button">Voltar</button></div>
    </div>
  </div>

  <script>
    document.getElementById('back-button').addEventListener('click', function() {
        history.back();
    });


    document.getElementById('image-upload').addEventListener('change', function (e) {
      var file = e.target.files[0];
      var reader = new FileReader();
      reader.onload = function (event) {
        var imageUrl = event.target.result;
        document.querySelector('.upload-input').style.backgroundImage = 'url(' + imageUrl + ')';
      };
      reader.readAsDataURL(file);
    });

    window.addEventListener('DOMContentLoaded', (event) => {
            const urlParams = new URLSearchParams(window.location.search);
            const message = urlParams.get('message');

            if (message === 'success') {
                // Cria a div do popup
                const popup = document.createElement('div');
                popup.className = 'popup_success';
                popup.innerHTML = 'Produto atualizado com sucesso';

                // Adiciona a div ao corpo do documento
                document.body.appendChild(popup);

                // Mostra o popup
                setTimeout(() => {
                    popup.style.top = '10px';
                }, 100);

                // Esconde e remove o popup após 5 segundos
                setTimeout(() => {
                    popup.style.top = '-100px';
                    setTimeout(() => {
                        popup.remove();
                    }, 500);
                }, 5000);
            }else if (message === 'error') {
                // Cria a div do popup
                const popup = document.createElement('div');
                popup.className = 'popup_error';
                popup.innerHTML = 'Erro ao atualizar produto';

                // Adiciona a div ao corpo do documento
                document.body.appendChild(popup);

                // Mostra o popup
                setTimeout(() => {
                    popup.style.top = '10px';
                }, 100);

                // Esconde e remove o popup após 5 segundos
                setTimeout(() => {
                    popup.style.top = '-100px';
                    setTimeout(() => {
                        popup.remove();
                    }, 500);
                }, 5000);
            }
        });
  </script>
</body>
</html>
<?php 

    }
?>