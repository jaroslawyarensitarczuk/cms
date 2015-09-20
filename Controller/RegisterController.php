<?php
namespace Controller;

use Core\Controller;

class RegisterController extends Controller\Controller
{
    public $view;

    public static function indexAction()
    {
        $this->view = parent::loadView();
        $this->view->load('header');
        $this->view->load('register');
        $this->view->load('footer');
    }

    public function registerAction()
    {
        $this->indexAction();
    }
}