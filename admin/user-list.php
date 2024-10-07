<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>

    <div class="grid_10">
        <div class="box round first grid">
            <h2>User List</h2>
            <?php 
				if(isset($_GET['delUserID']) && $_GET['delUserID'] != NULL ) {
					$delID = $_GET['delUserID'];
					$delQuery = "DELETE FROM tbl_user WHERE id='$delID'";
					$delResult = $db->delete($delQuery);
					if( $delResult ) {
						echo "<span class='success'>User Deleted Successful...</span>";
					}
				}
			?>
            <div class="block">        
                <table class="data display datatable" id="example">
				<thead>
					<tr>
						<th>Serial No.</th>
						<th>Name</th>
						<th>Userame</th>
						<th>Email</th>
						<th>Description</th>
						<th>Role</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$query = "SELECT * FROM tbl_user ORDER BY id DESC";
						$usrList = $db->select($query);
						if( $usrList ) {
							// while( $result = mysqli_fetch_assoc($cat) ) {
							$i = 0;
							while( $result = $usrList->fetch_assoc() ) {
							$i++;
					?>
					<tr class="odd gradeX">
						<td><?php echo $i; ?></td>
						<td><?php echo $result['name']; ?></td>
						<td><?php echo $result['username']; ?></td>
						<td><?php echo $result['email']; ?></td>
						<td><?php echo $format->textShorten($result['description'], 20); ?></td>
						<td>
							<?php 
								if( $result['role'] == '1' ) { 
									echo 'Admin'; 
								} else if ( $result['role'] == '2' ) {
									echo 'Author'; 
								} else if ( $result['role'] == '3' ) {
									echo 'Editor'; 
								}
							?>
						</td>
						<td>
							<a href="view-user.php?userID=<?php echo $result['id']; ?>">View</a>
							<?php if( Session::get('userRole') == '1' ) { ?>
								|| <a onclick="return confirm('Are you sure to delete?');" href="?delUserID=<?php echo $result['id']; ?>">Delete</a>
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