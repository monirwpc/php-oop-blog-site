<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>

<?php 
    if(isset($_GET['sliderID']) && $_GET['sliderID'] != NULL ) {
        $sliderID = $_GET['sliderID'];
    } else {
        echo "<script>window.location = 'slider-list.php';</script>";
        // header('Location: catlist.php');
    }
?>

    <div class="grid_10 add-post">	
        <div class="box round first grid">
            <h2>Update Slider</h2>
            <div class="block">
            <?php 
                if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
                    $title  = mysqli_real_escape_string( $db->link, $_POST['title'] );

                    $permitted = array( 'jpg', 'jpeg', 'png', 'gif' );
                    $file      = $_FILES['image'];
                    $file_name = $file['name'];
                    $file_size = $file['size'];
                    $file_temp = $file['tmp_name'];
                    $folder    = 'uploads/slider/';

                    if( $file_name ) {
                        $exclude   = explode('.', $file_name );
                        $extension = strtolower(end($exclude));
                        $unique_nm = substr(md5(time()), 0, 12 ).'.'.$extension;
                    } else {
                        $unique_nm  = NULL;
                    }                    

                    if( $title == "" ) {
                        echo "<span class='error'>Fields Must Not be Empty..!</span>";
                    } else {
                        if( ! empty($file_name)) {
                            if( $file_size > 1048576 ) {
                                echo "<span class='error'>File Size Should Be Less Then 1 MB </span>";
                            } else if(in_array($extension, $permitted) === false ) {
                                echo "<span class='error'>You Can Only Upload: ". implode(', ', $permitted)." </span>";
                            } else {
                                $up_query = "UPDATE tbl_slider 
                                    SET 
                                    title  = '$title',
                                    image  = '$unique_nm'
                                    WHERE id = '$sliderID'
                                    ";
                                $update_slider = $db->update($up_query);
                                if( $update_slider ) {
                                    move_uploaded_file($file_temp, $folder.$unique_nm);
                                    echo "<span class='success'>Slider Updated Successful</span>";
                                } else {
                                    echo "<span class='error'>Slider Updated Failed! </span>";
                                }
                            }
                        } else {
                            $up_query = "UPDATE tbl_slider 
                                    SET 
                                    title  = '$title'
                                    WHERE id = '$sliderID'
                                    ";
                                $update_slider = $db->update($up_query);
                                if( $update_slider ) {
                                    // move_uploaded_file($file_temp, $folder.$unique_nm);
                                    echo "<span class='success'>Slider Updated Successful</span>";
                                } else {
                                    echo "<span class='error'>Slider Updated Failed! </span>";
                                }
                        }
                    }


                    // var_dump( $image );

                }
            ?>
            <br>
            <?php 
                $slider_query ="SELECT * FROM tbl_slider WHERE id='$sliderID'";
                $sel_slider = $db->select($slider_query);
                if( $sel_slider ) {
                while( $sliderResult = $sel_slider->fetch_assoc() ) {
            ?>
             <form action="" method="post" enctype="multipart/form-data">
                <table class="form">                   
                    <tr>
                        <td>
                            <label>Title</label>
                        </td>
                        <td>
                            <input type="text" name="title" value="<?php echo $sliderResult['title']; ?>" class="medium" />
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label>Upload Image</label>
                        </td>
                        <td>
                            <img src="uploads/slider/<?php echo $sliderResult['image']; ?>" width="200" height="100"><br>
                            <input type="file" name="image" />
                        </td>
                    </tr>
					<tr>
                        <td></td>
                        <td>
                            <input type="submit" name="update" Value="Update Post" />
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