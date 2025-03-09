<script>
    const koneksi = "<?php echo $assets; ?>";
    const tabel = $("#tabel");
    tabel.html("")
    console.log("sudah di hapus", koneksi)
    getDataTable();
    async function getDataTable() {
        const url = koneksi + "pages/pengguna/pengguna_controller.php?data=true";
        try {
            const response = await fetch(url);
            if (!response.ok) {
                throw new Error(`Response status: ${response.status}`);
            }

            const json = await response.json();
            console.log(json);
            if (json.result) {
                json.data.forEach((i,no) => {
                    const data = `
                        <tr class="odd gradeX">
                            <td>${++no}</td>
                            <td>${i['nama']}</td>
                            <td>${i['username']}</td>
                            <td>${i['password2']}</td>
                            <td>${i['status']}</td>
                            <td>
                                <a onclick="return confirm('Apakah anda yakin ?')" href="pengguna/controlUser.php?hapus=${['id_user']}"><button type="submit" class="btn btn-danger">Hapus</button></a>
                                        &nbsp;
                                <a href="editPengguna.php?id_user=${['id_user']}"><button type=" submit" class="btn btn-warning">Edit</button></a>
                            </td>
                        </tr>
                    `;
                    tabel.append(data);
                })
                dataTables();
            }
        } catch (error) {
            console.error(error.message);
        }
    }
</script>