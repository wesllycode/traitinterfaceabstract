<?php
require_once 'src/HasMenu.php';
require_once 'src/HasAssigneSeats.php';
class Play
{
   use HasMenu, HasAssigneSeats;

    public function __construct()
    {
        $this->seats = [
          'WesllyCode',
          'Robert',
          'Mariana'
        ];

        $this->itens = [
            'Wine',
            'Champagne',
            'Gherkins'
        ];
    }

}