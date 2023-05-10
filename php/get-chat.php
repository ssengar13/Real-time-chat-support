<?php
session_start();
if(isset($_SESSION['unique_id'])){
    include_once "config.php";
    $outgoing_id = $_SESSION['unique_id'];
    $incoming_id = mysqli_real_escape_string($conn, $_REQUEST['incoming_id']);
    $output = "";
    $sql = "SELECT * FROM messages LEFT JOIN users ON users.unique_id = messages.outgoing_msg_id
            WHERE (outgoing_msg_id = {$outgoing_id} AND incoming_msg_id = {$incoming_id})
            OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id}) ORDER BY msg_id";
    $query = mysqli_query($conn, $sql);
    if(mysqli_num_rows($query) > 0){
        while($row = mysqli_fetch_assoc($query)){
            if($row['outgoing_msg_id'] == $outgoing_id){
                $output .= '<div class="chat outgoing">
                            <div class="details">';
                            if(!empty($row['msg'])){
                                $output .= '<p>'. $row['msg'] .'</p>';
                            }
                if (!empty($row['attachment'])) {
                    $output .= '<div class="attachment-container">
                                <img src="php/' . $row['attachment'] . '" alt="Attachment" class="imgattach1">
                                <a href="php/' . $row['attachment'] . '" download><i class="fa fa-solid fa-download fa-md" style="color: #000000;"></i></a>
                                </div>';
                }
                $output .= '</div>
                            </div>';
            } else {
                $output .= '<div class="chat incoming">
                            <img src="images/icon_cbt.png" alt="" class="logo">
                            <div class="details">';
                            if(!empty($row['msg'])){
                                $output .= '<p>'. $row['msg'] .'</p>';
                            }
                if (!empty($row['attachment'])) {
                    $output .= '<div class="attachment-container2">
                                <img src="php/' . $row['attachment'] . '" alt="Attachment" class="imgattach2">
                                <a href="php/' . $row['attachment'] . '" download><i class="fa fa-solid fa-download fa-md" style="color: #000000;"></i></a>
                                </div>';
                            }
                $output .= '</div>
                            </div>';
            }
        }
    } else {
        $output = '<div class="" style="text-align:center; font-size: 18px;">No messages are available. Once you send message they will appear here.</div>';
    }
    echo $output;
} else {
    header("location: ../login.php");
}
?>
    <!-- session_start(); -->
    <!-- // echo "<pre>";
    // print_r($_SESSION);
    // echo "</pre>";
    // die(); -->
    <!-- if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        $outgoing_id = $_SESSION['unique_id'];
        $incoming_id = mysqli_real_escape_string($conn, $_REQUEST['incoming_id']);
        $output = "";
        $sql = "SELECT * FROM messages LEFT JOIN users ON users.unique_id = messages.outgoing_msg_id
                WHERE (outgoing_msg_id = {$outgoing_id} AND incoming_msg_id = {$incoming_id})
                OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id}) ORDER BY msg_id";
        $query = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_assoc($query)){
                if($row['outgoing_msg_id'] == $outgoing_id){
                    $output .= '<div class="chat outgoing">
                                <div class="details">
                                    <p>'. $row['msg'] .'</p>
                                </div>
                                </div>';
                }else{
                    $output .= '<div class="chat incoming">
                                <img src="icon_cbt.png" alt="">
                                <div class="details">
                                    <p>'. $row['msg'] .'</p>
                                </div>
                                </div>';
                }
            }
        }else{
            $output = '<div class="" style="text-align:center; font-size: 18px;">No messages are available. Once you send message they will appear here.</div>';
        }
        echo $output;
    }else{
        header("location: ../login.php");
    } -->