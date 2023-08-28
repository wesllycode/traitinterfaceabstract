<?php
require_once 'src/HasMenu.php';
require_once 'src/PricingContract.php';
require_once 'src/Event.php';
require_once 'src/SeatingContract.php';
require_once 'src/HasAssigneSeats.php';
class Movie extends Event implements SeatingContract
{
    use HasMenu;
    use HasAssigneSeats;

    public function __construct()
    {
        $this->itens = [
          'Heineken',
          'Skol'
        ];
    }
}