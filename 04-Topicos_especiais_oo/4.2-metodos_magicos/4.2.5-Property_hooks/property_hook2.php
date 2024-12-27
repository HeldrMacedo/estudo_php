<?php
class Pessoa
{
    private string $pronome;
    
    public string $nome {
        get {
            return $this->pronome . ' ' . $this->nome;
        }
        set {
            if (strlen($value) === 0) {
                throw new Exception('Nome deve ter conteúdo');
            }
            $this->nome = $value;
        }
    }
    
    public function __construct(string $pronome, string $nome) {
        $this->pronome = $pronome;
        $this->nome = $nome;
    }
}

try
{
    $p1 = new Pessoa('Sra', 'Maria');
    print $p1->nome;
    
    print "<br>\n";
    $p2 = new Pessoa('', '');
    print $p2->nome;
}
catch (Exception $e)
{
    print $e->getMessage();
}
