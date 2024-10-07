<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>

<?php 
    if(isset($_GET['userID']) && $_GET['userID'] != NULL ) {
        $userID = $_GET['userID'];
    } else {
        echo "<script>window.location = 'user-list.php';</script>";
        // header('Location: inbox.php');
    }
?>

    <div class="grid_10 add-post">	
        <div class="box round first grid">
            <h2>View User profile</h2>
            <div class="block">
            <?php 
                if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
                	echo "<script>window.location = 'user-list.php';</script>";
                }
            ?>
            <br>
            <?php 
                $user_query ="SELECT * FROM tbl_user WHERE id='$userID'";
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
                            <input type="text" readonly value="<?php echo $result['name']; ?>" class="medium" />
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label>User Name</label>
                        </td>
                        <td>
                            <input type="text" readonly value="<?php echo $result['username']; ?>" class="medium" />
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label>Email</label>
                        </td>
                        <td>
                            <input type="email" readonly value="<?php echo $result['email']; ?>" class="medium" />
                        </td>
                    </tr>

                    <tr>
                    	<td>
                    		<label>User Role</label>
                    	</td>
                        <td>
                            <select id="select" readonly>
                            	<option>--- Select Role ---</option>
                            	<option <?php if( $result['role'] == '1') { echo "selected"; }  ?>>Admin</option>
                            	<option <?php if( $result['role'] == '2') { echo "selected"; }  ?>>Author</option>
                            	<option <?php if( $result['role'] == '3') { echo "selected"; }  ?>>Editor</option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td style="vertical-align: top; padding-top: 9px;">
                            <label>User Description</label>
                        </td>
                        <td>
                            <textarea readonly class="tinymce">
                                <?php echo $result['description']; ?>
                            </textarea>
                        </td>
                    </tr>
                    
					<tr>
                        <td></td>
                        <td>
                            <input type="submit" name="update" Value="OK" />
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