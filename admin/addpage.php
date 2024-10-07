<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>

    <div class="grid_10 add-post">	
        <div class="box round first grid">
            <h2>Add New Page</h2>
            <div class="block">
            <?php 
                if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
                    $title  = mysqli_real_escape_string( $db->link, $_POST['title'] );
                    $body   = mysqli_real_escape_string( $db->link, $_POST['body'] );

                    if( $title == "" || $body == "" ) {
                        echo "<span class='error'>Fields Must Not be Empty..!</span>";
                    } else {
                        $query = "INSERT INTO tbl_page (title, body) VALUES ('$title', '$body')";
                        $insert = $db->insert($query);
                        if( $insert ) {
                            echo "<span class='success'>Page Added Successful</span>";
                        } else {
                            echo "<span class='error'>Page Added Failed! </span>";
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
                            <input type="text" name="title" placeholder="Enter Page Title" class="medium" />
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