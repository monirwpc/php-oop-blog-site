<div class="sidebar clear">
	<div class="samesidebar clear">
		<h2>Categories</h2>		
		<ul>
			<?php 
				$query = "SELECT * FROM tbl_category";
				$categories = $db->select($query);
				if( $categories ) {
				while( $result = $categories->fetch_assoc() ) {
			?>
				<li><a href="category.php?catID=<?php echo $result['id']; ?>"><?php echo $result['name']; ?></a></li>
			<?php } } else { ?>
				<li><a>No Category Created..</a></li>
			<?php } ?>		
		</ul>
	</div>
	
	<div class="samesidebar clear">
		<h2>Latest articles</h2>
		<?php 
			$query = "SELECT * FROM tbl_post LIMIT 4";
			$post = $db->select($query);
			if( $post ) {
			while( $result = $post->fetch_assoc() ) {
		?>		
			<div class="popular clear">
				<h3><a href="post.php?id=<?php echo $result['id']; ?>"><?php echo $result['title']; ?></a></h3>
				<a href="post.php?id=<?php echo $result['id']; ?>"><img src="admin/uploads/<?php echo $result['image']; ?>" alt="post image"/></a>
				<?php echo $format->textShorten( $result['body'], 120 ); ?>
			</div>
		<?php } } else { ?>
			<h3><a>No Latest Post available...</a></h3>
		<?php } ?>
	</div>	
</div>