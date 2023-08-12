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

    .upload-input {
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
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
<form method="POST" action="funcoes.php" enctype="multipart/form-data"> 
    <input type="hidden" value="inserir_produto" name="action">
    <div class="login-container">
        <div class="login-title">NOVO PRODUTO</div>
        <div class="login-input">
        <i class="fas fa-shopping-bag"></i>
            <input type="text" placeholder="NOME DO PRODUTO" name="nome_produto" required>
        </div>
        <div class="login-input">
        <i class="fas fa-clipboard"></i>
        <select name="categoria" class="custom-select">
            <option value="" disabled selected>SELECIONE UMA CATEGORIA</option>
            <option value="PADARIA">PADARIA E CONFEITARIA</option>
            <option value="ROTISSERIA">ROTISSERIA</option>
            <option value="ENLATADOS">ENLATADOS</option>
            <option value="CONGELADOS">CONGELADOS</option>
            <option value="BISCOITOS">BISCOITOS</option>
            <option value="AÇOUGUE">AÇOUGUE</option>
            <option value="LATICÍNIOS">LATICÍNIOS</option>
            <option value="PEIXARIA">PEIXARIA</option>
            <option value="BEBIDAS">BEBIDAS</option>
            <option value="HIGIENE">HIGIENE E BELEZA</option>
            <option value="LIMPEZA">LIMPEZA</option>
            <option value="HORTIFRÚTI">HORTIFRÚTI</option>
            <option value="MERCEARIA">MERCEARIA</option>
        </select>
        </div>
        <div class="login-input">
            <i class="fas fa-store"></i>
            <input type="text" placeholder="1º MERCADO" name="primeiro_mercado" >
            <i class="fas fa-money-bill-alt"></i>
            <input type="text" placeholder="VALOR" name="valor_1" step="0.01">
        </div>
        <div class="login-input">
            <i class="fas fa-store"></i>
            <input type="text" placeholder="2º MERCADO" name="segundo_mercado" >
            <i class="fas fa-money-bill-alt"></i>
            <input type="text" placeholder="VALOR" name="valor_2" step="0.01">
        </div>
        <div class="login-input">
            <i class="fas fa-store"></i>
            <input type="text" placeholder="3º MERCADO" name="terceiro_mercado" >
            <i class="fas fa-money-bill-alt"></i>
            <input type="text" placeholder="VALOR" name="valor_3" step="0.01">
        </div>
        <div class="button-container">
            <div class="upload-input" >
                <input type="file" id="image-upload" accept="image/*" name="imagem" >
                <label for="image-upload">INSERIR IMAGEM</label>
            </div>
            <div class="login-button-wrapper">
                <button class="login-button">CADASTRAR</button>
            </div>
        </div>
        <div id="alinha_btns_footer">
        <div><button id="back-button" type="button">Voltar</button></div>
    </div>
    </div>
</form>
</body>
</html>

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

            if (message === 'error') {
                // Cria a div do popup
                const popup = document.createElement('div');
                popup.className = 'popup_error';
                popup.innerHTML = 'Erro ao cadastrar produto';

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

        window.addEventListener('DOMContentLoaded', (event) => {
            const urlParams = new URLSearchParams(window.location.search);
            const message = urlParams.get('message');

            if (message === 'success') {
                // Cria a div do popup
                const popup = document.createElement('div');
                popup.className = 'popup_success';
                popup.innerHTML = 'Produto cadastrado com sucesso';

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
<?php 

    }
?>