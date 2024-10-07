<?php include_once('inc/header.php'); ?>
<?php 
	// if( ! isset($_GET['pageID']) || $_GET['pageID'] == NULL ) {
	$pageID = mysqli_real_escape_string( $db->link, $_GET['pageID'] );
	if( ! isset($pageID) || $pageID == NULL ) {
		header('Location: 404.php');
	} else {
		$pageID = $pageID;
	}


	$query ="SELECT * FROM tbl_page WHERE id='$pageID'";
    $pages = $db->select($query);
    if( $pages ) {
    while( $result = $pages->fetch_assoc() ) {
?>
	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
				<h2><?php echo $result['title']; ?></h2>	
				<?php echo $result['body']; ?>
			</div>
		</div>
		<?php include_once('inc/sidebar.php'); ?>
	</div>
	<?php } } else { header('Location: 404.php'); } ?>

<?php include_once('inc/footer.php'); ?>