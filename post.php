<?php include_once('inc/header.php'); ?>

<?php 
	$postID = mysqli_real_escape_string( $db->link, $_GET['id'] );
	// if( ! isset($_GET['id']) || $_GET['id'] == NULL ) {
	if( ! isset($postID) || $postID == NULL ) {
		header('Location: 404.php');
	} else {
		$id = $postID;
	}		 
?>
	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
				<?php 
					$query = "SELECT * FROM tbl_post WHERE id=$id LIMIT 1";
					$post = $db->select($query);
					if( $post ) {
					while( $result = $post->fetch_assoc() ) {
				?>
				<h2><?php echo $result['title']; ?></h2>
				<h4><?php echo $format->formateDate( $result['date'] ); ?>, By <a href="#"><?php echo $result['author']; ?></a></h4>
				<img src="admin/uploads/<?php echo $result['image']; ?>" alt="post image"/>
				<?php echo $result['body']; ?>				
				
				<div class="relatedpost clear">
					<h2>Related articles</h2>
					<?php 
						$catID = $result['cat'];
						$queryRel = "SELECT * FROM tbl_post WHERE cat=$catID LIMIT 6";
						$postRel = $db->select($queryRel);
						if( $postRel ) {
						while( $resultRel = $postRel->fetch_assoc() ) {
					?>
						<a href="post.php?id=<?php echo $result['id']; ?>"><img src="admin/uploads/<?php echo $result['image']; ?>" alt="post image"/></a>
					<?php } } else { echo "No Related Post Available !!"; } ?>
				</div>

				<?php } } else { header('Location: 404.php'); } ?>
			</div>
		</div>
		<?php include_once('inc/sidebar.php'); ?>
	</div>

<?php include_once('inc/footer.php'); ?>