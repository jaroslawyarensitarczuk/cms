<?php
namespace Core\View;

class View
{
    public function load($viewName, $data = null)
    {
        if(is_array($data)) {
            extract($data);
        }
        require('View/'.$viewName.'.php');
    }
}