    <?php

    include "header.php";


    ?>  
                            <div class="col-12 col-md-12 col-lg-12 ">
                                <div class="row align-items-center justify-content-center">

                                    <div class="card col-8">
                                        <div class="padding-20">

                                            <div class="tab-content tab-bordered" id="myTab3Content">

                                                <div class="tab-pane fade show active" id="settings" role="tabpanel"
                                                    aria-labelledby="profile-tab2">
                                                    <form method="POST" class="needs-validation">
                                                        <div class="card-header">
                                                            <h4>Admin qosıw</h4>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="row">

                                                                <div class="form-group col-md-6 col-12">
                                                                    <label>Atı</label>
                                                                    <input type="text" name="fname" class="form-control"
                                                                        required="" value="">
                                                                    <div class="invalid-feedback">
                                                                        Please fill in the first name
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-6 col-12">
                                                                    <label>Familiyası</label>
                                                                    <input type="text" name="sname" class="form-control"
                                                                        required="" value="">
                                                                    <div class="invalid-feedback">
                                                                        Please fill in the last name
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group col-md-6 col-12">
                                                                    <label>Elektron pochtası</label>
                                                                    <input type="email" name="email"
                                                                        class="form-control" required="" value="">
                                                                    <div class="invalid-feedback">
                                                                        Please fill in the email
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-6 col-12">
                                                                    <label>Telefon nomeri</label>
                                                                    <input type="tel" name="phone" class="form-control"
                                                                        required="" value="">
                                                                </div>

                                                            </div>

                                                            <div class="row">
                                                                <div class="form-group col-md-6 col-12">
                                                                    <label>Login</label>
                                                                    <input name="login" type="text" required=""
                                                                        class="form-control">

                                                                </div>

                                                                <div class="form-group col-6">
                                                                    <label>Parol</label>
                                                                    <input name="password" type="text" required=""
                                                                        class="form-control">
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                
                                                                <div class="form-group  col-12 text-right "
                                                                    style="padding-top: 30px;">

                                                                    <button class="btn btn-primary"
                                                                        style="padding: 8px 10px;" name="add_admin">Qosıw</button>
                                                                  <?php
if ($_SESSION["login"]) {
    ?>
                                                                              <a href="home.php?back=<?=true?>"
                                                                        style="padding: 8px 10px;"
                                                                        class="btn btn-primary my-2">Izge</a>
                                                                        <?php
}
?>
                                                                </div>
                                                                <?php
require "../Controllers/ProfilController.php";
profil($_POST);
?>

                                                            </div>

                                                        </div>

                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <?php

include "main.php";
?>