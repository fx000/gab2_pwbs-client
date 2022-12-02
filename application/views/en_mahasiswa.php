<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href=" <?php echo base_url("ext/img/logoS.ico")?>">
    <title>Tambah Data Mahasiswa</title>

    <!-- Css Lokal -->
    <link rel="stylesheet" href="<?php echo base_url("ext/style.css")?>">
</head>
<body>
    <!-- Buat Area Menu -->
    <nav class="area-menu">
        <button id="btn_lihat" class="btn-primary">Lihat Data</button>
        <button id="btn_refresh" class="btn-secondary" onclick="return setRefresh()">Refresh Data</button>
    </nav>

    <!-- Buat area dengan enty data mahasiswa -->
    
    <main class="area-grid">
        <section class="item-label1">
            <label id="lbl_npm" for="txt_npm">
                NPM :
            </label>
        </section>
        <section class="item-input1">
            <input type="text" id="txt_npm" class="text-input" maxlength="9">
        </section>
        <section class="item-error1">
            <p id="err_npm" class="error-info">Ini Error</p>
        </section>

        <section class="item-label2">
            <label id="lbl_nama" for="txt_nama">
                NAMA MAHASISWA :
            </label>
        </section>
        <section class="item-input2">
            <input type="text" id="txt_nama" class="text-input" maxlength="100">
        </section>
        <section class="item-error2">
            <p id="err_nama" class="error-info"></p>
        </section>

        <section class="item-label3">
            <label id="lbl_telepon" for="txt_telepon">
                TELEPON :
            </label>
        </section>
        <section class="item-input3">
            <input type="text" id="txt_telepon" class="text-input" maxlength="15" onkeypress="return setNumber(event)">
        </section>
        <section class="item-error3">
            <p id="err_telepon" class="error-info"></p>
        </section>

        <section class="item-label4">
            <label id="lbl_jurusan" for="cbo_jurusan">
                JURUSAN :
            </label>
        </section>
        <section class="item-input4">
            <select class="select-input" id="cbo_jurusan">
                <option value="-">Pilih Jurusan</option>
                <option value="IF">Informatika</option>
                <option value="SI">Sistem Informasi</option>
                <option value="TI">Teknologi Informasi</option>
                <option value="TK">Teknik Komputer</option>
                <option value="SIA">Sistem Informasi Akuntansi</option>
            </select>
        </section>
        <section class="item-error4">
            <p id="err_jurusan" class="error-info"></p>
        </section>

    </main>

    <!-- Buat Area Menu -->
    <nav class="area-menu" style="margin-top: 15px;">
        <button id="btn_simpan" class="btn-primary">Simpan Data</button>
    </nav>

    <!-- Import File "/ext/script.js" -->
    <script src="<?php echo base_url("ext/script.js") ?>"></script>
    <script>
        // inisialisasi object
        let btn_lihat = document.getElementById("btn_lihat");

        // Buat Even
        btn_lihat.addEventListener('click', function(){
            // Ke halaman utama
            location.href='<?php echo base_url(); ?>'
        })

        // Buat fungsi refresh
        function setRefresh()
        {
            location.href='<?php echo site_url("Mahasiswa/addMahasiswa"); ?>'
        }

        // Buat even untuk btn_simpan
        let btn_simpan = document.getElementById("btn_simpan");
        btn_simpan.addEventListener('click', function(){
            // Inisialisasi object
            let lbl_npm = document.getElementById("lbl_npm");
            let txt_npm = document.getElementById("txt_npm");
            let err_npm = document.getElementById("err_npm");

            let lbl_nama = document.getElementById("lbl_nama");
            let txt_nama = document.getElementById("txt_nama");
            let err_nama = document.getElementById("err_nama");            

            let lbl_jurusan = document.getElementById("lbl_jurusan");
            let cbo_jurusan = document.getElementById("cbo_jurusan");
            let err_jurusan = document.getElementById("err_jurusan");

            // Jika npm tidak di isi
            if (txt_npm.value === "") {
                err_npm.style.display = 'unset';
                err_npm.innerHTML = "NPM Harus Diisi !"
                lbl_npm.style.color = "#FF0000"
                txt_npm.style.borderColor = "#FF0000"
            }
            // Jika npm di isi 
            else {
                err_npm.style.display = 'none';
                err_npm.innerHTML = ""
                lbl_npm.style.color = "unset"
                txt_npm.style.borderColor = "#000000"
            }

            // Ternary Operator
            const nama = (txt_nama.value === "")?
            [
                err_nama.style.display = 'unset',
                err_nama.innerHTML = "nama Harus Diisi !",
                lbl_nama.style.color = "#FF0000",
                txt_nama.style.borderColor = "#FF0000"
            ]
            :
            [
                err_nama.style.display = 'none',
                err_nama.innerHTML = "",
                lbl_nama.style.color = "unset",
                txt_nama.style.borderColor = "#000000"
            ]
            
            const telepon = (txt_telepon.value === "")?
            [
                // err_telepon.style.display = nama[0],
                err_telepon.style.display = 'unset',
                err_telepon.innerHTML = "telepon Harus Diisi !",
                lbl_telepon.style.color = "#FF0000",
                txt_telepon.style.borderColor = "#FF0000"
            ]
            :
            [
                err_telepon.style.display = 'none',
                err_telepon.innerHTML = "",
                lbl_telepon.style.color = "unset",
                txt_telepon.style.borderColor = "#000000"
            ]

            // alert(`Jurusan : ${cbo_jurusan.value}`)

            const jurusan = (cbo_jurusan.selectedIndex === 0)?
            [
                err_jurusan.style.display = 'unset',
                err_jurusan.innerHTML = "jurusan Harus Diisi !",
                lbl_jurusan.style.color = "#FF0000",
                cbo_jurusan.style.borderColor = "#FF0000"
            ]
            :
            [
                err_jurusan.style.display = 'none',
                err_jurusan.innerHTML = "",
                lbl_jurusan.style.color = "unset",
                cbo_jurusan.style.borderColor = "#000000"
            ]

            if (err_npm.innerHTML === "" && nama[1] === "" && telepon[1] === "" && jurusan[1] === "") {
                // Panggil method setSave
                setSave(txt_npm.value, txt_nama.value, txt_telepon.value, cbo_jurusan.value)
            }
        });

        const setSave = (npm, nama, telepon, jurusan) => {
            // buat variabel untuk form
            let form = new FormData();
            // isi/tambah nilai untuk forn
            form.append("npmnya", npm)
            form.append("namanya", nama)
            form.append("teleponnya", telepon)
            form.append("jurusanyna",  jurusan)

            // Proses kirim data ke kontroler
            fetch('<?php echo site_url("Mahasiswa/setSave"); ?>', {
                method: "POST",
                body: form
            })
            .then((response) => response.json())
            .then((result) => alert(result.statusnya))
            .catch((error) => alert("Data Gagal dikirim"))
        }

    </script>
</body>
</html>