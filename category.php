<?php include_once('inc/header.php'); ?>

<?php 
	if( ! isset($_GET['catID']) || $_GET['catID'] == NULL ) {
		header('Location: 404.php');
	} else {
		$id = $_GET['catID'];
	}	

	$query = "SELECT * FROM tbl_post WHERE cat=$id";
	$post = $db->select($query);
	
?>
	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<?php if( $post ) { ?>
			<h1 style="color: green; padding-bottom: 15px; margin: 15px 0 30px; border-bottom: 4px double green; ">Category Page</h1>
			<?php while( $result = $post->fetch_assoc() ) { //var_dump( $result ); ?>
			<div class="samepost clear">
				<h2><a href="post.php?id=<?php echo $result['id']; ?>"><?php echo $result['title']; ?></a></h2>
				<h4><?php echo $format->formateDate( $result['date'] ); ?>, By <a href="#"><?php echo $result['author']; ?></a></h4>
				 <a href="post.php?id=<?php echo $result['id']; ?>"><img src="admin/uploads/<?php echo $result['image']; ?>" alt="post image"/></a>
				<?php echo $format->textShorten( $result['body'], 450 ); ?>
				<div class="readmore clear">
					<a href="post.php?id=<?php echo $result['id']; ?>">Read More</a>
				</div>
			</div>
			<?php } } else { echo "<h2>No Posts Found in This Category..!</h2>"; } ?>
		</div>
		<?php include_once('inc/sidebar.php'); ?>
	</div>

<?php include_once('inc/footer.php'); ?>