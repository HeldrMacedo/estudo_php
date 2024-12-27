<?php
function lista_combo_cidades($id_cidade = null) {
    try {
        // Conexão com o banco de dados MySQL usando PDO
        $conn = new PDO('mysql:host=localhost;dbname=livros', 'root', '');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $output = '';
        $stmt = $conn->query('SELECT id, nome FROM cidade');
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $id = $row['id'];
            $nome = $row['nome'];
            $check = ($id == $id_cidade) ? 'selected=1' : '';
            $output .= "<option {$check} value='{$id}'> $nome </option>";
        }
    } catch (PDOException $e) {
        echo 'Erro: ' . $e->getMessage();
    }

    // Fecha a conexão
    $conn = null;
    return $output;
}
