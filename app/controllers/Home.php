<?php

class Home
{
    public function __construct()
    {
        echo "I am constructor of " . __CLASS__ . " class<br>";
    }

    public function index()
    {
        echo "I am index method of " . __CLASS__ . " class<br>";
    }
}

?>