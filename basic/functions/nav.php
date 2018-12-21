<?php

class nav
{
    public function items()
    {
        //checks if you are logged in
        if (isset($_SESSION['role'])) { ?>
            <form class="form" method='post'>
                <?php if ($_SESSION['role'] == 'assistant') { ?>
                    <div class="btn-group">
                        <a href='#' class='btn btn-dark dropdown-toggle'
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dashboard</a>
                        <div class="dropdown-menu">
                            <a href='../public/index.php?page=user_view' class='dropdown-item'>Co-workers list</a>
                            <a href='../public/index.php?page=client_view' class='dropdown-item'>Patient list</a>
                        </div>
                    </div>

                    <div class="btn-group">
                        <a href='#' class='btn btn-dark dropdown-toggle'
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Create user</a>
                        <div class="dropdown-menu">
                            <a href='../public/index.php?page=user_create' class='dropdown-item'>Create
                                co-worker</a>
                            <a href='../public/index.php?page=client_create' class='dropdown-item'>Create
                                patient</a>
                        </div>
                    </div>


                <?php } else { ?>
                    <a href='#' class='btn btn-dark'>Dashboard</a>
                <?php } ?>
                <!--This part is for everyone who's logged in-->
                <div class="btn-group">
                    <a href="#" class='btn btn-dark dropdown-toggle' data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['email'] ?></a>
                    <div class="dropdown-menu">
                        <button type="submit" name="logout" class="dropdown-item">Logout</button>
                    </div>
                </div>
            </form>
        <?php } else { ?>
            <br>
            <br>
        <?php }
    }

}

