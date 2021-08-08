    <?php
        ob_start();

        include_once('include/head.php');

        include('class/function.php');

        $obj = new adminBlog();
        
        session_start();

        $id = $_SESSION['adminID'];

        if ($id == null) {
            header('location:index.php');
        }

        if (isset($_GET['adminlogout'])) {
            if ($_GET['adminlogout'] == 'logout') {
                $obj->adminLogout();
            }
        }
        
    ?>
    <body class="sb-nav-fixed">
        <?php include_once('include/topnav.php') ?>
        <div id="layoutSidenav">
        <?php include_once('include/sidenav.php') ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <?php
                            
                            if (isset($view)) {
                                if ($view == 'dashboard') {
                                    include_once('view/dash_view.php');
                                } elseif ($view == 'add_category') {
                                    include_once('view/add_cat_view.php');
                                } elseif ($view == 'add_post') {
                                    include_once('view/add_post_view.php');
                                } elseif ($view == 'manage_category') {
                                    include_once('view/manage_cat_view.php');
                                }  elseif ($view == 'manage_post') {
                                    include_once('view/manage_post_view.php');
                                } elseif ($view == 'edit_category') {
                                    include_once('view/update_category.php');
                                } elseif ($view == 'update_post') {
                                    include_once('view/update_post.php');
                                }
                            }
                        ?>
                    </div>
                </main>
                <?php include_once('include/footer.php') ?>
            </div>
        </div>
        <?php include_once('include/script.php') ?>
    </body>
</html>
