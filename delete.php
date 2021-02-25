<?php

    include 'model.php';
    $model = new Model();
    echo $id = $_REQUEST['id'];
    $delete = $model->delete($id);

    if ($delete) {
        echo "<script>alert('Delete successfully!');</script>";
        echo "<script>window.location.href = 'records.php'</script>";
    }

?>