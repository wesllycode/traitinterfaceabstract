<?php
require_once 'src/HasMenu.php';
require_once 'src/HasAssigneSeats.php';
class Play
{
   use HasMenu;

    public function __construct()
    {
        $this->itens = [
            'Wine',
            'Champagne',
            'Gherkins'
        ];
    }

}