<?php
// Conexão com o banco de dados
// Substitua as credenciais do banco de dados pelas suas próprias
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'banco_listou_comprou';

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar a conexão
if ($conn->connect_error) {
    die('Erro na conexão com o banco de dados: ' . $conn->connect_error);
}

// Receber o termo de pesquisa do frontend
$searchTerm = $_GET['searchTerm'];

// Consulta SQL para buscar produtos que correspondam ao termo de pesquisa
$sql = "SELECT * FROM tb_produtos WHERE NOME LIKE '%$searchTerm%'";

// Executar a consulta
$result = $conn->query($sql);

// Array para armazenar os resultados da pesquisa
$products = [];

// Verificar se há resultados da pesquisa
if ($result->num_rows > 0) {
    // Loop pelos resultados da pesquisa e armazenar em $products
    while ($row = $result->fetch_assoc()) {
        $product = [
            'id' => $row['ID_PRODUTO'],
            'name' => $row['NOME'],
            'price' => number_format($row['VALOR'], 2, '.', ''),
            'image' => $row['IMAGEM'],
            'categoria' => $row['CATEGORIA'],
            'mercado' => $row['NOME_MERCADO']
        ];

        $products[] = $product;
    }
}

// Fechar a conexão com o banco de dados
$conn->close();

// Retornar os resultados da pesquisa como JSON
header('Content-Type: application/json');
echo json_encode($products);
?>
