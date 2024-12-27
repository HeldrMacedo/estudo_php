<?php
try
{
    $conn = new PDO('mysql:host=127.0.0.1;port=3306;dbname=livros', 'root', 'mysql');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $conn->exec("INSERT INTO famosos (codigo, nome) VALUES (1, 'Érico Veríssimo')");
    $conn->exec("INSERT INTO famosos (codigo, nome) VALUES (2, 'John Lennon')");
    $conn->exec("INSERT INTO famosos (codigo, nome) VALUES (3, 'Mahatma Gandhi')");
    $conn->exec("INSERT INTO famosos (codigo, nome) VALUES (4, 'Ayrton Senna')");
    $conn->exec("INSERT INTO famosos (codigo, nome) VALUES (5, 'Charlie Chaplin')");
    $conn->exec("INSERT INTO famosos (codigo, nome) VALUES (6, 'Anita Garibaldi')");
    $conn->exec("INSERT INTO famosos (codigo, nome) VALUES (7, 'Mário Quintana')");

    $conn = null;
}
catch (PDOException $e)
{
    print 'Erro: ' . $e->getMessage();
}
?>
