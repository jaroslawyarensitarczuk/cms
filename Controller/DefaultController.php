<?php
namespace Controller;

use Core\Controller;

class DefaultController extends Controller\Controller
{
    public $view;

    public function indexAction()
    {
        $this->view = parent::loadView();
        $this->view->load('header');
        $this->view->load('welcome');
        $this->view->load('footer');
    }
}