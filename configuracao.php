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
      width: 330px;
      background-color: #fff;
      padding: 20px;
      text-align: center;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      min-height: 430px;
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
    }
    
    .login-button {
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
    }
    
    .signup-button {
      font-size: 14px;
      color: #999;
      text-decoration: underline;
      cursor: pointer;
    }

    .container_button {
        margin-top: 40px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 100%;
        float: bottom;
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

    <div class="menu-items">
    
        <div class="menu-item">
            <a href="contatos.php">
                <i class="fas fa-phone"></i>
                <span>Contatos</span>
            </a>
        </div>
    </div>
  </header>
  <div class="login-container">
    <div class="login-title">ATUALIZAR DADOS</div>
    <form method="POST" action="funcoes.php">
        <input type="hidden" name="action" value="atualizar_email">
        <div class="login-input">
          <i class="fas fa-envelope"></i>
          <input type="email" placeholder="E-MAIL ANTIGO" name="email_antigo">
        </div>
        <div class="login-input">
          <i class="fas fa-lock"></i>
          <input type="password" placeholder="SENHA ANTIGA" name="senha">
        </div>
        <div class="login-input">
          <i class="fas fa-envelope"></i>
          <input type="email" placeholder="E-MAIL NOVO" name="email_novo">
        </div>
        <button class="login-button">ATUALIZAR E-MAIL</button>
    </form>

    <form method="POST" action="funcoes.php">
        <input type="hidden" name="action" value="atualizar_senha">
        <div class="login-input">
          <i class="fas fa-envelope"></i>
          <input type="email" placeholder="E-MAIL" name="email_antigo" >
        </div>
        <div class="login-input">
          <i class="fas fa-lock"></i>
          <input type="password" placeholder="SENHA ANTIGA" name="senha_antiga">
        </div>
        <div class="login-input">
          <i class="fas fa-lock"></i>
          <input type="password" placeholder="SENHA NOVA" name="senha_nova">
        </div>
        <button class="login-button">ATUALIZAR SENHA</button>
    </form>
    
  </div>

  <form method="POST" action="funcoes.php" id="form_login_adm">
  <div class="login-container" style="margin-left: 30px;">
    <div class="login-title">MODERADOR</div>
    <div class="login-input">
      <i class="fas fa-envelope"></i>
      <input type="email" placeholder="E-MAIL" name="email">
    </div>
    <div class="login-input">
        <i class="fas fa-lock"></i>
            <input type="hidden" value="login_administrador" name="action">
            <input type="password" placeholder="SENHA MODERADOR" name="senha">
    </div>
    <div class="container_button" style="margin-top: 65px;">
        <button class="login-button" type="button" name="acao" value="CADASTRO DE DADOS" id="btn_adm">CADASTRO DE DADOS</button>
        <button class="login-button" type="button" name="acao" value="PESQUISA DE DADOS" id="btn_adm">PESQUISA DE DADOS</button>
        <button class="login-button" type="button" name="acao" value="ATUALIZAÇÃO DE DADOS" id="btn_adm">ATUALIZAÇÃO DE DADOS</button>
        <button class="login-button" type="button" name="acao" value="EXCLUSÃO DE DADOS" id="btn_adm">EXCLUSÃO DE DADOS</button>
    </div>
  </div>
      <input type="hidden" name="botao_selecionado" id="botao_selecionado" value="">
  </form>

</body>
</html>

<script>
    document.querySelectorAll('#btn_adm').forEach(button => {
        button.addEventListener('click', function() {
          document.getElementById('botao_selecionado').value = this.value;
          document.getElementById('form_login_adm').submit(); // Envie o formulário quando o botão for clicado
        });
    });


    window.addEventListener('DOMContentLoaded', (event) => {
            const urlParams = new URLSearchParams(window.location.search);
            const message = urlParams.get('message');
            const pagina= urlParams.get('pagina');

            if (message === 'success') {
                // Cria a div do popup
                const popup = document.createElement('div');
                popup.className = 'popup_success';
                popup.innerHTML = 'Olá, administrador, entrando...';

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
                        window.location.href = pagina;
                    }, 500);
                }, 5000);
            }else if (message === 'error') {
                // Cria a div do popup
                const popup = document.createElement('div');
                popup.className = 'popup_error';
                popup.innerHTML = 'Erro ao fazer login como administrador';

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
            }else if (message === 'success_atualizacao') {
                // Cria a div do popup
                const popup = document.createElement('div');
                popup.className = 'popup_success';
                popup.innerHTML = 'Dados atualizados com sucesso';

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
            }else if (message === 'error_atualizacao') {
                // Cria a div do popup
                const popup = document.createElement('div');
                popup.className = 'popup_error';
                popup.innerHTML = 'Não é possível atualizar, pois os dados estão incorretos';

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
