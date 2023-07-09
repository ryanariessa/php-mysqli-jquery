<?php
include 'connection.php';

if (isset($_POST['updateid'])) {
    $data_id = $_POST['updateid'];
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

// update query
if (isset($_POST['hiddendata'])) {
    $uniqueid = $_POST['hiddendata'];
    $nim = $_POST['updatenim'];
    $nama = $_POST['updatenama'];
    $alamat = $_POST['updatealamat'];
    $fakultas = $_POST['updatefakultas'];

    if (
        $nim == null ||
        $nama == null ||
        $alamat == null ||
        $fakultas == null ||
        $uniqueid == null
    ) {
        $res = [
            'status' => 422,
            'message' => 'All field are mandatory'
        ];
        echo json_encode($res);
        return false;
    }

    $sql = "UPDATE mahasiswa SET nim='$nim',nama='$nama',alamat='$alamat',fakultas='$fakultas' WHERE id=$uniqueid";
    $result = mysqli_query($connect, $sql);
    if ($result) {
        $res = [
            'status' => 201,
            'message' => 'Data Update Succesfully'
        ];
        echo json_encode($res);
        return false;
    } else {
        $res = [
            'status' => 500,
            'message' => 'Data Not Update'
        ];
        echo json_encode($res);
        return false;
    }
}
