<?php

    if (isset($_POST['Update_post'])) {
        $returnUpdate = $obj->updatePost($_POST);
    }

    if (isset($_GET['edit'])) {
        $editData = $obj->editPostbyid($_GET['edit']);
        if (mysqli_num_rows($editData)>0) {
            $postData = mysqli_fetch_assoc($editData);

?>

<h2>Update post page</h2>

<form class="form" action="" method="post" enctype="multipart/form-data">
    <input class="form-control py-3" type="hidden" name="post_id" id="post_id" value="<?= $postData['post_id']?>">
    <div class="form-group">
        <label class="mb-1" for="post_title">Post Title</label>
        <input class="form-control py-3" type="text" name="post_title" id="post_title" value="<?= $postData['post_title']?>">
    </div>

    <div class="form-group">
        <label class="mb-1" for="post_content">Post Content</label>
        <textarea class="form-control" name="post_content" id="post_content" cols="30" rows="6">
        <?= $postData['post_content']?>
        </textarea>
    </div>

    <div class="form-group">
        <label class="mb-1" for="post_img">Upload Thumbnail</label>
        <input class="form-control" type="file" name="post_img" id="post_img">
        <input class="form-control" type="hidden" name="old_img" id="post_img" value="<?= $postData['post_img']?>">
        <img class="mt-1" width="80px" src="../upload/<?= $postData['post_img']?>" alt="">
    </div>

    <div class="form-group">
        <label class="mb-1" for="post_category">Select Post Category</label>
        <select class='form-control' name="post_category" id="">

        <?php
            $getCat = $obj->displayCategory();
            while ($category=mysqli_fetch_assoc($getCat)) {
                if ($postData['post_ctg'] == $category['cat_id']) {
                    $select = "selected";
                } else {
                    $select="";
                }
            ?>
            <option <?= $select ?> value="<?= $category['cat_id'];?>"><?= $category['cat_name'];?></option>
        <?php } ?>
            
        </select>
    </div>

    <div class="form-group">
        <label class="mb-1" for="post_summary">Post Summary</label>
        <input class="form-control" type="text" name="post_summary" id="post_summary" value="<?= $postData['post_summary']?>">
    </div>

    <div class="form-group">
        <label class="mb-1" for="post_tag">Post Tag</label>
        <input class="form-control" type="text" name="post_tag" id="post_tag" value="<?= $postData['post_tag']?>">
    </div>

    <div class="form-group">
        <label class="mb-1" for="post_status">Post Status</label>

        <select class="form-control" name="post_status" id="post_status">
            <option <?= $postData['post_status'] == 1? "selected" : ""; ?> value="1">Published</option>
            <option <?= $postData['post_status'] == 0? "selected" : ""; ?> value="0">Unpublished</option>
        </select>
        
    </div>

    <input type="submit" value="Update Post" class="btn btn-primary btn-block" name="Update_post">
</form>
<?php 
        } else {
            echo"<h1>don't try to edit address bar</h1>";
        }
    }

?>