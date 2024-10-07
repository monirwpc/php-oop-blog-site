<?php 
    include_once('../lib/Session.php');
    Session::check_session();

    include_once('../config/config.php');
    include_once('../lib/Database.php');
    $db = new Database();


    // delete page
    if( isset($_GET['delpage']) && $_GET['delpage'] != NULL ) {
        $delID = $_GET['delpage'];
        $delQuery ="DELETE FROM tbl_page WHERE id='$delID'";
        $delPage  = $db->delete($delQuery);
        if( $delPage ) {
            echo "<script>alert('Page Delete Successfull...');</script>";
            echo "<script>window.location= 'index.php';</script>";
        } else {
            echo "<script>alert('Page Deletion Failed...');</script>";
            echo "<script>window.location= 'index.php';</script>";
        }
    } else {
        echo "<script>window.location= 'index.php';</script>";
    }
?>