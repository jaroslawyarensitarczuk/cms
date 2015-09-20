<?php
namespace Core\View;

class View
{
    public function load($viewName)
    {
        require('View/'.$viewName.'.php');
    }
}