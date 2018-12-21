<?php
$permission = new rights();
$permission->notAllowed();

/*this will be executed when you press on the login button*/
if (isset($_POST['login'])) {
    $obj = new route();
    $obj->login();
}
?>

<div class="container bg-white col-3 pt-5" style="margin-top: 13%">
    <form method='post' class='col-10 offset-1'>
        <input type='email' class='form-control' required="required" placeholder='Username' name='username'>
        <input type='password' class='form-control' required="required" placeholder='Password' name='password'>
        <br>
        <div align='center'>
            <button type='submit' class='btn btn-dark' name='login'>Login</button>
        </div>
    </form>
    <br>
</div>