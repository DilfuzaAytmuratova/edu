    <?php

include "header.php";

?>


    <div class="col-12">

        <div class="card">
            <?php

$con = mysqli_connect("localhost", "root", "root", "db_edu");
$sql = "select * from `groups`";
$res = mysqli_query($con, $sql);
$sql2 = "select * from `courses`";
$res2 = mysqli_query($con, $sql2);
for ($data = []; $v = $res->fetch_assoc(); $data[] = $v);
for ($data2 = []; $v = $res2->fetch_assoc(); $data2[] = $v);
foreach ($data2 as $v) {
    if ($v['id'] == $_GET["id"]) {

        ?>

            <div class="card-header" style="display: flex; justify-content: space-between;">
                <h4><?=$v['name']?></h4>
                <div class="text-right">
                    <a class="btn btn-primary " style="border-radius: 5px;" href="add_group.php?id=<?=$v['id']?>">+ GRUPPA QOSÍW</a>
                </div>
            </div>

            <?php
}
}
?>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-md">
                        <tbody>
                            <tr>
                                <th>#</th>
                                <th>Atı</th>
                                <th>Ashılǵan waqtı</th>
                                <th>Status</th>
                                <th>Buyrıq</th>
                            </tr>
                            <?php
$i = 1;
foreach ($data as $v) {
    if ($v["course_id"] == $_GET["id"]) {

        ?>
                            <tr>
                                <td><?=$i++?></td>
                                <td><a href="group_in_students.php?id=<?=$v['id']?>"
                                        style="color: black; text-decoration: none;"><?=$v['gname']?></a></td>
                                <td><?=$v['date']?></td>
                                <td>
                                    <div
                                        class="badge <?=(date("Y-m-d") - $v["date"] < 6) ? "badge-success" : "badge-danger"?> ">
                                        <?=(date("Y-m-d") - $v["date"] < 6) ? "Active" : "Not Active"?></div>
                                </td>
                                <td><a href="add_group.php?edit_id=<?=$v['id']?>&edit=<?=true?>&id=<?=$v['course_id']?>"
                                        class="btn btn-primary">Jańalaw</a></td>
                            </tr>
                            <?php
}
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