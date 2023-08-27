<?php
require_once 'src/HasMenu.php';
class Concert
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


}