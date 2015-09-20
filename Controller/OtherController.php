<?php
namespace Controller;

use Core\Controller;

class OtherController extends Controller\Controller
{
    public function indexAction()
    {
        echo '<strong>Kontroler: </strong>'.__CLASS__.'<br/>';
        echo '<strong>Metoda: </strong>'.__METHOD__.'<br/>';
        echo '<strong>Przestrzeń nazw: </strong>'.__NAMESPACE__.'<br/>';
    }
}


