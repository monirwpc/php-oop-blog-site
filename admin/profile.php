<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>

<?php 
    echo $userID   = Session::get('userID');
    echo $userRole = Session::get('userRole');
?>

    <div class="grid_10 add-post">	
        <div class="box round first grid">
            <h2>Update User profile</h2>
            <div class="block">
            <?php 
                if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
                    $name        = $format->login_validation($_POST['name']);
                    $username    = $format->login_validation($_POST['username']);
                    $email       = $format->login_validation($_POST['email']);
                    $description = $_POST['description'];

                    $name        = mysqli_real_escape_string( $db->link, $name );
                    $username    = mysqli_real_escape_string( $db->link, $username );
                    $email       = mysqli_real_escape_string( $db->link, $email );
                    $description = mysqli_real_escape_string( $db->link, $description );

                    $up_query = "UPDATE tbl_user 
                        SET
                        name        = '$name',
                        username    = '$username',
                        email       = '$email',
                        description = '$description'
                        WHERE id = '$userID'
                        ";
                    $update_post = $db->update($up_query);
                    if( $update_post ) {
                        echo "<span class='success'>User Updated Successful</span>";
                    } else {
                        echo "<span class='error'>User Updated Failed! </span>";
                    }


                    // var_dump( $image );

                }
            ?>
            <br>
            <?php 
                $user_query ="SELECT * FROM tbl_user WHERE id='$userID' AND role='$userRole'";
                $sel_user = $db->select($user_query);
                if( $sel_user ) {
                while( $result = $sel_user->fetch_assoc() ) {
            ?>
             <form action="" method="post" enctype="multipart/form-data">
                <table class="form">                   
                    <tr>
                        <td>
                            <label>Name</label>
                        </td>
                        <td>
                            <input type="text" name="name" value="<?php echo $result['name']; ?>" class="medium" />
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label>User Name</label>
                        </td>
                        <td>
                            <input type="text" name="username" value="<?php echo $result['username']; ?>" class="medium" />
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label>Email</label>
                        </td>
                        <td>
                            <input type="email" name="email" value="<?php echo $result['email']; ?>" class="medium" />
                        </td>
                    </tr>

                    <tr>
                        <td style="vertical-align: top; padding-top: 9px;">
                            <label>User Description</label>
                        </td>
                        <td>
                            <textarea name="description" class="tinymce">
                                <?php echo $result['description']; ?>
                            </textarea>
                        </td>
                    </tr>
                    
					<tr>
                        <td></td>
                        <td>
                            <input type="submit" name="update" Value="Update User" />
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