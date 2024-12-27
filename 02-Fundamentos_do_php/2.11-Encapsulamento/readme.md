<strong>Encapsulamento:</strong> Um dos recursos mais interessantes na orientação a objetos é o encapsulamento,
um mecanismo que provê proteção de acesso aos membros internos de um objeto. Lembre-se de que uma classe tem
responsabilidade sobre os atributos que contém. Dessa forma, existem certas propriedades de uma classe que devem
ser tratadas exclusivamente por métodos dela mesma, que são implementações projetadas para manipular essas
propriedades da forma correta.  As propriedades não devem ser acessadas diretamente de fora do escopo de uma classe,
pois dessa forma a classe não fornece mais garantias sobre os atributos que contém, perdendo, assim, a 
responsabilidade sobre eles. Para atingir o encapsulamento, uma das formas é definir a visibilidade das propriedades
e dos métodos de um objeto. A visibilidade define a forma como essas propriedades devem ser acessadas.
Existem três formas de acesso:
<br/>
<strong>Public:</strong> Membros declarados como public poderão ser acessados livremente a partir da própria
classe em que foram declarados, a partir de classes descendentes e a partir do programa que faz uso dessa classe
(manipulando o objeto em si). Na UML, simbolizamos com um + na frente da propriedade.
<br/>
<strong>Private:</strong> Membros declarados como private somente podem ser acessados dentro da própria
classe em que foram declarados. Não poderão ser acessados a partir de classes descendentes nem a partir do 
programa que faz uso dessa classe (Manipulando o objeto). Na UML, simbolizamos com um - na frente da propriedade.
<br/>
<strong>Protected:</strong> Membros declarados como protected somente podem ser acessados dentro da própria
classe em que foram declarados e a partir de classes descendentes, mas não poderão ser acessados a partir
do programa que faz usi dessa classe (manipulando o objeto em si). Na UML, simbolizamos com um caractere #
na frente da propriedade.