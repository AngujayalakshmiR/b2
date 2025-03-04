<?php
if (isset($_GET['file'])) {
    $filePath = "b2/" . $_GET['file'];

    if (file_exists($filePath) && unlink($filePath)) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false]);
    }
}
?>
