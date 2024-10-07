<?php include_once('inc/header.php'); ?>

<?php 
	if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
		$fname = $format->login_validation($_POST['firstname']);
		$lname = $format->login_validation($_POST['lastname']);
		$email = $format->login_validation($_POST['email']);
		$message = $format->login_validation($_POST['message']);

		$fname = mysqli_real_escape_string($db->link, $fname);
		$lname = mysqli_real_escape_string($db->link, $lname);
		$email = mysqli_real_escape_string($db->link, $email);
		$message = mysqli_real_escape_string($db->link, $message);

		$error = "";

		if( empty($fname)) {
			$error = "First Name Must not be empty.";
		} else if( empty($lname)) {
			$error = "Last Name Must not be empty.";
		} else if( empty($email)) {
			$error = "Email Address Must not be empty.";
		} else if(filter_var($email, FILTER_VALIDATE_EMAIL) == false ) {
			$error = "Please input valide email address.";
		} else if( empty($message)) {
			$error = "Message Field Must not be empty.";
		} else {
			$query = "INSERT INTO tbl_contact (firstname, lastname, email, message) VALUES ('$fname', '$lname', '$email', '$message')";
            $insert = $db->insert($query);
            if( $insert ) {
                $msg = "Messege Sent Successfully.";
            } else {
                $error = "Messege Sent Failed.";
            }
		}
	}
?>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
			<h2>Contact us</h2>
			<?php 
				if( isset($error) ) {
					echo '<span class="error">'.$error.'</span>';
				}
				if(isset($msg)){
					echo '<span class="success">'.$msg.'</span>';
				}
			?>
			<br>
			<form action="" method="post">
				<table>
				<tr>
					<td>Your First Name:</td>
					<td>
					<input type="text" name="firstname" placeholder="Enter first name" />
					</td>
				</tr>
				<tr>
					<td>Your Last Name:</td>
					<td>
					<input type="text" name="lastname" placeholder="Enter Last name" />
					</td>
				</tr>
				
				<tr>
					<td>Your Email Address:</td>
					<td>
					<input type="text" name="email" placeholder="Enter Email Address" />
					</td>
				</tr>
				<tr>
					<td>Your Message:</td>
					<td>
					<textarea name="message"></textarea>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
					<input type="submit" name="submit" value="SEND"/>
					</td>
				</tr>
		</table>
	<form>				
 </div>

		</div>
		<?php include_once('inc/sidebar.php'); ?>
	</div>

<?php include_once('inc/footer.php'); ?>