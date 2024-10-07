<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>

    <div class="grid_10">
        <div class="box round first grid">
            <h2>Post List</h2>
            <div class="block">  
                <table class="data display datatable" id="example">
				<thead>
					<tr>
						<th width="5%">SL.</th>
						<th width="10%">Title</th>
						<th width="20%">Description</th>
						<th width="10%">Category</th>
						<th width="10%">Image</th>
						<th width="10%">Author</th>
						<th width="10%">Tags</th>
						<th width="10%">Date</th>
						<th width="15%">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$query ="SELECT tbl_post.*, tbl_category.name FROM tbl_post
						INNER JOIN tbl_category
						ON tbl_post.cat = tbl_category.id
						ORDER BY tbl_post.title DESC";
						$select = $db->select($query);

						$i=0;
						if( $select ) {
						while( $result = $select->fetch_assoc() ) {
						$i++;
					?>
					<tr class="odd gradeX">
						<td><?php echo $i; ?></td>
						<td><?php echo $result['title']; ?></td>
						<td><?php echo $format->textShorten( $result['body'], 60 ); ?></td>
						<td><?php echo $result['name']; ?></td>
						<td>
							<img width="100" src="uploads/<?php echo $result['image']; ?>">
						</td>
						<td><?php echo $result['author']; ?></td>
						<td><?php echo $result['tags']; ?></td>
						<td><?php echo $format->formateDate( $result['date'] ); ?></td>
						<td>
							<a href="view-post.php?viewPostID=<?php echo $result['id']; ?>">View</a>
							<?php if(Session::get('userRole') == $result['userid'] || Session::get('userRole') == '1' ) { ?>
							|| <a href="update-post.php?editPostID=<?php echo $result['id']; ?>">Edit</a> 
							|| <a onclick="return confirm('Are you sure to delete this post ?');" href="delete-post.php?delPostID=<?php echo $result['id']; ?>">Delete</a>
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