<?php

include "header.php";

?>
<div class="col-12 col-md-12 col-lg-12">

    <div class="card">
        <div class="card-header">
            <h4><?=$_GET['surname']?> <?=$_GET['name']?></h4>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Sáne</th>
                        <th scope="col">Baqlaw</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
$con = mysqli_connect("localhost", "root", "root", "db_edu");
$sql = "select * from `control` where student_id = {$_GET['id']}";
$res = mysqli_query($con, $sql);
for ($data = []; $g = $res->fetch_assoc(); $data[] = $g);
$i = 1;
foreach ($data as $v) {
    foreach (json_decode($v['name'], 1) as $c) {

        ?>
                    <tr>
                        <th scope="row"><?=$i++;?></th>
                        <td><?=$c['d']?></td>
                        <td><?=$c['cont']?></td>
                    </tr>
                    <?php
}

}
?>
                </tbody>
            </table>
            <div class="text-right pr-5">
                <?php
if ($_GET['list']) {

    ?>
                <a href="students_list.php" class="btn btn-primary">Izge</a>
                <?php
} else {

    ?>
                <a href="group_in_students.php?id=<?=$_GET['group_id']?>" class="btn btn-primary">Back</a>
                <?php

}
?>
            </div>
        </div>
    </div>
</div>

<?php
include "main.php";
?>