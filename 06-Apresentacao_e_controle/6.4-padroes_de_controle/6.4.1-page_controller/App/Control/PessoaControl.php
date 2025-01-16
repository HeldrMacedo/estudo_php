<?php
use Livro\Database\Transaction;
use Livro\Database\Criteria;
use Livro\Database\Repository;
class PessoaControl
{
    public function listar()
    {
        try {
            Transaction::open('livro');
            $criteria = new Criteria;
            $criteria->setProperty('order', 'id');

            $repository = new Repository('Pessoa');
            $pessoas = $repository->load($criteria);

            if ($pessoas)
            {
                foreach ($pessoas as $pessoa)
                {
                    print "{$pessoa->id} - {$pessoa->nome} <br/>";
                }
            }
            Transaction::close();
        }catch (Exception $e){
            echo $e->getMessage();
        }
    }

    public function show($param)
    {
        if (isset($param['method']) AND  $param['method'] == 'listar')
        {
            $this->listar();
        }
    }
}
