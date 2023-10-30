<?php 
    include("config/dbconnect.php"); 
    include("config/checkAdmin.php"); 
    include("config/fuctions.php");
?>
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>3DModel</title>
    <script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.js"></script>
    <script nomodule src="https://unpkg.com/@google/model-viewer/dist/model-viewer-legacy.js"></script>
</head>
<body>
    <?php
        $id = $_GET['id'];
        $select = mysqli_query($link, "SELECT * FROM ar_models WHERE id = '$id'");
        if(mysqli_num_rows($select) > 0){
            $get = mysqli_fetch_array($select);
    ?>
    <model-viewer src="/admin/uploads/ar/<?php echo $get['model']; ?>" auto-rotate camera-controls alt="cube" background-color="#455A64" style="width: 100%;height: 100vh;"></model-viewer>
    <?php }else{
        echo "File not found.";
    }
    ?>
</body>
</html>