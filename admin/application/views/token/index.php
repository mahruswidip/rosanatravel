<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <h6>Daftar Token</h6>
                        <a href="<?php echo site_url('token/add'); ?>" class="btn bg-gradient-primary btn-sm ms-auto">
                            <span class="fa fa-plus">&nbsp</span> Tambah Token
                        </a>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive px-5 py-2">
                        <table id="dataTable-token" class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">App ID</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Token</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Channel ID</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($tokens as $token): ?>
                                    <tr>
                                        <td class="text-center"><?php echo $token['id']; ?></td>
                                        <td class="wrap-column"><?php echo htmlspecialchars($token['app_id']); ?></td>
                                        <td class="wrap-column"><?php echo htmlspecialchars($token['token']); ?></td>
                                        <td><?php echo htmlspecialchars($token['channel_id']); ?></td>
                                        <td class="text-center">
                                            <a href="<?php echo site_url('token/remove/'.$token['id']); ?>" class="btn bg-gradient-danger btn-sm">
                                                <span class="fa fa-trash"></span> Hapus
                                            </a>
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

<style>
    #dataTable-token {
        height: auto !important;
    }
    
    #dataTable-token tbody tr:hover {
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
</style>

<!-- Include jQuery and DataTables -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<!-- DataTable Initialization -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#dataTable-token').DataTable({
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
