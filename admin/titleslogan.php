<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>

    <div class="grid_10">	
        <div class="box round first grid">
            <h2>Update Site Title and Description</h2>
            <?php 
                if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
                    $title  = $format->login_validation($_POST['title']);
                    $slogan = $format->login_validation($_POST['slogan']);
                    $title  = mysqli_real_escape_string( $db->link, $title );
                    $slogan = mysqli_real_escape_string( $db->link, $slogan );

                    $permitted = array( 'png' );
                    $file      = $_FILES['image'];
                    $file_name = $file['name'];
                    $file_size = $file['size'];
                    $file_temp = $file['tmp_name'];
                    $folder    = 'uploads/';

                    if( $file_name ) {
                        $exclude   = explode('.', $file_name );
                        $extension = strtolower(end($exclude));
                        $same_nm = 'logo.'.$extension;
                        // $unique_nm = substr(md5(time()), 0, 12 ).'.'.$extension;
                    } else {
                        $same_nm  = NULL;
                    }       

                    if( $title == "" || $slogan == "" ) {
                        echo "<span class='error'>Fields Must Not be Empty..!</span>";
                    } else {
                        if( ! empty($file_name)) {
                            if( $file_size > 1048576 ) {
                                echo "<span class='error'>File Size Should Be Less Then 1 MB </span>";
                            } else if(in_array($extension, $permitted) === false ) {
                                echo "<span class='error'>You Can Only Upload: ". implode(', ', $permitted)." </span>";
                            } else {
                                $up_query = "UPDATE tbl_options 
                                    SET
                                    title  = '$title',
                                    slogan  = '$slogan',
                                    logo  = '$same_nm'
                                    WHERE id = '1'
                                    ";


                                // delete existing logo image
                                // $sel_query ="SELECT * FROM tbl_options WHERE id=1";
                                // $sel_select = $db->select($sel_query);
                                // if( $r_select ) {
                                //     while( $sel_result = $sel_select->fetch_assoc() ) {
                                //         $sel_logo = $sel_result['logo'];
                                //         // unlink('uploads/'.);
                                //     } 
                                // }

                                $update_option = $db->update($up_query);
                                if( $update_option ) { 
                                    // unlink('uploads/'.$r_logo);
                                    move_uploaded_file($file_temp, $folder.$same_nm);
                                    echo "<span class='success'>Options Updated Successful</span>";
                                } else {
                                    echo "<span class='error'>Options Updated Failed! </span>";
                                }
                            }
                        } else {
                            $up_query = "UPDATE tbl_options 
                                    SET
                                    title  = '$title',
                                    slogan  = '$slogan'
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
                }

                $query ="SELECT * FROM tbl_options WHERE id=1";
                $select = $db->select($query);
                if( $select ) {
                    while( $result = $select->fetch_assoc() ) {
            ?>
            <div class="block sloginblock">
                <div class="grid_9">      
                     <form action="" method="post" enctype="multipart/form-data">
                        <table class="form">					
                            <tr>
                                <td>
                                    <label>Website Title</label>
                                </td>
                                <td>
                                    <input type="text" value="<?php echo $result['title']; ?>" name="title" class="medium" />
                                </td>
                            </tr>
        					 <tr>
                                <td>
                                    <label>Website Slogan</label>
                                </td>
                                <td>
                                    <input type="text" value="<?php echo $result['slogan']; ?>" name="slogan" class="medium" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Upload Logo</label>
                                </td>
                                <td>
                                    <input type="file" name="image" />
                                </td>
                            </tr>
        					 
        					
        					 <tr>
                                <td>
                                </td>
                                <td>
                                    <input type="submit" name="submit" Value="Update" />
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
                <div class="grid_3">
                    <h3>Feature Image</h3><br>
                    <img src="uploads/<?php echo $result['logo']; ?>" alt="Site Logo" width="250" height="150">
                </div>
            </div>
            <?php } } ?>
        </div>
    </div>

<?php include_once 'inc/footer.php'; ?>