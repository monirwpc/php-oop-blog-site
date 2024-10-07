<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>

    <div class="grid_10">		
        <div class="box round first grid">
            <h2>Update Copyright Text</h2>
            <?php 
                if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
                    $copyright = $format->login_validation($_POST['copyright']);

                    $copyright   = mysqli_real_escape_string( $db->link, $copyright );

                    if( $copyright == "" ) {
                        echo "<span class='error'>Field must not be empty..! </span>";
                    } else {
                        $up_query = "UPDATE tbl_options 
                            SET
                            copyright   = '$copyright'
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
            <div class="block copyblock"> 
             <form action="" method="post">
                <table class="form">					
                    <tr>
                        <td>
                            <input type="text" value="<?php echo $result['copyright']; ?>" name="copyright" class="large" />
                        </td>
                    </tr>
					
					 <tr> 
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