<?php

include "header.php";
// session_start();
// $con = mysqli_connect("localhost", "root", "root", "db_edu");
// $sql4 = "select * from `admins`";
// $res4 = mysqli_query($con, $sql4);

// for ($data4 = []; $v = $res4->fetch_assoc(); $data4[] = $v);

// if($data4[0]['job'] == 1) {

?>
<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <div class="card">
        <div class="card-statistic-4">
            <div class="align-items-center justify-content-between">
                <div class="row ">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                            <h5 class="font-15">Oqıwshılar</h5>
                            <h2 class="mb-3 font-18">158</h2>
                            <p class="mb-0"><span class="col-green"></span> </p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img" style="width: 125px; float: none;">
                            <img src="../assets/img/dash-1.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <div class="card">
        <div class="card-statistic-4">
            <div class="align-items-center justify-content-between">
                <div class="row ">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                            <h5 class="font-15"> Jumısshılar</h5>
                            <h2 class="mb-3 font-18">11</h2>
                            <p class="mb-0"><span class="col-orange"></span> </p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img " style="width: 125px; float: none; height: 103px;">
                            <img src="../assets/img/dash-2.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <div class="card">
        <div class="card-statistic-4">
            <div class="align-items-center justify-content-between">
                <div class="row ">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                            <h5 class="font-15">Kurslar</h5>
                            <h2 class="mb-3 font-18">6</h2>
                            <p class="mb-0"><span class="col-green"></span>
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img" style="width: 125px; float: none; height: 103px;">
                            <img src="../assets/img/education-course-computer-icons-student-school-png-favpng-V50feL0PXt9ChDkVR6zTzayMJ.jpg"
                                alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-12 col-sm-12 col-lg-12">
              <div class="card ">
                <div class="card-header">
                  <h4>Dáramat statistikaı</h4>
                  <!-- <div class="card-header-action">
                    <div class="dropdown">
                      <a href="#" data-toggle="dropdown" class="btn btn-warning dropdown-toggle">Options</a>
                      <div class="dropdown-menu">
                        <a href="#" class="dropdown-item has-icon"><i class="fas fa-eye"></i> View</a>
                        <a href="#" class="dropdown-item has-icon"><i class="far fa-edit"></i> Edit</a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item has-icon text-danger"><i class="far fa-trash-alt"></i>
                          Delete</a>
                      </div>
                    </div>
                    <a href="#" class="btn btn-primary">View All</a>
                  </div> -->
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-12">
                      <div id="chart1"></div>
                      <div class="row mb-0">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                          <div class="list-inline text-center">
                            <div class="list-inline-item p-r-30"><i data-feather="arrow-up-circle"
                                class="col-green"></i>
                              <h5 class="m-b-0">$675</h5>
                              <p class="text-muted font-14 m-b-0">Háptelik dáramat</p>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                          <div class="list-inline text-center">
                            <div class="list-inline-item p-r-30"><i data-feather="arrow-down-circle"
                                class="col-orange"></i>
                              <h5 class="m-b-0">$1,587</h5>
                              <p class="text-muted font-14 m-b-0">Aylıq dáramat</p>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                          <div class="list-inline text-center">
                            <div class="list-inline-item p-r-30"><i data-feather="arrow-up-circle"
                                class="col-green"></i>
                              <h5 class="mb-0 m-b-0">$30,965</h5>
                              <p class="text-muted font-14 m-b-0">Jıllıq dáramat</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>
<?php
// } elseif($data5[0]['job'] == 2) {

// }

    include "main.php";
    ?>