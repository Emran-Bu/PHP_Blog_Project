<?php

    if (isset($_POST['add_post'])) {
        $PostMsg = $obj->addPost($_POST);
    }

?>

<h2>Add post page</h2>

<form class="form" action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label class="mb-1" for="post_title">Post Title</label>
        <input class="form-control py-3" type="text" name="post_title" id="post_title">
    </div>

    <div class="form-group">
        <label class="mb-1" for="post_content">Post Content</label>
        <textarea class="form-control" name="post_content" id="post_content" cols="30" rows="6"></textarea>
    </div>

    <div class="form-group">
        <label class="mb-1" for="post_img">Upload Thumbnail</label>
        <input class="form-control" type="file" name="post_img" id="post_img">
    </div>

    <div class="form-group">
        <label class="mb-1" for="post_category">Select Post Category</label>
        <select class='form-control' name="post_category" id="">

        <?php
            $getCat = $obj->displayCategory();
            while ($category=mysqli_fetch_assoc($getCat)) {?>
            <option value="<?= $category['cat_id'];?>"><?= $category['cat_name'];?></option>
        <?php } ?>
            
        </select>
    </div>

    <div class="form-group">
        <label class="mb-1" for="post_summary">Post Summary</label>
        <input class="form-control" type="text" name="post_summary" id="post_summary">
    </div>

    <div class="form-group">
        <label class="mb-1" for="post_tag">Post Tag</label>
        <input class="form-control" type="text" name="post_tag" id="post_tag">
    </div>

    <div class="form-group">
        <label class="mb-1" for="post_status">Post Status</label>

        <select class="form-control" name="post_status" id="post_status">
            <option value="1">Published</option>
            <option value="0">Unpublished</option>
        </select>
        
    </div>

    <input type="submit" value="Add Post" class="btn btn-primary btn-block" name="add_post">
</form>