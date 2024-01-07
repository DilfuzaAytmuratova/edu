<?php
function add_group($post)
{

    $con = mysqli_connect("localhost","root","root","db_edu");
    $sql = "select * from `groups`";
    $res = mysqli_query($con,$sql);
    $groups = json_decode(file_get_contents("../Models/groups.json"), 1);
    if (isset($post["add_group"])) {

            $d = date('Y-m-d');
            $sql2 = "insert into `groups`(course_id,gname,month,price,date) values ('{$post['course_id']}', '{$post['gname']}','{$post['month']}', '{$post['price']}', '$d')";
            mysqli_query($con,$sql2);
           
            header("Location: home.php");

    }

}

function editGroup($post) {
    if (isset($post["edit"])) {
        

    }
    if (isset($post["edit_group"])) {
        $d = date('Y-m-d');
        print_r($_GET['edit_id']);
        $con = mysqli_connect("localhost", "root", "root", "db_edu");
        $sql4 = "UPDATE `groups` SET `gname` = '{$post['gname']}',`month` = '{$post['month']}',`price` = '{$post['price']}',`date` = '$d' WHERE id = {$_GET['edit_id']}";
            mysqli_query($con, $sql4);
        header("Location: home.php");
        

    }

}

?>