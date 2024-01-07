<?php

include "header.php";


?>


<div class="col-12">

    <div class="card">
        <?php
 $con = mysqli_connect("localhost", "root", "root", "db_edu");
 $sql = "select * from `teachers`";
 $res = mysqli_query($con, $sql);
 for ($data = []; $v = $res->fetch_assoc(); $data[] = $v);

?>

        <div class="card-header">
            <h4>Muǵállimler</h4>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped table-md">
                    <tbody>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                          
                        </tr>
                        <?php
                        $i=1;
                        foreach($data as $v) {
                            ?>
                            <tr>
                            <td><?=$i++?></td>
                            <td><a href="teachers_info.php?id=<?=$v['id']?>" style="color: black; text-decoration: none;"><?=$v['surname']?>  <?=$v['name']?> </a></td>
                            <td><?=$v['phone']?></td>
                            <td><?=$v['email']?></td>
                            </tr>
                            <?php
                            }
                            ?>
                        
                       
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer text-center">
            <nav class="d-inline-block">
                <ul class="pagination mb-0">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1 <span
                                class="sr-only">(current)</span></a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">2</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>

<?php
include "main.php";
?>