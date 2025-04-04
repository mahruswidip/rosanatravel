<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <h6>Artikel</h6>
                        <a href="<?php echo site_url('artikel/add'); ?>" class="btn bg-gradient-primary btn-sm ms-auto"><span class="fa fa-plus">&nbsp</span> Tambah</a>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive px-5 py-2">
                        <table id="dataTable-artikel" class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Foto</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kategori</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Judul Artikel</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created at</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Konten</th>
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
<style>
    #dataTable-artikel {
        height: 100px !important;
    }

    #dataTable-artikel tbody tr:hover {
        background-color: #f5f5f5;
        /* Change the background color to your desired hover color */
        cursor: pointer;
        /* Change the cursor to a pointer on hover */
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
        $('#dataTable-artikel').DataTable({
            "language": {
                "url": "https://cdn.datatables.net/plug-ins/1.11.5/i18n/Indonesian.json",
                "paginate": {
                    "previous": "<",
                    "next": ">"
                },
            },
            "pageLength": 10,
            ajax: {
                url: '<?php echo base_url("artikel/view"); ?>',
                type: 'POST',
                dataSrc: ''
            },
            rowCallback: function(row, data) {
                // Attach click event listener to each row
                $(row).on('click', function() {
                    // Get the ID of the clicked row's data
                    var artikelId = data.id_artikel;

                    // Redirect to the detail page using the artikelId
                    window.location.href = '<?php echo site_url('artikel/detail/') ?>' + artikelId;
                });
            },
            columns: [{
                    data: 'artikel_img',
                    render: function(data, type, row) {
                        // Assuming data contains the filename (e.g., "c39f997660f4a7e707658a141d30e7ce.jpg")
                        // You need to provide the correct path to your image folder.
                        var imagePath = '<?php echo base_url("assets/images/artikel/"); ?>' + data;
                        // Generate HTML for displaying the image
                        return '<img src="' + imagePath + '" alt="Image" class="img-fluid border-radius-lg" style="max-width: 100px; max-height: 100px;">';
                    }
                },
                {
                    data: 'null',
                    render: function(data, type, row) {
                        return '<p class="text-xs font-weight-bold mb-0">' + row.kategori + '</p>';
                    },
                },
                {
                    data: 'null',
                    render: function(data, type, row) {
                        return '<p class="text-xs font-weight-bold mb-0">' + row.judul_artikel + '</p>' + '<p class="text-xs text-secondary mb-0">' + row.travel + '</p>';
                    },
                },
                {
                    data: 'null',
                    render: function(data, type, row) {
                        return '<p class="text-xs font-weight-bold mb-0">' + row.created_at + '</p>';
                    },
                },
                {
                    data: null,
                    className: 'td-column-right',
                    render: function(data, type, row) {
                        var editButton = '<a href="<?php echo site_url('artikel/edit/'); ?>' + row.id_artikel + '" class="btn bg-gradient-info btn-sm"><span class="fa fa-pencil"></span>Edit</a>';
                        var deleteButton = '<a href="<?php echo site_url('artikel/remove/'); ?>' + row.id_artikel + '" class="btn bg-gradient-danger btn-sm"><span class="fa fa-trash"></span>Hapus</a>';
                        return editButton + ' ' + deleteButton;
                    }
                },
                {
                    data: 'null',
                    render: function(data, type, row) {
                        return '<p class="text-xs font-weight-bold mb-0">' + row.konten + '</p>';
                    },
                },

            ],
            "order": [
                [5, 'asc']
            ] // Menyortir berdasarkan kolom dengan indeks 1 (kolom is_aktif) secara descending (nilai 1 akan berada di atas)
        });
    });
</script>