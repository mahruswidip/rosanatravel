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
                            <h6 class="font-weight-bolder mb-0">Nama Karyawan</h6>
                            <p class="mb-0">
                                IDKaryawan - IDCabang
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
                        <table id="dataTable-jamaah" class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Tanggal</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Masuk</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Pulang</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center text-xxs font-weight-bolder">
                                        05 Maret 2025</td>
                                    <td
                                        class="text-center text-xxs font-weight-bolder">
                                        07.38</td>
                                    <td class="text-xxs font-weight-bolder">
                                        16.01</td>
                                    <td class="text-xxs font-weight-bolder">
                                        Hadir</td>
                                </tr>
                                <tr>
                                    <td class="text-center text-xxs font-weight-bolder">
                                        06 Maret 2025</td>
                                    <td
                                        class="text-center text-xxs font-weight-bolder">
                                        07.38</td>
                                    <td class="text-xxs font-weight-bolder">
                                        12.20</td>
                                    <td class="text-xxs font-weight-bolder">
                                        Early Checkout</td>
                                </tr>
                                <tr>
                                    <td class="text-center text-xxs font-weight-bolder">
                                        07 Maret 2025</td>
                                    <td
                                        class="text-center text-xxs font-weight-bolder">
                                        -</td>
                                    <td class="text-xxs font-weight-bolder">
                                        -</td>
                                    <td class="text-xxs font-weight-bolder">
                                        Izin</td>
                                </tr>
                            </tbody>
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
    let submitBtn = document.getElementById("submit-absen");
    let stream;

    // Buka kamera saat modal dibuka
    document.getElementById("absenModal").addEventListener("shown.bs.modal", async function() {
        try {
            stream = await navigator.mediaDevices.getUserMedia({
                video: {
                    facingMode: "user"
                } // Pakai kamera depan
            });
            video.srcObject = stream;
        } catch (err) {
            alert("Gagal mengakses kamera: " + err.message);
        }
    });

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
        submitBtn.style.display = "block"; // Tampilkan tombol absen
    });

    // Kirim foto ke server saat absen
    submitBtn.addEventListener("click", function() {
        let imageData = canvas.toDataURL("image/png");

        // Simpan ke database via AJAX
        fetch("proses_absen.php", {
                method: "POST",
                body: JSON.stringify({
                    image: imageData
                }),
                headers: {
                    "Content-Type": "application/json"
                }
            }).then(response => response.json())
            .then(data => alert("Absen berhasil!"))
            .catch(error => alert("Gagal absen!"));
    });

    // Hentikan kamera saat modal ditutup
    document.getElementById("absenModal").addEventListener("hidden.bs.modal", function() {
        if (stream) {
            let tracks = stream.getTracks();
            tracks.forEach(track => track.stop()); // Matikan kamera
        }
    });
</script>