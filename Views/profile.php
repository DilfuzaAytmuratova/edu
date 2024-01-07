<?php

session_start();
include "header.php";
$admins = json_decode(file_get_contents("../Models/admins.json"), 1);

?>
<style>
.dropzone {
    min-height: 45px !important;
}
.img {
    background-image: url('https://img.freepik.com/premium-vector/avatar-flat-icon-human-white-glyph-blue-background_822686-239.jpg');
    background-size: 100% 100%;
}
</style>
<div class="col-12 col-md-12 col-lg-4" style="padding-left: 56px;">
    <div class="card author-box p-3">
        <div class="card-body">
            <div class="author-box-center">
                <div class="d-flex">

                    <div class=" "
                        style="width: 100px; height: 80px;margin: 0 auto; position: relative;    ">

                        <?php
$imgs = json_decode(file_get_contents('../Models/imgs.json'), 1);
$con = mysqli_connect("localhost","root","root","db_edu");
$sql = "select * from `imgs` where user_id = '{$_SESSION['id']}'";
$res = mysqli_query($con,$sql);

for($data = [];$v = $res -> fetch_assoc();$data[] = $v);

    if ($_SESSION["id"] == $data[0]["user_id"]) {
        ?>
                        <form action="" method="post" enctype="multipart/form-data" style="position: absolute;">
                            <div class="custom-file "  style="position: absolute;">
                                <input type="file" name="file" class="custom-file-input " id="customFile"
                                    style="position: absolute;  width: 70px; height: 70px; left: 0px;">

                                <figure class="avatar img  avatar-xl"
                                    style="display: flex; align-items: center; justify-content: center;  position: absolute; top: 0; left: 0;border: none ;outline: none; ">
                                    <img src="../assets/img/<?=$data[0]['img']?>" style="border: none; outline: none;">
                                </figure>
                            </div>
                            <div style="position: absolute; display: flex; align-items: center;justify-content: center; top:52px ; left: 80px;">
                            <label for="ok" style="margin-top: 7px; "> <i class="fas fa-edit"></i> </label>
                            <input id="ok" type="submit" name="photo_btn" style="background-color: transparent; border: none;color: #6c757d;" value="Edit photo">
                            </div>

                        </form>

                        <!-- <img src="" class="rounded-circle author-box-picture w-100 h-100" style="background-color: transparent;"> -->
                        <?php
}   

?>
                    </div>
                    <!-- <div style="position: absolute; top: 90px;right: 190px; display: flex;">
                        <form action="" method="post">
                        </form>
                    </div> -->
                </div>

                <div class="card-body p-0">

                    <?php
$sql2 = "select * from `admins` where id = '{$_SESSION['id']}'";
$res2 = mysqli_query($con,$sql2);

for($data2 = [];$v = $res2 -> fetch_assoc();$data2[] = $v);
    if($_SESSION["id"] == $data2[0]["id"]) {

?>
                </div>
                <div class="clearfix"></div>
                <div class="author-box-name mt-2">
                    <sapn><?=$data2[0]["surname"]." ".$data2[0]["name"]?></sapn>

                </div>
            </div>

        </div>
    </div>
    <div class="card ">
        <div class="card-header">
            <h4>Jeke maǵluwmatlar</h4>
        </div>
        <div class="card-body">
            <div class="py-4">
                
                <p class="clearfix">
                    <span class="float-left">
                        Telefon nomer
                    </span>
                    <span class="float-right text-muted">
                        <?=$data2[0]["phone"]?>
                    </span>
                </p>
                <p class="clearfix">
                    <span class="float-left">
                        Elektron pochta
                    </span>
                    <span class="float-right text-muted">
                        <?=$data2[0]["email"]?>
                    </span>
                </p>
                <form action="" class="text-right" method="post">
                    <input type="submit" name="edit-btn" value="Ózgertiw" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>

</div>
<div class="col-12 col-md-12 col-lg-8">
    <div class="card">
        <div>

            <div class="tab-content tab-bordered" id="myTab3Content">

                <div class="tab-pane fade show active" id="settings" role="tabpanel" aria-labelledby="profile-tab2">
                    <form method="POST" class="needs-validation">
                        <div class="card-header">
                            <h4> Maǵluwmatlardı  jańalaw</h4>
                        </div>
                    
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label>Atı</label>
                                    <input type="text" <?=(isset($_POST["edit-btn"])) ? "" : "readonly"?> name="fname"
                                        class="form-control" value="<?=$data2[0]['name']?>">
                                    <div class="invalid-feedback">
                                        Please fill in the first name
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label>Familiya</label>
                                    <input type="text" <?=(isset($_POST["edit-btn"])) ? "" : "readonly"?> name="sname"
                                        class="form-control" value="<?=$data2[0]['surname']?>">
                                    <div class="invalid-feedback">
                                        Please fill in the last name
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label>Elektron pochta</label>
                                    <input type="email" <?=(isset($_POST["edit-btn"])) ? "" : "readonly"?> name="email"
                                        class="form-control" value="<?=$data2[0]['email']?>">
                                    <div class="invalid-feedback">
                                        Please fill in the email
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label>Telefon nomer</label>
                                    <input type="tel" <?=(isset($_POST["edit-btn"])) ? "" : "readonly"?> name="phone"
                                        class="form-control" value="<?=$data2[0]['phone']?>">
                                </div>

                            </div>

                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label>Login</label>
                                    <input <?=(isset($_POST["edit-btn"])) ? "" : "readonly"?> name="login" type="text"
                                        class="form-control" value="<?=$data2[0]['login']?>">

                                </div>

                                <div class="form-group col-6">
                                    <label>Parol</label>
                                    <input <?=(isset($_POST["edit-btn"])) ? "" : "readonly"?> name="password"
                                        type="text" class="form-control" value="<?=$data2[0]['password']?>">
                                </div>
                            </div>

                            <div class="row">
                                
                                <div class="form-group  col-12 text-right " style="padding-top: 30px;">
                                    <form action="" method="post">
                                        <button class="btn btn-primary" style="padding: 8px 10px;" name="save">Saqlaw
                                            </button>
                                        <a href="home.php?back=<?=true?>" style="padding: 8px 10px;"
                                            class="btn btn-primary my-2">Izge</a>

                                    </form>
                                </div>
                                <?php
                               
require "../Controllers/ProfilController.php";
profil($_POST);
editProfil($_POST);
imgs($_POST);

?>

                            </div>

                        </div>
                        <?php
}
                        ?>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include "main.php";
?>