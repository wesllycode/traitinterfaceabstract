<?php
require_once 'src/Concert.php';
require_once 'src/Movie.php';
require_once 'src/Play.php';

/**
 * Como pode perceber, eu instaciar as class e acesse o método getMenu.
 * Se visualizar as class, vai perceber que o método getMenu está repetido
 * em todas as class, quer dizer, se eu quiser mudar o nome do método, eu terei
 * mudar uma por uma nas classes.
 *
 * Para resolver esse problema, eu criei um trait e chamei dentro das classes.
 * Portanto, centralizei o método getMenu dentro da trait e quando precisar modificar algo
 * em vez de ir em class em class, eu vou apenas na class trait.
 *
 * Criei um construct na classes, para criar alguns itens, se observar, cada classe vai ter uma lista
 * de itens diferentes. Tenho mesmo método só que com valores diferentes para cada class.
 *
 * Mostrei como é possivel usar mais de uma trait. Como são componentes diferentes, um se trata
 * de menu e outro sobre asentos, por isso, criei duas traits, para não confundir.
 *
 * Ao criar uma class do tipo interface, eu posso apenas criar métodos, não pode criar propriedades
 * ou criar um corpo de função dentro do método.
 *
 * Uma trait não pode implementar uma interface. Contudo, uma trait pode ser usada para preencher uma interface.
 *
 * Criamos uma class Event, o detalhe de criar uma class pai evento para nossas classes filhas
 * e que alguem tem possibilidade de instancia-la e ela não referir a ninguém.
 */



$concert = new Concert();
print_r($concert->getMenu());

$movie = new Movie();
print_r($movie->getMenu());

$play = new Play();
print_r($play->getMenu());
print_r($play->getSeats());

// Aqui alguém pode instanciar e não referir a nenhum evento das classes filhas.
$event = new Event();