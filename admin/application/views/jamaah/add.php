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
                                    <input type="text" required placeholder="0881511255" name="nomor_telepon" class="form-control" id="nomor_telepon" />
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
                        </div>
                        <hr class="horizontal dark mt-0">
                        <button class="btn btn-primary btn-sm ms-auto" type="submit">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    loadDropdown("https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json", "provinsi");

    document.getElementById("provinsi").addEventListener("change", function () {
        let provinsiId = this.value;
        resetDropdown("kabupaten_kota");
        resetDropdown("kecamatan");
        resetDropdown("kelurahan");
        if (provinsiId) {
            loadDropdown(`https://www.emsifa.com/api-wilayah-indonesia/api/regencies/${provinsiId}.json`, "kabupaten_kota");
        }
    });

    document.getElementById("kabupaten_kota").addEventListener("change", function () {
        let kabupatenId = this.value;
        resetDropdown("kecamatan");
        resetDropdown("kelurahan");
        if (kabupatenId) {
            loadDropdown(`https://www.emsifa.com/api-wilayah-indonesia/api/districts/${kabupatenId}.json`, "kecamatan");
        }
    });

    document.getElementById("kecamatan").addEventListener("change", function () {
        let kecamatanId = this.value;
        resetDropdown("kelurahan");
        if (kecamatanId) {
            loadDropdown(`https://www.emsifa.com/api-wilayah-indonesia/api/villages/${kecamatanId}.json`, "kelurahan");
        }
    });
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
</script>
