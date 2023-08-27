<?php
require_once 'src/HasMenu.php';
require_once 'src/PricingContract.php';
require_once 'src/Event.php';
class Movie extends Event
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