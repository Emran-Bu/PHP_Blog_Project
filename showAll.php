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


    <section class="blog-posts">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <?php



                        $public_post = $obj->showAll($_GET['id']);
                    
                    ?>

                    <div class="all-blog-posts">
                        <div class="row">
                            <?php 
                                    while($postValue = mysqli_fetch_assoc($public_post)){
                            ?>
                            <div class="col-lg-12 mt-3">
                                <div class="blog-post">
                                    <div class="blog-thumb">
                                        <img src="upload/<?= $postValue['post_img']?>" alt="">
                                    </div>
                                    <div class="down-content">
                                        <span><?= $postValue['cat_name'] ?></span>
                                        <h4><a href="single_post.php?view=postview&&id=<?= $postValue['post_id'] ?>">
                                                <?= $postValue['post_title'] ?>
                                            </a></h4>
                                        <ul class="post-info">
                                            <li><a href="#"><?= $postValue['post_author'] ?></a></li>
                                            <li><a href="#"><?= $postValue['post_date'] ?></a></li>
                                            <li><a href="#"><?= $postValue['post_comment_count'] ?></a></li>
                                        </ul>
                                        <p><?= $postValue['post_content'] ?></p>
                                        <div class="post-options">
                                            <div class="row">
                                                <div class="col-6">
                                                    <ul class="post-tags">
                                                        <li><i class="fa fa-tags"></i></li>
                                                        <li><a href="#"><a href="#"><?= $postValue['post_tag'] ?></a>,
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-6">
                                                    <ul class="post-share">
                                                        <li><i class="fa fa-share-alt"></i></li>
                                                        <li><a href="#">Facebook</a>,</li>
                                                        <li><a href="#"> Twitter</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <?php include_once('include/sidebar.php') ?>
            </div>
        </div>
    </section>

    <?php include_once('include/footer.php') ?>


    <?php include_once('include/script.php') ?>

</body>

</html>