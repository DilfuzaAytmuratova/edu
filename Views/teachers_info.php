<?php

include "header.php";
// $teachers = json_decode(file_get_contents("../Models/teachers.json"), 1);
$con = mysqli_connect("localhost", "root", "root", "db_edu");
$sql = "select * from `teachers`";
$res = mysqli_query($con, $sql);
for ($data = []; $v = $res->fetch_assoc(); $data[] = $v);

foreach ($data as $v) {
    if ($v['id'] == $_GET["id"]) {
        ?>

<div class="col-12 col-md-12 col-lg-4">
    <div class="card author-box">
        <div class="card-body">
            <div class="author-box-center">
                <div class=" " style="width: 100px; height: 80px;margin: 0 auto; position: relative;    ">

                    <form action="" method="post" enctype="multipart/form-data" style="position: absolute;">
                        <div class="custom-file " style="position: absolute;">
                            <input type="file" name="file" class="custom-file-input " id="customFile"
                                style="position: absolute;  width: 70px; height: 70px; left: 0px;">

                            <figure class="avatar img  avatar-xl"
                                style="display: flex; align-items: center; justify-content: center;  position: absolute; top: 0; left: 0;border: none ;outline: none; ">
                                <img src="../assets/img/<?=$data[0]['img']?>" style="border: none; outline: none;">
                            </figure>
                        </div>
                        <div
                            style="position: absolute; display: flex; align-items: center;justify-content: center; top:52px ; left: 80px;">
                            <label for="ok" style="margin-top: 7px; "> <i class="fas fa-edit"></i> </label>
                            <input id="ok" type="submit" name="photo_btn"
                                style="background-color: transparent; border: none;color: #6c757d;" value="Edit photo">
                        </div>

                    </form>
                    
                </div>
            </div>
            <div class="text-center">
                <p><?=$v['surname'] ?> <?=$v['name']?></p>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h4>Groups</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-md">
                    <tbody>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Students count</th>
                        </tr>
                        <?php
$students = json_decode(file_get_contents("../Models/students.json"), 1);
        $sql2 = "select * from `teachers` where id = '{$_GET['id']}'";
        $res2 = mysqli_query($con, $sql2);
        for ($data2 = []; $v = $res2->fetch_assoc(); $data2[] = $v);

        $s = [];
        foreach ($data2 as $v) {
            foreach (json_decode($v['group_id'], 1) as $g) {
                array_push($s, $g['id']);

            }

        }
        $sql4 = "select * from `groups`";
        $res4 = mysqli_query($con, $sql4);
        for ($data4 = []; $v = $res4->fetch_assoc(); $data4[] = $v);

        $i = 1;
        $num = 0;
        foreach ($data2 as $v) {
            foreach ($s as $id) {
                foreach ($data4 as $gr) {
                    $sql7 = "select *  from `students`";
                    $res7 = mysqli_query($con, $sql7);
                    for ($data3 = []; $v = $res7->fetch_assoc(); $data3[] = $v);
                    $nn = [];
                    foreach ($data3 as $v) {
                        foreach (json_decode($v['group_id'], 1) as $g) {
                            if ($g["id"] == $gr["id"]) {
                                array_push($nn, $st);
                            }
                        }

                    }
                    
                    if ($id == $gr["id"]) {

                        ?>
                        <tr>
                            <td><?=$i++?></td>
                            <td><a href="group_in_students.php?id=<?=$gr['id']?>"
                                    style="color: black; text-decoration: none;"><?=$gr['gname']?></a></td>
                            <td><?=count($nn)?></td>

                        </tr>
                        <?php
}
                }
            }
        }
        ?>


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="col-12 col-md-12 col-lg-8">
    <div class="card">
        <div class="padding-20">
            <ul class="nav nav-tabs" id="myTab2" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab2" data-toggle="tab" href="#about" role="tab"
                        aria-selected="true">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#settings" role="tab"
                        aria-selected="false">Edit</a>
                </li>
            </ul>
            <div class="tab-content tab-bordered" id="myTab3Content">
                <?php
foreach ($data2 as $v) {
            if ($v['id'] == $_GET["id"]) {
                ?>
                <div class="tab-pane fade active show" id="about" role="tabpanel" aria-labelledby="home-tab2">
                    <div class="row">

                        <div class="col-md-4 col-6 b-r">
                            <strong>Full Name</strong>
                            <br>
                            <p class="text-muted"><?=$v["surname"]?> <?=$v["name"]?></p>
                        </div>
                        <div class="col-md-4 col-6 b-r">
                            <strong>Mobile</strong>
                            <br>
                            <p class="text-muted"><?=$v["phone"]?></p>
                        </div>
                        <div class="col-md-4 col-6 b-r">
                            <strong>Email</strong>
                            <br>
                            <p class="text-muted"><?=$v["email"]?></p>
                        </div>


                    </div>

                </div>
                <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="profile-tab2">
                    <form method="post" class="needs-validation">
                        <div class="card-header">
                            <h4>Edit Profile</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label>First Name</label>
                                    <input type="text" name="fname" class="form-control" value="<?=$v['name']?>">
                                    <div class="invalid-feedback">
                                        Please fill in the first name
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label>Last Name</label>
                                    <input type="text" name="sname" class="form-control" value="<?=$v['surname']?>">
                                    <div class="invalid-feedback">
                                        Please fill in the last name
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" value="<?=$v['email']?>">
                                    <div class="invalid-feedback">
                                        Please fill in the email
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label>Phone</label>
                                    <input type="tel" name="phone" class="form-control" value="<?=$v['phone']?>">
                                </div>

                            </div>

                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label>Login</label>
                                    <input name="login" type="text" class="form-control" value="<?=$v['login']?>">

                                </div>

                                <div class="form-group col-6">
                                    <label>Password</label>
                                    <input name="password" type="text" class="form-control" value="<?=$v['password']?>">
                                </div>
                            </div>

                            <div class="row">

                                <div class="form-group  col-12 text-right " style="padding-top: 30px;">
                                    <input type="hidden" name="id" value="<?=$v['id']?>">
                                    <button class="btn btn-primary" style="padding: 8px 10px;" name="edit">Save
                                        Changes</button>
                                    <a href="teachers_list.php?id=<?=$v['id']?>" style="padding: 8px 10px;"
                                        class="btn btn-primary my-2">Back</a>


                                </div>

                            </div>

                        </div>

                    </form>
                </div>
                <?php
require "../Controllers/TeacherControllers.php";
                editTeacher($_POST);
                imgs($_POST,$_GET['id']);
            }
        }

        ?>
            </div>
        </div>
    </div>
</div>
<?php
}
}

include "main.php";
?>