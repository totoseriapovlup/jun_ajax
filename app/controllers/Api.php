<?php


namespace app\controllers;


use app\models\Note;

class Api implements \app\core\controllerable
{
    /**
     * @var Note
     */
    protected Note $model;

    /**
     * Api constructor.
     */
    public function __construct()
    {
        $this->model = new Note();
    }

    /**
     * get all notes
     */
    public function index()
    {
        // TODO: Implement index() method.
    }

    /**
     * store new note
     * @throws \app\exceptions\BadQueryException
     */
    public function store()
    {
        $note = [];
        $note['title'] = htmlspecialchars(filter_input(INPUT_POST, 'note'));
        //TODO validate
        $this->model->add($note);
        http_response_code(201);
    }
}