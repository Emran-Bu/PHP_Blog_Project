<?php 
    include('admin/class/function.php');
    $obj = new adminBlog();

    $getCat = $obj->displayCategory();
    
?>

<?php include_once('include/head.php') ?>

  <body>

    <?php include_once('include/preloader.php') ?>
    <?php include_once('include/header.php') ?>

    <!-- Page Content -->
    <?php include_once('include/banner.php') ?>
    <?php include_once('include/cta.php') ?>


    <section class="blog-posts">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <?php include_once('include/blogpost.php') ?>
          </div>
            <?php include_once('include/sidebar.php') ?>
        </div>
      </div>
    </section>

    <?php include_once('include/footer.php') ?>


    <?php include_once('include/script.php') ?>

  </body>
</html>