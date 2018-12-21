<?php

class Connection
{
    public function dbConnect()
    {
            $username = 'root';
            $password = '';
            $dsn = 'mysql:host=localhost; dbname=examen';
            $conn = new PDO($dsn, $username, $password);

            return $conn;
    }
}