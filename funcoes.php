<?php

session_start();

// Função para verificar o cadastro
function inserir_cadastro($nome, $email, $senha) {
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

    // Recebe os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Verifica se já existe um cadastro com o mesmo email
    $sql = "SELECT * FROM TB_USUARIOS WHERE EMAIL = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Já existe um cadastro com o mesmo email
        header('Location: cadastrar_usuario.php?message=error');
    } else {
        // Insere os dados na tabela de usuários
        $sql = "INSERT INTO TB_USUARIOS (NOME, EMAIL, SENHA) VALUES ('$nome', '$email', '$senha')";
    if ($conn->query($sql) === TRUE) {
        header('Location: cadastrar_usuario.php?message=success');
    } else {
        header('Location: cadastrar_usuario.php?message=error');
    }
}

// Fecha a conexão
$conn->close();
}


function login($email, $senha) {
    $servername = "localhost"; // Altere para o seu servidor
    $username = "root"; // Altere para o seu usuário
    $password = ""; // Altere para a sua senha
    $dbname = "banco_listou_comprou"; // Altere para o nome do seu banco de dados

    session_start();

    // Cria a conexão
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica a conexão
    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }

    // Recebe os dados do formulário
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Verifica se já existe um cadastro com o mesmo email
    $sql = "SELECT * FROM TB_USUARIOS WHERE EMAIL = '$email' AND SENHA = '$senha'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        $row = $result->fetch_assoc();
        $id_usuario= $row['ID_USUARIO'];
        // Armazene o ID do usuário na sessão
        $_SESSION['id_usuario'] = $id_usuario;

        if (isset($_SESSION['id_usuario'])) {
            header('Location: login.php?message=success');
        }else{
            header('Location: login.php?message=error');
        }
    } else {
        
    if ($conn->query($sql) === TRUE) {
        header('Location: login.php?message=success');
    } else {
        header('Location: login.php?message=error');
    }
}

// Fecha a conexão
$conn->close();
}

// Função para exibir mensagem de erro
function exibirErro($mensagem) {
    echo "Erro: " . $mensagem;
}


function inserir_produto($categoria, $nome_produto, $primeiro_mercado, $valor_1, $segundo_mercado, $valor_2, $terceiro_mercado, $valor_3, $imagem) {
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

    // Diretório de upload para armazenar as imagens
    $uploadDir = "img/";

    // Obtém o nome e o caminho temporário do arquivo de imagem
    $imageFile = $_FILES["imagem"]["name"];
    $imageTemp = $_FILES["imagem"]["tmp_name"];

    // Gera um nome único para a imagem usando o timestamp atual
    $uniqueName = time() . "_" . $imageFile;

    // Define o caminho final para salvar a imagem
    $imagePath = $uploadDir . $uniqueName;

    // Move a imagem do local temporário para o diretório de upload
    if (move_uploaded_file($imageTemp, $imagePath)) {

        $conta_cadastros = 0;
        $num_cadastro = 0;

        // Prepara a consulta SQL para inserir os dados
        $sql = "INSERT INTO tb_produtos (imagem, nome, nome_mercado, valor, data_atualizacao, categoria)
                VALUES ('$imagePath', '$nome_produto', '$primeiro_mercado', '$valor_1', ' ', '$categoria')";

        $sql2 = "INSERT INTO tb_produtos (imagem, nome, nome_mercado, valor, data_atualizacao, categoria)
        VALUES ('$imagePath', '$nome_produto', '$segundo_mercado', '$valor_2', ' ', '$categoria')";

        $sql3 = "INSERT INTO tb_produtos (imagem, nome, nome_mercado, valor, data_atualizacao, categoria)
        VALUES ('$imagePath', '$nome_produto', '$terceiro_mercado', $valor_3, ' ', '$categoria')";

        if ($primeiro_mercado != "" && $valor_1 != "") {
            if ($conn->query($sql) === TRUE) {
                $conta_cadastros++;
            }
        }

        if ($segundo_mercado != "" && $valor_2 != "") {
            if ($conn->query($sql2) === TRUE) {
                $conta_cadastros++;
            }
        }

        if ($terceiro_mercado != "" && $valor_3 != "") {
            if ($conn->query($sql3) === TRUE) {
                $conta_cadastros++;
            }
        }

        if ($primeiro_mercado != "" && $valor_1 != "") {
            $num_cadastro++;
        }
        if ($segundo_mercado != "" && $valor_2 != "") {
            $num_cadastro++;
        }
        if ($terceiro_mercado != "" && $valor_3 != "") {
            $num_cadastro++;
        }

        // Executa a consulta
        if ($conta_cadastros == $num_cadastro) {
            header('Location: novo_produto.php?message=success');
        } else {
            header('Location: novo_produto.php?message=error');
        }
    } else {
        echo "Erro ao fazer upload da imagem.";
    }

    // Fecha a conexão com o banco de dados
    $conn->close();
}



function atualizar_produto($categoria, $nome_produto, $mercado_1, $valor_1, $mercado_2, $valor_2, $mercado_3, $valor_3, $imagem, $id_produto_1, $id_produto_2, $id_produto_3, $conta_registros) {
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

    // Prepara a consulta SQL para atualizar os dados
    $sql = "UPDATE tb_produtos SET NOME = '$nome_produto', NOME_MERCADO = ?, VALOR = ?, DATA_ATUALIZACAO = '', CATEGORIA = ? WHERE ID_PRODUTO = ?";

    // Prepara a declaração
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $nome_mercado, $valor, $categoria, $id_produto);

    // Diretório de upload para armazenar as imagens
    $uploadDir = "img/";

    // Verifica se foi enviado um novo arquivo de imagem
    if ($_FILES["imagem"]["error"] === UPLOAD_ERR_OK) {
        // Obtém o nome e o caminho temporário do arquivo de imagem
        $imageFile = $_FILES["imagem"]["name"];
        $imageTemp = $_FILES["imagem"]["tmp_name"];

        // Gera um nome único para a imagem usando o timestamp atual
        $uniqueName = time() . "_" . $imageFile;

        // Define o caminho final para salvar a imagem
        $imagePath = $uploadDir . $uniqueName;

        // Move a imagem do local temporário para o diretório de upload
        if (move_uploaded_file($imageTemp, $imagePath)) {
            // Atualiza o caminho da imagem na tabela de produtos
            $stmt->bind_param("sssi", $nome_mercado, $valor, $categoria, $id_produto_1);
            $stmt->execute();
        } else {
            echo "Erro ao fazer upload da imagem.";
        }
    }

    // Atualiza os dados dos mercados e valores
    if (!empty($mercado_1) && !empty($valor_1)) {
        $nome_mercado = $mercado_1;
        $valor = $valor_1;
        $id_produto = $id_produto_1;
        $stmt->execute();
    }

    if (!empty($mercado_2) && !empty($valor_2)) {
        $nome_mercado = $mercado_2;
        $valor = $valor_2;
        $id_produto = $id_produto_2;
        $stmt->execute();
    }

    if (!empty($mercado_3) && !empty($valor_3)) {
        $nome_mercado = $mercado_3;
        $valor = $valor_3;
        $id_produto = $id_produto_3;
        $stmt->execute();
    }

    $imagem = $_POST['imagem'];

    // Verifica se ocorreram erros durante as execuções
    if ($stmt->error) {
        // echo "Erro na atualização dos dados: " . $stmt->error;
        header("Location: atualizar_produto.php?message=error");
    }else{
        $sql2 = "SELECT * FROM tb_produtos WHERE NOME = '$nome_produto' ";
        $result3 = $conn->query($sql2);

        $id_produto = array();
        $imagem = array();
        $nome_produto = array();
        $categoria = array();
        $mercado = array();
        $valor = array();

        $i = 1; // contador para atribuir os valores corretamente

        while ($row3 = $result3->fetch_assoc()) {
            $id_produto = $row3["ID_PRODUTO"];
            $imagem = $row3["IMAGEM"];
            $nome_produto = $row3["NOME"];
            $categoria = $row3["CATEGORIA"];
            $mercado[$i] = $row3["NOME_MERCADO"];
            $valor[$i] = $row3["VALOR"];

            $i++;
        }

        // Atribuindo os valores às variáveis correspondentes
        $mercado_1 = isset($mercado[1]) ? $mercado[1] : '';
        $valor_1 = isset($valor[1]) ? $valor[1] : '';
        $id_produto_1 = isset($id_produto[1]) ? $id_produto[1] : '';

        $mercado_2 = isset($mercado[2]) ? $mercado[2] : '';
        $valor_2 = isset($valor[2]) ? $valor[2] : '';
        $id_produto_2 = isset($id_produto[2]) ? $id_produto[2] : '';

        $mercado_3 = isset($mercado[3]) ? $mercado[3] : '';
        $valor_3 = isset($valor[3]) ? $valor[3] : '';
        $id_produto_3 = isset($id_produto[3]) ? $id_produto[3] : '';


        header("Location: atualizar_produto.php?id=".$id_produto_1."&nome=".$nome_produto."&valor=".$valor_1."&imagem=".$imagem."&nome_mercado=".$mercado_1."&categoria=".$categoria."&message=success&mercado_2=".$mercado_2."&valor_2=".$valor_2."&id_produto_2=".$id_produto_2."&mercado_3=".$mercado_3."&valor_3=".$valor_3."&id_produto_3=".$id_produto_3."&conta_registros=".$conta_registros);
    }

    // Fecha a declaração
    $stmt->close();

    // Fecha a conexão com o banco de dados
    $conn->close();

    // Redireciona o usuário após a atualização dos registros
    
    exit();
}



function excluir_produto($id) {
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

    $sql = "DELETE FROM tb_produtos WHERE ID_PRODUTO =  $id;";

    // Executa a consulta
    if ($conn->query($sql) === TRUE ) {
        header('Location: pesquisa_dados.php?message=success');
    } else {
        header('Location: pesquisa_dados.php?message=error');
    }

    // Fecha a conexão com o banco de dados
    $conn->close();
}


function adicionar_ao_carrinho($id_usuario, $nome_produto){
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

    // Verifica se o produto já está no carrinho do usuário
    $sql = "SELECT * FROM tb_carrinho WHERE ID_USUARIO = '$id_usuario' AND NOME_PRODUTO = '$nome_produto'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Produto já está no carrinho, não faz nada
        header('Location: pagina_principal.php?message=existe');
        exit;
    } else {
        // Produto não está no carrinho, adiciona-o
        $sql = "INSERT INTO tb_carrinho (ID_USUARIO, NUMERO_PRODUTO, QUANTIDADE_DE_PRODUTOS, TOTAL_PRODUTOS, VALOR_TOTAL, DATA_ADICIONADO, NOME_PRODUTO)
        VALUES ($id_usuario, ' ', ' ', ' ', ' ', ' ', '$nome_produto')";

        // Executa a consulta
        if ($conn->query($sql) === TRUE ) {
            header('Location: pagina_principal.php?message=success');
        } else {
            header('Location: pagina_principal.php?message=error');
        }
    }

    // Fecha a conexão com o banco de dados
    $conn->close();
}


function retirar_do_carrinho($nome_produto){
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

    $sql = "DELETE FROM tb_carrinho WHERE NOME_PRODUTO =  '$nome_produto';";

    // Executa a consulta
    if ($conn->query($sql) === TRUE ) {
        header('Location: pagina_principal.php?message=success_remover');
    } else {
        header('Location: pagina_principal.php?message=error_remover');
    }

    // Fecha a conexão com o banco de dados
    $conn->close();
}


function login_administrador($email, $senha, $botao_selecionado) {
    $servername = "localhost"; // Altere para o seu servidor
    $username = "root"; // Altere para o seu usuário
    $password = ""; // Altere para a sua senha
    $dbname = "banco_listou_comprou"; // Altere para o nome do seu banco de dados

    session_start();

    // Cria a conexão
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica a conexão
    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }

    if($botao_selecionado == "CADASTRO DE DADOS"){
        $pagina = "novo_produto.php";
    }else if($botao_selecionado == "PESQUISA DE DADOS"){
        $pagina = "pesquisa_dados.php";
    }else if($botao_selecionado == "ATUALIZAÇÃO DE DADOS"){
        $pagina = "pesquisa_dados.php";
    }else if($botao_selecionado == "EXCLUSÃO DE DADOS"){
        $pagina = "pesquisa_dados.php";
    }

    // Verifica se já existe um cadastro com o mesmo email
    $sql = "SELECT * FROM TB_USUARIOS WHERE EMAIL = '$email' AND SENHA = '$senha' AND ADMINISTRADOR = '1'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        $row = $result->fetch_assoc();
        $id_administrador= $row['ID_USUARIO'];
        // Armazene o ID do usuário na sessão
        $_SESSION['id_administrador'] = $id_administrador;

        if (isset($_SESSION['id_administrador'])) {
            header('Location: configuracao.php?message=success&pagina='.$pagina);
        }else{
            header('Location: configuracao.php?message=error');
        }
    } else {
        
    if ($conn->query($sql) === TRUE) {
        header('Location: configuracao.php?message=success&pagina='.$pagina);
    } else {
        header('Location: configuracao.php?message=error');
    }
}

// Fecha a conexão
$conn->close();
}



function atualizar_email($email_antigo, $senha, $email_novo) {
    $servername = "localhost"; 
    $username = "root"; 
    $password = ""; 
    $dbname = "banco_listou_comprou"; 

    session_start();

    // Cria a conexão
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica a conexão
    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }

    // Verifica se já existe um cadastro com o mesmo email e senha
    $sql = "SELECT * FROM tb_usuarios WHERE EMAIL = '$email_antigo' AND SENHA = '$senha'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Atualiza a senha para o email correspondente
        $sql_atualizar_email = "UPDATE tb_usuarios SET EMAIL = '$email_novo' WHERE EMAIL = '$email_antigo' AND SENHA = '$senha' ";
        if ($conn->query($sql_atualizar_email) === TRUE) {
            header('Location: configuracao.php?message=success_atualizacao');
        } else {
            header('Location: configuracao.php?message=error_atualizacao');
        }
    } else {
        header('Location: configuracao.php?message=error_atualizacao');
    }

    // Fecha a conexão
    $conn->close();
}


function atualizar_senha($email_antigo, $senha_antiga, $senha_nova) {
    $servername = "localhost"; 
    $username = "root"; 
    $password = ""; 
    $dbname = "banco_listou_comprou"; 

    session_start();

    // Cria a conexão
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica a conexão
    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }

    // Verifica se já existe um cadastro com o mesmo email e senha
    $sql = "SELECT * FROM tb_usuarios WHERE EMAIL = '$email_antigo' AND SENHA = '$senha_antiga'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Atualiza a senha para o email correspondente
        $sql_atualizar_senha = "UPDATE tb_usuarios SET SENHA = '$senha_nova' WHERE EMAIL = '$email_antigo' AND SENHA = '$senha_antiga' ";
        if ($conn->query($sql_atualizar_senha) === TRUE) {
            header('Location: configuracao.php?message=success_atualizacao');
        } else {
            header('Location: configuracao.php?message=error_atualizacao');
        }
    } else {
        header('Location: configuracao.php?message=error_atualizacao');
    }

    // Fecha a conexão
    $conn->close();
}



// Verifica o valor do parâmetro "action"
if (isset($_POST['action'])) {
    $action = $_POST['action'];

    // Chama a função correspondente com base no valor do "action"
    switch ($action) {
        case 'verificar_cadastro':
            // Recebe os dados do formulário
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            inserir_cadastro($nome, $email, $senha);
            break;
        case 'exibirErro':
            exibirErro("Mensagem de erro personalizada.");
            break;
        case 'login':
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            login($email, $senha);
            break;
        case 'inserir_produto':
            $categoria = $_POST["categoria"];
            $nome_produto = $_POST["nome_produto"];
            $primeiro_mercado = $_POST["primeiro_mercado"];
            $valor_1 = $_POST["valor_1"];
            $segundo_mercado = $_POST["segundo_mercado"];
            $valor_2 = $_POST["valor_2"];
            $terceiro_mercado = $_POST["terceiro_mercado"];
            $valor_3 = $_POST["valor_3"];
            $imagem = $_POST["imagem"];
            inserir_produto($categoria, $nome_produto, $primeiro_mercado, $valor_1, $segundo_mercado, $valor_2, $terceiro_mercado, $valor_3, $imagem);
            break;

        case 'atualizar_produto':
            $categoria = $_POST["categoria"];
            $nome_produto = $_POST["nome"];
            $primeiro_mercado = $_POST["mercado_1"];
            $valor_1 = $_POST["valor_1"];
            $segundo_mercado = $_POST["mercado_2"];
            $valor_2 = $_POST["valor_2"];
            $terceiro_mercado = $_POST["mercado_3"];
            $valor_3 = $_POST["valor_3"];
            $imagem = $_FILES["imagem"]["name"];
            $conta_registros = $_POST["conta_registros"];
            $id_produto_1 = $_POST["id_produto_1"];
            $id_produto_2 = $_POST["id_produto_2"];
            $id_produto_3 = $_POST["id_produto_3"];

            echo $categoria."\n";
            echo $nome_produto."\n";
            echo $primeiro_mercado."\n";
            echo $valor_1."\n";
            echo $segundo_mercado."\n";
            echo $valor_2."\n";
            echo $terceiro_mercado."\n";
            echo $valor_3."\n";
            echo $imagem."\n";
            echo $conta_registros."\n";
            echo $id_produto_1."\n";
            echo $id_produto_2."\n";
            echo $id_produto_3."\n";


            atualizar_produto($categoria, $nome_produto, $primeiro_mercado, $valor_1, $segundo_mercado, $valor_2, $terceiro_mercado, $valor_3, $imagem, $id_produto_1, $id_produto_2, $id_produto_3, $conta_registros);
            break;

            case 'excluir_produto':
                $id = $_POST["id"];
                excluir_produto($id);
            break;

            case 'adicionar_ao_carrinho':
                $nome_produto = $_POST["nome_produto"];
                $id_usuario = $_SESSION["id_usuario"];
                adicionar_ao_carrinho($id_usuario, $nome_produto);
            break;

            case 'retirar_do_carrinho':
                $nome_produto = $_POST["nome_produto"];
                retirar_do_carrinho($nome_produto);
            break;

            case 'login_administrador':
                $email = $_POST["email"];
                $senha = $_POST["senha"];
                $botao_selecionado = $_POST["botao_selecionado"];
                login_administrador($email, $senha, $botao_selecionado);
            break;

            case 'atualizar_email':
                $email_antigo = $_POST["email_antigo"];
                $senha = $_POST["senha"];
                $email_novo = $_POST["email_novo"];
                atualizar_email($email_antigo, $senha, $email_novo);
            break;

            case 'atualizar_senha':
                $email_antigo = $_POST["email_antigo"];
                $senha_antiga = $_POST["senha_antiga"];
                $senha_nova = $_POST["senha_nova"];
                atualizar_senha($email_antigo, $senha_antiga, $senha_nova);
            break;
    }
}
?>






