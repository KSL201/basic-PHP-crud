<?php

class user
{
    private $dbh;

    public function __construct()
    {
        $this->dbh = new Connection();
        $this->dbh = $this->dbh->dbConnect();
    }

    public function readAllCustomers()
    {
        $query = 'SELECT * FROM customer';
        $stm = $this->dbh->prepare($query);
        $stm->execute();
        $result = $stm->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function readAllWorkers(){
        $query = 'SELECT * FROM user';
        $stm = $this->dbh->prepare($query);
        $stm->execute();
        $result = $stm->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function readAllMidwifes()
    {
        $midwife = '2';
        $query = 'SELECT * FROM user WHERE roleFk=?';
        $stm = $this->dbh->prepare($query);
        $stm->bindParam('1', $midwife);
        $stm->execute();
        $result = $stm->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function read($id)
    {
        /*choosing which table it has to use*/
        if ($_GET['page'] == 'client_update') {
            $query = 'SELECT * FROM customer WHERE id=?';
        } else {
            $query = 'SELECT * FROM user WHERE id=?';
        }

        $stm = $this->dbh->prepare($query);
        $stm->bindParam('1', $id);
        $stm->execute();

        $result = $stm->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function create($result)
    {
        /*if there is a role in $result then the application will create a assistant or co-worker else its creating a patient*/
        if (isset($result['role'])) {
            /*hashing the password*/
            $hp = hash('sha256', $result['password']);
            $result['password'] = substr($hp, 0, 20);

            $stm = $this->dbh->prepare('INSERT INTO user(email, password, roleFk, firstName, lastName) 
                                            VALUES (:email, :password, :roleFk, :firstName, :lastName)');
            $stm->bindParam('email', $result['email']);
            $stm->bindParam('password', $result['password']);
            $stm->bindParam('roleFk', $result['role']);
            $stm->bindParam('firstName', $result['firstName']);
            $stm->bindParam('lastName', $result['lastName']);
            $stm->execute();
            echo '<div class="alert alert-info" role="alert">User created</div>';
        } else {
            $stm = $this->dbh->prepare('INSERT INTO customer(firstName, lastName, address, email, phoneNumber, age) 
                                            VALUES (:firstName, :lastName, :address, :email, :phoneNumber, :age)');
            $stm->bindParam('firstName', $result['firstName']);
            $stm->bindParam('lastName', $result['lastName']);
            $stm->bindParam('address', $result['address']);
            $stm->bindParam('email', $result['email']);
            $stm->bindParam('phoneNumber', $result['phoneNumber']);
            $stm->bindParam('age', $result['age']);
            $stm->execute();
            echo '<div class="alert alert-info" role="alert">Patient created</div>';
        }
    }

    public function update($result)
    {
        /*if there is a role in $result then the application will create a assistant or co-worker else its creating a patient*/
        if ($_GET['page'] == 'user_update') {
            $stm = $this->dbh->prepare('UPDATE `user` SET `email`=?, `password`=?, `firstName`=?, `lastName`=? WHERE id=? ');
            $stm->bindParam('1', $result['email']);
            $stm->bindParam('2', $result['password']);
            $stm->bindParam('3', $result['firstName']);
            $stm->bindParam('4', $result['lastName']);
            $stm->bindParam('5', $result['id']);
            $stm->execute();
        } else {
            $stm = $this->dbh->prepare('UPDATE `customer` SET `firstName`=?, `lastName`=?, `address`=?, `email`=?, `phoneNumber`=?, `age`=? WHERE id=? ');
            $stm->bindParam('1', $result['firstName']);
            $stm->bindParam('2', $result['lastName']);
            $stm->bindParam('3', $result['address']);
            $stm->bindParam('4', $result['email']);
            $stm->bindParam('5', $result['phoneNumber']);
            $stm->bindParam('6', $result['age']);
            $stm->bindParam('7', $result['id']);
            $stm->execute();
        }
        echo '<div class="alert alert-info" role="alert">Info updated</div>';
    }

    public function delete($id)
    {
        /*choosing which table it has to use*/
        if ($_GET['page'] == 'client_view') {
            $query = 'DELETE FROM customer WHERE id=?';
        } else {
            $query = 'DELETE FROM user WHERE id=?';
        }

        $stm = $this->dbh->prepare($query);
        $stm->bindParam('1', $id);
        $stm->execute();
    }
}