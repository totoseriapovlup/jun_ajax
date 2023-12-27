<?php


namespace app\controllers;


use app\core\Response;
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
        $notes = $this->model->all();
        $response = new Response();
        $response->json($notes);
    }

    /**
     * store new note
     * @throws \app\exceptions\BadQueryException
     */
    public function store()
    {
        $note = [];
        $note['title'] = htmlspecialchars(filter_input(INPUT_POST, 'note'));
        $response = new Response();
        if(empty($note['title'])){
            $response->status(400);
            $response->json(['error'=>'title is empty']);
        }else{
            $this->model->add($note);
            $response->status(201);
        }
    }
}