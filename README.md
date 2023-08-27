# SOBRE ESSE PROJETO
<p> Estou aprendendo os conceitos de trait, interface e classes abstratas.
E saber quando usá-las. O material de estudo é esse video.
</p>

[Clique aqui para assistir](https://www.youtube.com/watch?v=x9bj30cWolA)


# FERRAMENTAS E RECURSOS 
 - PHP 8
 - PHPSTORM



# MEU RESUMO

Classes abstracts eu posso criar propriedades e métodos, porém, eu não posso instanciá-las, por isso eu preciso 
estende-la.

Qual a diferença?
```php
public function generate()
{
    //my logic
}
```
e 
```php
abstract public function display(); 
```

A primeira, é um método abstrato, que já tem uma implementação. 
Quer dizer, quando eu definir **public function** , eu estou dizendo que 
esse método tem um comportamento definido e posso chamar para executar ações definidas dentro dele. 
Como é uma class abstract, eu não posso instancia-la, contudo, na classe filha eu posso estender e chamar esse 
método que vai executar lógica que tiver dentro.


A segunda, é um método abstrato, porém, sem uma implementação. Quando eu definir abstract public function no início do 
método, eu estou dizendo que a classe filha que for herdar essa class abstract vai ser responsável por definir o comportamento 
desse método na sua class. Meio que eu obrigo a essa classe ter esse método. Pois se a classe filha não tiver implementado 
esse método que a class abstract definir, vai dar um erro do tipo fatal error.

Trait em português quer dizer característica.
No vídeo, ele deu um exemplo de um sistema de eventos. Esses eventos, podem ser de filme, música e show.
No exemplo do video, ele deu exemplo de um método que é usado em todas as class que tem o evento.

Antes
```php
<?php
// src/Concert.php
class Concert 
{
   public function getMenu()
   {
   }

}

// src/Movie.php
class Movie
{
    public function getMenu()
   {
   }
}


// src/Play.php
class Play
{
  public function getMenu()
   {
   }  
}
````
Depois de criar uma trait

```php
<?php
// /src/HasMenu.php
trait HasMenu 
{
	public function getMenu()
  {
    // My logic here
  }

}


// Concert.php
class Concert 
{
  use HasMenu;

}

// Movie.php
class Movie
{
    use HasMenu;
}


// Play.php
class Play
{
   use HasMenu; 
}


$play = new Play(); // instanciando o objeto.
$play->getMenu();  // Estou chamando dentro da class através da trait
````

Objetivo do trait e isolar componentes que sao reutilizados em classes diferentes, mas que possuem funcionalidade 
semelhantes ou abordam conceitos semelhantes.

No código acima, uma trait menu e outra trait de assentos, não tem sentido dentro de um cinema ter um menu, isso vai causar 
confusão na legibilidade do seu sistema. Pois menu é uma característica especifica como também assentos é.

No minuto 6:21, ele deu um exemplo de criar um método para obter o preço dos eventos. Sugeriu usar a mesma técnica 
anterior, usando o trait, porém, tem um problema. Imagine que em cada evento eu quero obter o preço de forma diferente. 
No evento filme, eu varie o preço de acordo com a cadeira, no concerto seja um preço fixo. Isso acarretaria criar condicional
para prever os preços de qual evento eu quero me referir. Assim sairia do conceito da trait, porque em cada Evento eu teria que 
ter uma lógica diferente para obter o preço. Qual seria a solução para esse meu problema?

O que eu quero dentro das minhas 3 class é uma garantia que exista esse método **getPrice**. E a cada evento que eu va criar, 
eu quero que esse método seja garantido que esteja lá.

Interface
Por isso utilizamos interface. Na interface podemos declarar apenas métodos. E obrigar as classes utlizar esses métodos
definidos na Interface.
```php
<?php
// src/PricingContract.php

interface PricingContract
{
  public function getPrice()
  {
  }
} 
```

Uma trait não pode implementar uma interface. O código abaixo não é possível, pois vai dar erro na sua aplicação.
```php
<?php
// src/HasAssignedSeats.php
trait HasAssignedSeats implements PricingContract
{

}
```
Entretanto, uma trait pode ser usada para preencher uma interface.
[Vejo o codigo no gist](https://gist.github.com/wesllycode/4cf96a07733497ee1f44afa35f3a7c47)


### CLASSES ABSTRACT

No vídeo, ele disse que seria interessante criar uma classe pai que engloba todas essas classes que estamos trabalhando. 
Essas classes, teatro, filme  e show tudo são do tipo evento. Vamos criar uma classe pai chamada Evento.

Observe que no arquivo Concert.php, usamos extends para usar Classe **Event.** Porém, abre uma possibilidade de alguém 
instanciar o objeto Evento sem referenciar as classes filhas, filme, teatro e show.

```php
<?php
//src/Event.php
class Event
{
}

?>

<?php
// src/Concert.php

require_once 'src/HasMenu.php';
class Concert extends Event implements PricingContract
{
    use HasMenu;

    public function __construct()
    {
        $this->itens = [
          'Beer',
          'Ale',
          'Nachos'
        ];
    }  


}

?>

<?php
// index.php

$event = new Event();


?>
```
Para evitar isso, vamos transformar a Classe pai Event em abstract. Porque em abstract ? Porque assim, ela não pode 
ser instanciada.
```php
<?php
// src/Event.php
abstract class Event 
{
}
```
Interessante, que a class abstract ele pode ser comporta tanto como uma Interface e como Trait. Retirei o implements da 
interface e deixei apenas extends do Event.
```php
<?php
// src/Event.php
abstract class Event {
    abstract public function getPrice();
}
?>

<?php
trait HasMenu
{
  public array $itens = [];
    public function getMenu(): array
    {
        return $this->itens;
    }

    public function getPrice(){
			return 'R$12,00';
    }
}

?>

<?php
// src/Concert.php

require_once 'src/HasMenu.php';
class Concert extends Event
{
    use HasMenu;

    public function __construct()
    {
        $this->itens = [
          'Beer',
          'Ale',
          'Nachos'
        ];
    }  
}

?>

<?php
require_once 'src/Concert.php';

$concert = new Concert();
print_r($concert->getMenu());
print_r($concert->getPrice());
?>
```
Não haverá problema acima, porque na trait, eu tenho método getPrice(). Se eu retirar o método getPrice() da trait, vai 
dar um erro. Pois na abstract classe ela obriga nas classes filhas definir na suas classes os método que vem da abstrac class pai.

Sendo que na trait, não é possivel usar implements para interface e também não é possível usar extends para abstract 
Class.


Você deve está se perguntando, se **class abstract** já faz o papel da **Interface** e **Trait**, porque não usa tudo 
**classes abstratas** ?

Aqui que está o pulo do gato, assista o vídeo que vai descobrir.

# DÚVIDAS QUE APARECEU DURANTE O PROJETO
### O que é esse TODO ?
```
// TODO: Implement getPrice() method.
```
<p>
De acordo com o chatGPT.

O **TODO** é uma forma de comentário que os desenvolvedores usam para indicar que há algo que 
precisa ser implementado ou concluído no código, mas que ainda não foi feito. 
Geralmente, o TODO é usado para destacar partes do código que precisam de atenção posterior 
ou para lembrar o desenvolvedor de adicionar funcionalidades que ainda estão pendentes.

Quando você encontra um comentário TODO no código, isso serve como um lembrete de que uma 
determinada tarefa ou implementação ainda está incompleta e precisa ser tratada no futuro. 
É uma prática comum em equipes de desenvolvimento, pois ajuda a manter o controle sobre as 
tarefas que precisam ser abordadas.

No exemplo que você deu, "// TODO: Implement getPrice() method.", isso significa que o 
desenvolvedor reconhece que a função `getPrice()` precisa ser implementada, mas ainda não 
foi feita. Esse comentário serve como um lembrete para o desenvolvedor ou equipe de 
desenvolvimento de que essa implementação está pendente.
</p>