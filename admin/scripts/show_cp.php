<?php 
    include("../config/dbconnect.php"); 
    include("../config/checkAdmin.php");

    $id = $_POST['id'];
?>
<div class="table-responsive">
    <table class="table mb-0 table-centered">
        <thead>
            <tr>
                <th>#</th>
                <th>Название</th>
                <th>Широта</th>
                <th>Долгота</th>
                <th>AR model</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $select_cp_by_route = mysqli_query($link, "SELECT * FROM in_routes_points WHERE route_id = '$id' ORDER BY marker_id");
                while($get_cp_by_route = mysqli_fetch_array($select_cp_by_route)){
                    $select_cp = mysqli_query($link, "SELECT * FROM in_control_points WHERE id = '$get_cp_by_route[point_id]'");
                    $get_cp = mysqli_fetch_array($select_cp);
                    $c++;
            ?>
            <tr>
                <td><?php echo $c; ?></td>
                <td><?php echo $get_cp['name']; ?></td>
                <td><?php echo $get_cp['lat']; ?></td>
                <td><?php echo $get_cp['lng']; ?></td>
                <td>
                    <?php
                        $check_ar = mysqli_query($link, "SELECT * FROM in_ar_points WHERE point_id = '$get_cp[id]'");
                        if(mysqli_num_rows($check_ar) > 0){
                            $get_ar = mysqli_fetch_array($check_ar);
                            ?>
                            <button class="btn btn-primary showAr" data-id="<?php echo $get_ar['ar_id'] ?>">Посмотреть AR в 3D</button>
                            <script>
                                $(".showAr").click(function(){
                                    var id = $(this).attr("data-id");

                                    var a = document.createElement('a');
                                    a.target="_blank";
                                    a.href='/admin/threejs.php?id='+id;
                                    a.click();
                                });
                            </script>
                            <?php
                        }else{
                            echo "<span class='badge badge-pill badge-soft-danger'>Нету AR model</span>";
                        }
                    ?>
                </td>
            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
</div>