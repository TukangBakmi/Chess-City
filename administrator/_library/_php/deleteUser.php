<?php

    include('../../_dbconfig/dbconfig.php');

    if (isset($_POST['req'])) {
        $req = $_POST['req'];
        $id = $_POST['id'];
        if ($req == 'delete') {
            $sql = "DELETE FROM user WHERE id= $id ";
        }
    }
    if ($conn->query($sql)) {
        $data["result"] = true;
    } else {
        $data["result"] = false;
    }
    echo json_encode($data);
?>