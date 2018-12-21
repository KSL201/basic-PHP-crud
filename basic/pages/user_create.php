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
                <input class="form-control" type='email' name='email' required='required' placeholder='Email'><br>
                <input class="form-control" type='password' name='password' required='required'
                       placeholder='Password'><br>
                <input class="form-control" type='text' name='firstName' required='required'
                       placeholder='First name'><br>
                <input class="form-control" type='text' name='lastName' required='required' placeholder='Last name'><br>
                <select class="form-control" title="user type" name="role">
                    <option value="1">Assistant</option>
                    <option value="2">Midwife</option>
                </select>
                <br>
                <input type='submit' class='btn btn-dark col-12' name='addUser' value='Add user'>
            </div>
        </div>
    </form>
</div>