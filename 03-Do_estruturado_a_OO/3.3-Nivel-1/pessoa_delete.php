<?php
$dados = $_GET;

if ($dados['id']) {
    try {
        // Conexão com o banco de dados MySQL usando PDO
        $conn = new PDO('mysql:host=localhost;dbname=livro', 'root', '');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepara a instrução SQL
        $id = (int) $dados['id'];
        $sql = "DELETE FROM pessoa WHERE id = :id";
        $stmt = $conn->prepare($sql);

        // Vincula os parâmetros
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        // Executa a instrução SQL
        $stmt->execute();

        echo 'Registro excluído com sucesso';
    } catch (PDOException $e) {
        echo 'Erro: ' . $e->getMessage();
    }

    // Fecha a conexão
    $conn = null;
}

