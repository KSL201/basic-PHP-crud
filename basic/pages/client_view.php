<?php
$permission = new rights();
$permission->allowed();
$permission->assistantOnly();

/*get all info about clients*/
$data = new user;
$obj = $data->readAllCustomers();

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
            <th class="text-center">Email</th>
            <th class="text-center">First name</th>
            <th class="text-center">Last name</th>
            <th class="text-center">Age</th>
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
                    echo '<td>' . $array->email . '</td>';
                    echo '<td>' . $array->firstName . '</td>';
                    echo '<td>' . $array->lastName . '</td>';
                    echo '<td>' . $array->age . '</td>';
                    ?>
                    <td align="center">
                        <form method='post'>
                            <input type='hidden' name='id' value='<?php echo $array->id; ?>'>
                            <button type='submit' class='btn btn-dark' name='editUser'><i class="far fa-edit"></i>
                            </button>
                            <button type='submit' class='btn btn-dark' name='deleteUser'><i
                                    class="far fa-trash-alt"></i>
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

