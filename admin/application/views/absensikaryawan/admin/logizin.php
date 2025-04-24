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
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jenis</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Cabang</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Alasan</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Foto</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; foreach ($izin as $row): ?>
                                <tr class="text-center">
                                    <td><?php echo $no++; ?></td>
                                    <td class="wrap-column"><?php echo htmlspecialchars($row['nama_karyawan']); ?></td>
                                    <td class="wrap-column"><?php echo htmlspecialchars($row['jenis_pengajuan']); ?></td>
                                    <td class="wrap-column">
                                        <?php 
                                            echo $row['tanggal_mulai'] ? date('d-m-Y', strtotime($row['tanggal_mulai'])) : '-'; 
                                        ?><br>
                                        <?php 
                                            echo ($row['tanggal_selesai'] == '0000-00-00' || empty($row['tanggal_selesai'])) 
                                                ? '' 
                                                : date('d-m-Y', strtotime($row['tanggal_selesai'])); 
                                        ?>
                                    </td>
                                    <td class="wrap-column"><?php echo htmlspecialchars($row['nama_cabang']); ?></td>
                                    <td class="wrap-column"><?php echo htmlspecialchars($row['alasan']); ?></td>
                                    <td>
                                        <a href="<?php echo base_url('assets/absensi/lampiran/' . $row['lampiran']); ?>" target="_blank" class="text-success fw-bold">Lihat</a>
                                    </td>
                                    <td class="text-center">
                                        <?php if ($row['status_pengajuan'] == 'Diajukan'): ?>
                                            <a href="<?php echo site_url('absen_admin/update_status?id='.$row['id_pengajuan'].'&status=Disetujui'); ?>" class="btn bg-gradient-success btn-sm">
                                                <span class="fa fa-check"></span> Setujui
                                            </a>
                                            <a href="<?php echo site_url('absen_admin/update_status?id='.$row['id_pengajuan'].'&status=Ditolak'); ?>" class="btn bg-gradient-danger btn-sm">
                                                <span class="fa fa-times"></span> Tolak
                                            </a>
                                        <?php else: ?>
                                            <!-- <span class="badge bg-<?php echo ($row['status_pengajuan'] == 'Disetujui') ? 'success' : 'danger'; ?>">
                                                <?php echo $row['status_pengajuan']; ?>
                                            </span> -->
                                            <a href="<?php echo site_url('absen_admin/update_status?id='.$row['id_pengajuan'].'&status=Diajukan'); ?>" class=" btn bg-gradient-info btn-sm">
                                                </span> Tinjau
                                            </a>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
    $('#dataTable-izin').DataTable({
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.11.5/i18n/Indonesian.json",
            "paginate": {
                "previous": "<",
                "next": ">"
            },
        },
        "pageLength": 10
    });
});
</script>
<style>
    #dataTable-izin {
        height: auto !important;
    }
    #dataTable-izin tbody tr:hover {
        background-color: #f5f5f5;
        cursor: pointer;
    }
    .card {
        border-radius: 15px;
        box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.15);
    }
    td.wrap-column {
        white-space: normal !important;
        word-wrap: break-word;
        word-break: break-word;
    }
    .text-center {
        text-align: center;
    }
</style>
