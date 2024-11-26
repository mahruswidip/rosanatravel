<div class="container" style="margin-top: 150px;">
    <div class="row justify-content-center text-center mb-5">
        <div class="col-lg-6">
            <h2 class="section-title text-center mb-3">Paket Umroh Kami</h2>
        </div>
    </div>
    <div class="row">
        <?php foreach ($paketumroh as $paket_item) : ?>
            <a href="<?php echo base_url('paket/detail_paket/' . $paket_item['id_paket']); ?>">
                <div class="col-6 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                    <div class="media-1">
                        <?php
                        $imageSrc = 'https://rosanatravel.com/admin/assets/images/' . $paket_item['paket_img'];
                        $filter = ($paket_item['is_aktif'] == 0) ? 'grayscale(100%)' : 'none';
                        ?>
                        <div style="position: relative; overflow: hidden;">
                            <img src="<?php echo $imageSrc; ?>" alt="Image" class="img-fluid mb-4" style="box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1); filter: <?php echo $filter; ?>">
                            <?php if ($paket_item['is_aktif'] == 0) : ?>
                                <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 100%; height: 30%; background-color: rgba(255, 0, 0, 0.5); display: flex; flex-direction: column; justify-content: center; align-items: center;">
                                    <span style="color: white; font-weight: bold;">SOLD OUT</span>
                                </div>
                            <?php endif; ?>
                        </div>
                        <span class="d-flex align-items-center loc mb-2">
                            <i class="fas fa-map-marker-alt mr-3"></i>
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
                                <a href="<?php echo base_url('paket/detail_paket/' . $paket_item['id_paket']); ?>" class="btn btn-light btn-sm">Detail <i class="fas fa-arrow-right ml-2"></i></a>
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