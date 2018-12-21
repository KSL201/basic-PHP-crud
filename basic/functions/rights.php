<?php

class rights
{
    public function assistantOnly(){
        if (isset($_SESSION['role']) && $_SESSION['role'] == 'assistant') {

        } else {
            header('location:../public/index.php?page=dashboard');
        }

    }

    public function allowed(){
        if (isset($_SESSION['role'])) {

        } else {
            header('location:../public/index.php?page=login');
        }
    }

    public function notAllowed(){
        if (!isset($_SESSION['role'])) {

        } else {
            header('location:../public/index.php?page=user_view');
        }
    }
}