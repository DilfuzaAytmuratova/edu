<?php
function add_teachers($post)
{

    $con = mysqli_connect("localhost", "root", "root", "db_edu");
    $sql = "select * from `teachers`";
    $res = mysqli_query($con, $sql);
    if (isset($post["add_teacher"])) {

        if (mysqli_num_rows($res) == 0) {

            $sql2 = "insert into `teachers` (group_id,name,surname,phone,login,password,email,img) values(json_array(json_object('id','{$post['group_id']}')),'{$post['fname']}','{$post['sname']}','{$post['phone']}','{$post['login']}','{$post['password']}','{$post['email']}','png-transparent-profile-logo-computer-icons-user-user-blue-heroes-logo-thumbnail.png')";
            mysqli_query($con, $sql2);

            header("Location: home.php");

        } else {
            $sql3 = "select * from `teachers` where phone = '{$post['phone']}'";
            $res3 = mysqli_query($con, $sql3);
            if (mysqli_num_rows($res3) == 0) {

                $sql4 = "insert into `teachers` (group_id,name,surname,phone,login,password,email,img) values(json_array(json_object('id','{$post['group_id']}')),'{$post['fname']}','{$post['sname']}','{$post['phone']}','{$post['login']}','{$post['password']}','{$post['email']}','png-transparent-profile-logo-computer-icons-user-user-blue-heroes-logo-thumbnail.png')";
                mysqli_query($con, $sql4);
                header("Location: home.php");
            } else {
                $sql7 = "select *  from `teachers`";
                $res7 = mysqli_query($con, $sql7);
                $s = [];
                for ($data2 = []; $v = $res7->fetch_assoc(); $data2[] = $v);
                foreach ($data2 as $v) {
                    foreach (json_decode($v['group_id'], 1) as $g) {
                        array_push($s, $g['id']);

                    }

                }
                $sql8 = "select * from `groups`";
                $res8 = mysqli_query($con, $sql8);
                for ($data = []; $g = $res8->fetch_assoc(); $data[] = $g);
                foreach ($data as $g) {

                    if (!in_array($g["id"], $s)) {
                        $sql5 = "update `teachers` set `group_id` = JSON_ARRAY_APPEND(group_id,'$',CAST(JSON_OBJECT('id','{$post['group_id']}') AS JSON)) where `phone` = '{$post['phone']}' ";
                    }
                }
                $res5 = mysqli_query($con, $sql5);

            }
        }
    }

}

function editTeacher($post)
{
    // $teachers = json_decode(file_get_contents("../Models/teachers.json"), 1);

    if (isset($post["edit"])) {
        $con = mysqli_connect("localhost", "root", "root", "db_edu");
        $sql = "UPDATE `teachers` SET `name` = '{$post['fname']}',`surname` = '{$post['sname']}',`phone` = '{$post['phone']}',`login` = '{$post['login']}',`password` = '{$post['password']}',`email` = '{$post['email']}' WHERE phone = {$post['phone']}";
        $res = mysqli_query($con, $sql);

    }

}

function imgs($post,$id)
{
    move_uploaded_file($_FILES["file"]["tmp_name"], "../assets/img/" . $_FILES['file']['name']);
    $con = mysqli_connect("localhost", "root", "root", "db_edu");
    if (isset($post["photo_btn"])) {

        if ($_FILES["file"]["name"] != "") {
            $sql = "UPDATE `teachers` SET `img` = '{$_FILES['file']['name']}' WHERE id = {$id}";
            mysqli_query($con, $sql);
            // header("location: teachers_info.php");
        }
    }
}
