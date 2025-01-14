O padrão de design Active Record é um padrão arquitetural usado em desenvolvimento de software para gerenciar dados em bancos de dados relacionais. Ele é comumente usado em frameworks de desenvolvimento web, como Ruby on Rails e Laravel. O Active Record combina os conceitos de mapeamento objeto-relacional (ORM) com métodos para manipulação de dados.

Características do Active Record
- Mapeamento Objeto-Relacional (ORM): Cada classe mapeia para uma tabela no banco de dados, e cada instância de classe mapeia para uma linha na tabela.

- Métodos de Persistência: As classes Active Record incluem métodos para criar, ler, atualizar e excluir (CRUD) registros no banco de dados.

- Validações e Callbacks: Suporte para validações de dados e callbacks que permitem executar lógica personalizada antes ou depois de operações de banco de dados.

Exemplo de Active Record em PHP (Usando Eloquent do Laravel)
Aqui está um exemplo de como usar o padrão Active Record em PHP usando o Eloquent ORM do Laravel:

```
<?php
// Definindo um modelo de Eloquent para a tabela 'pessoas'
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model {
    // Especificando a tabela associada ao modelo
    protected $table = 'pessoas';

    // Definindo os campos que podem ser preenchidos em massa
    protected $fillable = ['nome', 'endereco', 'bairro', 'telefone', 'email', 'id_cidade'];
}

// Exemplo de uso do modelo Pessoa
$pessoa = new Pessoa;
$pessoa->nome = 'João';
$pessoa->endereco = 'Rua ABC, 123';
$pessoa->bairro = 'Centro';
$pessoa->telefone = '1234-5678';
$pessoa->email = 'joao@example.com';
$pessoa->id_cidade = 1;
$pessoa->save(); // Salva a nova pessoa no banco de dados

// Recuperando uma pessoa pelo ID
$pessoa = Pessoa::find(1);
echo $pessoa->nome;

// Atualizando um registro
$pessoa->bairro = 'Novo Bairro';
$pessoa->save();

// Excluindo um registro
$pessoa->delete();
?>

```

Vantagens do Active Record
- Simplicidade: Facilita o trabalho com banco de dados, pois combina lógica de acesso e manipulação de dados na mesma classe.

- Integração Fácil: Simplifica a integração entre o código da aplicação e o banco de dados.

- Validações Integradas: Suporte para validações de dados diretamente nos modelos.

Desvantagens do Active Record
- Escalabilidade Limitada: Pode não ser adequado para aplicações muito grandes ou com lógica de banco de dados complexa.

- Aumento de Acoplamento: A mistura de lógica de banco de dados com lógica de negócios pode levar a um maior acoplamento e dificultar a manutenção.

O padrão Active Record é uma ferramenta poderosa para simplificar a manipulação de dados em bancos de dados relacionais, especialmente em aplicações menores ou de médio porte