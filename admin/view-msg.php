<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>

<?php 
    if(isset($_GET['msgID']) && $_GET['msgID'] != NULL ) {
        $msgID = $_GET['msgID'];
    } else {
        echo "<script>window.location = 'inbox.php';</script>";
        // header('Location: inbox.php');
    }
?>

    <div class="grid_10 add-post">	
        <div class="box round first grid">
            <h2>View Message</h2>
            <div class="block">
            <?php 
                if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
                    echo "<script>window.location = 'inbox.php';</script>";
                }

                // show messges querys
                $query = "SELECT * FROM tbl_contact WHERE id = '$msgID'";
                $msg = $db->select($query);
                if( $msg ) {
                    while( $result = $msg->fetch_assoc() ) {
            ?>
            <br>
             <form action="" method="post">
                <table class="form">                   
                    <tr>
                        <td>
                            <label>Name</label>
                        </td>
                        <td>
                            <input type="text" readonly="1" value="<?php echo $result['firstname'].' '.$result['lastname']; ?>" class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Email</label>
                        </td>
                        <td>
                            <input type="text" readonly="1" value="<?php echo $result['email']; ?>" class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Date</label>
                        </td>
                        <td>
                            <input type="text" readonly="1" value="<?php echo $format->formateDate($result['date']); ?>" class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top; padding-top: 9px;">
                            <label>Content</label>
                        </td>
                        <td>
                            <textarea name="body" class="tinymce"><?php echo $result['message']; ?></textarea>
                        </td>
                    </tr>
					<tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" Value="OK" />
                        </td>
                    </tr>
                </table>
            </form>
            <?php } } ?>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function () {
            setupTinyMCE();
            setDatePicker('date-picker');
            $('input[type="checkbox"]').fancybutton();
            $('input[type="radio"]').fancybutton();
        });
    </script>
<?php include_once 'inc/footer.php'; ?>