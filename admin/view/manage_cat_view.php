<?php

    $catdata = $obj->displayCategory();

    if (isset($_GET['categorydelete'])) {
        if ($_GET['categorydelete'] = 'delete') {
            $deleteCat = $_GET['delid'];
            $delCatMsg = $obj->deleteCategory($deleteCat);
            
        }
    }

?>

<h2>Manage category page</h2>

<?php

    if (isset($_SESSION['delMsg'])) {
        echo  $_SESSION['delMsg'];
    }

?>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Category Name</th>
            <th>Category Description</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    <?php while ($cat = mysqli_fetch_assoc($catdata)){?>
        <tr>
            <td><?php echo $cat['cat_id']; ?></td>
            <td><?php echo $cat['cat_name']; ?></td>
            <td><?php echo $cat['cat_desc']; ?></td>
            <td>
                <a class="btn btn-primary" href="edit_category.php?status=edit&&editid=<?php echo $cat['cat_id']; ?>">Edit</a>
                <a class="btn btn-danger" href="?categorydelete=delete&&delid=<?php echo $cat['cat_id']; ?>">Delete</a>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>

<?php 
