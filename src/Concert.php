<?php
require_once 'src/HasMenu.php';
require_once 'src/Event.php';
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

}