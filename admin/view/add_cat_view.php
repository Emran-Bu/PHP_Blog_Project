<?php

    if (isset($_POST['add_cat'])) {
        $returnCatMsg = $obj->addCategory($_POST);
    }

?>

<h2>Add category page</h2>

<?php if (isset($returnCatMsg)) {
    echo $returnCatMsg;
} 

if (isset($_SESSION['delMsg'])){
       unset($_SESSION['delMsg']);
}
?>

<form action="" method="post">
    <div class="form-group">
        <label class="mb-1" for="cat_name">Category Name</label>
        <input class="form-control py-3" type="text" name="cat_name" id="cat_name">
    </div>
    <div class="form-group">
        <label class="mb-1" for="cat_desc">Category Description</label>
        <input class="form-control py-3" type="text" name="cat_desc" id="cat_desc">
    </div>

    <input type="submit" value="Add Category" class="btn btn-primary btn-block" name="add_cat">
</form>
