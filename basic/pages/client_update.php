<?php
$permission = new rights();
$permission->allowed();
$permission->assistantOnly();

$id = $_GET['id'];

//when you submit the form here below this piece of code will be executed
if (isset($_POST['updateUser'])){
    $obj = new route();
    $obj->updateUser();
}

$obj = new user;
$data = $obj->read($id);
if (empty($data)) {
    echo 'No user with id: ' . $id . ' was found';
} else { ?>
    <div class="container">
        <form method='post' class="pt-3 pb-3">
            <div class="row">
                <div class="col-md-5">
                    <input class="form-control" type="text" name="firstName" placeholder="First name"
                           required="required"
                           value="<?php echo $data['0']->firstName ?>"><br>
                    <input class="form-control" type='text' name='lastName' placeholder='Last name' required="required"
                           value="<?php echo $data['0']->lastName ?>"><br>
                    <input class="form-control" type='text' name='address' placeholder='Address' required="required"
                           value="<?php echo $data['0']->address ?>"><br>
                    <input class="form-control" type='text' name='email' placeholder='Email' required="required"
                           value="<?php echo $data['0']->email ?>"><br>
                    <input class="form-control" type='text' name='phoneNumber' placeholder='Phone number' required="required"
                           value="<?php echo $data['0']->phoneNumber ?>"><br>
                    <input class="form-control" type='text' name='age' placeholder='Age' required="required"
                           value="<?php echo $data['0']->age ?>"><br>

                    <input type='submit' class='btn btn-dark col-12' name='updateUser' value='Change information'>
                </div>
            </div>
        </form>
    </div>
<?php } ?>