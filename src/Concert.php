<?php
require_once 'src/HasMenu.php';
class Concert implements PricingContract
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
        // TODO: Implement getPrice() method.
    }


}