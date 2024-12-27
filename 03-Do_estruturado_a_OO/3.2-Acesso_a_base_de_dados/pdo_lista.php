<?php
try
{
    $conn = new PDO('mysql:host=127.0.0.1;port=3306;dbname=livros', 'root', 'mysql');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $result = $conn->query("SELECT codigo, nome FROM famosos");

    if ($result)
    {
        foreach ($result as $row)
        {
            print $row['codigo'] . '-' . $row['nome'] . '<br>';
        }
    }
    
    $conn = null;
}
catch (PDOException $e)
{
    print 'Erro: ' . $e->getMessage();
}
?>
