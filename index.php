<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container mt-5">
        <h3 class="text-center mb-5">CRUD - PHP, MySql, jQuery, & Bootstrap 5<br />Studi Kasus Data Mahasiswa Sederhana<br />By Ryan Ariessa</h3>
        <div class="card">
            <div class="card-header text-center fw-bold">
                DATA MAHASISWA
            </div>
            <div class="card-body">
                <button type="button" class="btn btn-dark text-light" data-bs-toggle="modal" data-bs-target="#addDataModal">Tambah Data</button>
                <div class="table-responsive my-3">
                    <div class="alert alert-warning d-none" id="alertWarning"></div>
                    <div class="alert alert-success d-none" id="alertSuccess"></div>
                    <div id="displayDataTable"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Add-->
    <div class="modal modal-lg fade" id="addDataModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addDataModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="addform">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="addDataModalLabel">Tambah Data</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row mb-3">
                            <label for="nim" class="col-sm-2 col-form-label">NIM :</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nim" aria-describedby="nimHelp">
                                <div id="nimHelp" class="form-text">Dapat berupa huruf dan angka.</div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="nama" class="col-sm-2 col-form-label">Nama :</label>
                            <div class="col-sm-10">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="nama">
                                    <label for="nama">Masukan nama lengkap</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="alamat" class="col-sm-2 col-form-label">Alamat :</label>
                            <div class="col-sm-10">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="" id="alamat"></textarea>
                                    <label for="alamat">Masukan alamat lengkap</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="fakultas" class="col-sm-2 col-form-label">Fakultas :</label>
                            <div class="col-sm-10">
                                <div class="form-floating">
                                    <select class="form-select" id="fakultas" aria-label="">
                                        <option value="saintek">SAINTEK</option>
                                        <option value="soshum">SOSHUM</option>
                                    </select>
                                    <label for="fakultas">Pilih fakultas</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark text-white" onclick="addData()">Simpan</button>
                        <button type="reset" class="btn btn-warning" onclick="resetForm()">Bersihkan</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal Update -->
    <div class="modal modal-lg fade" id="updateDataModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="updateDataModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="updateform">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="updateDataModalLabel">Update Data</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row mb-3">
                            <label for="updatenim" class="col-sm-2 col-form-label">NIM :</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="updatenim" aria-describedby="nimHelp">
                                <div id="nimHelp" class="form-text">Dapat berupa huruf dan angka.</div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="updatenama" class="col-sm-2 col-form-label">Nama :</label>
                            <div class="col-sm-10">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="updatenama">
                                    <label for="updatenama">Masukan nama lengkap</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="updatealamat" class="col-sm-2 col-form-label">Alamat :</label>
                            <div class="col-sm-10">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="" id="updatealamat"></textarea>
                                    <label for="updatealamat">Masukan alamat lengkap</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="updatefakultas" class="col-sm-2 col-form-label">Fakultas :</label>
                            <div class="col-sm-10">
                                <div class="form-floating">
                                    <select class="form-select" id="updatefakultas" aria-label="">
                                        <option value="saintek">SAINTEK</option>
                                        <option value="soshum">SOSHUM</option>
                                    </select>
                                    <label for="updatefakultas">Pilih fakultas</label>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" id="hiddendata">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark text-white" onclick="updateDetails()">Simpan</button>
                        <button type="reset" class="btn btn-warning" onclick="resetFormUpdate()">Bersihkan</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal Delete -->
    <div class="modal modal-lg fade" id="deleteDataModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteDataModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="deleteDataModalLabel">Delete Data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="fw-bold text-center">Apakah anda yakin hapus data berikut?</p>
                    <div class="row">
                        <label for="deletenim" class="col-sm-2 col-form-label">NIM :</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="deletenim">
                        </div>
                    </div>
                    <div class="row">
                        <label for="deletenama" class="col-sm-2 col-form-label">Nama :</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="deletenama">
                        </div>
                    </div>
                    <div class="row">
                        <label for="deletealamat" class="col-sm-2 col-form-label">Alamat :</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="deletealamat">
                        </div>
                    </div>
                    <div class="row">
                        <label for="deletefakultas" class="col-sm-2 col-form-label">Fakultas :</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="deletefakultas">
                        </div>
                    </div>
                    <input type="hidden" id="hiddendeletedata">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark text-white" onclick="deleteDetails()">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            displayData();
        })

        function resetFormAdd() {
            document.getElementById("addform").reset();
        }

        function resetFormUpdate() {
            document.getElementById("updadeform").reset();
        }
        // fungsi untuk menampilkan data
        function displayData() {
            var displayData = "true";
            $.ajax({
                url: "display.php",
                type: 'post',
                data: {
                    displaySend: displayData
                },
                success: function(data, status) {
                    $('#displayDataTable').html(data);
                }
            });
        }
        // fungsi untuk menambahkan data
        function addData() {
            var nimAdd = $('#nim').val();
            var namaAdd = $('#nama').val();
            var alamatAdd = $('#alamat').val();
            var fakultasAdd = $('#fakultas').val();

            $.ajax({
                url: "insert.php",
                type: 'post',
                data: {
                    nimSend: nimAdd,
                    namaSend: namaAdd,
                    alamatSend: alamatAdd,
                    fakultasSend: fakultasAdd,
                },
                success: function(response) {
                    // console.log(status);
                    var res = jQuery.parseJSON(response);
                    if (res.status == 422 || res.status == 500) {
                        $('#alertSuccess').addClass('d-none');
                        $('#alertWarning').removeClass('d-none');
                        $('#alertWarning').text(res.message);
                    } else if (res.status == 201) {
                        $('#alertWarning').addClass('d-none');
                        $('#alertSuccess').removeClass('d-none');
                        $('#alertSuccess').text(res.message);
                    }
                    $('#addDataModal').modal('hide');
                    displayData();
                    setTimeout(function() {
                        $('#alertSuccess').addClass('d-none');
                        $('#alertWarning').addClass('d-none');
                    }, 2000);
                }
            })
        }
        // fungsi update data
        function getUpdateDetails(updateid) {
            $('#hiddendata').val(updateid);

            $.post("update.php", {
                updateid: updateid
            }, function(data, status) {
                var dataid = JSON.parse(data);
                $('#updatenim').val(dataid.nim);
                $('#updatenama').val(dataid.nama);
                $('#updatealamat').val(dataid.alamat);
                $('#updatefakultas').val(dataid.fakultas);

            });
            $('#updateDataModal').modal("show");
        }

        function updateDetails() {
            var updatenim = $('#updatenim').val();
            var updatenama = $('#updatenama').val();
            var updatealamat = $('#updatealamat').val();
            var updatefakultas = $('#updatefakultas').val();
            var hiddendata = $('#hiddendata').val();

            $.post("update.php", {
                updatenim: updatenim,
                updatenama: updatenama,
                updatealamat: updatealamat,
                updatefakultas: updatefakultas,
                hiddendata: hiddendata
            }, function(response) {
                var res = jQuery.parseJSON(response);
                if (res.status == 422 || res.status == 500) {
                    $('#alertSuccess').addClass('d-none');
                    $('#alertWarning').removeClass('d-none');
                    $('#alertWarning').text(res.message);
                } else if (res.status == 201) {
                    $('#alertWarning').addClass('d-none');
                    $('#alertSuccess').removeClass('d-none');
                    $('#alertSuccess').text(res.message);
                }
                $('#updateDataModal').modal('hide');
                displayData();
                setTimeout(function() {
                    $('#alertSuccess').addClass('d-none');
                    $('#alertWarning').addClass('d-none');
                }, 2000);
            });
        }
        // fungsi delete data menampilkan form konfirmasi
        function getDeleteDetails(deleteid) {
            $('#hiddendeletedata').val(deleteid);

            $.post("delete.php", {
                deleteid: deleteid
            }, function(data, status) {
                var dataid = JSON.parse(data);
                $('#deletenim').val(dataid.nim);
                $('#deletenama').val(dataid.nama);
                $('#deletealamat').val(dataid.alamat);
                $('#deletefakultas').val(dataid.fakultas);

            });
            $('#deleteDataModal').modal("show");
        }
        // fungsi delete data terkonfirmasi
        function deleteDetails() {
            var hiddendeletedata = $('#hiddendeletedata').val();

            $.post("delete.php", {
                hiddendeletedata: hiddendeletedata
            }, function(response) {
                var res = jQuery.parseJSON(response);
                if (res.status == 422 || res.status == 500) {
                    $('#alertSuccess').addClass('d-none');
                    $('#alertWarning').removeClass('d-none');
                    $('#alertWarning').text(res.message);
                } else if (res.status == 201) {
                    $('#alertWarning').addClass('d-none');
                    $('#alertSuccess').removeClass('d-none');
                    $('#alertSuccess').text(res.message);
                }
                $('#deleteDataModal').modal('hide');
                displayData();
                setTimeout(function() {
                    $('#alertSuccess').addClass('d-none');
                    $('#alertWarning').addClass('d-none');
                }, 2000);
            });
        }
    </script>
</body>

</html>