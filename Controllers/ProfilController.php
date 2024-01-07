<?php
session_start();
function profil($post)
{
    $con = mysqli_connect("localhost", "root", "root", "db_edu");
    $sql = "select * from `admins`";
    $res = mysqli_query($con, $sql);

    if (isset($post["add_admin"])) {

        if (mysqli_num_rows($res) == 0) {
            $sql2 = "insert into `admins`(name,surname,phone,login,password,email) values('{$post['fname']}','{$post['sname']}','{$post['phone']}','{$post['login']}','{$post['password']}','{$post['email']}')";
            mysqli_query($con, $sql2);

            if ($_SESSION["login"]) {

                header("Location: home.php");
            } else {
                header("Location: ../index.php");

            }

        } else {
            $sql3 = "select * from `admins` where phone = '{$post['phone']}'";
            $res3 = mysqli_query($con, $sql3);

            if (mysqli_num_rows($res3) == 0) {
                $sql4 = "insert into `admins`(name,surname,phone,login,password,email) values('{$post['fname']}','{$post['sname']}','{$post['phone']}','{$post['login']}','{$post['password']}','{$post['email']}')";
                mysqli_query($con, $sql4);

                if ($_SESSION["login"]) {

                    header("Location: home.php");
                } else {
                    header("Location: ../index.php");

                }

            } else {
                echo "Bul nomer dizimge alınǵan";
            }
        }
    }

}

function editProfil($post)
{
    $con = mysqli_connect("localhost", "root", "root", "db_edu");

    if (isset($post["save"])) {
        $sql = "UPDATE `admins` SET `name` = '{$post['fname']}',`surname` = '{$post['sname']}',`email` = '{$post['email']}', `phone` = '{$post['phone']}',`login` = '{$post['login']}',`password` = '{$post['password']}' WHERE `admins`.`id` = {$_SESSION["id"]}";
        mysqli_query($con, $sql);

        header("Location: profile.php");
    }

}

function imgs($post)
{
    move_uploaded_file($_FILES["file"]["tmp_name"], "../assets/img/" . $_FILES['file']['name']);
    $con = mysqli_connect("localhost", "root", "root", "db_edu");

    if (isset($post["photo_btn"])) {

        if ($_FILES["file"]["name"] != "") {
            $sql = "UPDATE `imgs` SET `img` = '{$_FILES['file']['name']}' WHERE `imgs`.`user_id` = {$_SESSION["id"]}";
            mysqli_query($con, $sql);
            header("location: profile.php");
        }
    }
}

// move_uploaded_file($_FILES["file"]["tmp_name"], "../assets/img/" . $_FILES['file']['name']);
// $con = mysqli_connect("localhost", "root", "root", "db_edu");

// if (isset($post["photo_btn"])) {
//
// }
