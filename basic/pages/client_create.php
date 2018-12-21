<?php
$permission = new rights();
$permission->allowed();
$permission->assistantOnly();

/*this will be executed when you press on create user*/
if (isset($_POST['addUser'])) {
    $obj = new route();
    $obj->createUser();
}
?>

<div class="container">
    <form method='post' class="pt-3 pb-3">
        <div class="row">
            <div class="col-md-3">
                <input class="form-control" type='text' name='firstName' required='required'
                       placeholder='First name'><br>
                <input class="form-control" type='text' name='lastName' required='required' placeholder='Last name'><br>
                <input class="form-control" type='text' name='address' required='required' placeholder='Address'><br>
                <input class="form-control" type='email' name='email' required='required' placeholder='Email'><br>
                <input class="form-control" type='tel' name='phoneNumber' required='required' maxlength='10' placeholder='Phone number'><br>
                <input class="form-control" type='number' maxlength="3" name='age' required='required' placeholder='Age'><br>
                <input type='submit' class='btn btn-dark col-12' name='addUser' value='Add patient'>
            </div>
        </div>
    </form>
</div>