<?php
namespace Controller;

use Core\Controller;

class RegisterController extends Controller\Controller
{
    public $view;

    public function indexAction()
    {
        $this->view = parent::loadView();
        $data = ['page_title' => 'Rejestracja'];
        $this->view->load('header', $data);
        $this->view->load('register');
        $this->view->load('footer');
    }

    public function registerAction()
    {
        $this->indexAction();
    }
}