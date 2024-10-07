<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>

<?php 
    if( Session::get('userRole') != '1' ) {
        echo "<script>window.location = 'index.php';</script>";
        // header('Location: catlist.php');
    }
?>

    <div class="grid_10">		
        <div class="box round first grid">
            <h2>Add New User</h2>
           <div class="block copyblock">
            <?php 
                if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
                    $user = $format->login_validation($_POST['username']);
                    $pass = $format->login_validation(md5($_POST['password']));
                    $role = $format->login_validation($_POST['role']);
                    $email = $format->login_validation($_POST['email']);

                    $user = mysqli_real_escape_string( $db->link, $user );
                    $pass = mysqli_real_escape_string( $db->link, $pass );
                    $role = mysqli_real_escape_string( $db->link, $role );
                    $email = mysqli_real_escape_string( $db->link, $email );

                    if( ! $user || ! $pass || ! $role || ! $email ) {
                        echo "<span class='error'>Field Must Not be Empty..!</span>";
                    } else {

                        $usremail_query = "SELECT * FROM tbl_user WHERE email = '$email'";
                        $usremail = $db->select($usremail_query);

                        $un_query = "SELECT * FROM tbl_user WHERE username = '$user'";
                        $usrnm = $db->select($un_query);
                        if( $usrnm != false ) {
                            echo "<span class='error'>User name already exists..!</span>";
                        } else if( $usremail != false ) {
                            echo "<span class='error'>User Email already exists..!</span>";
                        } else {
                            $query = "INSERT INTO tbl_user (username, password, email, role) VALUES ('$user', '$pass', '$email', '$role')";
                            $usrInsert = $db->insert($query);
                            if( $usrInsert ) {
                                echo "<span class='success'>User Created Successful...</span>";
                            } else {
                                echo "<span class='error'>User Creation Fail..!</span>";
                            }
                        }
                    }
                }
            ?>
             <form action="" method="post">
                <table class="form">					
                    <tr>
                    	<td>
                    		<label>Username</label>
                    	</td>
                        <td>
                            <input type="text" name="username" placeholder="Enter Username..." class="medium" />
                        </td>
                    </tr>
                    <tr>
                    	<td>
                    		<label>Password</label>
                    	</td>
                        <td>
                            <input type="text" name="password" placeholder="Enter Password..." class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Email</label>
                        </td>
                        <td>
                            <input type="text" name="email" placeholder="Enter Email..." class="medium" />
                        </td>
                    </tr>
                    <tr>
                    	<td>
                    		<label>User Role</label>
                    	</td>
                        <td>
                            <select id="select" name="role">
                            	<option>--- Select Role ---</option>
                            	<option value="1">Admin</option>
                            	<option value="2">Author</option>
                            	<option value="3">Editor</option>
                            </select>
                        </td>
                    </tr>
					<tr> 
						<td></td>
                        <td>
                            <input type="submit" name="submit" Value="Add User" />
                        </td>
                    </tr>
                </table>
                </form>
            </div>
        </div>
    </div>

<?php include_once 'inc/footer.php'; ?>

