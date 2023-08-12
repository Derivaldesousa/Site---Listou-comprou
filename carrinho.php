<?php
    session_start();
    if(isset($_SESSION['id_usuario'])){
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
    }
    
    .product {
      display: flex;
      flex-direction: column;
      align-items: center;
    }
    
    .product-image {
      width: 100px;
      height: 100px;
      background-color: #ccc;
      margin-bottom: 5px;
    }
    
    .product-details {
      text-align: center;
    }
    
    .product-price {
      font-weight: bold;
      margin-bottom: 5px;
    }
    
    .product-buttons {
      display: flex;
    }
    
    .product-buttons button {
      margin-right: 5px;
      font-size:14px;
    }
   
    table {
        border-collapse: collapse;
        width: 90%;
        margin-left:5%;
    }

    th, td {
        border: 1px solid black;
        padding: 8px;
        text-align: center;
    }

    th {
        background-color: #f2f2f2;
    }

    /* configurações do header */
  body {
            padding: 0;
            margin: 0;
        }

        header {
            display: flex;
            justify-content: space-between;
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

            /* Configurações da tabela */
    table {
      border-collapse: collapse;
      width: 90%;
      margin-left: 5%;
      font-family: Arial, sans-serif;
      color: #333;
    }

    th, td {
      border: 1px solid #ccc;
      padding: 10px;
      text-align: center;
    }

    th {
      background-color: #f2f2f2;
    }

    tr:nth-child(even) {
      background-color: #f9f9f9;
    }

    /* Estilos específicos para a tabela */
    .product-image {
      width: 80px;
      height: 80px;
      background-color: #ccc;
      margin: 0 auto;
    }

    .product-details {
      text-align: center;
      margin-top: 5px;
    }

    .product-price {
      font-weight: bold;
      margin-top: 5px;
    }

    .product-buttons button {
      margin-top: 5px;
      padding: 5px 10px;
      background-color: #555;
      color: #fff;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    .product-buttons button:hover {
      background-color: #333;
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

    #back-button {
      margin-top: 20px;
      padding: 10px 20px;
      background-color: #f1f1f1;
      border: none;
      border-radius: 4px;
      font-size: 16px;
      cursor: pointer;
    }

    #download-button{
      margin-top: 20px;
      padding: 10px 20px;
      background-color: #4CAF50;
      border: none;
      border-radius: 4px;
      font-size: 16px;
      cursor: pointer;
    }

    #back-button:hover {
      background-color: #ddd;
    }

    #alinha_btns_footer{
      justify-content: space-between;
      width: 90%;
      display: flex;
      margin: 0px 5% 0px 5%; 
    }

  </style>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <script src="jspdf/dist/jspdf.min.js"></script>
  <script src="autotable/dist/jspdf.plugin.autotable.min.js"></script>
</head>
<body> 
<header>
    <div class="menu-items">
        <div class="menu-item">
            <div class="logo">
                <img src="img/logo.jpg" style="width: 50px;">
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
                <input type="text" placeholder="Procurar..." id="search-input" onkeyup="searchTable()">
                <i class="fas fa-search" id="search-icon"></i>
            </div>
        </div>
    </div>

    <div class="menu-items">
        <div class="menu-item">
            <a href="carrinho.php">
                <i class="fas fa-shopping-cart"></i>
                <span>Carrinho</span>
            </a>
        </div>
    
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
    <div class="button-row" style="margin-top: 30px;">
    <i class="fas fa-filter" style="margin-right: 5px;"></i>
        <button class="button" id="categoria_1" onclick="filterBy('categoria')">CLASSIFICAR POR</button>
        <button class="button" onclick="filterBy('categoria')">CATEGORIA</button>
        <button class="button" onclick="filterBy('nome')">NOME DO PRODUTO</button>
        <button class="button" onclick="filterBy('mercado')">MERCADO</button>
        <button class="button" onclick="filterBy('valor')">VALOR</button>
    </div>

    <table style="margin-top: 30px;" id="table">
    <thead>
      <tr>
          <th>Produto</th>
          <th>Categoria</th>
          <th>Nome</th>
          <th>1º Mercado</th>
          <th>Valor</th>
          <th>2º Mercado</th>
          <th>Valor</th>
          <th>3º Mercado</th>
          <th>Valor</th>
      </tr>
    </thead>

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

    $id_usuario = $_SESSION['id_usuario'];

    // Consulta SQL para obter todos os registros da tabela tb_carrinho para o usuário específico
    $sql = "SELECT * FROM tb_carrinho WHERE ID_USUARIO = $id_usuario";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $nome_produto = $row['NOME_PRODUTO'];

        // Consulta SQL para obter todos os registros da tabela tb_produtos para o nome do produto específico
        $sql2 = "SELECT * FROM tb_produtos WHERE NOME = '$nome_produto'";
        $result2 = $conn->query($sql2);

        if ($result2->num_rows > 0) {
          $row2 = $result2->fetch_assoc();

          //tratando imagem base64
          
          $caminhoImagem = $row2['IMAGEM'];

          // Obtendo a extensão do arquivo
          $extensao = pathinfo($caminhoImagem, PATHINFO_EXTENSION);

          // Lendo o arquivo de imagem
          $dadosImagem = file_get_contents($caminhoImagem);

          // Convertendo os dados da imagem para base64
          $base64Imagem = base64_encode($dadosImagem);

          // Construindo a string do caminho base64
          $caminhoBase64 = 'data:image/' . $extensao . ';base64,' . $base64Imagem;
          echo "<tbody>";
          echo "<tr>";
          echo "<td><img src='$caminhoBase64' style='max-height:50px;'></img></td>";
          echo "<td>" . $row2['CATEGORIA'] . "</td>";
          echo "<td>" . $row2['NOME'] . "</td>";
          echo "<td>" . $row2['NOME_MERCADO'] . "</td>";
          echo "<td>" . $row2['VALOR'] . "</td>";
          $cont = 1;

          // Consulta SQL para obter todos os registros da tabela tb_produtos para diferentes mercados e o nome do produto específico
          $sql3 = "SELECT * FROM tb_produtos WHERE NOME = '$nome_produto' AND NOME_MERCADO <> '$row2[NOME_MERCADO]'";
          $result3 = $conn->query($sql3);

        while ($row3 = $result3->fetch_assoc()) {
            $mercado = $row3["NOME_MERCADO"];
            $valor = $row3["VALOR"];
            echo "<td>$mercado</td>";
            echo "<td>$valor</td>";
            $cont = $cont + 1;
        }

        echo "</tr>";
        echo "</tbody>";
        }
      }
    } else {
      // echo "Não há produtos no carrinho.";
    }
    ?>

</table>

  <div id="alinha_btns_footer">
    <div><button id="back-button">Voltar</button></div>
    <button id="download-button" onclick="gerarPDF();" download>Gerar PDF</button>

  </div>
    
</body>
</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.debug.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.2.3/jspdf.plugin.autotable.js"></script>

<script>
function gerarPDF() {
  var doc = new jsPDF({ orientation: 'landscape' });

  var prevImage = null; // Variável para armazenar a imagem da célula anterior
  var currentPage = 1; // Página atual do documento PDF

  var table = doc.autoTable({
    html: '#table',
    bodyStyles: { minCellHeight: 15 },
    didDrawCell: function (data) {
      if (data.column.index === 0 && data.cell.section === 'body') {
        var td = data.cell.raw;
        var img = td.getElementsByTagName('img')[0];
        var cellWidth = data.cell.width;
        var cellPadding = data.cell.padding('horizontal');
        var imgWidth = img.width;
        var imgHeight = img.height;
        var aspectRatio = imgHeight / imgWidth;
        var availableWidth = data.cell.width - cellPadding * 2; // Espaço disponível na célula
        var imgDim = {
          width: availableWidth,
          height: availableWidth * aspectRatio
        };
        var textPos = data.cell.textPos;

        // Verifica se a imagem excede o espaço disponível na célula
        if (imgDim.height > data.cell.height) {
          // Verifica se a imagem é a última da linha
          var isLastImageInRow = data.row.cells.length === (data.column.index + 1);

          // Se a imagem não for a última da linha, redimensiona proporcionalmente para caber na célula
          if (!isLastImageInRow) {
            imgDim.height = data.cell.height;
            imgDim.width = imgDim.height / aspectRatio;
          } else {
            // Se a imagem for a última da linha e seu tamanho for maior que a altura da célula, move para a próxima página
            if (imgDim.height > data.cell.height) {
              doc.addPage(); // Adiciona uma nova página
              currentPage++; // Atualiza o número da página atual
              textPos.y = 15; // Define a posição inicial na nova página
            }
          }
        }

        // Verifica se é a primeira célula da página e se a imagem anterior é da página anterior
        if (data.row.index === 0 && prevImage && prevImage.pageNumber !== currentPage) {
          prevImage = null; // Limpa a imagem anterior
        }

        // Verifica se há espaço suficiente na página atual para adicionar a imagem
        var spaceLeft = doc.internal.pageSize.height - textPos.y;
        if (imgDim.height > spaceLeft) {
          doc.addPage(); // Adiciona uma nova página
          currentPage++; // Atualiza o número da página atual
          textPos.y = 15; // Define a posição inicial na nova página
        }

        // Adiciona a imagem apenas se não for uma imagem duplicada
        if (!prevImage || prevImage !== img) {
          doc.addImage(img.src, textPos.x + (cellWidth - imgDim.width) / 2, textPos.y, imgDim.width, imgDim.height);
        }

        prevImage = img; // Armazena a imagem atual para verificação na próxima célula
      }
    }
  });

  doc.save('table.pdf');
}




</script>


<script>


  document.getElementById('back-button').addEventListener('click', function() {
    history.back();
  });

  var activeButton = null;

// Função para realizar a pesquisa dinâmica
function searchTable() {
  var input = document.getElementById('search-input').value.toLowerCase();
  var table = document.getElementById('table');
  var rows = table.getElementsByTagName('tr');

  for (var i = 1; i < rows.length; i++) {
    var rowData = rows[i].getElementsByTagName('td');
    var match = false;

    for (var j = 0; j < rowData.length; j++) {
      var cellData = rowData[j].innerText.toLowerCase();

      if (cellData.includes(input)) {
        match = true;
        break;
      }
    }

    rows[i].style.display = match ? '' : 'none';
  }
}

function filterBy(column) {
  var table = document.getElementById('table');
  var rows = table.getElementsByTagName('tr');
  var columnIndex = -1;

  // Encontra o índice da coluna correspondente
  var headerRow = rows[0];
  var headerCells = headerRow.getElementsByTagName('th');

  for (var i = 0; i < headerCells.length; i++) {
    if (headerCells[i].innerText.toLowerCase().includes(column)) {
      columnIndex = i;
      break;
    }
  }

  // Mostra somente as linhas que correspondem ao filtro
  for (var j = 1; j < rows.length; j++) {
    var rowData = rows[j].getElementsByTagName('td');

    if (columnIndex >= 0 && columnIndex < rowData.length) {
      var cellData = rowData[columnIndex].innerText;

      if (cellData) {
        rows[j].style.display = '';
      } else {
        rows[j].style.display = 'none';
      }
    }
  }

  // Ordena a tabela com base na coluna selecionada
  if (column.includes('categoria') || column.includes('nome') || column.includes('mercado')) {
    sortTableByColumn(table, columnIndex, 'asc');
  } else if (column.includes('valor')) {
    sortTableByColumn(table, columnIndex, 'num');
  }

  // Altera a cor do botão
  var clickedButton = event.target;
  if (activeButton === clickedButton) {
    clickedButton.classList.remove('active');
    activeButton = null;
  } else {
    if (activeButton !== null) {
      activeButton.classList.remove('active');
    }
    clickedButton.classList.add('active');
    activeButton = clickedButton;
  }
}

function sortTableByColumn(table, columnIndex, type) {
  var rows = Array.from(table.rows).slice(1); // Exclui a primeira linha de cabeçalho

  rows.sort(function (rowA, rowB) {
    var cellA = rowA.cells[columnIndex].innerText.toLowerCase();
    var cellB = rowB.cells[columnIndex].innerText.toLowerCase();

    if (type === 'asc') {
      return cellA.localeCompare(cellB);
    } else if (type === 'num') {
      return parseFloat(cellA) - parseFloat(cellB);
    }
  });

  // Cria um novo elemento tbody para armazenar as linhas reordenadas
  var newTbody = document.createElement('tbody');

  // Adiciona as linhas reordenadas ao novo tbody
  rows.forEach(function (row) {
    newTbody.appendChild(row);
  });

  // Remove o tbody antigo
  table.removeChild(table.tBodies[0]);

  // Adiciona o novo tbody à tabela
  table.appendChild(newTbody);
}

window.addEventListener('DOMContentLoaded', function () {
  var table = document.getElementById('table');

  // Percorre cada linha da tabela, começando da segunda linha (índice 1)
  for (var i = 1; i < table.rows.length; i++) {
    var row = table.rows[i];

    // Define um atributo "data-index" para cada linha
    row.setAttribute('data-index', i);
  }

  // Adiciona um ouvinte de evento para o botão "Categoria"
  var categoryButton = document.getElementById('category-button');
  categoryButton.addEventListener('click', function () {
    filterBy('categoria');
  });

  // Adiciona um ouvinte de evento para o botão "Mercado"
  var mercadoButton = document.getElementById('mercado-button');
  mercadoButton.addEventListener('click', function () {
    filterBy('mercado');
  });

  // Adiciona um ouvinte de evento para o botão "Nome"
  var nomeButton = document.getElementById('nome-button');
  nomeButton.addEventListener('click', function () {
    filterBy('nome');
  });

  // Adiciona um ouvinte de evento para o botão "Valor"
  var valueButton = document.getElementById('value-button');
  valueButton.addEventListener('click', function () {
    filterBy('valor');
  });

  // Adiciona um ouvinte de evento para o campo de pesquisa
  var searchInput = document.getElementById('search-input');
  searchInput.addEventListener('input', function () {
    searchTable();
  });
});

window.addEventListener('DOMContentLoaded', function() {
  var table = document.getElementById('table');

  // Percorre cada linha da tabela, começando da segunda linha (índice 1)
  for (var i = 1; i < table.rows.length; i++) {
    var row = table.rows[i];
    var cells = row.cells;

    // Se o número de células for menor que 9 (total de células desejado), adiciona células vazias
    if (cells.length < 9) {
      var emptyCellsCount = 9 - cells.length;
      for (var j = 0; j < emptyCellsCount; j++) {
        var cell = document.createElement('td');
        row.appendChild(cell);
      }
    }
  }
});
  </script>

<?php 

    }
?>