**FACADE** é um padrão estrutural que fornece uma interface simplificada para um conjunto de interfaces
em um subsistema. Ele oculta a complexidade do sistema e fornece uma interface mais simples de usar para
os clientes.
<br/><br/>
**Caractériscas do facade** 
<br/>
- Interface Simplificada: O facade fornece uma interface única e simplificada para um conjunto de interfaces mais complexas.
- Redução da Complexidade: Ele Reduz a complexidade do sistema, ocultando os detalhes internos e expondo apenas o necessário
- Desacoplamento: O Facade ajuda a desacoplar o código do cliente do código subsistema, tornando o sistema mais modular e fácil de manter
<br/><br/>
**Implementação do facade em PHP**
```
<?php
// Subsistema complexo
class SistemaDeAudio {
    public function ligar() {
        echo "Sistema de áudio ligado.\n";
    }

    public function ajustarVolume($nivel) {
        echo "Volume ajustado para $nivel.\n";
    }
}

class SistemaDeVideo {
    public function ligar() {
        echo "Sistema de vídeo ligado.\n";
    }

    public function ajustarResolucao($resolucao) {
        echo "Resolução ajustada para $resolucao.\n";
    }
}

// Facade
class HomeTheaterFacade {
    private $audio;
    private $video;

    public function __construct() {
        $this->audio = new SistemaDeAudio();
        $this->video = new SistemaDeVideo();
    }

    public function ligarHomeTheater() {
        $this->audio->ligar();
        $this->audio->ajustarVolume(10);
        $this->video->ligar();
        $this->video->ajustarResolucao('1080p');
        echo "Home Theater ligado e configurado.\n";
    }
}

// Exemplo de uso
$homeTheater = new HomeTheaterFacade();
$homeTheater->ligarHomeTheater();
?>

```
