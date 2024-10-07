<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>

    <div class="grid_10">
        <div class="box round first grid">
            <h2>Slider List</h2>
            <div class="block">  
                <table class="data display datatable" id="example">
				<thead>
					<tr>
						<th width="5%">SL.</th>
						<th width="10%">Title</th>
						<th width="10%">Image</th>
						<th width="10%">Date</th>
						<th width="15%">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$query ="SELECT * FROM tbl_slider ORDER BY id DESC";
						$select = $db->select($query);
						$i=0;
						if( $select ) {
						while( $result = $select->fetch_assoc() ) {
						$i++;
					?>
					<tr class="odd gradeX">
						<td><?php echo $i; ?></td>
						<td><?php echo $result['title']; ?></td>
						<td>
							<img width="100" src="uploads/slider/<?php echo $result['image']; ?>">
						</td>
						<td><?php echo $format->formateDate( $result['date'] ); ?></td>
						<td>
							<?php if( Session::get('userRole') == '1' ) { ?>
							<a href="update-slider.php?sliderID=<?php echo $result['id']; ?>">Edit</a> 
							|| <a onclick="return confirm('Are you sure to delete this slider ?');" href="delete-slider.php?delSliderID=<?php echo $result['id']; ?>">Delete</a>
							<?php } ?>
						</td>
					</tr>
					<?php } } ?>
				</tbody>
			</table>

           </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function () {
            $('.datatable').dataTable();
        });
    </script>
<?php include_once 'inc/footer.php'; ?>