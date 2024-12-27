<?php
$dados = $_POST;

if ($dados['id']) {
    try {
        // Conexão com o banco de dados MySQL usando PDO
        $conn = new PDO('mysql:host=localhost;dbname=livros', 'root', '');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepara a instrução SQL
        $sql = "UPDATE pessoa SET nome = :nome,
                                  endereco = :endereco,
                                  bairro = :bairro,
                                  telefone = :telefone,
                                  email = :email,
                                  id_cidade = :id_cidade
                              WHERE id = :id";
        $stmt = $conn->prepare($sql);

        // Vincula os parâmetros
        $stmt->bindParam(':nome', $dados['nome']);
        $stmt->bindParam(':endereco', $dados['endereco']);
        $stmt->bindParam(':bairro', $dados['bairro']);
        $stmt->bindParam(':telefone', $dados['telefone']);
        $stmt->bindParam(':email', $dados['email']);
        $stmt->bindParam(':id_cidade', $dados['id_cidade']);
        $stmt->bindParam(':id', $dados['id']);

        // Executa a instrução SQL
        $stmt->execute();

        echo 'Registro atualizado com sucesso';
    } catch (PDOException $e) {
        echo 'Erro: ' . $e->getMessage();
    }

    // Fecha a conexão
    $conn = null;
}
