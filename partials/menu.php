<?php
// session_start();
// if ($_SESSION['login'] != "iya") {
//     header("location: login.php");
// }
?>
<style>
    .active {
        background-color: red;
    }
</style>

<nav class="navbar-default navbar-side tema" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menuu">
            <li class="text-center">
                <img src="<?php echo $assets; ?>assets/logo.png" style="height: 50px; border-radius:50%" class="user-image img-responsive" />
            </li>
            <li>
                <a class="active-menux" href=" index.php"><i class="fa fa-dashboard fa-1x"></i> Dashboard</a>
            </li>
            <li>
                <a href="berita_kegiatan.php"><i class="fa fa-qrcode fa-1x"></i> Berita Kegiatan</a>
            </li>
            <li>
                <a href="sejarah.php"><i class="fa fa-qrcode fa-1x"></i> Sejarah Kepramukaan</a>
            </li>
            <li>
                <a href="struktur_kepengurusan.php"><i class="fa fa-bar-chart-o fa-1x"></i> Struktur Kepengurusan</a>
            </li>
            <li>
                <a href="data_potensi.php"><i class="fa fa-table fa-1x"></i> Data Potensi</a>
            </li>
            <li>
                <a href="Informasi.php"><i class="fa fa-edit fa-1x"></i> Pengumuman kegiatan</a>
            </li>
            <?php
            //if ($_SESSION['status'] == 'admin') { ?>
                <li>
                    <a href="<?php echo $assets; ?>pages/pengguna/pengguna.php"><i class="fa fa-user fa-1x"></i> Pengguna</a>
                </li>
            <?php // } ?>
            <li>
                <a href="cekLogin.php?out" onclick="return confirm('Apakah anda akan keluar ?')"><i class="fa fa-square-o fa-1x"></i> Log out</a>
            </li>
        </ul>
        <script>
            // tambahkan kelas aktif ke tombol saat ini (sorot)
            var header = document.getElementById('main-menuu');
            // var btns = header.getElementsByClassName('btn');
            var btns = header.querySelectorAll('li a');
            console.log('ini li a' + btns);
            for (let i = 0; i < btns.length; i++) {
                btns[i].addEventListener('click', function() {
                    var current = document.getElementsByClassName('active-menu');
                    console.log('setelah di klik ' + current);
                    if (current.length > 0) {
                        current[0].className = current[0].className.replace('active-menu', '');
                    }
                    this.className += " active-menu";
                });
            }
        </script>

    </div>

</nav>