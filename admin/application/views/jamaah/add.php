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
                                    <input type="text" required placeholder="16 Digit" id="nik" name="nik" maxlength="16" class="form-control" required>
                                    <small id="nikError" style="color: red; display: none;">NIK harus terdiri dari 16 digit</small>
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
                                    <input type="email" placeholder="contoh@apa.com" name="email" class="form-control" id="email" />
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
            url: "<?= base_url('jamaah/get_marketing') ?>",
            dataType: "json",
            delay: 250,
            data: function(params) {
                return {
                    search: params.term
                };
            },
            processResults: function(data) {
                return {
                    results: $.map(data, function(item) {
                        return {
                            id: item.user_id,
                            text: item.user_name
                        };
                    })
                };
            }
        }
    });
    $('#provinsi, #kabupaten_kota, #kecamatan, #kelurahan').select2({
        placeholder: "Pilih",
        allowClear: true
    });

    loadDropdown("https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json", "provinsi");

    $("#provinsi").on("change", function() {
        let provinsiId = this.value;
        resetDropdown("kabupaten_kota");
        resetDropdown("kecamatan");
        resetDropdown("kelurahan");
        if (provinsiId) {
            loadDropdown(`https://www.emsifa.com/api-wilayah-indonesia/api/regencies/${provinsiId}.json`, "kabupaten_kota");
        }
    });

    $("#kabupaten_kota").on("change", function() {
        let kabupatenId = this.value;
        resetDropdown("kecamatan");
        resetDropdown("kelurahan");
        if (kabupatenId) {
            loadDropdown(`https://www.emsifa.com/api-wilayah-indonesia/api/districts/${kabupatenId}.json`, "kecamatan");
        }
    });

    $("#kecamatan").on("change", function() {
        let kecamatanId = this.value;
        resetDropdown("kelurahan");
        if (kecamatanId) {
            loadDropdown(`https://www.emsifa.com/api-wilayah-indonesia/api/villages/${kecamatanId}.json`, "kelurahan");
        }
    });
});
    function loadDropdown(url, elementId) {
        fetch(url)
            .then(response => response.json())
            .then(data => {
                let select = document.getElementById(elementId);
                select.innerHTML = "<option value=''>Pilih</option>";
                data.forEach(item => {
                    let option = new Option(item.name, item.id);
                    select.add(option);
                });
                $(`#${elementId}`).select2();
            })
            .catch(error => console.error("Error fetching data: ", error));
    }
    function resetDropdown(elementId) {
        let select = document.getElementById(elementId);
        select.innerHTML = "<option value=''>Pilih</option>";
        $(`#${elementId}`).select2();
    }

    document.getElementById("nomor_telepon").addEventListener("input", function() {
        let input = this.value;
        let errorMessage = document.getElementById("error_message");
        if (!/^62\d{7,12}$/.test(input)) {
            errorMessage.style.display = "block";
            this.setCustomValidity("Nomor harus diawali '62' dan hanya angka!");
        } else {
            errorMessage.style.display = "none";
            this.setCustomValidity("");
        }
    });
    document.getElementById("nik").addEventListener("input", function() {
    let nikInput = this.value;
    let nikError = document.getElementById("nikError");
    if (!/^\d*$/.test(nikInput)) {
        nikError.style.display = "inline";
        this.value = nikInput.replace(/\D/g, '');
    } else {
        nikError.style.display = "none";
    }
    if (nikInput.length > 16) {
        this.value = nikInput.slice(0, 16);
    } else if (nikInput.length < 16) {
        nikError.style.display = "inline";
    } else {
        nikError.style.display = "none";
    }
    });
    document.getElementById("email").addEventListener("input", function() {
    let emailInput = this.value;
    let emailError = document.getElementById("emailError");
    if (!emailInput.includes("@")) {
        emailError.style.display = "inline";
    } else {
        emailError.style.display = "none";
    }
    });
    document.getElementById("nama_jamaah").addEventListener("input", function() {
    this.value = this.value.toUpperCase();
    });
</script>