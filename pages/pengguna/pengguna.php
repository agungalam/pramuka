<?php include '../../koneksi/konksi.php'; ?>
<?php include '../../partials/head.php'; ?>
<?php include '../../partials/menu.php';
// session_start();
// if ($_SESSION['login'] != "iya") {
//     header("location: login.php?pesan=belum_login");
// }
?>

<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>HALAMAN DATA PENGGUNA</h2>

                <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                    Buka Modal
                </button> -->

                <!-- Modal -->
                <div id="myModal" class="modal fade" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-md"> <!-- modal-md untuk ukuran medium -->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Judul Modal</h4>
                            </div>
                            <div class="modal-body">
                                <p>Ini adalah isi dari modal ukuran medium.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /. ROW  -->
        <hr />
        <div class="panel panel-default">
            <div class="panel-heading">
                <a href="inputPengguna.php"><button type="submit" class="btn btn-success"> Tambah Data </button></a>
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
include 'pengguna_js.php';
?>