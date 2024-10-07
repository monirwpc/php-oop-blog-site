<?php 
	$query ="SELECT * FROM tbl_slider ORDER BY id DESC LIMIT 5";
    $slider = $db->select($query);
    if( $slider ) {
?>
<div class="slidersection templete clear">
    <div id="slider">
    	<?php while( $result = $slider->fetch_assoc() ) { ?>
        	<a href="#">
        		<img src="admin/uploads/slider/<?php echo $result['image']; ?>" alt="<?php echo $result['title']; ?>" title="<?php echo $result['title']; ?>" />
        	</a>
        <?php } ?>
    </div>
</div>
<?php } ?>