<?php
    if (isset($_GET['status'])) {
        if ($_GET['status'] == 'edit') {
            $editid = $_GET['editid'];

            $returnData = $obj->displayCategorybyid($editid);

        }
    }

    if (isset($_POST['update_cat'])) {
        $updateMsg = $obj->updateCategory($_POST);
    }

?>
<h2>Update Category</h2>

<form action="" method="post">
    <div class="form-group">
        <input class="form-control py-3" type="hidden" name="u_cat_id" id="cat_id" value="<?php echo $returnData['cat_id'] ?>">

        <label class="mb-1" for="cat_name">Category Name</label>
        <input class="form-control py-3" type="text" name="u_cat_name" id="cat_name" value="<?php echo $returnData['cat_name'] ?>">
    </div>
    <div class="form-group">
        <label class="mb-1" for="cat_desc">Category Description</label>
        <input class="form-control py-3" type="text" name="u_cat_desc" id="cat_desc" value="<?php echo $returnData['cat_desc'] ?>">
    </div>

    <input type="submit" value="Update Category" class="btn btn-primary btn-block" name="update_cat">
</form>