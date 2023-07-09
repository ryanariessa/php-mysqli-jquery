<?php
include 'connection.php';

if (isset($_POST['deleteid'])) {
    $data_id = $_POST['deleteid'];
    $sql = "SELECT * FROM mahasiswa WHERE id=$data_id";
    $result = mysqli_query($connect, $sql);
    $response = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $response = $row;
    }
    echo json_encode($response);
} else {
    $response['status'] = 422;
    $response['message'] = "Invalid or data not found!";
}
// delete query
if (isset($_POST['hiddendeletedata'])) {
    $uniqueid = $_POST['hiddendeletedata'];

    $sql = "DELETE FROM mahasiswa WHERE id=$uniqueid";
    $result = mysqli_query($connect, $sql);
    if ($result) {
        $res = [
            'status' => 201,
            'message' => 'Data Delete Succesfully'
        ];
        echo json_encode($res);
        return false;
    } else {
        $res = [
            'status' => 500,
            'message' => 'Data Not Delete'
        ];
        echo json_encode($res);
        return false;
    }
}
