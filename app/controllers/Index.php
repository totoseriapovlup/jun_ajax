<?php


namespace app\controllers;


use app\core\controllerable;
use app\core\View;

class Index implements controllerable
{
    /**
     * @var View
     */
    protected View $view;

    /**
     * Index constructor.
     */
    public function __construct()
    {
        $this->view = new View();
    }

    /**
     * index action
     */
    public function index()
    {
        $this->view->render('index');
    }

}