<?php
function add_student($post)
{

    $con = mysqli_connect("localhost", "root", "root", "db_edu");
    $sql = "select * from `students`";
    $res = mysqli_query($con, $sql);
    if (isset($post["add_student"])) {

        $d = date('Y-m-d');
        if (mysqli_num_rows($res) == 0) {

            $sql2 = "insert into `students`(group_id,name,surname,email,phone, date) values(json_array(json_object('id','{$post['group_id']}')),'{$post['fname']}','{$post['sname']}','{$post['email']}','{$post['phone']}','$d')";
            mysqli_query($con, $sql2);

            header("Location: home.php");

        } else {
            $sql3 = "select * from `students`";
            $res3 = mysqli_query($con, $sql3);
            // if (mysqli_num_rows($res3) == 0) {

            $sql4 = "insert into `students` (group_id,name,surname,email,phone, date) values(json_array(json_object('id','{$post['group_id']}')),'{$post['fname']}','{$post['sname']}','{$post['email']}','{$post['phone']}','$d')";
            mysqli_query($con, $sql4);
            header("Location: home.php");
            // } else {
            $sql9 = "select *  from `students`";
            $res9 = mysqli_query($con, $sql9);
            for ($data3 = []; $v = $res9->fetch_assoc(); $data3[] = $v);
            foreach ($data3 as $v3) {

                $sql7 = "select *  from `students` where phone = '{$v3['phone']}'";
                $res7 = mysqli_query($con, $sql7);
                for ($data2 = []; $v = $res7->fetch_assoc(); $data2[] = $v);
                $s = [];
                foreach ($data2 as $v) {
                    foreach (json_decode($v['group_id'], 1) as $g) {
                        array_push($s, $g['id']);
                    }

                }
                $bool = false;
                $sql8 = "select * from `groups`";
                $res8 = mysqli_query($con, $sql8);
                for ($data = []; $g = $res8->fetch_assoc(); $data[] = $g);
                if (!in_array($post["group_id"], $s)) {
                    echo $g['id'];
                    $sql5 = "update `students` set `group_id` = JSON_ARRAY_APPEND(group_id,'$',CAST(JSON_OBJECT('id','{$post['group_id']}') AS JSON)) where `phone` = '{$post['phone']}' ";
                    $res5 = mysqli_query($con, $sql5);
                    break;

                }

                // header("Location: home.php");
            }

            // }
        }
    }

}

function control($post)
{
    $con = mysqli_connect("localhost", "root", "root", "db_edu");
    $sql = "select * from `students`";
    $res = mysqli_query($con, $sql);
    for ($data = []; $g = $res->fetch_assoc(); $data[] = $g);
if(isset($post['save'])) {

    foreach ($data as $v) {
        $d = date("Y-m-d");
        $k = date("d");
        $sql3 = "select * from `control`";
        $res3 = mysqli_query($con, $sql3);
        for ($data3 = []; $g = $res3->fetch_assoc(); $data3[] = $g);
        if (mysqli_num_rows($res3) == 0) {
            echo $post[$v['id']];
            if ($post[$v['id']] == "on") {
                $sql2 = "insert into `control`(student_id,name) values ('{$v['id']}',json_array(json_object('cont','bar','d','$d','k','$k')))";

            } else {
                $sql2 = "insert into `control`(student_id,name) values ('{$v['id']}',json_array(json_object('cont','joq','d','$d','k','$k')))";

            }
            mysqli_query($con, $sql2);

        } else {

            $se = [];
            foreach ($data3 as $v1) {

                $se = array_column(json_decode($v1['name'], 1), 'd');

            }

            $search = array_column($data3, 'student_id');
            if (!in_array($v['id'], $search)) {

                if ($post[$v['id']] == "on") {
                    $sql2 = "insert into `control`(student_id,name) values ('{$v['id']}',json_array(json_object('cont','bar','d','$d','k','$k')))";

                } else {
                    $sql2 = "insert into `control`(student_id,name) values ('{$v['id']}',json_array(json_object('cont','joq','d','$d','k','$k')))";

                }
                mysqli_query($con, $sql2);
                break;

            } else {
                if (!in_array($d, $se)) {
                    if ($post[$v['id']] == "on") {
                        $sql4 = "update  `control` set name = JSON_ARRAY_APPEND(name,'$',CAST(JSON_OBJECT('cont','bar','d','$d','k','$k') AS JSON)) where student_id = {$v['id']}";

                    } else {

                        $sql4 = "update  `control` set name = JSON_ARRAY_APPEND(name,'$',CAST(JSON_OBJECT('cont','joq','d','$d','k','$k') AS JSON)) where student_id = {$v['id']}";

                    }
                    mysqli_query($con, $sql4);

                }
            }
        }
    }
}

}
