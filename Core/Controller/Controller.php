<?php
namespace Core\Controller;

use Core\View;

class Controller
{
    public function loadView()
    {
        return new View\View();
    }
}