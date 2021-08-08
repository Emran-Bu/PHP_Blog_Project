<?php

    class adminBlog{
        private $conn;

        public function __construct(){

            $dbhost = 'localhost';
            $dbuser = 'root';
            $dbpass = '';
            $dbname = 'blog-project';

            $this->conn=mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

            if (!$this->conn) {
                die("Database Connection Error");
            }
        }

        public function adminLogin($data){
            $admin_email = $data['admin_email'];
            $admin_pass = md5($data['admin_pass']);
    
            $query = "SELECT * from admin_info where admin_email = '$admin_email' && admin_pass = '$admin_pass'";
    
            if (mysqli_query($this->conn, $query)) {
                $admin_info = mysqli_query($this->conn, $query);
    
                if ($admin_info) {
                    header("location:dashboard.php");

                    $admin_data = mysqli_fetch_assoc($admin_info);

                    session_start();

                    $_SESSION['adminID'] = $admin_data['id'];
                    $_SESSION['adminName'] = $admin_data['admin_name'];
                }
            }
        }

        public function adminLogout(){
            unset($_SESSION['adminID']);
            unset($_SESSION['adminName']);

            header('location:index.php');
        }

        public function addCategory($data){
            $cat_name = $data['cat_name'];
            $cat_desc = $data['cat_desc'];

            $query = "INSERT Into category(cat_name, cat_desc) values('$cat_name','$cat_desc')";

            if (mysqli_query($this->conn, $query)) {
                header('location: manage_category.php');
                return "category added successfully";
            }
        }

        public function displayCategory(){

            $query = "SELECT * From category";

            if (mysqli_query($this->conn, $query)) {

                $category = mysqli_query($this->conn, $query);
                return $category;
            }
        }

        public function deleteCategory($deleteCat){

            $query = "DELETE From category where cat_id = $deleteCat";

            if (mysqli_query($this->conn, $query)) {
                session_start();
                $_SESSION['delMsg'] = 'category deleted successfully';
                
                header('location: manage_category.php');
                return 'category deleted successfully';
                
            }
        }

        public function displayCategorybyid($editid){

            $query = "SELECT * From category where cat_id = $editid";

            if (mysqli_query($this->conn, $query)) {

                $returnData = mysqli_query($this->conn, $query);
                $categoryData = mysqli_fetch_assoc($returnData);
                return $categoryData;
            }
        }

        public function updateCategory($data){
            $u_cat_id = $data['u_cat_id'];
            $u_cat_name = $data['u_cat_name'];
            $u_cat_desc = $data['u_cat_desc'];

            $query = "UPDATE category SET cat_name='$u_cat_name',cat_desc='$u_cat_desc' WHERE cat_id = $u_cat_id";

            if (mysqli_query($this->conn, $query)) {
                header('location: manage_category.php');
                return 'category Update successfully';
            }
        }

        // admin post add function

        public function addPost($data){
            $post_title = $data['post_title'];
            $post_content = $data['post_content'];
            $post_img = $_FILES['post_img']['name'];
            $post_img_tmp = $_FILES['post_img']['tmp_name'];
            $post_category = $data['post_category'];
            $post_summary = $data['post_summary'];
            $post_tag = $data['post_tag'];
            $post_status = $data['post_status'];

            $query = "INSERT Into posts(post_title, post_content, post_img, post_ctg, post_author, post_date, post_comment_count, post_summary, post_tag, post_status) values('$post_title','$post_content','$post_img',$post_category,'Admin', now(), 3, '$post_summary', '$post_tag', '$post_status')";

            if (mysqli_query($this->conn, $query)) {
                move_uploaded_file($post_img_tmp, '../upload/'. $post_img);
                header('location: manage_post.php');
            }
        }

        // admin post view function

        public function displayPost(){
            $query = "SELECT * FROM post_with_ctg";
            if (mysqli_query($this->conn, $query)) {
                $posts = mysqli_query($this->conn, $query);

                return $posts;
            }
        }

        // admin post view function Public

        public function displayPost_Public(){
            $query = "SELECT * FROM post_with_ctg where post_status = 1";
            if (mysqli_query($this->conn, $query)) {
                $posts = mysqli_query($this->conn, $query);

                return $posts;
            }
        }

        public function get_post_info($id){
            $query = "SELECT * FROM post_with_ctg where post_id = $id";
            if (mysqli_query($this->conn, $query)) {
                $posts_info = mysqli_query($this->conn, $query);
                $post = mysqli_fetch_assoc($posts_info);

                return $post;
            }
        }

        // admin post edit function

        public function editPostbyid($id){
            $query = "SELECT * FROM posts where post_id = $id";
            if (mysqli_query($this->conn, $query)) {

                $edit_posts = mysqli_query($this->conn, $query);

                // $postData = mysqli_fetch_assoc($edit_posts);
                return $edit_posts;
            }
        }

        // admin post update function Public

        public function updatePost($data){
            if (empty($_FILES['post_img']['name'])) {
                $post_id = $data['post_id'];
                $post_title = $data['post_title'];
                $post_content = $data['post_content'];
                // $post_img = $_FILES['post_img']['name'];
                // $post_img_tmp = $_FILES['post_img']['tmp_name'];
                $post_category = $data['post_category'];
                $post_summary = $data['post_summary'];
                $post_tag = $data['post_tag'];
                $post_status = $data['post_status'];

                $query = "UPDATE posts SET post_title='$post_title',post_content='$post_content',post_ctg=$post_category,post_summary='$post_summary',post_tag='$post_tag',post_status=$post_status WHERE post_id = $post_id";

                if (mysqli_query($this->conn, $query)) {
                    // move_uploaded_file($post_img_tmp, '../upload/'. $post_img);
                    header('location: manage_post.php');
                    return 'category Update successfully';
                }
            } else {

                    $post_id = $data['post_id'];
                    $datas = $_GET['edit'];

                    $sql = "SELECT * from posts where post_id = $datas";
                    $query = mysqli_query($this->conn, $sql);
                    $img_info = mysqli_fetch_assoc($query);
                    unlink('../upload/'.$img_info['post_img']);

                    $post_title = $data['post_title'];
                    $post_content = $data['post_content'];
                    $post_img = $_FILES['post_img']['name'];
                    $post_img_tmp = $_FILES['post_img']['tmp_name'];
                    $post_category = $data['post_category'];
                    $post_summary = $data['post_summary'];
                    $post_tag = $data['post_tag'];
                    $post_status = $data['post_status'];

                    $query = "UPDATE posts SET post_title='$post_title',post_content='$post_content',post_img='$post_img',post_ctg=$post_category,post_summary='$post_summary',post_tag='$post_tag',post_status=$post_status WHERE post_id = $post_id";

                    if (mysqli_query($this->conn, $query)) {
                        move_uploaded_file($post_img_tmp, '../upload/'. $post_img);
                        header('location: manage_post.php');
                        return 'category Update successfully';
                    }
                }
        }


        public function deletePost($delete_id){

            $catch_img = "SELECT * from posts where post_id = $delete_id";
            $deleteImg = mysqli_query($this->conn, $catch_img);
            $img_info = mysqli_fetch_assoc($deleteImg);
            
            if ($img_info['post_img']==null) {
                
            } else {
                unlink('../upload/'.$img_info['post_img']);
            }

            $query = "DELETE FROM posts where post_id = $delete_id";

            if (mysqli_query($this->conn, $query)) {

                return "Information Deleted Successfully";
                header("location: index.php");
            }
        }

    }
    
?>
