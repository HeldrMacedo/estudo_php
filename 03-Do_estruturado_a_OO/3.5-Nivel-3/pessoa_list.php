<?php
try {
    // Conexão com o banco de dados MySQL usando PDO
    $conn = new PDO('mysql:host=localhost;dbname=livros', 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (!empty($_GET['action']) && ($_GET['action'] == 'delete')) {
        $id = (int) $_GET['id'];
        $stmt = $conn->prepare("DELETE FROM pessoa WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    $stmt = $conn->query('SELECT * FROM pessoa ORDER BY id');
    $items = '';
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $item = file_get_contents('html/item.html');
        $item = str_replace('{id}', $row['id'], $item);
        $item = str_replace('{nome}', $row['nome'], $item);
        $item = str_replace('{endereco}', $row['endereco'], $item);
        $item = str_replace('{bairro}', $row['bairro'], $item);
        $item = str_replace('{telefone}', $row['telefone'], $item);

        $items .= $item;
    }

    $list = file_get_contents('html/list.html');
    $list = str_replace('{items}', $items, $list);

    print $list;
} catch (PDOException $e) {
    echo 'Erro: ' . $e->getMessage();
}

// Fecha a conexão
$conn = null;
?>

