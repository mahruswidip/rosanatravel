<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <h6>Data Karyawan</h6>
                        <a href="<?php echo site_url('absen_koor/add'); ?>" class="btn bg-gradient-primary btn-sm ms-auto">
                            <span class="fa fa-plus">&nbsp</span> Tambah Data
                        </a>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive px-5 py-2">
                        <table id="dataTable-karyawan" class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Username</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Password</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Cabang</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No HP</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($karyawan as $row): ?>
                                    <tr>
                                        <td class="text-center"><?php echo $row['id_karyawan']; ?></td>
                                        <td class="wrap-column"><?php echo htmlspecialchars($row['user_name']); ?></td>
                                        <td class="wrap-column"><?php echo htmlspecialchars($row['user_email']); ?></td>
                                        <td class="wrap-column text-center">
                                            <div class="password-container">
                                                <input type="password" class="password-field" value="<?php echo htmlspecialchars($row['pass']); ?>" readonly>
                                                <span class="toggle-password">
                                                    <i class="fa fa-eye"></i>
                                                </span>
                                            </div>
                                        </td>
                                        <td class="wrap-column"><?php echo htmlspecialchars($row['kota']); ?></td>
                                        <td class="wrap-column"><?php echo htmlspecialchars($row['nomor_hp']); ?></td>
                                        <td class="text-center">
                                            <a href="<?php echo site_url('absen_koor/edit/'.$row['id_karyawan']); ?>" class="btn bg-gradient-info btn-sm">
                                                <span class="fa fa-edit"></span> Edit
                                            </a>
                                            <a href="<?php echo site_url('absen_koor/remove/'.$row['id_karyawan']); ?>" class="btn bg-gradient-danger btn-sm">
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
    #dataTable-karyawan {
        height: auto !important;
    }
    #dataTable-karyawan tbody tr:hover {
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
    .password-container {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .password-field {
        border: none;
        background: transparent;
        text-align: center;
        width: 100px;
        font-size: 14px;
    }
    .toggle-password {
        cursor: pointer;
        margin-left: 5px;
        color: #333;
    }
</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#dataTable-karyawan').DataTable({
            "language": {
                "url": "https://cdn.datatables.net/plug-ins/1.11.5/i18n/Indonesian.json",
                "paginate": {
                    "previous": "<",
                    "next": ">"
                },
            },
            "pageLength": 10
        });
        $(".toggle-password").click(function() {
            var input = $(this).siblings(".password-field");
            var icon = $(this).find("i");

            if (input.attr("type") === "password") {
                input.attr("type", "text");
                icon.removeClass("fa-eye").addClass("fa-eye-slash");
            } else {
                input.attr("type", "password");
                icon.removeClass("fa-eye-slash").addClass("fa-eye");
            }
        });
    });
</script>
