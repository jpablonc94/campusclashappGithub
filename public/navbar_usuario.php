    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="welcome.php#page-top">CampusCLASH</a>
            </div> 
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="page-scroll" href="welcome.php#page-top">Home</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Secciones <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="tienda.php">Tienda</a></li>
                            <li><a href="#">Tablón de anuncios</a></li>
                            <li><a href="ranking.php">Clasificación</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="page-scroll" href="welcome.php#about">About</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="welcome.php#contact">Contact</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-user"></i>
                            <?php 
                                echo $row['username']; 
                            ?>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="profile.php"><i class="fa fa-fw fa-user"></i>Profile</a>
                            </li>
                            <li>
                                <a href="settings.php"><i class="fa fa-fw fa-gear"></i> Settings</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                            </li>
                        </ul>
                    </li>                       
                    <!-- </div> -->
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <br>
                    <li>
                        <a href="profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                    </li>
                    <li>
                        <a href="settings.php"><i class="fa fa-fw fa-gear"></i> Settings</a>
                    </li>
                    <?php 
             
                                if($_SESSION['session_rol']=="alumno"){
                                    $href3 = "#";
                                    $class3 = "fa fa-fw fa-shopping-cart";
                                    $puntuaciones="
                                    <li>
                                        <a href='$href1'><i class=$class1></i> Nuevo Producto</a>
                                    </li>
                                    <li>
                                        <a href='$href2'><i class='$class2'></i> Tus Productos</a>
                                    </li> 
                                    <li>
                                        <a href='$href3'><i class='$class3'></i> Tus Compras</a>
                                    </li>";
                                    echo $puntuaciones;

                                } else if($_SESSION['session_rol']=="profesor"){
                                    $href1 = "mis_asignaturas.php";
                                    $class1 ="fa fa-fw fa-plus";
                                    $href2 = "nuevo_premio.php";
                                    $class2 = "fa fa-fw fa-database";
                                    $puntuaciones="
                                    <li>
                                        <a href='$href1'><i class='$class2'></i> Mis asignaturas</a>
                                    </li>
                                    <li>
                                        <a href='$href2'><i class='$class1'></i> Añadir Premio</a>
                                    </li>"; 
                                    echo $puntuaciones;
                                } else {
                                    $href1 = "vendedor.php";
                                    $class1 ="fa fa-fw fa-plus";
                                    $href2 = "productos.php";
                                    $class2 = "fa fa-fw fa-database";
                                    $puntuaciones="
                                    <li>
                                        <a href='$href1'><i class=$class1></i> Añadir Producto</a>
                                    </li>
                                    <li>
                                        <a href='$href2'><i class='$class2'></i> Tus Productos</a>
                                    </li>"; 
                                    echo $puntuaciones;
                                }
                    ?>                  
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>