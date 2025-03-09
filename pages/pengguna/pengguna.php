<?php include '../../koneksi/konksi.php'; ?>
<?php include '../../partials/head.php'; ?>
<?php include '../../partials/menu.php';
// session_start();
// if ($_SESSION['login'] != "iya") {
//     header("location: login.php?pesan=belum_login");
// }
?>
<!-- Modal -->
<div id="myModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md"> <!-- modal-md untuk ukuran medium -->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" id="titleModal">Judul Modal</h4>
            </div>
            <div class="modal-body" id="bodyModal">
                <div class="alert alert-warning fade in" id="myAlert" role="alert">
                    <button type="button" class="close" onclick="alertOut()" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div id="bodyAlert"></div>
                </div>

                <div class="row">
                    <div class="col-xs-4">
                        <label for="nama">Nama</label>
                    </div>
                    <div class="col-xs-8">
                        <input type="text" class="form-control" placeholder="Input nama" id="nama">
                    </div>
                </div>
                <div class="row mt-input">
                    <div class="col-xs-4">
                        <label for="username">Username</label>
                    </div>
                    <div class="col-xs-8">
                        <input type="text" class="form-control" placeholder="Input username" id="username">
                    </div>
                </div>
                <div class="row mt-input">
                    <div class="col-xs-4">
                        <label for="pass">Password</label>
                    </div>
                    <div class="col-xs-8">
                        <input type="text" class="form-control" placeholder="Input password" id="pass">
                    </div>
                </div>
                <div class="row mt-input">
                    <div class="col-xs-4">
                        <label for="status">Status</label>
                    </div>
                    <div class="col-xs-8">
                        <input type="radio" class="status" value="admin" name="status" placeholder="Input status" id="status"> Admin
                        <br>
                        <input type="radio" class="status" value="user" name="status" placeholder="Input status" id="status"> User
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btnModal">Simpan</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>HALAMAN DATA PENGGUNA</h2>
            </div>
        </div>
        <!-- /. ROW  -->
        <hr />
        <div class="panel panel-default">
            <div class="panel-heading">
                <button type="button" class="btn btn-success" onclick="tambahData()"> Tambah Data </button>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="tabel">
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        <!--End Advanced Tables -->
    </div>
    <!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->
</div>


<?php
include '../../partials/foot.php';
?>
<script>
    const tabel = $("#tabel");
    const modal = $('#myModal');
    const btnModal = $('#btnModal');
    const titleModal = $('#titleModal');
    const nama = $('#nama');
    const username = $('#username');
    const password = $('#pass');
    const status = $('#status');
    let allData = [];
    const myAlert = $('#myAlert');
    const bodyAlert = $('#bodyAlert');

    const url = koneksi + "pages/pengguna/pengguna_controller.php";

    console.log("sudah di hapus", koneksi)
    getDataTable();
    async function getDataTable() {
        try {
            const response = await fetch(url + "?data=true");
            if (!response.ok) {
                throw new Error(`Response status: ${response.status}`);
            }

            const json = await response.json();
            let table = $("#dataTables-example").DataTable();
            table.clear().draw();

            if (json.result) {
                json.data.forEach((i, no) => {
                    table.row.add([
                        ++no,
                        i['nama'],
                        i['username'],
                        i['password2'],
                        i['status'],
                        `<button type="button" class="btn btn-danger" onclick="hapusData(${i.id_user})"> Hapus</button>
                     &nbsp;
                     <button type="button" class="btn btn-warning" onclick="editData(${i.id_user})"> Edit</button>`
                    ]).draw(false);
                });

                allData = json.data;
            }
        } catch (error) {
            console.error(error.message);
        }
    }

    function tambahData() {
        modal.modal('show')
        titleModal.html('Tambah data')
        btnModal.html('Simpan').attr("onclick", 'simpanData()')
        $("input[type='text']").val("");
        $("input.status[type='radio']").prop("checked", false);
        myAlert.fadeOut();
    }

    async function simpanData() {
        const invalid = validasi();
        if (invalid) return;
        const status = $("input[name='status']:checked").val();
        const data = {
            nama: nama.val(),
            username: username.val(),
            password: password.val(),
            status: status,
            simpan: true,
        }
        try {
            const response = await fetch(url, {
                method: "POST", // Gunakan POST
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify(data), // Konversi objek JS ke JSON string
            });

            if (!response.ok) {
                throw new Error(`Response status: ${response.status}`);
            }

            const json = await response.json();
            console.log("Response dari server:", json);
            modal.modal('hide');
            setTimeout(() => {
                alert(json.message);
            }, 500);
        } catch (error) {
            console.error("Terjadi kesalahan:", error.message);

        }
    }

    function editData(id) {
        modal.modal('show')
        titleModal.html('Edit data')
        btnModal.html('Update').attr("onclick", `updateData(${id})`)
        myAlert.fadeOut()

        const fil = allData.find(i => i.id_user == id);
        console.log(fil)
        nama.val(fil.nama);
        username.val(fil.username);
        password.val(fil.password2);
        $("#status[value='" + fil.status + "']").prop("checked", true);
    }

    async function updateData(id) {
        const invalid = validasi(id);
        if (invalid) return;
        const status = $("input[name='status']:checked").val();
        const data = {
            id: id,
            nama: nama.val(),
            username: username.val(),
            password: password.val(),
            status: status,
            update: true,
        }
        try {
            const response = await fetch(url, {
                method: "POST", // Gunakan POST
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify(data), // Konversi objek JS ke JSON string
            });

            if (!response.ok) {
                throw new Error(`Response status: ${response.status}`);
            }

            const json = await response.json();
            console.log("Response dari server:", json);
            modal.modal('hide');
            setTimeout(() => {
                alert(json.message);
            }, 500);
        } catch (error) {
            console.error("Terjadi kesalahan:", error.message);
        }
    }

    async function hapusData(id) {
        const conf = confirm('Apakah anda yakin ?');
        if (!conf) return;
        try {
            const response = await fetch(url + "?hapus=" + id);
            if (!response.ok) {
                throw new Error(`Response status: ${response.status}`);
            }
            const json = await response.json();
            console.log(json);
            modal.modal('hide');
            setTimeout(() => {
                alert(json.message);
            }, 500);
            getDataTable();
        } catch (error) {
            console.error(error.message);
        }
    }

    function validasi(id = null) {
        const status = $("input[name='status']:checked").val();
        let invalid = "";
        if (!nama.val()) {
            invalid += "<li>Nama harus diisi</li>";
        }
        if (!username.val()) {
            invalid += "<li>Username harus diisi</li>";
        }
        if (username.val().includes(" ")) {
            invalid += "<li>Username tidak boleh mengandung spasi</li>";
        }
        if (allData.find(i => !id ? i.username == username.val() : i.username == username.val() && i.id_user != id)) {
            invalid += "<li>Username sudah digunakan</li>";
        }
        if (!password.val()) {
            invalid += "<li>Password harus diisi</li>";
        }
        if (!status) {
            invalid += "<li>Status harus diisi</li>";
        }
        if (password.val().length < 8) {
            invalid += "<li>Password harus lebih dari 8 karakter</li>";
        }

        if (invalid) {
            invalid = `<ul>${invalid}</ul>`;
            myAlert.fadeIn();
            bodyAlert.html(invalid)
        }

        return invalid;
    }

    function alertOut() {
        myAlert.fadeOut();
    }
</script>