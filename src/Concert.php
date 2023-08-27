<?php
require_once 'src/HasMenu.php';
require_once 'src/EVent.php';
class Concert extends Event
{
    use HasMenu;

    public function __construct()
    {
        $this->itens = [
          'Beer',
          'Ale',
          'Nachos'
        ];
    }

    public function getPrice()
    {
        return 'R$12,00'.PHP_EOL;
    }


}