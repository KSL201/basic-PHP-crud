<?php

class route
{
    public function updateUser()
    {
        $result['id'] = $_GET['id'];

        if ($_GET['page'] == 'client_update') {
            $result['firstName'] = $_POST['firstName'];
            $result['lastName'] = $_POST['lastName'];
            $result['address'] = $_POST['address'];
            $result['email'] = $_POST['email'];
            $result['phoneNumber'] = $_POST['phoneNumber'];
            $result['age'] = $_POST['age'];
        } else {
            $result['email'] = $_POST['email'];
            /*checks if the password is unchanged or empty*/
            if ($_POST['password'] == $_POST['hash'] or empty($_POST['password'])) {
                $result['password'] = $_POST['password'];
            } else {
                /*hashing the password if the password */
                $hp = hash('sha256', $_POST['password']);
                $result['password'] = substr($hp, 0, 20);
            }
            $result['firstName'] = $_POST['firstName'];
            $result['lastName'] = $_POST['lastName'];
        }

        /*if all fields in the form are filled this code will be executed*/
        $obj = new user;
        $obj->update($result);
    }

    public function createUser()
    {
        /*if there is no role posted it means the application is going to make a customer
         which needs a different set of values to be created*/
        if (isset($_POST['role'])) {
            $result['email'] = $_POST['email'];
            $result['password'] = $_POST['password'];
            $result['role'] = $_POST['role'];
            $result['firstName'] = $_POST['firstName'];
            $result['lastName'] = $_POST['lastName'];
        } else {
            $result['firstName'] = $_POST['firstName'];
            $result['lastName'] = $_POST['lastName'];
            $result['address'] = $_POST['address'];
            $result['email'] = $_POST['email'];
            $result['phoneNumber'] = $_POST['phoneNumber'];
            $result['age'] = $_POST['age'];
        }

        $obj = new user;
        $obj->create($result);
    }

    public function login(){
        $email = $_POST['username'];
        $password = $_POST['password'];

        $obj = new login();
        $obj->login($email, $password);
    }
}

/*this will be executed when you press on the logout button*/
if (isset($_POST['logout'])) {

    $_SESSION = array();
    session_destroy();
    if (empty($_SESSION)) {
        header("location:../public/index.php?page=login");
    }
}

/*this will be executed when you press on the user_list page on a paper/pen icon */
if (isset($_POST['editUser'])) {
    $id = $_POST['id'];

    if ($_GET['page'] == 'client_view') {
        header("location:../public/index.php?page=client_update&id=$id");
    } else {
        header("location:../public/index.php?page=user_update&id=$id");
    }
}

/*this will be executed when you press on the user_list page on a bin icon*/
if (isset($_POST['deleteUser'])) {
    $id = $_POST['id'];

    $obj = new user();
    $obj->delete($id);
}

/*this will be executed when you press on the user_list page on a eye icon*/
if (isset($_POST['clientDashboard'])) {
    header("location:../public/index.php?page=dashboard&id=" . $_POST['id']);
}