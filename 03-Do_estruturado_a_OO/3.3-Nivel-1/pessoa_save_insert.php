<?php
$dados = $_POST;
try {
    // Conexão com o banco de dados MySQL usando PDO
    $conn = new PDO('mysql:host=localhost;dbname=livros', 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Obtém o próximo ID
    $stmt = $conn->query('SELECT MAX(id) AS next FROM pessoa');
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $next = (int) $row['next'] + 1;
    // Prepara a instrução SQL
    $sql = "INSERT INTO pessoa (id, nome, endereco, bairro, telefone, email, id_cidade) 
        VALUES (:id, :nome, :endereco, :bairro, :telefone, :email, :id_cidade)";
    $stmt = $conn->prepare($sql);
    // Vincula os parâmetros
    $stmt->bindParam(':id', $next);
    $stmt->bindParam(':nome', $dados['nome']);
    $stmt->bindParam(':endereco', $dados['endereco']);
    $stmt->bindParam(':bairro', $dados['bairro']);
    $stmt->bindParam(':telefone', $dados['telefone']);
    $stmt->bindParam(':email', $dados['email']);
    $stmt->bindParam(':id_cidade', $dados['id_cidade']);
    // Executa a instrução SQL
    $stmt->execute();
    echo 'Registro inserido com sucesso';
    } catch (PDOException $e) {
        echo 'Erro: ' . $e->getMessage();
} // Fecha a conexão
    $conn = null;