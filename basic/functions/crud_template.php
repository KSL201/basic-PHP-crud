<?php

class name
{
    private $dbh;

    public function __construct()
    {
        $this->dbh = new Connection();
        $this->dbh = $this->dbh->dbConnect();
    }

    public function read(){
        /*select all data of a single ...*/
    }

    public function readAll(){
        /*select all ...*/
    }

    public function create(){
        /*insert a new ...*/
    }

    public function update(){
        /*update a ...*/
    }

    public function delete(){
        /*delete a ...*/
    }
}