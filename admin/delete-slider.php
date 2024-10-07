<?php 
    include_once('../lib/Session.php');
    Session::check_session();

    include_once('../config/config.php');
    include_once('../lib/Database.php');
    $db = new Database();


    if( ! isset($_GET['delSliderID']) && $_GET['delSliderID'] == NULL ) {
        echo "<script>window.location = 'postlist.php';</script>";
        // header('Location: postlist.php');
    } else {
        $delSliderID = $_GET['delSliderID'];

        $query ="SELECT * FROM tbl_slider WHERE id='$delSliderID'";
        $sel_slider = $db->select($query);
        if( $sel_slider ) {
            while( $sliderResult = $sel_slider->fetch_assoc() ) {
                $delImgLink = $sliderResult['image'];
                unlink('uploads/slider/'.$delImgLink);
            }
        }

        $delQuery = "DELETE FROM tbl_slider WHERE id='$delSliderID'";
        $delResult = $db->delete($delQuery);
        if( $delResult ) {
            echo "<script>window.location = 'postlist.php';</script>";
            echo "<script>alert('Slider Deleted Successful...');</script>";
        } else {
            echo "<script>window.location = 'postlist.php';</script>";
            echo "<script>alert('Slider Deletion Failed...');</script>";

        }
    }
?>