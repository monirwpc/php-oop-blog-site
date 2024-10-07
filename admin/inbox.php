<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>

    <div class="grid_10">
        <div class="box round first grid">
            <h2>Inbox</h2>
            <?php 
            	// delete messages
            	if( isset($_GET['delMsgID']) && $_GET['delMsgID'] != NULL ) {
            		$delMsgID = $_GET['delMsgID'];
            		$del_query = "DELETE FROM tbl_contact WHERE id = '$delMsgID'";
                    $delMsg = $db->delete($del_query);
                    if( $delMsg ) {
                        echo "<span class='success'>Message Delete Successfully.</span>";
                    } else {
                        echo "<span class='error'>Something went wrong!</span>";
                    }
            	}


            	// message move to seen box
            	if( isset($_GET['seenMsgID']) && $_GET['seenMsgID'] != NULL ) {
            		$seenMsgID = $_GET['seenMsgID'];
            		$up_query = "UPDATE tbl_contact 
                        SET
                        status  = '1'
                        WHERE id = '$seenMsgID'
                        ";
                    $seenMsg = $db->update($up_query);
                    if( $seenMsg ) {
                        echo "<span class='success'>Message Move to Seen Box.</span>";
                    } else {
                        echo "<span class='error'>Something went wrong! </span>";
                    }
            	}
            ?>
            <div class="block">        
                <table class="data display datatable" id="example">
				<thead>
					<tr>
						<th>Serial No.</th>
						<th>Name</th>
						<th>Email</th>
						<th>Message</th>
						<th>Date</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$query = "SELECT * FROM tbl_contact WHERE status = '0' ORDER BY id DESC";
						$cat = $db->select($query);
						if( $cat ) {
							$i = 0;
							while( $result = $cat->fetch_assoc() ) {
							$i++;
					?>
					<tr class="odd gradeX">
						<td><?php echo $i; ?></td>
						<td><?php echo $result['firstname'].' '.$result['lastname']; ?></td>
						<td><?php echo $result['email']; ?></td>
						<td><?php echo $format->textShorten($result['message'], 30); ?></td>
						<td><?php echo $format->formateDate($result['date']); ?></td>
						<td>
							<a href="view-msg.php?msgID=<?php echo $result['id']; ?>">View</a> ||
							<a href="reply-msg.php?msgID=<?php echo $result['id']; ?>">Reply</a> ||
							<a onclick="return confirm('Are sure to seen this message?');" href="?seenMsgID=<?php echo $result['id']; ?>">Seen</a>
						</td>
					</tr>
					<?php } } ?>
				</tbody>
			</table>
           </div>
        </div>

        <div class="box round first grid">
            <h2>Seen Messages</h2>
            <div class="block">        
                <table class="data display datatable" id="example">
				<thead>
					<tr>
						<th>Serial No.</th>
						<th>Name</th>
						<th>Email</th>
						<th>Message</th>
						<th>Date</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$query = "SELECT * FROM tbl_contact WHERE status = '1' ORDER BY id DESC";
						$cat = $db->select($query);
						if( $cat ) {
							$i = 0;
							while( $result = $cat->fetch_assoc() ) {
							$i++;
					?>
					<tr class="odd gradeX">
						<td><?php echo $i; ?></td>
						<td><?php echo $result['firstname'].' '.$result['lastname']; ?></td>
						<td><?php echo $result['email']; ?></td>
						<td><?php echo $format->textShorten($result['message'], 30); ?></td>
						<td><?php echo $format->formateDate($result['date']); ?></td>
						<td>
							<a onclick="return confirm('Are sure to delete this message?');" href="?delMsgID=<?php echo $result['id']; ?>">Delete</a>
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