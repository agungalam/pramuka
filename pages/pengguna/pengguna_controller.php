<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *"); // Mengizinkan akses dari semua domain
header("Access-Control-Allow-Methods: *");


require '../../koneksi/konksi.php'; // Panggil file koneksi
function getDataTabel()
{
    global $koneksi;
    $query = "SELECT * FROM tb_user"; // Ganti dengan nama tabel yang ingin ditampilkan
    $result = $koneksi->query($query);

    $data = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        echo json_encode(["result" => true, "data" => $data]);
    } else {
        echo json_encode(["result" => false, "message" => "Data tidak ditemukan"]);
    }
}

if (isset($_GET["data"])) {
    return getDataTabel();
}
$koneksi->close();
