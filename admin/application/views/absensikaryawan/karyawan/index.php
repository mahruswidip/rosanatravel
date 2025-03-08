<!-- MODAL UNTUK ABSEN HADIR -->
<div class="modal fade" id="absenModal" tabindex="-1" aria-labelledby="absenModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="absenModalLabel">Absen Kehadiran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <video id="camera-preview" width="100%" autoplay playsinline></video>
                <canvas id="photo-canvas" style="display: none;"></canvas>
                <img id="photo-result" style="display: none; width: 100%;" />

                <button id="capture-btn" class="btn btn-primary mt-3">
                    <i class="fa-solid fa-camera"></i> Ambil Foto
                </button>
                <button id="retake-btn" class="btn btn-warning mt-3" style="display: none;">
                    <i class="fa-solid fa-redo"></i> Ulangi Foto
                </button>
                <button id="submit-absen" class="btn btn-success mt-3" style="display: none;">
                    <i class="fa-solid fa-check"></i> Absen Sekarang
                </button>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="d-flex align-items-center ">
                        <div class="col-3 text-start">
                            <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                <!-- <i class="fa fa-user"></i> -->
                                <i class="ni ni-single-02 text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                        <div class="col-8">
                            <h6 class="font-weight-bolder mb-0"><?php echo $this->session->userdata('user_name') ?></h6>
                            <p class="mb-0">
                                <!-- <?php print_r($this->session->all_userdata())  ?> -->
                                <?php echo $this->session->userdata('id_karyawan') ?> - <?php echo 'Kantor ' . $karyawan['kota'] ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body p-3">
                    <div class="row justify-content-md-center">
                        <h1 id="current-time" class="font-weight-bolder text-center">00:00 WIB</h1>
                        <p id="current-date" class="text-sm mb-0 text-center font-weight-bold">Loading...</p>
                        <hr>
                        <p class="text-sm mb-0 text-center">Jam Kerja : 08.00 WIB - 16.00 WIB</p>
                        <hr>
                        <div class="col text-center mt-2">
                            <button class="btn bg-gradient-primary btn-md" data-bs-toggle="modal" data-bs-target="#absenModal">
                                <i class="fa-solid fa-right-to-bracket"></i>&nbsp; Absen Hadir
                            </button>
                            &nbsp;
                            <a href="" class="btn bg-gradient-secondary btn-md">
                                <i class="fa-solid fa-right-from-bracket"></i>&nbsp; Absen Pulang
                            </a>
                            <a href="" class="btn btn-md">
                                <i class="fa-solid fa-stethoscope"></i>&nbsp; Ajukan Izin / Cuti
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive">
                        <table id="dataTable-karyawan" class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Masuk</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pulang</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="<?php echo base_url('assets'); ?>/js/moment.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    $(document).ready(function() {
        function loadAbsensi() {
            $.ajax({
                url: "<?= base_url('absensi/get_absensi') ?>",
                type: "GET",
                dataType: "json",
                success: function(data) {
                    let rows = "";
                    data.forEach(function(item) {
                        let tanggal = moment(item.tanggal, "YYYY-MM-DD").format("DD MMMM YYYY");
                        let masuk = item.masuk ? moment(item.masuk, "HH:mm:ss").format("HH:mm") : "-";
                        let pulang = item.pulang ? moment(item.pulang, "HH:mm:ss").format("HH:mm") : "-";

                        rows += `<tr>
                        <td class="text-center">${tanggal}</td>
                        <td class="text-center">${masuk}</td>
                        <td>${pulang}</td>
                        <td>${item.status_absen}</td>
                    </tr>`;
                    });

                    $("#dataTable-karyawan tbody").html(rows);
                },
                error: function(xhr, status, error) {
                    console.error("Error loading data:", error);
                }
            });
        }

        loadAbsensi();
    });
    // Menampilkan waktu real-time
    function updateTime() {
        let now = new Date();

        // Format waktu Indonesia (WIB)
        let hours = now.getHours().toString().padStart(2, "0");
        let minutes = now.getMinutes().toString().padStart(2, "0");
        let seconds = now.getSeconds().toString().padStart(2, "0");
        let timeString = `${hours}.${minutes}.${seconds} WIB`;
        document.getElementById("current-time").innerText = timeString;

        // Format hari dan tanggal
        let days = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
        let months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
        let dayName = days[now.getDay()];
        let day = now.getDate();
        let month = months[now.getMonth()];
        let year = now.getFullYear();

        let dateString = `${dayName}, ${day} ${month} ${year}`;
        document.getElementById("current-date").innerText = dateString;
    }

    // Perbarui jam dan tanggal setiap detik
    setInterval(updateTime, 1000);
    updateTime();

    let video = document.getElementById("camera-preview");
    let canvas = document.getElementById("photo-canvas");
    let photoResult = document.getElementById("photo-result");
    let captureBtn = document.getElementById("capture-btn");
    let retakeBtn = document.getElementById("retake-btn");
    let submitBtn = document.getElementById("submit-absen");
    let stream;

    let lokasiLat = null;
    let lokasiLng = null;

    // Ambil lokasi GPS pengguna
    async function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                position => {
                    lokasiLat = position.coords.latitude;
                    lokasiLng = position.coords.longitude;
                },
                error => {
                    Swal.fire("Error!", "Gagal mendapatkan lokasi: " + error.message, "error");
                }
            );
        } else {
            Swal.fire("Error!", "Geolocation tidak didukung oleh browser ini.", "error");
        }
    }

    // Buka kamera saat modal dibuka
    document.getElementById("absenModal").addEventListener("shown.bs.modal", async function() {
        await getLocation(); // Ambil lokasi GPS sebelum absen
        startCamera();
    });

    async function startCamera() {
        try {
            stream = await navigator.mediaDevices.getUserMedia({
                video: {
                    facingMode: "user"
                } // Kamera depan
            });
            video.srcObject = stream;
            video.style.display = "block";
            photoResult.style.display = "none";
            captureBtn.style.display = "block";
            retakeBtn.style.display = "none";
            submitBtn.style.display = "none";
        } catch (err) {
            Swal.fire("Error!", "Gagal mengakses kamera: " + err.message, "error");
        }
    }

    // Ambil gambar saat tombol ditekan
    captureBtn.addEventListener("click", function() {
        let ctx = canvas.getContext("2d");
        canvas.width = video.videoWidth;
        canvas.height = video.videoHeight;
        ctx.drawImage(video, 0, 0, canvas.width, canvas.height);

        let imageData = canvas.toDataURL("image/png"); // Konversi ke Base64
        photoResult.src = imageData;
        photoResult.style.display = "block";
        video.style.display = "none"; // Sembunyikan video setelah ambil foto
        captureBtn.style.display = "none";
        retakeBtn.style.display = "block";
        submitBtn.style.display = "block";
    });

    // Ulangi Foto
    retakeBtn.addEventListener("click", function() {
        startCamera(); // Aktifkan kamera lagi
    });

    // Kirim data ke server saat absen
    submitBtn.addEventListener("click", function() {
        let imageData = canvas.toDataURL("image/png");
        let fk_id_karyawan = parseInt("<?= $_SESSION['id_karyawan'] ?? '0' ?>");
        if (!fk_id_karyawan) {
            Swal.fire("Error!", "ID Karyawan tidak ditemukan. Silakan login ulang.", "error");
            return;
        }

        let tipe_absen = "masuk"; // Bisa 'pulang' atau 'izin'
        let status_absen = "normal";
        let alasan = "";

        let formData = new FormData();
        formData.append("fk_id_karyawan", fk_id_karyawan);
        formData.append("foto_absen", imageData);
        formData.append("lokasi_lat", lokasiLat);
        formData.append("lokasi_lng", lokasiLng);
        formData.append("tipe_absen", tipe_absen);
        formData.append("status_absen", status_absen);
        formData.append("alasan", alasan);

        fetch("<?= base_url('absensi/proses_absen') ?>", {
                method: "POST",
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    Swal.fire({
                        title: "Sukses!",
                        text: "Absen berhasil!",
                        icon: "success",
                        confirmButtonText: "OK"
                    }).then(() => {
                        location.reload(); // Reload halaman setelah klik OK
                    });
                } else {
                    Swal.fire("Gagal!", "Gagal absen: " + data.message, "error");
                }
            })
            .catch(error => {
                Swal.fire("Error!", "Terjadi kesalahan saat mengirim data.", "error");
            });
    });

    // Hentikan kamera saat modal ditutup
    document.getElementById("absenModal").addEventListener("hidden.bs.modal", function() {
        if (stream) {
            let tracks = stream.getTracks();
            tracks.forEach(track => track.stop()); // Matikan kamera
        }
    });
</script>