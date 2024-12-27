<strong>O que são design patterns:</strong> "Um Pattern descreve um problema que ocorre com frequência em 
nosso ambiente, e então explica a essência da solução para este problema de forma que tal solução possa ser
utilizada milhões de outras vezes."

Singleton:O padrão de design Singleton é um dos padrões de criação mais conhecidos e amplamente utilizados em
programação orientada a objetos. Ele garante que uma classe tenha apenas uma instância e fornece um ponto
global de acesso a essa instância.
Aqui está uma descrição detalhada do padrão Singleton:
<br/>
<strong>Características do Singleton</strong>
<br/>
1: Instância Única: O Singleton assegura que uma classe tenha apenas uma instância durante a execução do programa.
<br/>
2: Acesso Global: Fornece um ponto de acesso global á instância única, permitindo que ela seja acessada de qualquer
lugar do código.
<br/>
3: Controle de Insância: O Singleton controla a criação e o ciclo de vida da instância, garantindo que não haja 
múltiplas instâncias

```
<?php
class Singleton {
    // Instância única da classe
    private static ?Singleton $instancia = null;

    // Construtor privado para evitar criação direta de instâncias
    private function __construct() {
        // Inicialização da instância
    }

    // Método para obter a instância única
    public static function getInstancia(): Singleton {
        if (self::$instancia === null) {
            self::$instancia = new Singleton();
        }
        return self::$instancia;
    }

    // Método para evitar clonagem da instância
    private function __clone() {
        // Evita clonagem
    }

    // Método para evitar desserialização da instância
    private function __wakeup() {
        // Evita desserialização
    }
}

// Exemplo de uso
$singleton = Singleton::getInstancia();
?>

```
**Vantagens do Singleton**
<br/>
- Controle Centralizado: Facilita o controle centralizado de recursos compartilhasdos, como conexões de banco de dados ou configurações de aplicação
- Consistência:  Garante que todos os componetes do sistema utilizem a mesma instância, evitando inconsistências.
<br/><br/>
**Desvantagens do Singleton**
<br/>
- Dificuldade de Teste: Pode ser difícil de testar, pois a instância única pode manter estado entre os testes.
- Acoplamento: Pode introduzir um acoplamento forte entre os componentes do sistema, dificultando a manutenção e evolução do código.