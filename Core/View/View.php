<?php
namespace Core\View;

class View
{
    public function load($viewName, $data = NULL)
    {
        if(is_array($data)) {
            extract($data);
        }
        require('View/'.$viewName.'.php');
    }
}