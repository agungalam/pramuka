<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *"); // Mengizinkan akses dari semua domain
header("Access-Control-Allow-Methods: *");
header("Access-Control-Allow-Headers: Content-Type");


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
function updateData()
{
    global $koneksi;
    $input = json_decode(file_get_contents("php://input"), true);

    $id = $koneksi->real_escape_string($input["id"]);
    $nama = $koneksi->real_escape_string($input["nama"]);
    $username = $koneksi->real_escape_string($input["username"]);
    $password = $koneksi->real_escape_string($input["password"]);
    $status = $koneksi->real_escape_string($input["status"]);

    $encode=password_hash($password, PASSWORD_BCRYPT);
    // Query update ke database
    $query = "UPDATE tb_user SET nama='$nama', username='$username', password='$encode',password2='$password', status='$status' WHERE id_user='$id'";

    if ($koneksi->query($query)) {
        echo json_encode(["result" => true, "message" => "Data berhasil diperbarui"]);
    } else {
        echo json_encode(["result" => false, "message" => "Gagal memperbarui data"]);
    }
}
function simpanData()
{
    global $koneksi;
    $input = json_decode(file_get_contents("php://input"), true);

    $nama = $koneksi->real_escape_string($input["nama"]);
    $username = $koneksi->real_escape_string($input["username"]);
    $password = $koneksi->real_escape_string($input["password"]);
    $status = $koneksi->real_escape_string($input["status"]);

    $encode=password_hash($password, PASSWORD_BCRYPT);
    $query = "INSERT INTO tb_user (nama, username, password, password2, status) 
              VALUES ('$nama', '$username', '$encode', '$password', '$status')";

    if ($koneksi->query($query)) {
        echo json_encode(["result" => true, "message" => "Data berhasil disimpan"]);
    } else {
        echo json_encode(["result" => false, "message" => "Gagal menyimpan data"]);
    }
}
function hapusData()
{
    global $koneksi;
    $id = $_GET['hapus'];
    $query = "DELETE FROM tb_user WHERE id_user='$id'";
    if ($koneksi->query($query)) {
        echo json_encode(["result" => true, "message" => "Data berhasil dihapus"]);
    } else {
        echo json_encode(["result" => false, "message" => "Gagal menghapus data"]);
    }
}

// var_dump("cek");
$input = json_decode(file_get_contents("php://input"), true);
if (isset($_GET["data"])) {
    return getDataTabel();
} else if ($input && isset($input["update"])) {
    return updateData();
} else if ($input && isset($input["simpan"])) {
    return simpanData();
} else if (isset($_GET["hapus"])) {
    return hapusData();
}
exit;
$koneksi->close();
