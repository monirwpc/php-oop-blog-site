<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>

    <div class="grid_10">
        <div class="box round first grid">
            <h2>Category List</h2>
            <?php 
				if(isset($_GET['delcat']) && $_GET['delcat'] != NULL ) {
					$delID = $_GET['delcat'];
					$delQuery = "DELETE FROM tbl_category WHERE id='$delID'";
					$delResult = $db->delete($delQuery);
					if( $delResult ) {
						echo "<span class='success'>Category Deleted Successful...</span>";
					}
				}
			?>
            <div class="block">        
                <table class="data display datatable" id="example">
				<thead>
					<tr>
						<th>Serial No.</th>
						<th>Category Name</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$query = "SELECT * FROM tbl_category ORDER BY id DESC";
						$cat = $db->select($query);
						if( $cat ) {
							// while( $result = mysqli_fetch_assoc($cat) ) {
							$i = 0;
							while( $result = $cat->fetch_assoc() ) {
							$i++;
					?>
					<tr class="odd gradeX">
						<td><?php echo $i; ?></td>
						<td><?php echo $result['name']; ?></td>
						<td><a href="update-cat.php?catid=<?php echo $result['id']; ?>">Edit</a> || <a onclick="return confirm('Are you sure to delete?');" href="?delcat=<?php echo $result['id']; ?>">Delete</a></td>
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