<?php
namespace Core\Controller;

use Core\View;

class Controller
{
    protected function loadView()
    {
        return new View\View();
    }
}