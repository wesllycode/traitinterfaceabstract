<?php
require_once 'src/HasMenu.php';
class Movie
{
    use HasMenu;

    public function __construct()
    {
        $this->itens = [
          'Heineken',
          'Skol'
        ];
    }
}