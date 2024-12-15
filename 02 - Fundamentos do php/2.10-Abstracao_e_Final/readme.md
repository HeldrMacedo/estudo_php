<strong>Abstração:</strong> No paradigma de orientação a objetos se prega o conceito da "abstração". DE acordo com o dicionário
Priveram, "abstrair" é separar mentalmente, considerar isoladamente, simplificar, alhear-se. Para construir
um sistema orientado a objetos, não devemos projhetar o sistema como sendo uma grande peça monolítica;
devemos separá-los em partes, concentrando-nos nas peças mais importantes e ignorando os detalhes (em um primeiro
momento) para poderoms construir peças be-definidas que possam ser reaproveitadas mais tarde, formando uma
estrutura hierárquica.
<br/>
<strong>Classes Abstratas:</strong> Nesse contexto encontraremos classes estruturais, ou seja, que estão na 
nossa hierarquia de classes para servirem de base para outras. São classes que nunca serão instanciadas na
forma de objetos; somente suas filhas serão. Nesses casos é interessante marcar essas classes como classes
abstratas, de modo que cada classe abstrata seja tratada diferentemente pela linguagem de programação,
impedindo automaticamente que se instaciem objetos a partir dela.
<br/>
<strong>Classes finais:</strong> uma classe final é uma classe que não pode ser uma superclasse, ou seja, não
pode ser base para construção de outra classe em uma estrutura de herança.
<br/>
<strong>Métodos abstratos:</strong>Como vimos, uma classe abstrata como Conta é incompleta por natureza.
Percebemos isso pela falta do método retirar(), que existe em suas subclasses. Em casos como esse seria
prudente que a superclasse tivesse algum mecanismo de proteção para garantir que as classes filhas
necessariamente implementassem um método chamado retirar(), caso contrário elas também seriam incompletas.
Felizmente o PHP tem um recurso que permite isso, são os métodos abstratos.
Um método abstrato consiste na definição de uma assinatura de método, ou seja, na definição de seu nome e
seus parâmetros, não de sua implementação. Um método abstrato deve conter uma implementação na classe filha,
mas não deve ter implementação na classe em que ele é definido.
<br/>
<strong>Métodos finais:</strong> Existem situações em que escrevemos determinados métodos, mas não queremos
que eles sejam sobrescritos em classes filhas. Sempre que quisermos que um método seja a implementação
definitiva e não seja mais especializado em casses filhas, devemos marcá-lo como um método final. Um método
final não  pode ser sobrescrito, ou seja, não pode ser redefinido na classe filha.