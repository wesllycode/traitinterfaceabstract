<?php
require_once 'src/HasMenu.php';
class Movie implements PricingContract
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