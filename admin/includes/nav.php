<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">

            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../public/index.php">Home</a>
            </div>
            <ul class="nav navbar-right top-nav">
                <li class="admin_msg">




                    <a href="admin_messages.php" class="dropdown-toggle"><i class="fa fa-envelope"></i> </a>

                </li>
                <li class="admin_msg">




                    <a href="index.php?logout">
                        <div class="logout-container">
                            <i class="fa-solid fa-arrow-right-from-bracket"></i>
                        </div>
                    </a>

                </li>


            </ul>

                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav side-nav">
                        <li>
                            <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                        </li>




                        <li>
                            <a href="javascript:;" data-toggle="collapse" data-target="#demo5"><i class="fa fa-fw fa-users"></i> Users <i class="fa fa-fw fa-caret-down"></i></a>
                            <ul id="demo5" class="collapse">
                                <li>
                                    <a href="users.php">See all users</a>
                                </li>
                                <li>
                                    <a href="users.php?source=add_users">Add users</a>
                                </li>
                            </ul>
                        </li>


                    </ul>
                </div>
</nav>