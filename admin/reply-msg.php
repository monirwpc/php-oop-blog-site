<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>

<?php 
echo 'Current PHP version: ' . phpversion();

    $msgID = mysqli_real_escape_string( $db->link, $_GET['msgID']);
    if(isset($msgID) && $msgID != NULL ) {
        $msgID = $msgID;
    } else {
        echo "<script>window.location = 'inbox.php';</script>";
        // header('Location: inbox.php');
    }
?>

    <div class="grid_10 add-post">	
        <div class="box round first grid">
            <h2>Reply Message</h2>
            <div class="block">
            <?php 
                if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
                    $toEmail   = $format->login_validation($_POST['toEmail']);
                    $fromEmail = $format->login_validation($_POST['fromEmail']);
                    $subject   = $format->login_validation($_POST['subject']);
                    $message   = $_POST['message'];

                    $toEmail   = mysqli_real_escape_string( $db->link, $toEmail );
                    $fromEmail = mysqli_real_escape_string( $db->link, $fromEmail );
                    $subject   = mysqli_real_escape_string( $db->link, $subject );
                    $message   = mysqli_real_escape_string( $db->link, $message );

                    $mail = mail($toEmail, $subject, $message, $fromEmail);

                    if ($mail) {
                    	echo "<span class='success'>Email Send Successful...</span>";
                    } else {
                    	echo "<span class='error'>Something went wrong...</span>";
                    }
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
                            <label>To</label>
                        </td>
                        <td>
                            <input type="text" readonly="1" name="toEmail" value="<?php echo $result['email']; ?>" class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>From</label>
                        </td>
                        <td>
                            <input type="text" name="fromEmail" placeholder="Enter from email" class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Subject</label>
                        </td>
                        <td>
                            <input type="text" name="subject" placeholder="subject" class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top; padding-top: 9px;">
                            <label>Message</label>
                        </td>
                        <td>
                            <textarea name="message" class="tinymce" placeholder="mail text"></textarea>
                        </td>
                    </tr>
					<tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" Value="Send Mail" />
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