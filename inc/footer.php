<?php 
	$query ="SELECT * FROM tbl_options WHERE id=1";
    $select = $db->select($query);
    if($select ) {
        while( $result = $select->fetch_assoc() ) {
?>
	<div class="footersection templete clear">		
		<div class="footermenu clear">
			<ul>
				<li><a href="index.php">Home</a></li>		
				<?php 
			        $query ="SELECT * FROM tbl_page";
			        $pages = $db->select($query);
			        if( $pages ) {
			        while( $page_info = $pages->fetch_assoc() ) {
			    ?>
			        <li><a href="page.php?pageID=<?php echo $page_info['id']; ?>"><?php echo $page_info['title']; ?></a></li>
			    <?php } } ?>
				<li><a href="contact.php">Contact</a></li>
			</ul>
		</div>
	  	<p>&copy; <?php echo date('Y - ') . $result['copyright']; ?></p>		
	</div>
	<?php } } ?>
	
	<div class="fixedicon clear">
		<a href="<?php echo $result['facebook_url']; ?>"><img src="images/fb.png" alt="Facebook"/></a>
		<a href="<?php echo $result['twitter_url']; ?>"><img src="images/tw.png" alt="Twitter"/></a>
		<a href="<?php echo $result['linkedin_url']; ?>"><img src="images/in.png" alt="LinkedIn"/></a>
		<a href="<?php echo $result['google_url']; ?>"><img src="images/gl.png" alt="GooglePlus"/></a>
	</div>

	<div class="fixedicon theme-select clear">
		<h3>Theme Style</h3>
		<h3 data-theme="default-theme">Default</h3>
		<h3 data-theme="green-theme">Green</h3>
	</div>

<script type="text/javascript" src="js/scrolltop.js"></script>
</body>
</html>