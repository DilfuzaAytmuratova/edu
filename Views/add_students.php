<?php

include "header.php";
?>
<div class="col-12 col-md-12 col-lg-12 ">
    <div class="row align-items-center justify-content-center">

        <div class="card col-8">
            <div class="padding-20">

                <div class="tab-content " id="myTab3Content">

                    <div class="tab-pane fade show active" id="settings" role="tabpanel" aria-labelledby="profile-tab2">
                        <form method="POST" class="needs-validation">
                            <div class="card-header">
                                <h4>Oqıwshı qosıw</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">

                                    <div class="form-group col-md-6 col-12">
                                        <label>Atı</label>
                                        <input type="text" name="fname" class="form-control" required="" value="">
                                        <div class="invalid-feedback">
                                            Please fill in the first name
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Familiya</label>
                                        <input type="text" name="sname" class="form-control" required="" value="">
                                        <div class="invalid-feedback">
                                            Please fill in the last name
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label>Elektron pochta</label>
                                        <input type="email" name="email" class="form-control" required="" value="">
                                        <div class="invalid-feedback">
                                            Please fill in the email
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Telefon nomer</label>
                                        <input type="tel" name="phone" class="form-control" required="" value="">
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="form-group col-6">
                                        <label>Gruppa</label>
                                        <select class="form-control" name="group_id">
                                            <option selected>Saylań</option>
                                            <?php
$con = mysqli_connect("localhost", "root", "root", "db_edu");


$sql = "select * from `groups`";
$res = mysqli_query($con, $sql);
for ($data = []; $g = $res->fetch_assoc(); $data[] = $g);
foreach ($data as $g) {

        ?>
                                            <option value="<?=$g['id']?>"><?=$g['gname']?></option>
                                            <?php
}
?>
                                        </select>
                                    </div>

                                    <div class="form-group  col-6 text-right " style="padding-top: 30px;">

                                        <button class="btn btn-primary" style="padding: 8px 10px;"
                                            name="add_student">Qosıw</button>

                                    </div>
                                </div>


                            </div>

                        </form>
                        <?php

require "../Controllers/StudentControllers.php";
add_student($_POST);
?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<?php

include "main.php";
?>