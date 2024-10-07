<?php include_once('inc/header.php'); ?>

<?php 
	if( ! isset($_GET['search']) || $_GET['search'] == NULL ) {
		header('Location: 404.php');
	} else {
		$search = $_GET['search'];
	}		 
?>
	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
				<?php 
					$query = "SELECT * FROM tbl_post WHERE title LIKE '%$search%' OR body LIKE '%$search%' LIMIT 3";
					$post = $db->select($query);
					if( $post ) {
					while( $result = $post->fetch_assoc() ) {
				?>
				<h2><?php echo $result['title']; ?></h2>
				<h4><?php echo $format->formateDate( $result['date'] ); ?>, By <a href="#"><?php echo $result['author']; ?></a></h4>
				<img src="admin/uploads/<?php echo $result['image']; ?>" alt="post image"/>
				<?php echo $result['body']; ?>

				<?php } } else { echo "<p>Nothing Match with Your Search Query...</p>"; } ?>
			</div>
		</div>
		<?php include_once('inc/sidebar.php'); ?>
	</div>

<?php include_once('inc/footer.php'); ?>