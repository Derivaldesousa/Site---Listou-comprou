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
          width: 300px;
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

      a{
          text-decoration: none;
          color: #999;
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
            <a href="login.php">
                <i class="fas fa-user"></i>
                <span>Login</span>
            </a>
        </div>
    
        <div class="menu-item">
            <a href="contatos.php">
                <i class="fas fa-phone"></i>
                <span>Contatos</span>
            </a>
        </div>
    </div>
  </header>
<form action="funcoes.php" method="POST" id="form_cadastro_usuario">
    <div class="login-container">
        <div class="login-title">Criar usuário</div>
    
        <div class="login-input">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Nome" name="nome">
        </div>
    
        <div class="login-input">
            <i class="fas fa-envelope"></i>
            <input type="email" placeholder="Email" name="email">
        </div>
        <div class="login-input">
            <i class="fas fa-envelope"></i>
            <input type="email" placeholder="Confirmar Email">
        </div>
        
        <div class="login-input">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Senha" name="senha" id="senha1">
        </div>
        <div class="login-input">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Confirmar Senha" id="senha2">
        </div>
        
        <button class="login-button" type="button" onclick="verificar_senhas()">Cadastrar</button>
        <div class="signup-button"><a href="login.php" >Já tem cadastro ? Faça Login</a></div>
    </div>
    <input type="hidden" value="verificar_cadastro" name="action">
</form>
</body>
</html>

<script>
        window.addEventListener('DOMContentLoaded', (event) => {
            const urlParams = new URLSearchParams(window.location.search);
            const message = urlParams.get('message');

            if (message === 'error') {
                // Cria a div do popup
                const popup = document.createElement('div');
                popup.className = 'popup_error';
                popup.innerHTML = 'Email já cadastrado';

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
                popup.innerHTML = 'Cadastro efetuado com sucesso';

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
                        window.location.href = "pagina_principal.php";
                    }, 500);
                }, 5000);
            }
        });

        function verificar_senhas() {
            // Obter as senhas digitadas pelo usuário
            var senha1 = document.getElementById('senha1').value;
            var senha2 = document.getElementById('senha2').value;

            // Verificar se as senhas coincidem
            if (senha1 === senha2) {
                document.getElementById('form_cadastro_usuario').submit();
            } else {
                // Cria a div do popup
                const popup = document.createElement('div');
                popup.className = 'popup_error';
                popup.innerHTML = 'As senhas não coincidem';

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
        }
</script>
