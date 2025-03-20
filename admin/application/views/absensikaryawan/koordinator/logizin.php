<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <h6>Data Pengajuan Izin</h6>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive px-5 py-2">
                        <table id="dataTable-izin" class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        No</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Nama</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Jenis</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Tanggal</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Cabang</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Alasan</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Foto</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; foreach ($izin as $row): ?>
                                <tr class="text-center">
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo htmlspecialchars($row['nama_karyawan']); ?></td>
                                    <td><?php echo htmlspecialchars($row['jenis_pengajuan']); ?></td>
                                    <td>
                                        <?php echo $row['tanggal_mulai'] ? $row['tanggal_mulai'] : '-'; ?><br>
                                        <?php echo $row['tanggal_selesai'] ? $row['tanggal_selesai'] : '-'; ?>
                                    </td>
                                    <td><?php echo htmlspecialchars($row['nama_cabang']); ?></td>
                                    <td><?php echo htmlspecialchars($row['alasan']); ?></td>
                                    <td>
                                        <a href="<?php echo base_url('assets/absensi/lampiran/' . $row['lampiran']); ?>"
                                            target="_blank">
                                            Lihat Lampiran
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <?php if ($row['status_pengajuan'] == 'Diajukan'): ?>
                                        <button class="btn btn-success btn-sm btn-setujui"
                                            data-id="<?php echo $row['id_pengajuan']; ?>">
                                            Setujui
                                        </button>
                                        <button class="btn btn-danger btn-sm btn-tolak"
                                            data-id="<?php echo $row['id_pengajuan']; ?>">
                                            Tolak
                                        </button>
                                        <?php else: ?>
                                        <span
                                            class="badge bg-<?php echo ($row['status_pengajuan'] == 'Disetujui') ? 'success' : 'danger'; ?>">
                                            <?php echo $row['status_pengajuan']; ?>
                                        </span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $('#dataTable-izin').DataTable();

    $(".btn-setujui, .btn-tolak").click(function() {
        let id = $(this).data("id");
        let status = $(this).hasClass("btn-setujui") ? "Disetujui" : "Ditolak";

        console.log("Mengirim data:", {
            id,
            status
        }); // Debugging sebelum request

        $.ajax({
            url: "<?php echo site_url('absen_koor/update_status'); ?>",
            type: "POST",
            data: {
                id: id,
                status: status
            },
            dataType: "json",
            success: function(response) {
                console.log("Respon server:", response);
                if (response.status === "success") {
                    alert(response.message);
                    location.reload();
                } else {
                    alert("Gagal: " + response.message);
                    console.log("Error:", response);
                }
            },
            error: function(xhr, status, error) {
                alert("Terjadi kesalahan saat mengupdate data.");
                console.log("XHR:", xhr.responseText);
                console.log("Status:", status);
                console.log("Error:", error);
            }
        });
    });
});
</script>