<?php

include "header.php";

?>


<div class="col-12">

    <div class="card">
        <?php

$con = mysqli_connect("localhost", "root", "root", "db_edu");
$sql = "select * from `groups`";
$res = mysqli_query($con, $sql);
for ($data = []; $v = $res->fetch_assoc(); $data[] = $v);

foreach ($data as $v) {
    if ($v["id"] == $_GET["id"]) {
        ?>
        <div class="card-header">
            <h4><?=$v["gname"]?></h4>
        </div>
        <?php
}
}
?>
        <div class="card-body p-0">
            <form action="" method="post">
                <div class="table-responsive">
                    <table class="table table-striped table-md">
                        <tbody>
                            <tr>
                                <th>#</th>
                                <th>Atı familiyası</th>
                                <th>Telefon nomeri</th>
                                <th>Elektron pochta</th>
                                <th>Sáne</th>
                                <th>Barlaw</th>

                            </tr>
                            <?php
$i = 1;
$sql2 = "select * from `students`";
$res2 = mysqli_query($con, $sql2);
for ($data2 = []; $v = $res2->fetch_assoc(); $data2[] = $v);

foreach ($data2 as $v) {
    $sql3 = "select * from `control` where student_id = {$v['id']}";
    $res3 = mysqli_query($con, $sql3);
    for ($data3 = []; $g = $res3->fetch_assoc(); $data3[] = $g);
    $search = array_column($data3,'student_id');
    if(in_array($v['id'],$search)) {

        $a = json_decode($data3[0]['name'], 1)[count(json_decode($data3[0]['name'], 1)) - 1]['k'];
    }
    $d = date("d");
    foreach (json_decode($v['group_id'], 1) as $id) {
        if ($id["id"] == $_GET["id"]) {
            ?>
                            <tr>
                                <td><?=$i++?></td>
                                <td><a href="control.php?id=<?=$v['id']?>&name=<?=$v['name']?>&surname=<?=$v['surname']?>&group_id=<?=$_GET['id']?>"
                                        style="color: black; text-decoration: none;"><?=$v['surname']?>
                                        <?=$v['name']?></a></td>
                                <td><?=$v['phone']?></td>
                                <td><?=$v['email']?></td>
                                <td><?=$v['date']?></td>
                                <td>
                                    <input type="checkbox"  <?=($a+2 == $d) ? "" : "disabled"?> name="<?=$v['id']?>" id="">
                                </td>
                            </tr>
                            <?php

        }
    }
}
?>


                        </tbody>
                    </table>
                </div>
                <div class="text-right pr-5">
                    <?php
foreach ($data as $v) {
    if ($v["id"] == $_GET["id"]) {
        ?>
                    <a href="group_list.php?id=<?=$v['course_id']?>" class="btn btn-primary">Izge</a>

                    <?php
}
}
?>

                    <input class="btn btn-primary" <?=($a+2 == $d) ? "" : "disabled"?> type="submit" value="Saqlaw" name="save">
                </div>
            </form>
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
require "../Controllers/StudentControllers.php";
control($_POST);
include "main.php";

?>