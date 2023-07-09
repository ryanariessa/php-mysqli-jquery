<?php
include 'connection.php';

if (isset($_POST['displaySend'])) {
    $table = '<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">NIM</th>
            <th scope="col">Nama</th>
            <th scope="col">Alamat</th>
            <th scope="col">Fakultas</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>';
    $sql = "SELECT * FROM mahasiswa";
    $result = mysqli_query($connect, $sql);
    $number = 1;
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        $nim = $row['nim'];
        $nama = $row['nama'];
        $alamat = $row['alamat'];
        $fakultas = $row['fakultas'];
        $table .= '<tr>
        <td scope="row">' . $number . '</td>
        <td>' . $nim . '</td>
        <td>' . $nama . '</td>
        <td>' . $alamat . '</td>
        <td class="text-uppercase">' . $fakultas . '</td>
        <td>
        <button type="button" class="btn btn-warning" onclick="getUpdateDetails(' . $id . ')">Edit</button>
        <button type="button" class="btn btn-danger" onclick="getDeleteDetails(' . $id . ')">Delete</button>
        </td>
        </tr>';
        $number++;
    }
    $table .= '</table>';
    echo $table;
}
