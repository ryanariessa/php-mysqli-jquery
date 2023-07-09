<?php
include 'connection.php';

if (
   $_POST['nimSend'] == null ||
   $_POST['namaSend'] == null ||
   $_POST['alamatSend'] == null ||
   $_POST['fakultasSend'] == null
) {
   $res = [
      'status' => 422,
      'message' => 'All field are mandatory'
   ];
   echo json_encode($res);
   return false;
}

extract($_POST);

if (
   isset($_POST['nimSend']) &&
   isset($_POST['namaSend']) &&
   isset($_POST['alamatSend']) &&
   isset($_POST['fakultasSend'])
) {
   $sql = "INSERT INTO mahasiswa (nim,nama,alamat,fakultas) VALUES('$nimSend','$namaSend','$alamatSend','$fakultasSend')";
   $result = mysqli_query($connect, $sql);
   if ($result) {
      $res = [
         'status' => 201,
         'message' => 'Data Created Succesfully'
      ];
      echo json_encode($res);
      return false;
   } else {
      $res = [
         'status' => 500,
         'message' => 'Data Not Created'
      ];
      echo json_encode($res);
      return false;
   }
}
