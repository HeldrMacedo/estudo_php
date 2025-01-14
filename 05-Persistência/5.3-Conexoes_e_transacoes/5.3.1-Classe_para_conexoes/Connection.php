<?php

class Connection
{
    private function __construct(){}
    public static function open($name)
    {
        if (file_exists($name . 'ini')) {
            $db = parse_ini_file($name.'ini');
        }else{
            throw new Exception("Arquivo {$name} não encontrado");
        }

        $user   = isset($db['user']) ? $db['user'] : null;
        $pass   = isset($db['pass']) ? $db['pass'] : null;
        $host   = isset($db['host']) ? $db['host'] : null;
        $port   = isset($db['port']) ? $db['port'] : null;
        $dbname = isset($db['name']) ? $db['name'] : null;
        $type   = isset($db['type']) ? $db['type'] : null;

        switch ($type) {
            case 'mysql':
                $port   = isset($db['port']) ? $db['port'] : '3306';
                $conn   = new PDO("mysql:host={$host};port={$port};dbname={$dbname}", $user, $pass);
                break;
            case 'pgsql':
                $port   = isset($db['port']) ? $db['port'] : '5432';
                $conn   = new PDO("psql:dbbame:host={$host};port={$port};dbname={$dbname}", $user, $pass);
                break;
            case 'sqlite':
                break;
            default:
        }

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    }
}