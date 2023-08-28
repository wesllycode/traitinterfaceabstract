<?php
require_once 'src/HasMenu.php';
require_once 'src/Event.php';
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