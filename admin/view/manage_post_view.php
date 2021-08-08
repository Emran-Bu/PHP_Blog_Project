<?php

    if (isset($_GET['delete'])) {
        $obj->deletePost($_GET['delete']);
    }

?>
<h2>Manage post page</h2>

<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Content</th>
                <th>Thumb</th>
                <th>Author</th>
                <th>Date</th>
                <th>Category</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            <?php
                $postMsg = $obj->displayPost();
                while ($postValue = mysqli_fetch_assoc($postMsg)) {
            ?>
            <tr>
                <td><?= $postValue['post_id'] ?></td>
                <td><?= $postValue['post_title'] ?></td>
                <td><?= $postValue['post_content'] ?></td>
                <td><img src="../upload/<?= $postValue['post_img'] ?>" alt="" height="50px" width="50px"></td>
                <td><?= $postValue['post_author'] ?></td>
                <td><?= $postValue['post_date'] ?></td>
                <td><?= $postValue['cat_name'] ?></td>
                <td>
                    <?php
                        if ($postValue['post_status']==1) {
                            echo "Published";
                        } elseif ($postValue['post_status']==0) {
                            echo "Unpublished";
                        }
                    ?>
                </td>
                <td>
                    <a class="btn btn-primary" href="edit_post.php?edit=<?= $postValue['post_id'] ?>">Edit</a>
                    <a class="btn btn-danger" href="?delete=<?= $postValue['post_id'] ?>">Delete</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>