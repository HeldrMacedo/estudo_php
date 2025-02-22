<html>
    <head>
        <meta charset="utf-8">
        <title> Listagem de pessoas </title>
        <link href="css/list.css" rel="stylesheet" type="text/css" media="screen" />
    </head>
    <body>
    <table border=1>
    <thead>
        <tr>
            <td></td>
            <td></td>
            <td>Id</td>
            <td>Nome</td>
            <td>Endereço</td>
            <td>Bairro</td>
            <td>Telefone</td>
        </tr>
    </thead>
    <tbody>
        <?php
            //$conn = pg_connect('host=localhost port=5432 dbname=livro user=postgres password=');
            $conn = new PDO('mysql:host=localhost;dbname=livros', 'root', '');
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            if ( !empty($_GET['action']) and ($_GET['action'] == 'delete'))
            {
                $id = (int) $_GET['id'];
                $sql = "DELETE FROM pessoa WHERE id=:id";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':id', $id);
                $stmt->execute();

            }


            $rows = $conn->query("SELECT * FROM pessoa")->fetchAll();

            ///$result = pg_query($conn, 'SELECT * from pessoa ORDER BY id');
            
            foreach($rows as $row)
            {
                $id        = $row['id'];
                $nome      = $row['nome'];
                $endereco  = $row['endereco'];
                $bairro    = $row['bairro'];
                $telefone  = $row['telefone'];
                $email     = $row['email'];
                $id_cidade = $row['id_cidade'];
                
                print '<tr>';
                print "<td> <a href='pessoa_form.php?action=edit&id={$id}'>
                             <img src='images/edit.svg' style='width:17px'>
                            </a> </td>";
                print "<td> <a href='pessoa_list.php?action=delete&id={$id}'>
                             <img src='images/remove.svg' style='width:17px'>
                            </a> </td>";
                print "<td> {$id} </td>";
                print "<td> {$nome} </td>";
                print "<td> {$endereco} </td>";
                print "<td> {$bairro} </td>";
                print "<td> {$telefone} </td>";
                print '</tr>';
            }
        ?>
    </tbody>
    </table>
    
    <button onclick="window.location='pessoa_form.php'">
        <img src="images/insert.svg" style="width:17px"> Inserir
    </button>
    
    </body>
</html>
