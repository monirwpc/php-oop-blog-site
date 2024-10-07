<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>

<div class="grid_10">		
    <div class="box round first grid">
        <h2>Update Themes</h2>
       <div class="block copyblock">
        <?php  

            if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
                $theme = $_POST['theme'];
                $theme = mysqli_real_escape_string( $db->link, $theme );

                $query = "UPDATE tbl_options SET themes='$theme' WHERE id='1'";
                $themeUpdate = $db->update($query);
                if( $themeUpdate ) {
                    echo "<span class='success'>Themes Updated Successful...</span>";
                } else {
                    echo "<span class='error'>Themes Updation Fail..!</span>";
                }
            }

            // set field value
            $selquery = "SELECT * FROM tbl_options WHERE id='1'";
        	$themes = $db->select($selquery);
        	while($themesVal = $themes->fetch_assoc() ) {
        ?>
         <form action="" method="post">
            <table class="form">
				<tr> 
                    <td>
                        <input <?php if( $themesVal['themes'] == 'default') echo 'checked'; ?> type="radio" name="theme" value="default" id="default">
                        <label for="default">Default</label>
                    </td>
                </tr>
                <tr> 
                    <td>
                        <input <?php if( $themesVal['themes'] == 'green') echo 'checked'; ?> type="radio" name="theme" value="green" id="green"> 
                        <label for="green">Green</label>
                    </td>
                </tr>     
                <tr> 
                    <td>
                        <input <?php if( $themesVal['themes'] == 'red') echo 'checked'; ?> type="radio" name="theme" value="red" id="red">
                        <label for="red">Red</label> 
                    </td>
                </tr> 
                <tr> 
                    <td>
                        <input type="submit" name="submit" value="Change Theme">
                    </td>
                </tr>
            </table>
            </form>
        <?php } ?>
        </div>
    </div>
</div>

<?php include_once 'inc/footer.php'; ?>

