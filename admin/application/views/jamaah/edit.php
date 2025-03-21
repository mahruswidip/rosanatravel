<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <p class="mb-0">Edit Jamaah</p>

                    </div>
                </div>
                <div class="card-body">
                    <?php echo form_open_multipart('jamaah/edit/' . $jamaah['id_jamaah']); ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label">NIK</label>
                                <input type="text" required placeholder="35751515" name="nik" value="<?php echo $jamaah['nik']; ?>" class="form-control" id="nik" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label">Nama Jamaah (PASPOR)</label>
                                <input type="text" required placeholder="MUHAMMAD ALI" name="nama_jamaah" value="<?php echo $jamaah['nama_jamaah']; ?>" class="form-control" id="nama_jamaah" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label">Nomor Whatsapp</label>
                                <input type="text" required placeholder="62881511255" name="nomor_telepon" value="<?php echo $jamaah['nomor_telepon']; ?>" class="form-control" id="nomor_telepon" />
                                <small id="error_message" style="color: red; display: none;">Nomor harus diawali "62" dan hanya angka!</small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-control-label">Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-control">
                                    <option value="">Pilih</option>
                                    <?php
                                    $jenis_kelamin_values = array(
                                        'Laki-Laki' => 'Laki-Laki',
                                        'Perempuan' => 'Perempuan',
                                    );

                                    foreach ($jenis_kelamin_values as $value => $display_text) {
                                        $selected = "";

                                        // Check if there is input post data for 'jenis_kelamin'
                                        if ($this->input->post('jenis_kelamin') == $value) {
                                            $selected = 'selected="selected"';
                                        }
                                        // If not, check if the record value matches the option value
                                        elseif ($jamaah['jenis_kelamin'] == $value) {
                                            $selected = 'selected="selected"';
                                        }

                                        echo '<option value="' . $value . '" ' . $selected . '>' . $display_text . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-control-label">Tanggal Lahir</label>
                                <input type="date" required name="ttl" class="form-control" id="ttl" value="<?php echo $jamaah['ttl']; ?>" />
                            </div>
                        </div>
                        <?php
                        if ($this->session->flashdata('error') != '') {
                            echo '<div class="alert alert-danger" role="alert">';
                            echo $this->session->flashdata('error');
                            echo '</div>';
                        }
                        ?>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label">Foto Jamaah</label>
                                <br>
                                <input type="file" class="form-control" style="display: none;" id="jamaah-img" name="jamaah_img">
                                <br>
                                <button id="jamaah-img-button" onclick="return false;" class="btn btn-info btn-sm"><span class="fa fa-pencil"></span> Ubah Foto</button>
                            </div>
                        </div>
                        <!-- <hr class="horizontal dark mt-0"> -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label">Nomor Paspor</label>
                                <input type="text" required placeholder="C238712" name="nomor_paspor" value="<?php echo $jamaah['nomor_paspor']; ?>" class="form-control" id="nomor_paspor" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label">Email</label>
                                <input type="text" required placeholder="contoh@apa.com" name="email" value="<?php echo $jamaah['email']; ?>" class="form-control" id="email" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label">Provinsi</label>
                                <select id="provinsi" name="provinsi" class="form-control" required>
                                    <option value="<?php echo $jamaah['provinsi']; ?>" selected>
                                        <?php echo $jamaah['provinsi']; ?>
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label">Kabupaten/Kota</label>
                                <select id="kabupaten_kota" name="kabupaten_kota" class="form-control" required>
                                    <option value="<?php echo $jamaah['kabupaten_kota']; ?>" selected>
                                        <?php echo $jamaah['kabupaten_kota']; ?>
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label">Kecamatan</label>
                                <select id="kecamatan" name="kecamatan" class="form-control" required>
                                    <option value="<?php echo $jamaah['kecamatan']; ?>" selected>
                                        <?php echo $jamaah['kecamatan']; ?>
                                    </option>
                                </select>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label">Kelurahan</label>
                                <select id="kelurahan" name="kelurahan" class="form-control" required>
                                    <option value="<?php echo $jamaah['kelurahan']; ?>" selected>
                                        <?php echo $jamaah['kelurahan']; ?>
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea class="form-control" id="alamat" name="alamat" rows="3"><?php echo $jamaah['alamat']; ?></textarea>
                            </div>
                        </div>
                    </div>
                    <hr class="horizontal dark mt-0">
                    <button class="btn btn-primary btn-sm ms-auto" type="submit">Simpan</button>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Add this to include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    $('#jamaah-img').hide()
    jQuery('#jamaah-img-button').on('click', function() {
        jQuery('#jamaah-img').toggle();
    })
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        let selectedProvinsi = "<?php echo $jamaah['provinsi']; ?>";
        let selectedKabupaten = "<?php echo $jamaah['kabupaten_kota']; ?>";
        let selectedKecamatan = "<?php echo $jamaah['kecamatan']; ?>";
        let selectedKelurahan = "<?php echo $jamaah['kelurahan']; ?>";

        // Load provinsi saat pertama kali halaman dimuat
        loadDropdown("https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json", "provinsi", selectedProvinsi);

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

        /**
         * Fungsi untuk mengambil data dari API dan mengisi dropdown
         */
        function loadDropdown(url, elementId, selectedValue = "") {
            fetch(url)
                .then(response => response.json())
                .then(data => {
                    let select = document.getElementById(elementId);
                    select.innerHTML = "<option value=''>Pilih</option>";

                    data.forEach(item => {
                        let isSelected = selectedValue == item.id ? "selected" : "";
                        select.innerHTML += `<option value="${item.id}" ${isSelected}>${item.name}</option>`;
                    });

                    // Jika dropdown yang diload adalah Kabupaten/Kota, Kecamatan, atau Kelurahan,
                    // maka kita lanjutkan load data ke dropdown bawahnya.
                    if (elementId === "kabupaten_kota" && selectedValue) {
                        loadDropdown(`https://www.emsifa.com/api-wilayah-indonesia/api/districts/${selectedValue}.json`, "kecamatan", selectedKecamatan);
                    } else if (elementId === "kecamatan" && selectedValue) {
                        loadDropdown(`https://www.emsifa.com/api-wilayah-indonesia/api/villages/${selectedValue}.json`, "kelurahan", selectedKelurahan);
                    }
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
    });
</script>
<script>
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