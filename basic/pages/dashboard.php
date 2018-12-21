<?php
$permission = new rights();
$permission->allowed();

if ($_SESSION['role'] == 'assistant'){
    $id = $_GET['id'];
}else{
    $id = $_SESSION['userId'];
}
echo $id;

$obj = new user();
$data = $obj->read($id);
var_dump($data['0']->roleFk);
$file = $_GET['page'];
?>
<div class="container bg-white">

</div>