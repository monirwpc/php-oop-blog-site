<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>

<?php 
    if(isset($_GET['viewPostID']) && $_GET['viewPostID'] != NULL ) {
        $postID = $_GET['viewPostID'];
    } else {
        echo "<script>window.location = 'postlist.php';</script>";
        // header('Location: catlist.php');
    }
?>

    <div class="grid_10 add-post">	
        <div class="box round first grid">
            <h2>View Post</h2>
            <div class="block">
            <?php 
                if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
                    echo "<script>window.location = 'postlist.php';</script>";
                }
            ?>
            <br>
            <?php 
                $post_query ="SELECT * FROM tbl_post WHERE id='$postID'";
                $sel_post = $db->select($post_query);
                if( $sel_post ) {
                while( $postResult = $sel_post->fetch_assoc() ) {
            ?>
             <form action="" method="post" enctype="multipart/form-data">
                <table class="form">                   
                    <tr>
                        <td>
                            <label>Title</label>
                        </td>
                        <td>
                            <input type="text" readonly value="<?php echo $postResult['title']; ?>" class="medium" />
                        </td>
                    </tr>
                 
                    <tr>
                        <td>
                            <label>Category</label>
                        </td>
                        <td>
                            <select id="select" name="cat">
                                <option>Select Cateogry</option>
                                <?php 
                                    $query = "SELECT * FROM tbl_category";
                                    $cat = $db->select($query);
                                    while( $result = $cat->fetch_assoc() ) {
                                ?>
                                    <option 
                                    <?php if( $result['id'] == $postResult['cat'] ) { ?>
                                    selected="selected" 
                                    <?php } ?>
                                    value="<?php echo $result['id']; ?>"><?php echo $result['name']; ?></option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
               
                
                    <!-- <tr>
                        <td>
                            <label>Date Picker</label>
                        </td>
                        <td>
                            <input type="text" id="date-picker" />
                        </td>
                    </tr> -->

                    <tr>
                        <td>
                            <label>Feature Image</label>
                        </td>
                        <td>
                            <img src="uploads/<?php echo $postResult['image']; ?>" width="200" height="100"><br>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top; padding-top: 9px;">
                            <label>Content</label>
                        </td>
                        <td>
                            <textarea readonly class="tinymce">
                                <?php echo $postResult['body']; ?>
                            </textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Tags</label>
                        </td>
                        <td>
                            <input type="text" readonly value="<?php echo $postResult['tags']; ?>" class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Author</label>
                        </td>
                        <td>
                            <input type="text" readonly value="<?php echo $postResult['author']; ?>" class="medium" />
                            <input type="hidden" name="userid" value="<?php echo Session::get('userRole'); ?>" class="medium" />
                        </td>
                    </tr>
					<tr>
                        <td></td>
                        <td>
                            <input type="submit" name="update" Value="OK" />
                        </td>
                    </tr>
                </table>
            </form>
            <?php } } ?>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function () {
            setupTinyMCE();
            setDatePicker('date-picker');
            $('input[type="checkbox"]').fancybutton();
            $('input[type="radio"]').fancybutton();
        });
    </script>
<?php include_once 'inc/footer.php'; ?>