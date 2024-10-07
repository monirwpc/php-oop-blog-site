<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>

    <div class="grid_10 add-post">	
        <div class="box round first grid">
            <h2>Add New Post</h2>
            <div class="block">
            <?php 
                if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
                    $title  = mysqli_real_escape_string( $db->link, $_POST['title'] );
                    $cat    = mysqli_real_escape_string( $db->link, $_POST['cat'] );
                    $body   = mysqli_real_escape_string( $db->link, $_POST['body'] );
                    $tags   = mysqli_real_escape_string( $db->link, $_POST['tags'] );
                    $author = mysqli_real_escape_string( $db->link, $_POST['author'] );
                    $userid = mysqli_real_escape_string( $db->link, $_POST['userid'] );

                    $permitted = array( 'jpg', 'jpeg', 'png', 'gif' );
                    $file      = $_FILES['image'];
                    $file_name = $file['name'];
                    $file_size = $file['size'];
                    $file_temp = $file['tmp_name'];
                    $folder    = 'uploads/';

                    if( $file_name ) {
                        $exclude   = explode('.', $file_name );
                        $extension = strtolower(end($exclude));
                        $unique_nm = substr(md5(time()), 0, 12 ).'.'.$extension;
                    } else {
                        $unique_nm  = NULL;
                    }                    

                    if( $title == "" || $cat == "" || $body == "" || $tags == "" || $author == "" || $unique_nm == "" ) {
                        echo "<span class='error'>Fields Must Not be Empty..!</span>";
                    } else if( empty($file_name)) {
                        echo "<span class='error'>File Must Not Be Empty! </span>";
                    } else if( $file_size > 1048576 ) {
                        echo "<span class='error'>File Size Should Be Less Then 1 MB </span>";
                    } else if(in_array($extension, $permitted) === false ) {
                        echo "<span class='error'>You Can Only Upload: ". implode(', ', $permitted)." </span>";
                    } else {
                        $query = "INSERT INTO tbl_post (cat, userid, title, body, image, author, tags) VALUES ('$cat', '$userid', '$title', '$body', '$unique_nm', '$author', '$tags')";
                        $insert = $db->insert($query);
                        if( $insert ) {
                            move_uploaded_file($file_temp, $folder.$unique_nm);
                            echo "<span class='success'>Post Added Successful</span>";
                        } else {
                            echo "<span class='error'>Post Added Failed! </span>";
                        }
                    }
                }
            ?>
            <br>
             <form action="" method="post" enctype="multipart/form-data">
                <table class="form">                   
                    <tr>
                        <td>
                            <label>Title</label>
                        </td>
                        <td>
                            <input type="text" name="title" placeholder="Enter Post Title..." class="medium" />
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
                                    <option value="<?php echo $result['id']; ?>"><?php echo $result['name']; ?></option>
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
                            <label>Upload Image</label>
                        </td>
                        <td>
                            <input type="file" name="image" />
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top; padding-top: 9px;">
                            <label>Content</label>
                        </td>
                        <td>
                            <textarea name="body" class="tinymce"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Tags</label>
                        </td>
                        <td>
                            <input type="text" name="tags" placeholder="Enter Post Tags..." class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Author</label>
                        </td>
                        <td>
                            <input type="text" name="author" value="<?php echo Session::get('username'); ?>" class="medium" />
                            <input type="hidden" name="userid" value="<?php echo Session::get('userRole'); ?>" class="medium" />
                        </td>
                    </tr>
					<tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" Value="Save" />
                        </td>
                    </tr>
                </table>
                </form>
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