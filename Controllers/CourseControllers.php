<?php
function add_course($post)
{

    $con = mysqli_connect("localhost", "root", "root", "db_edu");
    $sql = "select * from `courses`";
    $res = mysqli_query($con, $sql);
    if (isset($post["add_course"])) {
        if (mysqli_num_rows($res) == 0) {
            $sql2 = "insert into `courses`(name) values ('{$post['name']}')";
            mysqli_query($con, $sql2);
            header("Location: home.php");

        } else {
            $sql3 = "select * from `courses` where id = '{$post['id']}'";
            $res3 = mysqli_query($con, $sql3);
            if (mysqli_num_rows($res3) == 0) {
                $sql4 = "insert into `courses`(name) values ('{$post['name']}')";
                mysqli_query($con, $sql4);
                header("Location: home.php");

            }

        }
    }

}
