<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href=" <?php echo base_url("ext/img/logoS.ico")?>">
    
    <title>Tampil Data Mahasiswa</title>
    <!-- Css Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Css Lokal -->
    <link rel="stylesheet" href="<?php echo base_url("ext/style.css")?>">
</head>

<body>
    <!-- Buat Area Menu -->
    <nav class="area-menu">
        <button id="btn_tambah" class="btn-primary">Tambah Data</button>
        <button id="btn_refresh" class="btn-secondary" onclick="return setRefresh()">Refresh Data</button>
    </nav>

    <!-- Buat Area Tabel -->
    <table>
        <!-- Header Tabel -->
        <thead>
            <tr>
                <th style="width: 10%;">Aksi</th>
                <th style="width: 5%;">No</th>
                <th style="width: 10%;">NPM</th>
                <th style="width: auto;">Nama</th>
                <th style="width: 15%;">Teleopon</th>
                <th style="width: 10%;">Jurusan</th>
            </tr>
        </thead>
        <!-- Isi Tabel -->
        <tbody>
            <!-- Proses Looping data -->
            <?php 
            $no = 1;
            foreach($tampil->mahasiswa as $result) { ?>
            <tr>
                <td style="text-align: center;">
                    <nav class="area-aksi">
                        <button class="btn-edit" id="btn_edit" title="Ubah Data" onclick="return goToUpdate('<?php echo $result->npm_mhs ?>')"><i class="fa-solid fa-pen-to-square"></i></button>
                        <button class="btn-hapus" id="btn_hapus" title="Hapus Data"onclick="return goToDelete('<?php echo $result->npm_mhs ?>')"><i class="fa-solid fa-trash-can"></i></button>
                    </nav>
                </td>
                <td style="text-align: center;"><?php echo $no ?></td>
                <td style="text-align: center;"><?php echo $result->npm_mhs ?></td>
                <td style="text-align: justify;"><?php echo $result->nama_mhs ?></td>
                <td style="text-align: center;"><?php echo $result->telepon_mhs ?></td>
                <td style="text-align: center;"><?php echo $result->jurusan_mhs ?></td>
            </tr>
            <?php 
            $no++;
            } 
            ?>
        </tbody>
    </table>
    <!-- Impor Font Awesame -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js" integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        // inisialisasi object
        let btn_tambah = document.getElementById("btn_tambah");

        // buat event untuk tambah data
        btn_tambah.addEventListener('click', function(){
            // alert("Tambah Data");
            // Manpulasi DOM css (properti dan nilai)
            // btn_tambah.style.background="#FF0000"
            // this.style.borderRadius="10px"

            // Manipulasi DOM css (className)
            // this.className = "btn-secondary"

            // Manipulasi HTML
            // this.innerHTML = "<strong>Add Data </strong>"
            // this.innerText = "<strong>Add Data </strong>"

            // Alihkan ke halaman/controller (Mahasiswa) fungsi "addMahasiswa"

            location.href='<?php echo site_url("Mahasiswa/addMahasiswa")?>'
        })

        // btn_tambah.addEventListener('click', setRefresh)

        function setRefresh()
        {
            location.href='<?php echo base_url(); ?>'
        }

        // Buat fngsi untuk ke halaman update
        function goToUpdate(npm){
            location.href='<?php echo site_url("Mahasiswa/updateMahasiswa")?>'+'/'+npm
        }

        // Buat fngsi untuk hapus data
        function goToDelete(npm){
            if (confirm("Data Mahasiswa "+npm+" Ingin Dihapus ?") === true) {
                // alert("Data " + npm + " Berhasil Dihapus ")
                // punggil fungsi setDelete
                setDelete(npm);
            }
        }

        // ASYNC penggunaan fetch dalam fungsi set delete
        function setDelete(npm) {
            // buat variabel
            const data = {
                "npmnya": npm
            }
            // kirim data async dengan fetch
            fetch('<?php echo site_url("Mahasiswa/setDelete"); ?>', {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify(data)
                })
                .then((response) => {
                    return response.json()
                })
                .then(function(data) {
                    // // jika Nilai "err" = 0
                    // if (data.err === 0)
                    //     alert("Data Berhasil Dihapus")
                    // else
                    //     alert("Data Gagal Dihapus")
                    alert(data.statusnya);
                    // call set_refresh()
                    setRefresh();
                })

        }
    </script>
</body>

</html>