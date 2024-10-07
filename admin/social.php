<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>

    <div class="grid_10">
	
        <div class="box round first grid">
            <h2>Update Social Media</h2>
            <?php 
                if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
                    $facebook = $format->login_validation($_POST['facebook_url']);
                    $twitter  = $format->login_validation($_POST['twitter_url']);
                    $linkedin = $format->login_validation($_POST['linkedin_url']);
                    $google   = $format->login_validation($_POST['google_url']);

                    $facebook = mysqli_real_escape_string( $db->link, $facebook );
                    $twitter  = mysqli_real_escape_string( $db->link, $twitter );
                    $linkedin = mysqli_real_escape_string( $db->link, $linkedin );
                    $google   = mysqli_real_escape_string( $db->link, $google );

                    if( $facebook == "" || $twitter == "" || $linkedin == "" || $google == "" ) {
                        echo "<span class='error'>Field must not be empty..! </span>";
                    } else {
                        $up_query = "UPDATE tbl_options 
                            SET
                            facebook_url = '$facebook',
                            twitter_url  = '$twitter',
                            linkedin_url = '$linkedin',
                            google_url   = '$google'
                            WHERE id = '1'
                            ";
                        $update_option = $db->update($up_query);
                         if( $update_option ) {
                            echo "<span class='success'>Options Updated Successful</span>";
                        } else {
                            echo "<span class='error'>Options Updated Failed! </span>";
                        }
                    }
                }




                $query ="SELECT * FROM tbl_options WHERE id=1";
                $select = $db->select($query);
                if( $select ) {
                    while( $result = $select->fetch_assoc() ) {
            ?>
            <div class="block">               
             <form action="" method="post">
                <table class="form">					
                    <tr>
                        <td>
                            <label>Facebook</label>
                        </td>
                        <td>
                            <input type="text" name="facebook_url" value="<?php echo $result['facebook_url']; ?>" class="medium" />
                        </td>
                    </tr>
					 <tr>
                        <td>
                            <label>Twitter</label>
                        </td>
                        <td>
                            <input type="text" name="twitter_url" value="<?php echo $result['twitter_url']; ?>" class="medium" />
                        </td>
                    </tr>
					
					 <tr>
                        <td>
                            <label>LinkedIn</label>
                        </td>
                        <td>
                            <input type="text" name="linkedin_url" value="<?php echo $result['linkedin_url']; ?>" class="medium" />
                        </td>
                    </tr>
					
					 <tr>
                        <td>
                            <label>Google Plus</label>
                        </td>
                        <td>
                            <input type="text" name="google_url" value="<?php echo $result['google_url']; ?>" class="medium" />
                        </td>
                    </tr>
					
					 <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" Value="Update" />
                        </td>
                    </tr>
                </table>
                </form>
            </div>
            <?php } } ?>
        </div>
    </div>

<?php include_once 'inc/footer.php'; ?>