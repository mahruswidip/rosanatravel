<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <h6>Jamaah</h6>
                        <a href="<?php echo site_url('jamaah/add'); ?>"
                            class="btn bg-gradient-primary btn-sm ms-auto"><span class="fa fa-plus">&nbsp</span>Tambah</a>
                        <a href="<?php echo site_url('jamaah/unduh_data'); ?>"
                            class="btn bg-gradient-success btn-sm ms-2">
                            <span class="fa fa-file-excel">&nbsp</span> Unduh Data</a>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive px-5 py-2">
                        <table id="dataTable-jamaah" class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Foto</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Detail Jamaah</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Nomor Telepon</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Alamat</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        QR Code</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Dibuat Pada</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Aksi</th>
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
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <h6>Ulang Tahun Jamaah</h6>
                        <!-- <a href="<?php echo site_url('jamaah/add'); ?>" class="btn bg-gradient-primary btn-sm ms-auto"><span class="fa fa-plus">&nbsp</span> Tambah</a> -->
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive px-5 py-2">
                        <table id="dataTable-ultah" class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Foto</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Nama Jamaah</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Tanggal Lahir</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Nomor Telepon</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Alamat</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Aksi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
#dataTable-jamaah {
    height: 300px !important;
}

#dataTable-jamaah td:nth-child(4) {
    width: 50px;
    /* Set your desired width */
}

#dataTable-jamaah tbody tr:hover {
    background-color: #f5f5f5;
    /* Change the background color to your desired hover color */
    cursor: pointer;
    /* Change the cursor to a pointer on hover */
}

.long-text {
    max-width: 200px;
    white-space: pre-wrap;
}
</style>
<!-- Include jQuery and DataTables libraries -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<!-- DataTable initialization with AJAX -->
<script type="text/javascript">
$(document).ready(function() {
    function generateStarRating(starCount) {
        var stars = '';
        for (var i = 0; i < starCount; i++) {
            stars += '&#11088;'; // Unicode character for a star icon
        }
        return stars;
    }
    $('#dataTable-jamaah').DataTable({
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.11.5/i18n/Indonesian.json",
            "paginate": {
                "previous": "<",
                "next": ">"
            },
        },
        "pageLength": 10,
        ajax: {
            url: '<?php echo base_url("jamaah/view"); ?>',
            type: 'POST',
            dataSrc: ''
        },
        rowCallback: function(row, data) {
            // Attach click event listener to each row
            $(row).on('click', function() {
                // Get the ID of the clicked row's data
                var jamaahId = data.id_jamaah;

                // Redirect to the detail page using the jamaahId
                window.location.href = '<?php echo site_url('jamaah/detail/') ?>' +
                jamaahId;
            });
        },
        columns: [{
                data: 'jamaah_img',
                render: function(data, type, row) {
                    // Assuming data contains the filename (e.g., "c39f997660f4a7e707658a141d30e7ce.jpg")
                    // You need to provide the correct path to your image folder.
                    var imagePath = '<?php echo base_url("assets/images/"); ?>' + data;
                    // Generate HTML for displaying the image
                    return '<img src="' + imagePath +
                        '" alt="Image" class="img-fluid border-radius-lg" style="max-width: 100px; max-height: 100px;">';
                }
            },
            {
                data: 'null',
                render: function(data, type, row) {
                    return '<p class="text-xs font-weight-bold mb-0">' + row.nama_jamaah +
                        '</p>' + '<p class="text-xs text-secondary mb-0">' + row.nomor_paspor +
                        '</p>';
                },
            },
            {
                data: 'null',
                render: function(data, type, row) {
                    return '<p class="text-xs font-weight-bold mb-0">' + row.nomor_telepon +
                        '</p>';
                },
            },
            {
                data: 'null',
                render: function(data, type, row) {
                    return '<p class="text-xs font-weight-bold mb-0 long-text">' + row.alamat +
                        '</p>';
                },
            },
            {
                data: 'qr_code_benar',
                render: function(data, type, row) {
                    // Assuming data contains the filename (e.g., "c39f997660f4a7e707658a141d30e7ce.jpg")
                    // You need to provide the correct path to your image folder.
                    var imagePath = '<?php echo base_url("assets/images/qr_uuid/"); ?>' + data;
                    // Generate HTML for displaying the image
                    if (data == "") {
                        return '<a href="<?php echo base_url() . 'jamaah/updateqr/' ?>' + row
                            .id_jamaah + '"' +
                            'class="btn btn-dark btn-sm"><span class="fa fa-qrcode"></span></a>';
                    } else {
                        return '<img src="' + imagePath +
                            '" alt="Image" class="img-fluid border-radius-lg" style="max-width: 100px; max-height: 100px;">';
                    }
                }
            },
            {
                data: 'null',
                render: function(data, type, row) {
                    return '<p class="text-xs font-weight-bold mb-0">' + row.created_at +
                    '</p>';
                },
            },
            {
                data: null,
                className: 'td-column-right',
                render: function(data, type, row) {
                    var userButton = '<a href="<?php echo site_url('jamaah/buatuser/'); ?>' +
                        row.id_jamaah +
                        '" class="btn bg-gradient-primary btn-sm"><span class="fas fa-user"></span></a>';
                    var editButton = '<a href="<?php echo site_url('jamaah/edit/'); ?>' + row
                        .id_jamaah +
                        '" class="btn bg-gradient-info btn-sm"><span class="fa fa-pencil"></span></a>';
                    var deleteButton = '<a href="<?php echo site_url('jamaah/remove/'); ?>' +
                        row.id_jamaah +
                        '" class="btn bg-gradient-danger btn-sm"><span class="fa fa-trash"></span></a>';
                    return userButton + ' ' + editButton + ' ' + deleteButton;
                }
            },

        ],
        "order": [
            [6, 'asc']
        ] // Menyortir berdasarkan kolom dengan indeks 1 (kolom is_aktif) secara descending (nilai 1 akan berada di atas)
    });
});
</script>
<!--untuk isi pada tabel ucapan selamat ulang tahun -->
<script type="text/javascript">
$(document).ready(function() {
    $('#dataTable-ultah').DataTable({
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.11.5/i18n/Indonesian.json",
            "paginate": {
                "previous": "<",
                "next": ">"
            },
        },
        "pageLength": 10,
        ajax: {
            url: '<?php echo base_url("jamaah/view_ultah"); ?>',
            type: 'POST',
            dataSrc: ''
        },
        columns: [{
                data: 'jamaah_img',
                render: function(data, type, row) {
                    var imagePath = '<?php echo base_url("assets/images/"); ?>' + data;
                    return '<img src="' + imagePath + '" alt="Foto" class="img-fluid border-radius-lg" style="max-width: 100px; max-height: 100px;">';
                }
            },
            {
                data: 'nama_jamaah',
                render: function(data, type, row) {
                    return '<p class="text-xs font-weight-bold mb-0">' + data + '</p>';
                }
            },
            {
                data: 'ttl',
                render: function(data, type, row) {
                    if (!data || data === '0000-00-00') {
                        return 'Data tidak valid';
                    }
                    var dateParts = data.split("-");
                    var tahun = dateParts[0];
                    var bulan = parseInt(dateParts[1], 10) - 1;
                    var tanggal = dateParts[2];

                    var bulanNama = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];

                    return tanggal + ' ' + bulanNama[bulan] + ' ' + tahun;
                }
            },
            {
                data: 'nomor_telepon',
                render: function(data, type, row) {
                    return '<p class="text-xs font-weight-bold mb-0">' + data + '</p>';
                }
            },
            {
                data: 'alamat',
                render: function(data, type, row) {
                    return '<p class="text-xs font-weight-bold mb-0 long-text">' + data + '</p>';
                }
            },
            {
                data: null,
                render: function() {
                    return '';
                }
            },
        ],
        "order": [
            [3, 'asc']
        ]
    });
});
</script>
