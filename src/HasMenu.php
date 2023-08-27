<?php
trait HasMenu
{
    public array $itens = [];
    public function getMenu(): array
    {
        return $this->itens;
    }

    public function getPrice(){

    }
}