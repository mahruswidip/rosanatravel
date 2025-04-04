<div class="container-fluid py-4">
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Jamaah</p>
                                <h5 class="font-weight-bolder timer" data-from="0" data-to="<?php echo $jamaah ?>" data-speed="1256" data-countToOptions='{"formatter": "currencyFormatter"}'></h5>
                                <p class="mb-0">
                                    <span class="text-success text-sm font-weight-bolder">+55%</span>
                                    since yesterday
                                </p>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Jamaah Umroh</p>
                                <h5 class="font-weight-bolder timer" data-from="0" data-to="<?php echo $jamaah_umroh_only ?>" data-speed="1256" data-countToOptions='{"formatter": "currencyFormatter"}'></h5>
                                <p class="mb-0">
                                    <span class="text-success text-sm font-weight-bolder">+3%</span>
                                    since last week
                                </p>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Jamaah Haji</p>
                                <h5 class="font-weight-bolder">
                                    <h5 class="font-weight-bolder timer" data-from="0" data-to="<?php echo $jamaah_haji_only ?>" data-speed="1256" data-countToOptions='{"formatter": "currencyFormatter"}'></h5>
                                </h5>
                                <p class="mb-0">
                                    <span class="text-danger text-sm font-weight-bolder">-2%</span>
                                    since last quarter
                                </p>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                                <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Sales</p>
                                <h5 class="font-weight-bolder">
                                    $103,430
                                </h5>
                                <p class="mb-0">
                                    <span class="text-success text-sm font-weight-bolder">+5%</span> than last month
                                </p>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                                <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-lg-7 mb-lg-0 mb-4">
            <div class="card z-index-2 h-100">
                <div class="card-header pb-0 pt-3 bg-transparent">
                    <h6 class="text-capitalize">Perolehan Jamaah Per-Bulan</h6>
                    <form method="GET" action="">
                        <label for="tahun">Pilih Tahun:</label>
                        <select name="tahun" id="tahun" onchange="this.form.submit()">
                            <?php
                            $tahun_sekarang = date('Y');
                            for ($i = 2020; $i <= $tahun_sekarang; $i++) {
                                $selected = ($tahun == $i) ? 'selected' : '';
                                echo "<option value='$i' $selected>$i</option>";
                            }
                            ?>
                        </select>
                    </form>
                    <p class="text-sm mb-0">
                        <i class="fa fa-arrow-up text-success"></i>
                        <span class="font-weight-normal">Data seluruh Cabang & Pusat</span>
                    </p>
                </div>
                <div class="card-body p-3">
                    <div class="chart">
                        <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-5 mb-lg-0 mb-4">
            <div class="card z-index-2 h-100">
                <div class="card-header pb-0 pt-3 bg-transparent">
                    <h6 class="text-capitalize">Perolehan Jamaah berdasarkan Paket</h6>
                    <p class="text-sm mb-0">
                        <i class="fa fa-arrow-up text-success"></i>
                        <span class="font-weight-normal">Data seluruh Cabang & Pusat</span>
                    </p>
                </div>
                <div class="card-body p-3">
                    <div class="chart">
                        <canvas id="pie-chart" class="chart-canvas" height="300px"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-lg-7 mb-lg-0 mb-4">
            <div class="card ">
                <div class="card-header pb-0 p-3">
                    <div class="d-flex justify-content-between">
                        <h6 class="mb-2">Jamaah dari Kantor</h6>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center ">
                        <tbody>
                            <tr>
                                <td class="w-30">
                                    <div class="d-flex px-2 py-1 align-items-center">
                                        <div>
                                            <img src="<?php echo base_url('assets'); ?>/img/icons/flags/US.png" alt="Country flag">
                                        </div>
                                        <div class="ms-4">
                                            <p class="text-xs font-weight-bold mb-0">Kantor Pusat:</p>
                                            <h6 class="text-sm mb-0">Pasuruan</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">Jamaah:</p>
                                        <h6 class="text-sm mb-0 timer" data-from="0" data-to="<?php echo $jamaah_pasuruan ?>" data-speed="2531" data-countToOptions='{"formatter": "currencyFormatter"}'></h6>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="w-30">
                                    <div class="d-flex px-2 py-1 align-items-center">
                                        <div>
                                            <img src="<?php echo base_url('assets'); ?>/img/icons/flags/DE.png" alt="Country flag">
                                        </div>
                                        <div class="ms-4">
                                            <p class="text-xs font-weight-bold mb-0">Kantor Cabang:</p>
                                            <h6 class="text-sm mb-0">Malang</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">Jamaah:</p>
                                        <h6 class="text-sm mb-0 timer" data-from="0" data-to="<?php echo $jamaah_malang ?>" data-speed="2531" data-countToOptions='{"formatter": "currencyFormatter"}'></h6>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="w-30">
                                    <div class="d-flex px-2 py-1 align-items-center">
                                        <div>
                                            <img src="<?php echo base_url('assets'); ?>/img/icons/flags/GB.png" alt="Country flag">
                                        </div>
                                        <div class="ms-4">
                                            <p class="text-xs font-weight-bold mb-0">Kantor Cabang:</p>
                                            <h6 class="text-sm mb-0">Probolinggo</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">Jamaah:</p>
                                        <h6 class="text-sm mb-0 timer" data-from="0" data-to="<?php echo $jamaah_probolinggo ?>" data-speed="2531" data-countToOptions='{"formatter": "currencyFormatter"}'></h6>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="w-30">
                                    <div class="d-flex px-2 py-1 align-items-center">
                                        <div>
                                            <img src="<?php echo base_url('assets'); ?>/img/icons/flags/BR.png" alt="Country flag">
                                        </div>
                                        <div class="ms-4">
                                            <p class="text-xs font-weight-bold mb-0">Kantor Cabang:</p>
                                            <h6 class="text-sm mb-0">Jember</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">Jamaah:</p>
                                        <h6 class="text-sm mb-0 timer" data-from="0" data-to="<?php echo $jamaah_jember ?>" data-speed="2531" data-countToOptions='{"formatter": "currencyFormatter"}'></h6>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="w-30">
                                    <div class="d-flex px-2 py-1 align-items-center">
                                        <div>
                                            <img src="<?php echo base_url('assets'); ?>/img/icons/flags/AU.png" alt="Country flag">
                                        </div>
                                        <div class="ms-4">
                                            <p class="text-xs font-weight-bold mb-0">Kantor Cabang:</p>
                                            <h6 class="text-sm mb-0">Surabaya</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">Jamaah:</p>
                                        <h6 class="text-sm mb-0 timer" data-from="0" data-to="<?php echo $jamaah_surabaya ?>" data-speed="2531" data-countToOptions='{"formatter": "currencyFormatter"}'></h6>
                                    </div>
                                </td>
                            <tr>
                                <td class="w-30">
                                    <div class="d-flex px-2 py-1 align-items-center">
                                        <div>
                                            <img src="<?php echo base_url('assets'); ?>/img/icons/flags/GB.png" alt="Country flag">
                                        </div>
                                        <div class="ms-4">
                                            <p class="text-xs font-weight-bold mb-0">Kantor Cabang:</p>
                                            <h6 class="text-sm mb-0">Situbondo</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">Jamaah:</p>
                                        <h6 class="text-sm mb-0 timer" data-from="0" data-to="<?php echo $jamaah_situbondo ?>" data-speed="2531" data-countToOptions='{"formatter": "currencyFormatter"}'></h6>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="w-30">
                                    <div class="d-flex px-2 py-1 align-items-center">
                                        <div>
                                            <img src="<?php echo base_url('assets'); ?>/img/icons/flags/GB.png" alt="Country flag">
                                        </div>
                                        <div class="ms-4">
                                            <p class="text-xs font-weight-bold mb-0">Kantor Cabang:</p>
                                            <h6 class="text-sm mb-0">Jakarta</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">Jamaah:</p>
                                        <h6 class="text-sm mb-0 timer" data-from="0" data-to="<?php echo $jamaah_jakarta ?>" data-speed="2531" data-countToOptions='{"formatter": "currencyFormatter"}'></h6>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="card">
                <div class="card-header pb-0 p-3">
                    <h6 class="mb-0">Categories</h6>
                </div>
                <div class="card-body p-3">
                    <ul class="list-group">
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex align-items-center">
                                <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                                    <i class="ni ni-mobile-button text-white opacity-10"></i>
                                </div>
                                <div class="d-flex flex-column">
                                    <h6 class="mb-1 text-dark text-sm">Devices</h6>
                                    <span class="text-xs">250 in stock, <span class="font-weight-bold">346+
                                            sold</span></span>
                                </div>
                            </div>
                            <div class="d-flex">
                                <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button>
                            </div>
                        </li>
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex align-items-center">
                                <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                                    <i class="ni ni-tag text-white opacity-10"></i>
                                </div>
                                <div class="d-flex flex-column">
                                    <h6 class="mb-1 text-dark text-sm">Tickets</h6>
                                    <span class="text-xs">123 closed, <span class="font-weight-bold">15
                                            open</span></span>
                                </div>
                            </div>
                            <div class="d-flex">
                                <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button>
                            </div>
                        </li>
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex align-items-center">
                                <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                                    <i class="ni ni-box-2 text-white opacity-10"></i>
                                </div>
                                <div class="d-flex flex-column">
                                    <h6 class="mb-1 text-dark text-sm">Error logs</h6>
                                    <span class="text-xs">1 is active, <span class="font-weight-bold">40
                                            closed</span></span>
                                </div>
                            </div>
                            <div class="d-flex">
                                <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button>
                            </div>
                        </li>
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 border-radius-lg">
                            <div class="d-flex align-items-center">
                                <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                                    <i class="ni ni-satisfied text-white opacity-10"></i>
                                </div>
                                <div class="d-flex flex-column">
                                    <h6 class="mb-1 text-dark text-sm">Happy users</h6>
                                    <span class="text-xs font-weight-bold">+ 430</span>
                                </div>
                            </div>
                            <div class="d-flex">
                                <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</div>