<?php

/**
 * Como pode perceber, eu instaciar as class e acesse o método getMenu.
 * Se visualizar as class, vai perceber que o método getMenu está repetido
 * em todas as class, quer dizer, se eu quiser mudar o nome do método, eu terei
 * mudar uma por uma nas classes.
 *
 * Para resolver esse problema, eu criei um trait e chamei dentro das classes.
 * Portanto, centralizei o método getMenu dentro da trait e quando precisar modificar algo
 * em vez de ir em class em class, eu vou apenas na class trait.
 */

$concert = new Concert();
$concert->getMenu();

$movie = new Movie();
$movie->getMenu();

$play = new Play();
$play->getMenu();