<style>
    .duration-container {
        display: flex;
        background-color: #fbf7f4;
        border-radius: 20px;
        max-width: fit-content;
        align-items: center;
    }

    .duration-container i {
        color: orange;
        font-size: 1.8em;
    }
</style><!-- Detail Paket Section -->
<div class="untree_co-section mt-5">
    <div class="container">
        <div class="row justify-content-center text-center mb-5">

        </div>
        <div class="row">
            <div class="col-lg-5">
                <img src="https://alfatihahtravel.com/admin/assets/images/<?php echo $paket[0]['paket_img']; ?>" alt="Image" class="img-fluid mb-4" style="border-radius: 20px;">
            </div>
            <div class="col-lg-6">
                <div class="">
                    <div class="pt-0 p-3 mt-3 mx-2">
                        <h2 class="section-title text-left mb-3"><?php echo $paket[0]['nama_program']; ?></h2>
                        <div class="row">
                            <div class="col" style="max-width: fit-content;">
                                <div class="duration-container">
                                    <i class="icon-plane"></i>
                                </div>
                            </div>
                            <div class="duration-text">
                                <h6 style=" font-weight: bold;"><?php echo $paket[0]['travel']; ?></h6>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col" style="max-width: fit-content;">
                                <div class="duration-container pt-0 p-3 mt-3 mb-2">
                                    <i class="icon-calendar"></i>
                                </div>
                            </div>
                            <div class="duration-text pt-0 p-2 mt-3 mb-2">
                                <h6>Tanggal Keberangkatan</h6>
                                <h6 style="font-weight: bold;"><?php echo $tanggalConverted = date_format(date_create($paket[0]['tanggal_keberangkatan']), 'd F Y'); ?></h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col" style="max-width: fit-content;">
                                <div class="duration-container pt-0 p-3 mt-3 mb-2">
                                    <i class="icon-clock-o"></i>
                                </div>
                            </div>
                            <div class="duration-text pt-0 p-2 mt-3 mb-2">
                                <h6>Lama Hari</h6>
                                <h6 style="font-weight: bold;"><?php echo $paket[0]['lama_hari']; ?> Hari</h6>
                            </div>
                        </div>
                        <br>
                        <div class="price mb-2">
                            <h5>Uang Muka </h5>
                            <h3>Rp. <?php echo number_format($paket[0]['uang_muka'], 0, ',', '.'); ?></h3>
                        </div>
                        <br>
                        <a href="<?php echo base_url(''); ?>" class="btn btn-primary">Pesan Sekarang</a>
                    </div>
                </div>
                <!-- <?php echo '<pre>';
                        print_r($paket); ?> -->

            </div>

        </div>
    </div>
</div>