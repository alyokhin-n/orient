<?php
    include("../config/dbconnect.php");
    include("../config/checkAdmin.php");

    if($_POST['type'] == 'employees'){

        $sourcePath = $_FILES['file']['tmp_name'];

        $path_parts = pathinfo($_FILES['file']['name']);
        $ext = $path_parts['extension'];

        $rand = mt_rand(10000000, 1000000000);
        $imageName = time().$rand.".".$ext;

        $targetPath = "../../admin/uploads/clients/".$imageName;


        if(move_uploaded_file($sourcePath,$targetPath)) {
            $update = mysqli_query($link, "UPDATE in_employees SET avatar = '$imageName' WHERE avatar IS NULL ORDER BY id DESC LIMIT 1");
        }
    }

    if($_POST['type'] == 'kontragenty'){

        $sourcePath = $_FILES['file']['tmp_name'];

        $path_parts = pathinfo($_FILES['file']['name']);
        $ext = $path_parts['extension'];

        $rand = mt_rand(10000000, 1000000000);
        $imageName = time().$rand.".".$ext;

        $targetPath = "../../admin/uploads/clients/".$imageName;


        if(move_uploaded_file($sourcePath,$targetPath)) {
            $update = mysqli_query($link, "UPDATE in_kontragenty SET avatar = '$imageName' WHERE avatar IS NULL ORDER BY id DESC LIMIT 1");
        }
    }

    if($_POST['type'] == 'bill'){

        $sourcePath = $_FILES['file']['tmp_name'];

        $path_parts = pathinfo($_FILES['file']['name']);
        $ext = $path_parts['extension'];

        $rand = mt_rand(10000000, 1000000000);
        $imageName = time().$rand.".".$ext;

        $targetPath = "../../admin/uploads/clients/".$imageName;


        if(move_uploaded_file($sourcePath,$targetPath)) {
            $update = mysqli_query($link, "UPDATE in_bill SET avatar = '$imageName' WHERE avatar IS NULL ORDER BY id DESC LIMIT 1");
        }
    }

    if($_POST['type'] == 'elements'){

        $sourcePath = $_FILES['file']['tmp_name'];

        $path_parts = pathinfo($_FILES['file']['name']);
        $ext = $path_parts['extension'];

        $rand = mt_rand(10000000, 1000000000);
        $imageName = time().$rand.".".$ext;

        $targetPath = "../../admin/uploads/elements/".$imageName;


        if(move_uploaded_file($sourcePath,$targetPath)) {
            $update = mysqli_query($link, "UPDATE in_elements SET avatar = '$imageName' WHERE avatar IS NULL ORDER BY id DESC LIMIT 1");
        }
    }

    if($_POST['type'] == 'operations'){

        $sourcePath = $_FILES['file']['tmp_name'];

        $path_parts = pathinfo($_FILES['file']['name']);
        $ext = $path_parts['extension'];

        $rand = mt_rand(10000000, 1000000000);
        $imageName = time().$rand.".".$ext;

        $targetPath = "../../admin/uploads/operations/".$imageName;


        if(move_uploaded_file($sourcePath,$targetPath)) {
            $update = mysqli_query($link, "UPDATE in_operations_type SET avatar = '$imageName' WHERE avatar IS NULL ORDER BY id DESC LIMIT 1");
        }
    }

    if($_POST['type'] == 'push'){

        $sourcePath = $_FILES['file']['tmp_name'];

        $path_parts = pathinfo($_FILES['file']['name']);
        $ext = $path_parts['extension'];

        $rand = mt_rand(10000000, 1000000000);
        $imageName = time().$rand.".".$ext;

        $targetPath = "../../admin/uploads/push/".$imageName;


        if(move_uploaded_file($sourcePath,$targetPath)) {
            $update = mysqli_query($link, "UPDATE in_push SET photo = '$imageName' WHERE photo IS NULL ORDER BY id DESC LIMIT 1");
        }
    }
?>