<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>

<?php 
    if( isset($_GET['pageID']) && $_GET['pageID'] != NULL ) {
        $pageID = $_GET['pageID'];
    } else {
        echo "<script>window.location= 'index.php';</script>";
    }
?>
    <style type="text/css">
        .delpage {
            border: 1px solid #ddd;
            color: #444;
            cursor: pointer;
            font-size: 20px;
            padding: 2px 10px;
            font-weight: normal;
            background: #eee;
            margin-left: 5px;
            display: inline-block;
            line-height: normal;
        }
    </style>
    <div class="grid_10 add-post">	
        <div class="box round first grid">
            <h2>Update Pages</h2>
            <div class="block">
            <?php 
                if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
                    $title  = mysqli_real_escape_string( $db->link, $_POST['title'] );
                    $body   = mysqli_real_escape_string( $db->link, $_POST['body'] );

                    if( $title == "" || $body == "" ) {
                        echo "<span class='error'>Fields Must Not be Empty..!</span>";
                    } else {
                        $up_query = "UPDATE tbl_page 
                                    SET
                                    title  = '$title',
                                    body  = '$body'
                                    WHERE id = '$pageID'
                                    ";
                                $update_post = $db->update($up_query);
                                if( $update_post ) {
                                    echo "<span class='success'>Page Updated Successful</span>";
                                } else {
                                    echo "<span class='error'>Page Updation Failed! </span>";
                                }
                    }
                }


                // select page old data from databases.
                $selQuery = "SELECT * FROM tbl_page WHERE id='$pageID'";
                $selPage  = $db->select($selQuery);
                if( $selPage ) {
                    while ($pgResult = $selPage->fetch_assoc() ) {
            ?>
            <br>
             <form action="" method="post" enctype="multipart/form-data">
                <table class="form">                   
                    <tr>
                        <td>
                            <label>Title</label>
                        </td>
                        <td>
                            <input type="text" name="title" value="<?php echo $pgResult['title']; ?>" class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top; padding-top: 9px;">
                            <label>Content</label>
                        </td>
                        <td>
                            <textarea name="body" class="tinymce"><?php echo $pgResult['body']; ?></textarea>
                        </td>
                    </tr>
					<tr>
                        <td></td>
                        <td>
                            <input type="submit" name="update" Value="Update" />
                            <a class="delpage" href="delete-page.php?delpage=<?php echo $pgResult['id']; ?>" onclick="return confirm('Are you sure to delete the page ?'); ">Delete</a>
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