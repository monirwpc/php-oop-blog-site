<?php include_once('inc/header.php'); ?>
<?php include_once('inc/slider.php'); ?>


	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<?php 
				$post_per_page = 2;
				if( isset($_GET['page']) ) {
					$page_no = $_GET['page'];
				} else {
					$page_no = 1;
				}
				$offset_post = ( $page_no -1 ) * $post_per_page;

				$query = "SELECT * FROM tbl_post LIMIT $offset_post, $post_per_page";
				$post = $db->select($query);
				if( $post ) {
			?>
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
			<?php } ?>

			<!-- pagination section -->
			<div class='pagination'>
				<?php 
					$query = "SELECT * FROM tbl_post";
					$result = $db->select($query);
					$total_rows = mysqli_num_rows($result);
					$total_pages = ceil( $total_rows / $post_per_page );

					echo "<a href=index.php?page=1>First Page</a>";
					for ( $i=1; $i <= $total_pages ; $i++) { 
						echo "<a href=index.php?page=$i>$i</a>";
					}
					echo "<a href=index.php?page=$total_pages>Last Page</a>";
				?>
			</div>
			<?php } else { echo "<h2>No Post Found..."; } ?>
			<!-- pagination section -->
		</div>
		<?php include_once('inc/sidebar.php'); ?>
	</div>

<?php include_once('inc/footer.php'); ?>