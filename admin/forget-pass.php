<?php 
	include_once('../lib/Session.php');
	Session::check_logged();

	include_once('../config/config.php');
	include_once('../lib/Database.php');
	include_once('../helpers/Format.php');
	$db = new Database();
	$format = new Format();
?>

<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Forgot Password</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
    <style type="text/css">
    	.error { color: red; font-size: 18px; }
    	.success { color: green; font-size: 18px; }
    </style>
</head>
<body>
<div class="container">
	<section id="content">
		<?php 
			if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
				$email = $format->login_validation($_POST['email']);
				$email = mysqli_real_escape_string($db->link, $email);

				if( $email === '' ) {
					echo "<span class='error'>Field Must Not be Empty..!</span>";
				} else if (filter_var($email, FILTER_VALIDATE_EMAIL) == false ) {
					echo "<span class='error'>Please try with valid email..!</span>";
				} else {
					$user_query = "SELECT * FROM tbl_user WHERE email = '$email'";
                    $usr_data   = $db->select($user_query);
                    if( $usr_data != false ) {
                    	while( $usr_val = $usr_data->fetch_assoc()){
                    		$userID    = $usr_val['id'];
                    		$username = $usr_val['username'];
                    	}

                    	$rand = rand(10000, 99999);
                    	$text = substr($email, 0, 4);
                    	$newpass = $text.$rand;
                    	$pass = md5($text.$rand);

                    	$up_query = "UPDATE tbl_user 
	                        SET
	                        password = '$pass'
	                        WHERE id = '$userID'
	                        ";	                                 	

	                    $to      = $email;
						$subject = 'Your New Password';
						$message = 'Hey, Monir Blog mailed. Your username is '.$username.' & your new password is '.$newpass.'. Thanks.';
						// To send HTML mail, the Content-type header must be set
						$headers[] = 'MIME-Version: 1.0';
						$headers[] = 'Content-type: text/html; charset=iso-8859-1';
						// Additional headers
						$headers[] = 'To: '.$email.'';
						$headers[] = 'From: Monir Blog <monirulislam7530@gmail.com>';

						$sendMail = mail($to, $subject, $message, $headers);

	                    if( $sendMail ) {
	                        echo "<span class='success'>Please Check Your Mail.</span>";
	                        $update_post = $db->update($up_query);  
	                    } else {
	                        echo "<span class='error'>Mail Send Failed. Please try again. </span>";
	                    }

                    } else {
                    	echo "<span class='error'>Email address doesn't exist..!</span>";
                    }
				}
			}
		?>
		<form action="" method="post">
			<h1>Forgot Password</h1>
			<div>
				<input type="text" placeholder="Enter Email" name="email"/>
			</div>
			<div>
				<input type="submit" value="Send Mail" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="login.php">Login</a>
		</div><!-- button -->
		<div class="button">
			<a href="#">Training with live project</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>