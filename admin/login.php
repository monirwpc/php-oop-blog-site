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
<title>Login</title>
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
				$user = $format->login_validation($_POST['username']);
				$pass = $format->login_validation(md5($_POST['password']));

				$user = mysqli_real_escape_string($db->link, $user);
				$pass = mysqli_real_escape_string($db->link, $pass);

				$query ="SELECT * FROM tbl_user WHERE username = '$user' AND password = '$pass'";
				$result = $db->select($query);

				if( $result != false ) {
					$value = mysqli_fetch_array($result);
					// var_dump($value);
					$row   = mysqli_num_rows($result);
					if( $row > 0 ) {
						Session::set('login', true);
						Session::set('name', $value['name']);
						Session::set('username', $value['username']);
						Session::set('userID', $value['id']);
						Session::set('userRole', $value['role']);
						header('Location: index.php');
					} else {
						echo "<span class='error'>Nothing Found...</span>";
					}
				} else {
					echo "<span class='error'>Sorry! Username or Password Did Not Match...</span>";
				}
			}
		?>
		<form action="" method="post">
			<h1>Admin Login</h1>
			<div>
				<input type="text" placeholder="Username" required="" name="username"/>
			</div>
			<div>
				<input type="password" placeholder="Password" required="" name="password"/>
			</div>
			<div>
				<input type="submit" name="login" value="Log in" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="forget-pass.php">Forgot Password</a>
		</div><!-- button -->
		<div class="button">
			<a href="#">Training with live project</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>