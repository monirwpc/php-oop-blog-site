<link rel="stylesheet" href="font-awesome-4.5.0/css/font-awesome.css">	
<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
<link rel="stylesheet" href="style.css">

<!-- custom css -->
<style type="text/css">
	.fixedicon.theme-select {
	    right: 0 !important;
	    left: inherit;
	    top: 45%;
	    background: green;
	    padding: 10px 0;
	    width: 120px;
	}
	.theme-select h3 {
		font-size: 17px;
		text-transform: capitalize;
		padding: 6px 10px;
		border-bottom: 1px solid #eee;
		color: #fff;
		cursor: pointer;
	}
	.theme-select h3:last-child { border: 0; }
	.theme-select i {
		font-size: 22px;
		font-weight: 300;
		color: #fff;
	}
</style>


<?php 
	$selquery = "SELECT * FROM tbl_options WHERE id='1'";
	$themes = $db->select($selquery);
	if( $themes ) {
		while($themesVal = $themes->fetch_assoc() ) {
			if( $themesVal['themes'] == 'default' ) { ?>
				<link rel="stylesheet" href="themes/default.css">
			<?php } else if( $themesVal['themes'] == 'green' ) { ?>
				<link rel="stylesheet" href="themes/green.css">
			<?php } else if( $themesVal['themes'] == 'red' ) { ?>
				<?php } else if( $themesVal['themes'] == 'red' ) { ?>
			<?php } ?>
		<?php } ?>
	<?php } ?>