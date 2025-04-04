<div class="container" style="margin-top: 150px;">
    <div class="row justify-content-center text-center mb-5">
        <div class="col-lg-6">
            <h2 class="section-title text-center mb-3">Paket Wisata Halal Kami</h2>
        </div>
    </div>
    <div class="row">
        <?php foreach ($pakettour as $paket_item) : ?>
            <a href="<?php echo base_url('paket/detail_paket/' . $paket_item['id_paket']); ?>">
                <div class="col-6 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                    <div class="media-1">
                        <img src="https://rosanatravel.com/admin/assets/images/<?php echo $paket_item['paket_img']; ?>" alt="Image" class="img-fluid mb-4" style="box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);">
                        <span class="d-flex align-items-center loc mb-2">
                            <span class="icon-room mr-3"></span>
                            <span><?php echo $paket_item['kategori']; ?></span>
                        </span>
                        <div class="d-flex align-items-center">
                            <div>
                                <h3 class="ellipsis"><?php echo $paket_item['nama_program']; ?></h3>
                                <div class="price ml-auto">
                                    <span>DP Mulai - Rp. <?php echo number_format($paket_item['uang_muka'], 0, ',', '.'); ?></span>
                                </div>
                            </div>

                        </div>
                        <div class="row align-items-center py-3">
                            <div class="col-sm-12 col-md-6 mb-3 col-lg-8">
                                <a href="<?php echo base_url('paket/detail_paket/' . $paket_item['id_paket']); ?>" class="btn btn-primary btn-block">Detail</a>
                            </div>
                        </div>

                    </div>
                </div>
            </a>
        <?php endforeach; ?>
    </div>
</div>
<div class="untree_co-section testimonial-section mt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 text-center">
                <h2 class="section-title text-center mb-5">Apa Kata Mereka ?</h2>

                <script src="https://static.elfsight.com/platform/platform.js" async></script>
                <div class="elfsight-app-82d580b6-2a34-4109-946a-fd92912607a4" data-elfsight-app-lazy></div>
            </div>
        </div>
    </div>
</div>