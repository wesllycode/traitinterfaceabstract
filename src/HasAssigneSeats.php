<?php
trait HasAssigneSeats
{
    public array $seats = [];

    public function getSeats(): array
    {
        return $this->seats;
    }
}