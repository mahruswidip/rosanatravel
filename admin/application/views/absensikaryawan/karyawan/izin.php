<!-- Tambahkan SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <p class="mb-0">Ajukan Izin</p>
                    </div>
                </div>
                <div class="card-body">
                    <form id="form-izin" action="<?php echo site_url('absensi/ajukan_izin') ?>" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <input type="hidden" name="fk_id_karyawan" value="<?= $_SESSION['id_karyawan'] ?? '' ?>">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Nama Karyawan</label>
                                    <input type="text" class="form-control" value="<?= $_SESSION['user_name'] ?? '' ?>" readonly>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Tanggal Pengajuan</label>
                                    <input type="text" name="tanggal_pengajuan" class="form-control" value="<?= date('Y-m-d H:i:s') ?>" readonly>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Jenis Pengajuan</label>
                                    <select name="jenis_pengajuan" id="jenis_pengajuan" class="form-control" required>
                                        <option value="">Pilih Jenis</option>
                                        <option value="Cuti">Cuti</option>
                                        <option value="Izin">Izin</option>
                                        <option value="Sakit">Sakit</option>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-control-label">Tanggal Mulai</label>
                                    <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-md-3" id="tanggal_selesai_container">
                                <div class="form-group">
                                    <label class="form-control-label">Tanggal Selesai</label>
                                    <input type="date" name="tanggal_selesai" id="tanggal_selesai" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label">Alasan Pengajuan</label>
                                    <textarea class="form-control" name="alasan" rows="3" placeholder="Tuliskan alasan cuti atau izin..." required></textarea>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Lampiran (Opsional)</label>
                                    <input type="file" class="form-control" name="lampiran">
                                    <small class="text-muted">Unggah bukti jika diperlukan (misal surat dokter).</small>
                                </div>
                            </div>

                            <div class="col-md-6 d-none">
                                <div class="form-group">
                                    <label class="form-control-label">Status Pengajuan</label>
                                    <input type="text" name="status_pengajuan" class="form-control" value="Diajukan" readonly>
                                </div>
                            </div>
                        </div>

                        <hr class="horizontal dark mt-0">
                        <button class="btn btn-primary btn-sm ms-auto" type="submit">Ajukan Cuti/Izin</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById("jenis_pengajuan").addEventListener("change", function() {
        let jenis = this.value;
        let tanggalSelesaiContainer = document.getElementById("tanggal_selesai_container");
        let tanggalSelesaiInput = document.getElementById("tanggal_selesai");

        if (jenis === "Sakit") {
            tanggalSelesaiContainer.style.display = "none";
            tanggalSelesaiInput.removeAttribute("required");
            tanggalSelesaiInput.value = "";
        } else {
            tanggalSelesaiContainer.style.display = "block";
            tanggalSelesaiInput.setAttribute("required", "required");
        }
    });

    document.getElementById("form-izin").addEventListener("submit", function(event) {
        event.preventDefault(); // Mencegah pengiriman langsung

        Swal.fire({
            title: "Konfirmasi Pengajuan",
            text: "Apakah Anda yakin ingin mengajukan izin ini?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, Ajukan!"
        }).then((result) => {
            if (result.isConfirmed) {
                let formData = new FormData(this);

                fetch(this.action, {
                        method: "POST",
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === "success") {
                            Swal.fire({
                                title: "Berhasil!",
                                text: data.message,
                                icon: "success",
                                confirmButtonText: "OK"
                            }).then(() => {
                                window.location.href = "<?= site_url('absensi/izin') ?>";
                            });
                        } else {
                            Swal.fire({
                                title: "Gagal!",
                                text: data.message,
                                icon: "error",
                                confirmButtonText: "Coba Lagi"
                            });
                        }
                    })
                    .catch(error => {
                        console.error("Error:", error);
                        Swal.fire({
                            title: "Error!",
                            text: "Terjadi kesalahan pada server.",
                            icon: "error",
                            confirmButtonText: "Tutup"
                        });
                    });
            }
        });
    });
</script>