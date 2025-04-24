<div class="container-fluid py-4"> 
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Detail Presensi</h6>
                </div>
                <div class="card-body px-4 pt-3 pb-2">
                    <div class="row mb-4">
                        <!-- <div class="col-md-3">
                            <label for="tanggal">Isi Sesuai Kebutuhan</label>
                            <input type="text" class="form-control" id="tanggal" placeholder="2025-01-01 s.d. 2025-01-31">
                        </div> -->
                        <div class="col-md-3">
                            <label for="tanggal">Tanggal</label> 
                            <select class="form-control" id="tanggal-filter">
                                <option value="">Pilih Rentang</option>
                                <option value="today">Hari Ini</option>
                                <option value="week">1 Minggu</option>
                                <option value="month">1 Bulan</option>
                            </select>
                            <input type="hidden" id="tanggal">
                        </div>
                        <div class="col-md-3">
                            <label for="cabang">Cabang</label>
                            <select class="form-control" id="cabang">
                                <option value="">Semua</option>
                                <?php foreach ($cabang as $c): ?>
                                    <option value="<?php echo htmlspecialchars($c['id_kantor']); ?>">
                                        <?php echo htmlspecialchars($c['kota']); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="nama_pegawai">Nama Pegawai</label>
                            <select name="nama_pegawai" class="form-control" id="nama_pegawai" required></select>
                            <!-- <select class="form-control" id="nama_pegawai">
                                <option value="">Semua</option>
                                <?php foreach ($pegawai as $p): ?>
                                    <option value="<?php echo htmlspecialchars($p['id_karyawan']); ?>">
                                        <?php echo htmlspecialchars($p['nama_karyawan']); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select> -->
                        </div>
                        <div class="col-md-3 d-flex align-items-end">
                            <button id="filter-btn" class="btn btn-primary btn-sm me-2"></i>Filter</button>
                            <button id="export-excel" class="btn btn-success btn-sm"></i>Unduh</button>
                        </div>
                    </div>
                    <!-- Tabel Data Presensi -->
                    <div class="table-responsive px-4">
                        <table id="dataTable-presensi" class="table align-items-center mb-0 text-center">
                            <thead>
                                <tr>
                                    <th>Foto Masuk</th>
                                    <th>Foto Pulang</th>
                                    <th>Nama</th>
                                    <th>Tanggal</th>
                                    <th>Masuk</th>
                                    <th>Pulang</th>
                                    <th>Cabang</th>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
$(document).ready(function () {
    $('#nama_pegawai').select2({
        placeholder: "Pilih Pegawai",
        allowClear: true,
        ajax: {
            url: "<?= base_url('absen_koor/get_pegawai') ?>",
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
                            id: item.id_karyawan,
                            text: item.nama_karyawan
                        };
                    })
                };
            }
        }
    });
    var table = $('#dataTable-presensi').DataTable({
        "processing": true,
        "serverSide": false,
        "ajax": {
            "url": "<?php echo site_url('absen_koor/get_filtered_absen'); ?>",
            "type": "POST",
            "data": function (d) {
                d.draw = d.draw;
                d.tanggal = $('#tanggal').val();
                d.cabang = $('#cabang').val();
                d.nama_pegawai = $('#nama_pegawai').val();
            }
        },
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.11.5/i18n/Indonesian.json",
            "paginate": {
                "previous": "<",
                "next": ">"
            }
        },
        "pageLength": 10,
        "columns": [
            { "data": "foto_masuk", "render": function(data) {
                return data ? '<img src="<?php echo base_url(); ?>'+ data +'" width="100" onerror="this.onerror=null;this.src=\'<?php echo base_url('assets/no-image.png'); ?>\';">' : '-';
            }},
            { "data": "foto_pulang", "render": function(data) {
                return data ? '<img src="<?php echo base_url(); ?>'+ data +'" width="100" onerror="this.onerror=null;this.src=\'<?php echo base_url('assets/no-image.png'); ?>\';">' : '-';
            }},
            { "data": "nama_karyawan" },
            { "data": "tanggal" },
            { "data": "masuk", "render": function(data, type, row) {
                return data ? data.split(' ')[1] + "<br>" + (row.status_masuk ? row.status_masuk : '') : '-';
            }},
            { "data": "pulang", "render": function(data, type, row) {
                return data ? data.split(' ')[1] + "<br>" + (row.status_pulang ? row.status_pulang : '') : '-';
            }},
            { "data": "cabang" }
        ],
        "order": [
                [3, 'ASC']
        ]
    });

    $('#filter-btn').click(function () {
        table.ajax.reload();
    });
    $('#tanggal-filter').change(function () {
    const selected = $(this).val();
    const today = new Date();
    let start = '';
    let end = today.toISOString().split('T')[0];

    if (selected === 'today') {
        start = end;
    } else if (selected === 'week') {
        const past = new Date(today);
        past.setDate(today.getDate() - 6);
        start = past.toISOString().split('T')[0];
    } else if (selected === 'month') {
        const past = new Date(today);
        past.setDate(today.getDate() - 29);
        start = past.toISOString().split('T')[0];
    } 
    $('#tanggal').val(`${start} s.d. ${end}`).prop('disabled', true);
    });

    $("#export-excel").click(function () {
        let tanggal = $('#tanggal').val();
        let cabang = $('#cabang').val();
        let namaPegawai = $('#nama_pegawai').val();
        window.location.href = "<?php echo site_url('absen_koor/download_absen'); ?>" +
            "?tanggal=" + encodeURIComponent(tanggal) +
            "&cabang=" + encodeURIComponent(cabang) +
            "&nama_pegawai=" + encodeURIComponent(namaPegawai);
    });
});
</script>