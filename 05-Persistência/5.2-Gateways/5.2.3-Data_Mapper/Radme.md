Me explique sobre o padrão data mapper
O padrão de design Data Mapper é um padrão arquitetural usado para separar a lógica de negócios da lógica de acesso a dados. Ele mapeia objetos em um banco de dados, permitindo que a lógica da aplicação se concentre nos objetos de domínio sem se preocupar com os detalhes de persistência dos dados. Aqui está uma descrição detalhada do padrão Data Mapper:

Características do Data Mapper
Separação de Responsabilidades: O Data Mapper separa a lógica de negócios da lógica de acesso a dados, promovendo um design mais limpo e modular.

Mapeamento Objetos-Relacional (ORM): Ele fornece um mapeamento entre os objetos de domínio e as tabelas do banco de dados.

Controle Completo: Oferece controle completo sobre a consulta ao banco de dados e a manipulação de objetos, permitindo otimizações avançadas.

Exemplo de Data Mapper em PHP
Aqui está um exemplo simples de como implementar o padrão Data Mapper em PHP:

Definição da Entidade de Domínio:
```
<?php
class Pessoa {
    private $id;
    private $nome;
    private $endereco;
    private $bairro;
    private $telefone;
    private $email;
    private $id_cidade;

    // Getters e setters para os atributos...

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    // Outros getters e setters...
}
?>

<?php
class PessoaMapper {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function findById($id) {
        $stmt = $this->pdo->prepare('SELECT * FROM pessoa WHERE id = :id');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            return $this->mapRowToPessoa($row);
        }

        return null;
    }

    public function save(Pessoa $pessoa) {
        if ($pessoa->getId() === null) {
            $stmt = $this->pdo->prepare('INSERT INTO pessoa (nome, endereco, bairro, telefone, email, id_cidade) VALUES (:nome, :endereco, :bairro, :telefone, :email, :id_cidade)');
        } else {
            $stmt = $this->pdo->prepare('UPDATE pessoa SET nome = :nome, endereco = :endereco, bairro = :bairro, telefone = :telefone, email = :email, id_cidade = :id_cidade WHERE id = :id');
            $stmt->bindParam(':id', $pessoa->getId(), PDO::PARAM_INT);
        }

        $stmt->bindParam(':nome', $pessoa->getNome());
        $stmt->bindParam(':endereco', $pessoa->getEndereco());
        $stmt->bindParam(':bairro', $pessoa->getBairro());
        $stmt->bindParam(':telefone', $pessoa->getTelefone());
        $stmt->bindParam(':email', $pessoa->getEmail());
        $stmt->bindParam(':id_cidade', $pessoa->getIdCidade());

        $stmt->execute();
    }

    private function mapRowToPessoa(array $row) {
        $pessoa = new Pessoa();
        $pessoa->setId($row['id']);
        $pessoa->setNome($row['nome']);
        $pessoa->setEndereco($row['endereco']);
        $pessoa->setBairro($row['bairro']);
        $pessoa->setTelefone($row['telefone']);
        $pessoa->setEmail($row['email']);
        $pessoa->setIdCidade($row['id_cidade']);
        return $pessoa;
    }
}
?>

```

Vantagens do Data Mapper
Flexibilidade: Oferece uma camada de abstração que torna o código independente da estrutura do banco de dados.

Testabilidade: Facilita a criação de testes unitários, pois a lógica de negócios e a lógica de persistência estão separadas.

Manutenção: Facilita a manutenção e a evolução do código, pois as mudanças na lógica de negócios ou no banco de dados não afetam diretamente um ao outro.

Desvantagens do Data Mapper
Complexidade: Pode adicionar complexidade ao código, especialmente em projetos pequenos ou simples.

Desempenho: Em alguns casos, a camada de abstração pode introduzir uma sobrecarga de desempenho.

O padrão Data Mapper é uma ferramenta poderosa para criar sistemas modulares e flexíveis, promovendo a separação de responsabilidades e facilitando a manutenção do código.