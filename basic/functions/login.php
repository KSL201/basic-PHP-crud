<?php

class login
{
    private $dbh;

    public function __construct()
    {
        $this->dbh = new Connection();
        $this->dbh = $this->dbh->dbConnect();
    }

    public function login($email, $password)
    {
        if (!empty($email) && !empty($password)) {

            $hash = hash('sha256', $password);
            $password = substr($hash, 0, 20);

            $stm = $this->dbh->prepare('SELECT * FROM user WHERE email=? AND password=?');
            $stm->bindParam(1, $email);
            $stm->bindParam(2, $password);
            $stm->execute();

            if ($row = $stm->fetch(PDO::FETCH_ASSOC)) {
                if ($row['roleFk'] == '1') {
                    $_SESSION['userId'] = $row['id'];
                    $_SESSION['role'] = 'assistant';
                    $_SESSION['email'] = $row['email'];
                    header('location:../public/index.php?page=user_view');
                } else {
                    $_SESSION['userId'] = $row['id'];
                    $_SESSION['role'] = 'midwife';
                    $_SESSION['email'] = $row['email'];
                    header('location:../public/index.php?page=dashboard');
                }

            } else {
                echo '<div class="alert alert-info" role="alert">' . 'Incorrect username or password' . '</div>';
            }

        } else {
            echo '<div class="alert alert-info" role="alert">' . 'Please fill all fields' . '</div>';
        }
    }
}