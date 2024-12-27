<?php
class Funcionario
{
    public $nome;
    public $salario;
    public $departamento;
    function getSalario(){}
    function setSalario($salario){}
    function getNome(){}
    function setNome($nome){}
    public static function idade($idade){
        return $idade;
    }
}

class Estagiario extends Funcionario
{

}
$f = new Funcionario();
$f->setSalario(10);
$f->setNome("Fred");
$f->departamento = 'RH';

$e = new Estagiario();
$e->setSalario(10);
$e->setNome("Helder");


print_r(get_class_methods('Funcionario'));//Lista os métodos da classe
print_r(get_object_vars($f));//Retorna os atributos publicos do objeto
print_r(get_class($f));//Retorna o nome da classe á qual um objeto pertence
print_r(get_parent_class($f));//Retorna o nome da classe ancestral(classe pai)
print_r(is_subclass_of($e, 'Funcionario'));//Se estagiario é filho de Funcionario
print_r(method_exists($e, 'salario'));//se existe o método salario existe ou não
print_r(call_user_func(['Estagiario', 'idade'], 35));//Executa uma função ou um método de uma classe passado como parâmetro
