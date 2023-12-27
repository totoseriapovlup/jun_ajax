<?php

namespace app\models;

use app\exceptions\BadQueryException;

class Note
{
    /**
     * @var \mysqli
     */
    protected \mysqli $db;

    /**
     * Note constructor.
     */
    public function __construct()
    {
        $this->db = new \mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    }

    /**
     * add new note to db
     * @param array $note
     * @throws BadQueryException
     */
    public function add(array $note)
    {
        $sql = "INSERT INTO notes (title) VALUES ('{$note['title']}')";
        $result = $this->db->query($sql);
        if (!$result) {
            throw new BadQueryException($this->db->error);
        }
    }

}