<?php
require_once 'src/HasMenu.php';
require_once 'src/Event.php';
require_once 'src/HasAssigneSeats.php';
require_once 'src/PricingContract.php';
require_once 'src/SeatingContract.php';
class Concert extends Event implements PricingContract, SeatingContract
{
    use HasMenu;
    use HasAssigneSeats;

    public function __construct()
    {
        $this->itens = [
          'Beer',
          'Ale',
          'Nachos'
        ];
    }

}