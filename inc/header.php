<?php 
	include_once('config/config.php');
	include_once('lib/Database.php');
	include_once('helpers/Format.php');
	$db = new Database();
	$format = new Format();
?>

<!DOCTYPE html>
<html>
<head>
	<?php include 'scripts/meta.php'; ?>
	<?php include 'scripts/css.php'; ?>
	<?php include 'scripts/js.php'; ?>
</head>

<body>
	<div class="headersection templete clear">
		<?php 
			$query ="SELECT * FROM tbl_options WHERE id=1";
            $select = $db->select($query);
            if($select ) {
                while( $result = $select->fetch_assoc() ) {
		?>
		<a href="index.php">
			<div class="logo">
				<img src="admin/uploads/<?php echo $result['logo']; ?>" alt="Logo"/>
				<h2><?php echo $result['title']; ?></h2>
				<p><?php echo $result['slogan']; ?></p>
			</div>
		</a>		

		<div class="social clear">
			<div class="icon clear">
				<a href="<?php echo $result['facebook_url']; ?>" target="_blank"><i class="fa fa-facebook"></i></a>
				<a href="<?php echo $result['twitter_url']; ?>" target="_blank"><i class="fa fa-twitter"></i></a>
				<a href="<?php echo $result['linkedin_url']; ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
				<a href="<?php echo $result['google_url']; ?>" target="_blank"><i class="fa fa-google-plus"></i></a>
			</div>
			<div class="searchbtn clear">
			<form action="search.php" method="GET">
				<input type="text" name="search" placeholder="Search keyword..."/>
				<input type="submit" name="submit" value="Search"/>
			</form>
			</div>
		</div>
		<?php } } ?>
	</div>
<div class="navsection templete">
	<ul>
		<?php 
			$path      = $_SERVER['SCRIPT_FILENAME'];
			$currentPg = basename($path, '.php'); 
    	?>
		<li><a <?php if( $currentPg == 'index' ) { echo 'id="active"'; } ?> href="index.php">Home</a></li>		
		<?php 
	        $query ="SELECT * FROM tbl_page";
	        $pages = $db->select($query);
	        if( $pages ) {
	        while( $result = $pages->fetch_assoc() ) {
	    ?>
	        <li><a 
	        	<?php 
	        		if(isset($_GET['pageID']) && $_GET['pageID'] == $result['id'] ) { echo 'id="active"'; } 
	        	?>
	        	href="page.php?pageID=<?php echo $result['id']; ?>"><?php echo $result['title']; ?></a></li>
	    <?php } } ?>
		<li><a <?php if( $currentPg == 'contact' ) { echo 'id="active"'; } ?> href="contact.php">Contact</a></li>
		<li><a target="_blank" href="admin/index.php">Admin</a></li>
	</ul>
</div>