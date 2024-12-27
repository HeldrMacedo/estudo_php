<?php
function lista_combo_cidades( $id_cidade = null )
{
    try {
        //$conn = pg_connect('host=localhost port=5432 dbname=livro user=postgres password=');
        //$result = pg_query($conn, 'SELECT id, nome FROM cidade');
        $conn = new PDO('mysql:host=localhost; dbname=livros', 'root', '');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $result = $conn->query("SELECT * FROM cidade");

        $output = '';

        if ($result) {
            foreach ($result as $row) {
                $id = $row['id'];
                $nome = $row['nome'];
                $check = ($id == $id_cidade) ? 'selected=1' : '';
                $output .= "<option {$check} value='{$id}'> $nome </option>";
            }

            $conn = null;
        }
        return $output;
    }catch (PDOException $e){
        echo $e->getMessage();
    }
}
