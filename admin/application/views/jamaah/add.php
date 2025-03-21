<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <p class="mb-0">Tambah Jamaah</p>
                    </div>
                </div>
                <div class="card-body">
                    <form action="<?php echo site_url() . 'jamaah/add' ?>" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label">Marketing yang Menangani</label>
                                    <select name="marketing" class="form-control" id="marketing" required></select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">NIK</label>
                                    <input type="text" required placeholder="35751515" name="nik" class="form-control" id="nik" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Nama Jamaah (PASPOR)</label>
                                    <input type="text" required placeholder="MUHAMMAD ALI" name="nama_jamaah" class="form-control" id="nama_jamaah" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Nomor Whatsapp</label>
                                    <input type="text" required placeholder="62881511255" name="nomor_telepon" class="form-control" id="nomor_telepon" />
                                    <small id="error_message" style="color: red; display: none;">Nomor harus diawali "62" dan hanya angka!</small>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-control-label">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-control">
                                        <option value="">Pilih</option>
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-control-label">Tanggal Lahir</label>
                                    <input type="date" required name="ttl" class="form-control" id="ttl" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Foto Jamaah</label>
                                    <input type="file" class="form-control" name="jamaah_img" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Nomor Paspor</label>
                                    <input type="text" placeholder="C238712" name="nomor_paspor" class="form-control" id="nomor_paspor" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Email</label>
                                    <input type="text" placeholder="contoh@apa.com" name="email" class="form-control" id="email" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Provinsi</label>
                                    <select id="provinsi" name="provinsi" class="form-control" required></select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Kabupaten/Kota</label>
                                    <select id="kabupaten_kota" name="kabupaten_kota" class="form-control" required></select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Kecamatan</label>
                                    <select id="kecamatan" name="kecamatan" class="form-control" required></select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Kelurahan</label>
                                    <select id="kelurahan" name="kelurahan" class="form-control" required></select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="alamat">Alamat Lengkap</label>
                                    <textarea class="form-control" id="alamat" name="alamat" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Profesi</label>
                                    <select name="profesi" class="form-control" id="profesi" required>
                                        <option value="">Pilih Profesi</option>
                                        <option value="PNS">PNS (Pegawai Negeri Sipil)</option>
                                        <option value="TNI">TNI (Tentara Nasional Indonesia)</option>
                                        <option value="Polri">Polri</option>
                                        <option value="Dokter">Dokter</option>
                                        <option value="Perawat">Perawat</option>
                                        <option value="Guru">Guru</option>
                                        <option value="Dosen">Dosen</option>
                                        <option value="Wiraswasta">Wiraswasta</option>
                                        <option value="Pelajar/Mahasiswa">Pelajar/Mahasiswa</option>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Input Profesi Lainnya (Default: Tersembunyi) -->
                            <div class="col-md-6" id="div_profesi_lainnya" style="display: none;">
                                <div class="form-group">
                                    <label class="form-control-label">Detail Profesi</label>
                                    <input type="text" name="profesi_lainnya" class="form-control" id="profesi_lainnya" placeholder="Masukkan profesi lainnya">
                                </div>
                            </div>
                        </div>
                        <hr class="horizontal dark mt-0">
                        <button class="btn btn-primary btn-sm ms-auto" type="submit">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('#marketing').select2({
            placeholder: "Pilih Marketing",
            allowClear: true,
            ajax: {
                url: "<?= base_url('absensi/get_marketing') ?>", // Panggil controller
                dataType: "json",
                delay: 250,
                data: function(params) {
                    return {
                        search: params.term // Kirimkan teks pencarian
                    };
                },
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            return {
                                id: item.user_id, // Sesuaikan dengan field di database
                                text: item.user_name
                            };
                        })
                    };
                }
            }
        });
    });
    document.addEventListener("DOMContentLoaded", function() {
        loadDropdown("https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json", "provinsi");

        document.getElementById("provinsi").addEventListener("change", function() {
            let provinsiId = this.value;
            resetDropdown("kabupaten_kota");
            resetDropdown("kecamatan");
            resetDropdown("kelurahan");
            if (provinsiId) {
                loadDropdown(`https://www.emsifa.com/api-wilayah-indonesia/api/regencies/${provinsiId}.json`, "kabupaten_kota");
            }
        });

        document.getElementById("kabupaten_kota").addEventListener("change", function() {
            let kabupatenId = this.value;
            resetDropdown("kecamatan");
            resetDropdown("kelurahan");
            if (kabupatenId) {
                loadDropdown(`https://www.emsifa.com/api-wilayah-indonesia/api/districts/${kabupatenId}.json`, "kecamatan");
            }
        });

        document.getElementById("kecamatan").addEventListener("change", function() {
            let kecamatanId = this.value;
            resetDropdown("kelurahan");
            if (kecamatanId) {
                loadDropdown(`https://www.emsifa.com/api-wilayah-indonesia/api/villages/${kecamatanId}.json`, "kelurahan");
            }
        });
    });

    document.getElementById("nomor_telepon").addEventListener("blur", function() {
        var nomor = this.value;
        fetch("<?= site_url('jamaah/cek_nomor_telepon') ?>?nomor=" + nomor)
            .then(response => response.json())
            .then(data => {
                if (data.status === "duplikat") {
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Nomor telepon sudah terdaftar!",
                        timer: 2000,
                        showConfirmButton: false
                    });
                    document.getElementById("nomor_telepon").value = ""; // Kosongkan input
                }
            });
    });

    document.getElementById("profesi").addEventListener("change", function() {
        var selectedValue = this.value;
        var inputProfesiLainnya = document.getElementById("div_profesi_lainnya");

        // Jika memilih "Wiraswasta" atau "Lainnya", munculkan input tambahan
        if (selectedValue === "Wiraswasta" || selectedValue === "Lainnya") {
            inputProfesiLainnya.style.display = "block";
            document.getElementById("profesi_lainnya").setAttribute("required", "required");
        } else {
            inputProfesiLainnya.style.display = "none";
            document.getElementById("profesi_lainnya").removeAttribute("required");
        }
    });

    /**
     * Fungsi untuk mengambil data dari API dan mengisi dropdown
     */
    function loadDropdown(url, elementId) {
        fetch(url)
            .then(response => response.json())
            .then(data => {
                let select = document.getElementById(elementId);
                select.innerHTML = "<option value=''>Pilih</option>"; // Reset dropdown
                data.forEach(item => {
                    select.innerHTML += `<option value="${item.id}">${item.name}</option>`;
                });
            })
            .catch(error => console.error("Error fetching data: ", error));
    }

    /**
     * Fungsi untuk mereset dropdown agar tidak menampilkan data lama
     */
    function resetDropdown(elementId) {
        let select = document.getElementById(elementId);
        select.innerHTML = "<option value=''>Pilih</option>";
    }

    document.getElementById("nomor_telepon").addEventListener("input", function() {
        let input = this.value;
        let errorMessage = document.getElementById("error_message");

        // Cek apakah input hanya angka dan diawali dengan "62"
        if (!/^62\d{8,13}$/.test(input)) {
            errorMessage.style.display = "block"; // Tampilkan pesan error
            this.setCustomValidity("Nomor harus diawali '62' dan hanya angka!");
        } else {
            errorMessage.style.display = "none"; // Sembunyikan pesan error
            this.setCustomValidity(""); // Hilangkan error
        }
    });
</script>