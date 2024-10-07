<?php 
    include_once('../lib/Session.php');
    Session::check_session();

    include_once('../config/config.php');
    include_once('../lib/Database.php');
    $db = new Database();


    if( ! isset($_GET['delPostID']) && $_GET['delPostID'] == NULL ) {
        echo "<script>window.location = 'postlist.php';</script>";
        // header('Location: postlist.php');
    } else {
        $delID = $_GET['delPostID'];

        $query ="SELECT * FROM tbl_post WHERE id='$delID'";
        $sel_post = $db->select($query);
        if( $sel_post ) {
            while( $postResult = $sel_post->fetch_assoc() ) {
                $delImgLink = $postResult['image'];
                unlink('uploads/'.$delImgLink);
            }
        }

        $delQuery = "DELETE FROM tbl_post WHERE id='$delID'";
        $delResult = $db->delete($delQuery);
        if( $delResult ) {
            echo "<script>window.location = 'postlist.php';</script>";
            echo "<script>alert('Post Deleted Successful...');</script>";
        } else {
            echo "<script>window.location = 'postlist.php';</script>";
            echo "<script>alert('Post Deletion Failed...');</script>";

        }
    }
?>