<?php
    session_start();
    if(isset($_SESSION['id_administrador'])){
?>

<!DOCTYPE html>
<html>
<head>
  <style>

    /* config das linhas de categorias */

    .button-row {
      display: flex;
      justify-content: center;
      align-items: center;
      margin-bottom: 10px;
    }

    #categoria_1 {
        margin-right: 5%;
    }
    
    .button-row:last-child .button {
      margin-right: 0;
    }

    /* config da listagem dos produtos */
    .product-container {
      display: flex;
      justify-content: space-around;
      align-items: center;
      margin-bottom: 10px;
      flex-wrap: wrap;
      max-width: 1300px;
      margin: 0 auto;
    }
    
    .product-image {
    height: 150px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 10px;
  }

    .product-image img {
      width: 100%;
      border-radius: 5px;
    }

    .product-name {
    font-size: 16px;
    font-weight: bold;
    margin-bottom: 5px;
    }
    
    .product-details {
      text-align: center;
    }
    
    .product-price {
    font-size: 14px;
    color: #888;
    margin-bottom: 10px;
  }
    
  .product-buttons {
    display: flex;
    justify-content: center;
    align-items: center;
  }
    
  .product-buttons button {
    padding: 8px 16px;
    font-size: 14px;
    border: none;
    color: #fff;
    cursor: pointer;
    border-radius: 4px;
    margin-right: 5px;
  }

    .product-row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 10px;
    }

    /* Estilos adicionais para ajustar a largura dos produtos */
    .product {
    width: 200px;
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 10px;
    text-align: center;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    margin-top: 20px;
  }

  #btn_retirar {
    background-color: red;
  }

  #btn_adicionar{
    background-color: #4CAF50;
  }

  #btn_retirar:hover {
    background-color: #d32f2f;
  }

  #btn_adicionar:hover{
    background-color: forestgreen;
  } 

  .product-image.hidden-image {
      display: none;
  }

  /* configurações do header */
        body {
            padding: 0;
            margin: 0;
        }

        header {
            display: flex;
            justify-content: space-around;
            align-items: center;
            padding: 10px;
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
            width: 500px;
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

        .controla-espaco{
          width: 100px;
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

    /* alterações botão de filtro */
    .button {
        padding: 8px 16px;
        font-size: 14px;
        border: none;
        color: #fff;
        cursor: pointer;
        border-radius: 4px;
        margin-right: 5px;
        background-color: #ddd;
    }

    .button.active {
        background-color: #4CAF50;
        color: #fff;
    }

    .button:hover {
        background-color: #bbb;
    }

  </style>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
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
            <div class="search-container">
                <input type="text" placeholder="Procurar..." id="search-input">
                <i class="fas fa-search" id="search-icon"></i>
            </div>
        </div>
    </div>
    <div class="menu-item">
            <a href="configuracao.php">
                <i class="fas fa-cog"></i>
                <span>Configurações</span>
            </a>
        </div>
    </div>
  </header>
    <div class="button-row" style="margin-top: 50px;">
        <button class="button active" id="categoria_1" onclick="filtrarProdutos('TODOS', 'categoria_1')">TODOS</button>
        <button class="button" id="categoria_2" onclick="filtrarProdutos('PADARIA', 'categoria_2')">PADARIA E CONFEITARIA</button>
        <button class="button" id="categoria_3" onclick="filtrarProdutos('ROTISSERIA', 'categoria_3')">ROTISSERIA</button>
        <button class="button" id="categoria_4" onclick="filtrarProdutos('ENLATADOS', 'categoria_4')">ENLATADOS</button>
        <button class="button" id="categoria_5" onclick="filtrarProdutos('CONGELADOS', 'categoria_5')">CONGELADOS</button>
        <button class="button" id="categoria_6" onclick="filtrarProdutos('BISCOITOS', 'categoria_6')">BISCOITOS</button>
    </div>

    <div class="button-row">
        <button class="button" id="categoria_7" onclick="filtrarProdutos('AÇOUGUE', 'categoria_7')">AÇOUGUE</button>
        <button class="button" id="categoria_8" onclick="filtrarProdutos('LATICÍNIOS', 'categoria_8')">LATICÍNIOS</button>
        <button class="button" id="categoria_9" onclick="filtrarProdutos('PEIXARIA', 'categoria_9')">PEIXARIA</button>
        <button class="button" id="categoria_10" onclick="filtrarProdutos('BEBIDAS', 'categoria_10')">BEBIDAS</button>
        <button class="button" id="categoria_11" onclick="filtrarProdutos('HIGIENE', 'categoria_11')">HIGIENE E BELEZA</button>
        <button class="button" id="categoria_12" onclick="filtrarProdutos('LIMPEZA', 'categoria_12')">LIMPEZA</button>
        <button class="button" id="categoria_13" onclick="filtrarProdutos('HORTIFRÚTI', 'categoria_13')">HORTIFRÚTI</button>
        <button class="button" id="categoria_14" onclick="filtrarProdutos('MERCEARIA', 'categoria_14')">MERCEARIA</button>
    </div>

    <div class="product-container">
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

    // Consulta SQL para obter todos os registros da tabela
    $sql = "SELECT * FROM tb_produtos ORDER BY VALOR ASC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        
        while ($row = $result->fetch_assoc()) {
            ?>
            <div class="product <?php echo str_replace(' ', '_', $row['CATEGORIA']); ?>">
        <div class="product-image <?php echo str_replace(' ', '_', $row['CATEGORIA']); ?>">
            <img src="<?php echo $row['IMAGEM']; ?>" style="width:100%; height: 100%;">
        </div>
        <div class="product-details">
            <span class="product-price">Valor: R$ <?php echo number_format($row['VALOR'], 2, '.', ''); ?></span>
            <div class="product-buttons">
                <form method="POST" action="atualizar_produto.php">
                    <input type="hidden" value="<?php echo $row['NOME']?>" name="nome">
                    <input type="hidden" value="<?php echo $row['ID_PRODUTO']?>" name="id">
                    <input type="hidden" value="<?php echo $row['VALOR']?>" name="valor">
                    <input type="hidden" value="<?php echo $row['IMAGEM']?>" name="imagem">
                    <input type="hidden" value="<?php echo $row['NOME_MERCADO']?>" name="nome_mercado">
                    <input type="hidden" value="<?php echo $row['CATEGORIA']?>" name="categoria">
                    <button id="btn_adicionar">ATUALIZAR</button>
                </form>
                <form method="POST" action="funcoes.php">
                    <input type="hidden" value="excluir_produto" name="action">
                    <input type="hidden" value="<?php echo $row['ID_PRODUTO']?>" name="id">
                    <button id="btn_retirar">EXCLUIR</button>
                </form>
            </div>
        </div>
    </div>
            <?php
        }
    } else {
        echo "Nenhum registro encontrado.";
    }

    // Fecha a conexão com o banco de dados
    $conn->close();
    ?>
</div>
</body>
</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
   
function filtrarProdutos(categoria, id) {
    var produtos = document.getElementsByClassName('product');
    var todosButton = document.getElementById('categoria_1');
    var button = document.getElementById(id);

    if (button.classList.contains('active')) {
        // Se o botão já está ativo, desmarque-o e mostre todos os produtos
        button.classList.remove('active');
        todosButton.classList.add('active');
        for (var i = 0; i < produtos.length; i++) {
            produtos[i].style.display = 'block';
            produtos[i].querySelector('.product-image').classList.remove('hidden-image');
        }
    } else {
        // Se o botão não está ativo, desmarque todos os outros e marque o botão atual
        todosButton.classList.remove('active');
        var buttons = document.getElementsByClassName('button');
        for (var i = 0; i < buttons.length; i++) {
        buttons[i].classList.remove('active');
    }
    button.classList.add('active');
    for (var i = 0; i < produtos.length; i++) {
    var categoriaProduto = produtos[i].getAttribute('data-categoria');
    if (categoria === 'TODOS' || produtos[i].classList.contains(categoria.replace(' ', '_'))) {
        produtos[i].style.display = 'block';
        produtos[i].querySelector('.product-image').classList.remove('hidden-image');
    } else {
        produtos[i].style.display = 'none';
        produtos[i].querySelector('.product-image').classList.add('hidden-image');
    }
        }
    }
}




    // função de pesquisa do search
    $(document).ready(function() {
    $('#search-icon').click(function() {
        searchProducts();
    });

    $('#search-input').on('input', function() {
        searchProducts();
    });


    function searchProducts() {
        var searchTerm = $('#search-input').val();

        // Fazer uma solicitação AJAX para o backend PHP
        $.ajax({
            url: 'search.php',
            type: 'GET',
            data: { searchTerm: searchTerm },
            success: function(response) {
                var products = response;

                // Limpar a lista de produtos
  $('.product-container').empty();

  // Exibir os resultados da pesquisa
  if (products.length > 0) {
  $.each(products, function(index, product) {
    var productItem = $('<div>').addClass('product ' + product.categoria);
    var productImage = $('<div>').addClass('product-image ' + product.categoria)
    .append($('<img>').attr('src', product.image).css({
        'width': '100%',
        'height': '100%'
    }));

    var productDetails = $('<div>').addClass('product-details');
    var productPrice = $('<span>').addClass('product-price').text('Valor: R$ ' + product.price);
    var productButtons = $('<div>').addClass('product-buttons');
    
    var formAdd = $('<form>').attr('method', 'POST').attr('action', 'funcoes.php');
    var inputNomeAdd = $('<input>').attr('type', 'hidden').val(product.name).attr('name', 'nome');
    var inputIdUsuarioAdd = $('<input>').attr('type', 'hidden').val(product.id).attr('name', 'id');
    var inputMercadoUsuarioAdd = $('<input>').attr('type', 'hidden').val(product.mercado).attr('name', 'nome_mercado');
    var inputValorUsuarioAdd = $('<input>').attr('type', 'hidden').val(product.price).attr('name', 'valor');
    var inputImagemUsuarioAdd = $('<input>').attr('type', 'hidden').val(product.image).attr('name', 'imagem');
    var inputCategoriaUsuarioAdd = $('<input>').attr('type', 'hidden').val(product.categoria).attr('name', 'categoria');
    var btnAdicionar = $('<button>').attr('id', 'btn_adicionar').text('ATUALIZAR');
    
    var formRetirar = $('<form>').attr('method', 'POST').attr('action', 'funcoes.php');
    var inputIdRetirar = $('<input>').attr('type', 'hidden').val(product.id).attr('name', 'id');
    var btnRetirar = $('<button>').attr('id', 'btn_retirar').text('EXCLUIR');
    
    productButtons.append(formAdd);
    formAdd.append(inputNomeAdd);
    formAdd.append(inputIdUsuarioAdd);
    formAdd.append(inputMercadoUsuarioAdd);
    formAdd.append(inputValorUsuarioAdd);
    formAdd.append(inputImagemUsuarioAdd);
    formAdd.append(inputCategoriaUsuarioAdd);
    formAdd.append($('<input>').attr('type', 'hidden').val('atualizar_produto').attr('name', 'action'));
    formAdd.append(btnAdicionar);
    
    productButtons.append(formRetirar);
    formRetirar.append(inputIdRetirar);
    formRetirar.append($('<input>').attr('type', 'hidden').val('excluir_produto').attr('name', 'action'));
    formRetirar.append(btnRetirar);
    
    productDetails.append(productPrice);
    productDetails.append(productButtons);
    productItem.append(productImage);
    productItem.append(productDetails);
    $('.product-container').append(productItem);
  });
  } else {
    $('.product-container').append($('<h2>').text('Nenhum resultado encontrado.'));
  }
},
error: function() {
  $('.product-container').empty();
  $('.product-container').append($('<div>').text('Erro ao buscar produtos.'));
}
        });
    }
});


window.addEventListener('DOMContentLoaded', (event) => {
        const urlParams = new URLSearchParams(window.location.search);
        const message = urlParams.get('message');

        if (message === 'error') {
            // Cria a div do popup
            const popup = document.createElement('div');
            popup.className = 'popup_error';
            popup.innerHTML = 'Falha ao excluir produto';

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
            popup.innerHTML = 'Produto excluído com sucesso';

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