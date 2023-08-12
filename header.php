<!DOCTYPE html>
<html>
<head>
  <style>
    body{
      padding: 0px;
      margin: 0px;
    }

    header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 10px;
      background-color: #f2f2f2;
    }
    
    .logo {
      display: flex;
      align-items: center;
    }
    
    .logo i {
      margin-right: 5px;
    }
    
    .menu-items {
      display: flex;
      align-items: center;
    }
    
    .menu-item {
      margin-left: 10px;
      display: flex;
      align-items: center;
    }
    
    .menu-item i {
      margin-right: 5px;
    }

    .search-container {
      display: flex;
      align-items: center;
      border: 1px solid #ccc;
      border-radius: 5px;
      padding: 5px;
      width: 300px;
    }
    
    .search-container input[type="text"] {
      flex: 1;
      border: none;
      outline: none;
    }
    
    .search-container i {
      margin-right: 5px;
    }

  </style>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
  <header>
    <div class="menu-items">
        <div class="menu-item">
            <div class="logo">
                <i class="fas fa-image"></i>
                <!-- <span>Logo</span> -->
            </div>
            <div class="menu-item">
                <i class="fas fa-home"></i>
                <span>HOME</span>
            </div>
        </div>
    </div>

    <div class="menu-items">
        <div class="menu-item">
            <div class="search-container">
                <input type="text" placeholder="Procurar...">
                <i class="fas fa-search"></i>
            </div>
        </div>
    </div>

    <div class="menu-items">
        <div class="menu-item">
            <i class="fas fa-shopping-cart"></i>
            <span>Carrinho</span>
        </div>
    
        <div class="menu-item">
            <i class="fas fa-user"></i>
            <span>Login</span>
        </div>
    
        <div class="menu-item">
            <i class="fas fa-phone"></i>
            <span>Contatos</span>
        </div>
    </div>
  </header>
</body>
</html>
