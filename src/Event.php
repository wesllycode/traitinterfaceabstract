<?php
abstract class Event {
    abstract public function getPrice();

    public function chargeCard() : void
    {
        // My Logic here
    }
}