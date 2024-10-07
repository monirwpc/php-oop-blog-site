<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>

<?php 
	if(isset($_GET['catid']) && $_GET['catid'] != NULL ) {
		$catID = $_GET['catid'];
	} else {
		echo "<script>window.location = 'catlist.php';</script>";
		// header('Location: catlist.php');
	}
?>

    <div class="grid_10">		
        <div class="box round first grid">
            <h2>Update Category</h2>
           <div class="block copyblock">
            <?php  

                if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
                    $name = $_POST['name'];
                    $name = mysqli_real_escape_string( $db->link, $name );

                    if( ! $name ) {
                        echo "<span class='error'>Category Name Must Not be Empty..!</span>";
                    } else {
                        $query = "UPDATE tbl_category SET name='$name' WHERE id='$catID'";
                        $catUpdate = $db->update($query);
                        if( $catUpdate ) {
                            echo "<span class='success'>Category Updated Successful...</span>";
                        } else {
                            echo "<span class='error'>Category Updation Fail..!</span>";
                        }
                    }
                }

                // set field value
                $selquery = "SELECT * FROM tbl_category WHERE id='$catID'";
            	$selResult = $db->select($selquery);
            	while($selResultVal = $selResult->fetch_assoc() ) {
            ?>
             <form action="" method="post">
                <table class="form">					
                    <tr>
                        <td>
                            <input type="text" name="name" value="<?php echo $selResultVal['name']; ?>" class="medium" />
                        </td>
                    </tr>
					<tr> 
                        <td>
                            <input type="submit" name="submit" Value="Save" />
                        </td>
                    </tr>
                </table>
                </form>
            <?php } ?>
            </div>
        </div>
    </div>

<?php include_once 'inc/footer.php'; ?>

