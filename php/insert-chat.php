
<!-- session_start();
if(isset($_SESSION['unique_id'])){
    include_once "config.php";
    $outgoing_id = $_SESSION['unique_id'];
    $incoming_id = mysqli_real_escape_string($conn, $_REQUEST['incoming_id']);
    $message = mysqli_real_escape_string($conn, $_REQUEST['message']);
    $attachment = mysqli_real_escape_string($conn, $_REQUEST['attachment']);
    if(!empty($message)){
        $sql = mysqli_query($conn, "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg, attachment)
                                    VALUES ({$incoming_id}, {$outgoing_id}, '{$message}', '{$attachment}')");
        if($sql){
            echo "Message Sent";
        } else {
            print_r(mysqli_error($conn));
        }
    }
} else {
    header("location: ../login.php");
} -->

<?php
session_start();
if(isset($_SESSION['unique_id'])){
    include_once "config.php";
    $outgoing_id = $_SESSION['unique_id'];
    $incoming_id = mysqli_real_escape_string($conn, $_REQUEST['incoming_id']);

    if(isset($_FILES['attachment'])){
        $img_name = $_FILES['attachment']['name'];
        $img_type = $_FILES['attachment']['type'];
        $tmp_name = $_FILES['attachment']['tmp_name'];

        $img_explode = explode('.',$img_name);
        $img_ext = end($img_explode);

        $extensions = ["jpeg", "png", "jpg"];
        if(in_array($img_ext, $extensions) === true){
            $types = ["image/jpeg", "image/jpg", "image/png"];
            if(in_array($img_type, $types) === true){
                $time = time();
                $new_img_name = $time.$img_name;
                if(move_uploaded_file($tmp_name,"images/".$new_img_name)){
                    $attachment = $new_img_name;
                }
            }
        }
    } else {
        $message = mysqli_real_escape_string($conn, $_REQUEST['message']);
        $attachment = "";
        if(!empty($message)){
            $sql = mysqli_query($conn, "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg, attachment)
                                        VALUES ({$incoming_id}, {$outgoing_id}, '{$message}', '{$attachment}')");
            if($sql){
                echo "Message Sent";
            } else {
                print_r(mysqli_error($conn));
            }
        }
    }

    if(!empty($attachment)){
        $sql = mysqli_query($conn, "INSERT INTO messages (incoming_msg_id, outgoing_msg_id,attachment)
                                    VALUES ({$incoming_id}, {$outgoing_id}, {$attachment})");
        if($sql){
            echo "Message Sent";
        } else {
            print_r(mysqli_error($conn));
        }
    }

} else {
    header("location: ../login.php");
}
?>

