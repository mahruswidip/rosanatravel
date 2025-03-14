<style>
    .collapse-anim {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.4s ease-out;
    }

    .collapse-anim.open {
        max-height: 500px;
        /* Sesuaikan tinggi maksimal */
        transition: max-height 0.4s ease-in;
    }
</style>

<!-- MODAL UNTUK ABSEN HADIR -->
<div class="modal fade" id="absenModal" tabindex="-1" aria-labelledby="absenModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="absenModalLabel">Absen Kehadiran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <video id="camera-preview-hadir" width="100%" autoplay playsinline></video>
                <canvas id="photo-canvas-hadir" style="display: none;"></canvas>
                <img id="photo-result-hadir" style="display: none; width: 100%;" />

                <button id="capture-btn-hadir" class="btn btn-primary mt-3">
                    <i class="fa-solid fa-camera"></i> Ambil Foto
                </button>
                <button id="retake-btn-hadir" class="btn btn-warning mt-3" style="display: none;">
                    <i class="fa-solid fa-redo"></i> Ulangi Foto
                </button>
                <button id="submit-absen-hadir" class="btn btn-success mt-3" style="display: none;">
                    <i class="fa-solid fa-check"></i> Absen Sekarang
                </button>
            </div>
        </div>
    </div>
</div>

<!-- MODAL UNTUK ABSEN PULANG -->
<div class="modal fade" id="absenpulangModal" tabindex="-1" aria-labelledby="absenpulangModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="absenpulangModalLabel">Absen Kepulangan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <video id="camera-preview-pulang" width="100%" autoplay playsinline></video>
                <canvas id="photo-canvas-pulang" style="display: none;"></canvas>
                <img id="photo-result-pulang" style="display: none; width: 100%;" />

                <button id="capture-btn-pulang" class="btn btn-primary mt-3">
                    <i class="fa-solid fa-camera"></i> Ambil Foto
                </button>
                <button id="retake-btn-pulang" class="btn btn-warning mt-3" style="display: none;">
                    <i class="fa-solid fa-redo"></i> Ulangi Foto
                </button>
                <button id="submit-absen-pulang" class="btn btn-success mt-3" style="display: none;">
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
                            <a href="" class="btn bg-gradient-secondary btn-md" data-bs-toggle="modal" data-bs-target="#absenpulangModal">
                                <i class="fa-solid fa-right-from-bracket"></i>&nbsp; Absen Pulang
                            </a>
                            <a href="<?php echo site_url('absensi/izin'); ?>" class="btn btn-md">
                                <i class="fa-solid fa-stethoscope"></i>&nbsp; Ajukan Izin
                            </a>
                            <br>
                            <a href="#" class="btn btn-link mb-0 pb-0" id="toggleRiwayat">
                                Riwayat Izin <br><i id="toggleIcon" class="fa-solid fa-chevron-down"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card Collapse dengan Animasi -->
            <div class="card mt-4 collapse-anim" id="collapseExample">
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive">
                        <table id="dataTable" class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Masuk</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pulang</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="3" class="text-center">Belum ada data</td>
                                </tr>
                            </tbody>
                        </table>
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
                        let masukTime = item.masuk ? moment(item.masuk, "HH:mm:ss") : null;
                        let pulangTime = item.pulang ? moment(item.pulang, "HH:mm:ss") : null;

                        let masuk = masukTime ? masukTime.format("HH:mm") : "-";
                        let pulang = pulangTime ? pulangTime.format("HH:mm") : "-";

                        let badgeMasuk = "";
                        if (masukTime && masukTime.isAfter(moment("08:00", "HH:mm"))) {
                            badgeMasuk = '<br><span class="badge bg-gradient-danger mt-1"><small>Terlambat</small</span>';
                        }

                        let badgePulang = "";
                        if (pulangTime && pulangTime.isBefore(moment("16:00", "HH:mm"))) {
                            badgePulang = '<br><span class="badge bg-gradient-warning mt-1"><small>Early Checkout</small</span>';
                        }

                        rows += `<tr>
                        <td class="text-center">${tanggal}</td>
                        <td class="text-center">${masuk} ${badgeMasuk}</td>
                        <td class="text-center">${pulang} ${badgePulang}</td>
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
    let submitPulangBtn = document.getElementById("submit-absen-pulang");

    let stream;

    let lokasiLat = null;
    let lokasiLng = null;

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

    async function startCamera(videoElement) {
        try {
            let stream = await navigator.mediaDevices.getUserMedia({
                video: {
                    facingMode: "user"
                }
            });
            videoElement.srcObject = stream;
            videoElement.dataset.stream = stream;
        } catch (err) {
            Swal.fire("Error!", "Gagal mengakses kamera: " + err.message, "error");
        }
    }

    function stopCamera(videoElement) {
        let stream = videoElement.dataset.stream;
        if (stream) {
            let tracks = stream.getTracks();
            tracks.forEach(track => track.stop());
        }
    }

    function setupAbsen(
        modalId, videoId, canvasId, imgId, captureBtnId, retakeBtnId, submitBtnId, tipeAbsen
    ) {
        let modal = document.getElementById(modalId);
        let video = document.getElementById(videoId);
        let canvas = document.getElementById(canvasId);
        let photoResult = document.getElementById(imgId);
        let captureBtn = document.getElementById(captureBtnId);
        let retakeBtn = document.getElementById(retakeBtnId);
        let submitBtn = document.getElementById(submitBtnId);

        modal.addEventListener("shown.bs.modal", async function() {
            await getLocation();
            startCamera(video);
        });

        modal.addEventListener("hidden.bs.modal", function() {
            stopCamera(video);
        });

        captureBtn.addEventListener("click", function() {
            let ctx = canvas.getContext("2d");
            canvas.width = video.videoWidth;
            canvas.height = video.videoHeight;
            ctx.drawImage(video, 0, 0, canvas.width, canvas.height);

            let imageData = canvas.toDataURL("image/png");
            photoResult.src = imageData;
            photoResult.style.display = "block";
            video.style.display = "none";
            captureBtn.style.display = "none";
            retakeBtn.style.display = "block";
            submitBtn.style.display = "block";
        });

        retakeBtn.addEventListener("click", function() {
            video.style.display = "block";
            photoResult.style.display = "none";
            captureBtn.style.display = "block";
            retakeBtn.style.display = "none";
            submitBtn.style.display = "none";
        });

        submitBtn.addEventListener("click", function() {
            let imageData = canvas.toDataURL("image/png");
            let fk_id_karyawan = parseInt("<?= $_SESSION['id_karyawan'] ?? '0' ?>");
            if (!fk_id_karyawan) {
                Swal.fire("Error!", "ID Karyawan tidak ditemukan. Silakan login ulang.", "error");
                return;
            }

            let formData = new FormData();
            formData.append("fk_id_karyawan", fk_id_karyawan);
            formData.append("foto_absen", imageData);
            formData.append("lokasi_lat", lokasiLat);
            formData.append("lokasi_lng", lokasiLng);
            formData.append("tipe_absen", tipeAbsen);
            formData.append("status_absen", "normal");
            formData.append("alasan", "");

            // Cek apakah sudah absen hari ini sebelum mengirim
            fetch("<?= base_url('absensi/cek_absensi_hari_ini') ?>?id_karyawan=" + fk_id_karyawan)
                .then(response => response.json())
                .then(data => {
                    if (data.sudah_absen) {
                        Swal.fire({
                            title: "Sudah Absen Hari Ini!",
                            text: "Anda sudah absen hari ini. Apakah ingin tetap absen?",
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonText: "Ya, Absen Lagi",
                            cancelButtonText: "Batal"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // Kirim data ke server untuk tetap melakukan absen
                                fetch("<?= base_url('absensi/proses_absen') ?>", {
                                        method: "POST",
                                        body: formData
                                    })
                                    .then(response => response.json())
                                    .then(data => {
                                        if (data.success) {
                                            Swal.fire("Sukses!", "Absen berhasil!", "success").then(() => {
                                                location.reload();
                                            });
                                        } else {
                                            Swal.fire("Gagal!", "Gagal absen: " + data.message, "error");
                                        }
                                    })
                                    .catch(error => {
                                        Swal.fire("Error!", "Terjadi kesalahan saat mengirim data.", "error");
                                    });
                            }
                        });
                    } else {
                        // Jika belum absen, langsung kirim data ke server
                        fetch("<?= base_url('absensi/proses_absen') ?>", {
                                method: "POST",
                                body: formData
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    Swal.fire("Sukses!", "Absen berhasil!", "success").then(() => {
                                        location.reload();
                                    });
                                } else {
                                    Swal.fire("Gagal!", "Gagal absen: " + data.message, "error");
                                }
                            })
                            .catch(error => {
                                Swal.fire("Error!", "Terjadi kesalahan saat mengirim data.", "error");
                            });
                    }
                })
                .catch(error => {
                    Swal.fire("Error!", "Gagal mengecek status absensi.", "error");
                });
        });
    }

    setupAbsen("absenModal", "camera-preview-hadir", "photo-canvas-hadir", "photo-result-hadir",
        "capture-btn-hadir", "retake-btn-hadir", "submit-absen-hadir", "masuk");

    setupAbsen("absenpulangModal", "camera-preview-pulang", "photo-canvas-pulang", "photo-result-pulang",
        "capture-btn-pulang", "retake-btn-pulang", "submit-absen-pulang", "pulang");


    // Hentikan kamera saat modal ditutup
    document.getElementById("absenModal").addEventListener("hidden.bs.modal", function() {
        if (stream) {
            let tracks = stream.getTracks();
            tracks.forEach(track => track.stop()); // Matikan kamera
        }
    });

    document.getElementById("absenpulangModal").addEventListener("hidden.bs.modal", function() {
        if (stream) {
            let tracks = stream.getTracks();
            tracks.forEach(track => track.stop()); // Matikan kamera
        }
    });

    document.getElementById("toggleRiwayat").addEventListener("click", function(event) {
        event.preventDefault();
        let collapseDiv = document.getElementById("collapseExample");
        let icon = document.getElementById("toggleIcon");

        if (collapseDiv.classList.contains("open")) {
            collapseDiv.classList.remove("open");
            icon.classList.replace("fa-chevron-up", "fa-chevron-down");
        } else {
            collapseDiv.classList.add("open");
            icon.classList.replace("fa-chevron-down", "fa-chevron-up");
        }
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(successCallback, errorCallback);
        } else {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Geolocation tidak didukung oleh browser ini!",
            });
        }
    });

    function successCallback(position) {
        let userLat = position.coords.latitude;
        let userLng = position.coords.longitude;

        // Kirim koordinat ke server untuk pengecekan
        fetch("<?= base_url('absensi/cek_radius') ?>", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({
                    lokasi_lat: userLat,
                    lokasi_lng: userLng
                }),
            })
            .then(response => response.json())
            .then(data => {
                if (!data.dalam_radius) {
                    Swal.fire({
                        icon: "warning",
                        title: "Diluar Area Kantor!",
                        text: `Anda berada di luar area absensi kantor! (Jarak: ${data.jarak} meter)`,
                        confirmButtonText: "Mengerti"
                    });
                }
            })
            .catch(error => console.error("Error:", error));
    }

    function errorCallback(error) {
        let message = "";
        switch (error.code) {
            case error.PERMISSION_DENIED:
                message = "Izin lokasi ditolak. Aktifkan GPS dan izinkan akses lokasi!";
                break;
            case error.POSITION_UNAVAILABLE:
                message = "Lokasi tidak tersedia!";
                break;
            case error.TIMEOUT:
                message = "Permintaan lokasi timeout!";
                break;
            default:
                message = "Terjadi kesalahan saat mendapatkan lokasi.";
                break;
        }
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: message,
        });
    }
</script>
<?php
echo "Timezone: " . date_default_timezone_get() . "<br>";
echo "Current Time: " . date('Y-m-d H:i:s');
?>