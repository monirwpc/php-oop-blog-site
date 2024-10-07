<?php 
		if(isset($_GET['pageID']) && $_GET['pageID'] != NULL ) {
			$titlePgID = $_GET['pageID'];
			$title_query ="SELECT * FROM tbl_page WHERE id='$titlePgID'";
            $title_select = $db->select($title_query);
            if( $title_select ) {
                while( $title_result = $title_select->fetch_assoc() ) { ?>
                	<title><?php echo $title_result['title']; ?> | <?php echo SITE_TITLE; ?></title>
                <?php }
            }
		} else if(isset($_GET['id']) && $_GET['id'] != NULL ) {
			$titlePostID = $_GET['id'];
			$title_query ="SELECT * FROM tbl_post WHERE id='$titlePostID'";
            $title_select = $db->select($title_query);
            if( $title_select ) {
                while( $title_result = $title_select->fetch_assoc() ) { ?>
                	<title><?php echo $title_result['title']; ?> | <?php echo SITE_TITLE; ?></title>
                <?php }
            }
		} else { ?>
        	<title><?php echo $format->siteTitle(); ?> | <?php echo SITE_TITLE; ?></title>
        <?php }
	?>
	<meta name="language" content="English">
	<meta name="description" content="It is a website about education">
	<?php 
		if(isset($_GET['id']) && $_GET['id'] != NULL ) {
			$keywordID = $_GET['id'];
			$title_query ="SELECT * FROM tbl_post WHERE id='$keywordID'";
            $title_select = $db->select($title_query);
            if( $title_select ) {
                while( $title_result = $title_select->fetch_assoc() ) { ?>
                	<meta name="keywords" content="<?php echo $title_result['tags']; ?>">
                <?php }
            }
		} else { ?>
			<meta name="keywords" content="<?php echo KEYWORD; ?>">
	<?php } ?>	
	<meta name="author" content="Delowar">