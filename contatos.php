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
        border: none;
        border-bottom: 1px solid #ccc;
        outline: none;
    }

    i {
        padding-right: 10px;
    }

    .login-input div {
        display: flex;
        align-items: center;
    }

    label {
        margin: 0;
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
            <a href="configuracao.php">
                <i class="fas fa-cog"></i>
                <span>Configurações</span>
            </a>
        </div>
    
        <div class="menu-item">
            <a href="login.php">
                <i class="fas fa-user"></i>
                <span>Login</span>
            </a>
        </div>
    </div>
  </header>
<div class="login-container">
    <div class="login-title">CONTATOS</div>

    <div class="login-input">
        <div>
            <i class="fas fa-envelope fa-2x"></i>
            <label>FULANO@EMAIL.COM.BR</label>
        </div>
    </div>

    <div class="login-input">
        <div>
            <i class="fab fa-whatsapp fa-2x"></i>
            <label>(00) 11111-2222</label>
        </div>
    </div>

    <div class="login-input">
        <div>
            <i class="fab fa-instagram fa-2x"></i>
            <label>@FUNALO.1234</label>
        </div>
    </div>

    <div class="login-input">
        <div>
            <i class="fab fa-facebook fa-2x"></i>
            <label>FULANO.FACEBOOK.COM</label>
        </div>
    </div>
</div>
</body>
</html>
