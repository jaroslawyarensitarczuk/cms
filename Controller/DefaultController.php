<?php
namespace Controller;

use Core\Controller;
use Core\Helpers;

class DefaultController extends Controller\Controller
{
    private $view;

    public function indexAction()
    {
        $this->view = parent::loadView();
        $data = ['page_title' => 'Domyślny kontroler'];

        $this->view->load('header', $data);
        $this->view->load('welcome');
        $this->view->load('footer');
    }
}