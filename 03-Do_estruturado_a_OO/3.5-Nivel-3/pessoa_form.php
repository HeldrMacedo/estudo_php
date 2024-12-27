<?php
$pessoa = [];
$pessoa['id']        = '';
$pessoa['nome']      = '';
$pessoa['endereco']  = '';
$pessoa['bairro']    = '';
$pessoa['telefone']  = '';
$pessoa['email']     = '';
$pessoa['id_cidade'] = '';

if (!empty($_REQUEST['action'])) {
    try {
        // Conexão com o banco de dados MySQL usando PDO
        $conn = new PDO('mysql:host=localhost;dbname=livros', 'root', '');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if ($_REQUEST['action'] == 'edit') {
            if (!empty($_GET['id'])) {
                $id = (int) $_GET['id'];
                $stmt = $conn->prepare("SELECT * FROM pessoa WHERE id = :id");
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                $stmt->execute();
                $pessoa = $stmt->fetch(PDO::FETCH_ASSOC);
            }
        } else if ($_REQUEST['action'] == 'save') {
            $id        = $_POST['id'];
            $pessoa    = $_POST;

            if (empty($_POST['id'])) {
                $stmt = $conn->query("SELECT MAX(id) AS next FROM pessoa");
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $next = (int) $row['next'] + 1;

                $sql = "INSERT INTO pessoa (id, nome, endereco, bairro, telefone, email, id_cidade)
                        VALUES (:id, :nome, :endereco, :bairro, :telefone, :email, :id_cidade)";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':id', $next, PDO::PARAM_INT);
            } else {
                $sql = "UPDATE pessoa SET nome = :nome,
                                          endereco = :endereco,
                                          bairro = :bairro,
                                          telefone = :telefone,
                                          email = :email,
                                          id_cidade = :id_cidade
                                      WHERE id = :id";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            }

            $stmt->bindParam(':nome', $pessoa['nome']);
            $stmt->bindParam(':endereco', $pessoa['endereco']);
            $stmt->bindParam(':bairro', $pessoa['bairro']);
            $stmt->bindParam(':telefone', $pessoa['telefone']);
            $stmt->bindParam(':email', $pessoa['email']);
            $stmt->bindParam(':id_cidade', $pessoa['id_cidade']);

            $stmt->execute();

            echo 'Registro salvo com sucesso';
        }
    } catch (PDOException $e) {
        echo 'Erro: ' . $e->getMessage();
    }

    // Fecha a conexão
    $conn = null;
}

require_once 'lista_combo_cidades.php';
$cidades = lista_combo_cidades($pessoa['id_cidade']);

$form = file_get_contents('html/form.html');
$form = str_replace('{id}', $pessoa['id'], $form);
$form = str_replace('{nome}', $pessoa['nome'], $form);
$form = str_replace('{endereco}', $pessoa['endereco'], $form);
$form = str_replace('{bairro}', $pessoa['bairro'], $form);
$form = str_replace('{telefone}', $pessoa['telefone'], $form);
$form = str_replace('{email}', $pessoa['email'], $form);
$form = str_replace('{id_cidade}', $pessoa['id_cidade'], $form);
$form = str_replace('{cidades}', $cidades, $form);

print $form;
?>
