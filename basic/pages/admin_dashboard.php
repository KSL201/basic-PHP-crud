<?php
if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {

} else {
    header('location:../public/index.php?page=dashboard');
}

/*get all info about users*/
$data = new user;
$obj = $data->readAll();

?>
<script>
    /*this regulates the pagination and search functions of the table*/
    $(document).ready(function () {
        $('#dashboardTable').DataTable();
    });
</script>

<div class="container bg-white">
    <table id="dashboardTable" class="table">
        <thead>
        <tr>
            <th class="text-center">Username</th>
            <th class="text-center">First name</th>
            <th class="text-center">Last name</th>
            <th class="text-center">User type</th>
            <th class="text-center">Action</th>
        </tr>
        </thead>

        <tbody>
        <?php
        if (!empty($obj)) {
            foreach ($obj as $array) {
                ?>
                <tr align="center">
                    <?php
                    echo '<td>' . $array->username . '</td>';
                    echo '<td>' . $array->firstname . '</td>';
                    echo '<td>' . $array->lastname . '</td>';
                    echo '<td>' . $array->role . '</td>';
                    ?>
                    <td align="center">
                        <form method='post'>
                            <input type='hidden' name='id' value='<?php echo $array->userID; ?>'>
                            <button type='submit' class='btn btn-dark' name='clientDashboard'><i class="far fa-eye"
                                                                                                 style="color:dodgerblue"></i>
                            </button>
                            <button type='submit' class='btn btn-dark' name='editUser'><i class="far fa-edit"
                                                                                          style="color:dodgerblue"></i>
                            </button>
                            <button type='submit' class='btn btn-dark' name='deleteUser'><i
                                        class="far fa-trash-alt" style="color:dodgerblue"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                <?php
            }
        }
        ?>

        </tbody>
    </table>
</div>

