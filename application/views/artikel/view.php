<!-- <body class="detail-artikel"> -->
<div class="untree_co-section" style="margin-top: 6rem;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <article>
                    <h2 class="section-title text-left mb-4"><?php echo $artikel['judul_artikel']; ?></h2>
                    <div class="mb-4">
                        <img src="https://alfatihahtravel.com/admin/assets/images/artikel/<?php echo $artikel['artikel_img']; ?>" alt="Image" class="img-fluid rounded-20">
                    </div>
                    <p><?php echo $artikel['konten']; ?></p>
                </article>
            </div>
            <!-- <div class="col-lg-1">
            </div> -->
            <div class="col-lg-4">
                <div class="container">
                    <div class="row text-left justify-content-left mb-5">
                        <div class="col-lg-7">
                            <h2 class="section-title text-left">Blog Artikel Lain</h2>
                        </div>
                    </div>
                    <?php foreach ($artikellain as $artikel_item) : ?>
                        <a href="<?php echo site_url('artikel/view/' . $artikel_item['id_artikel']); ?>">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-lg-7">
                                    <h6 style="padding-bottom: 5px!important;" class="section-title text-left"><?php echo substr($artikel_item['judul_artikel'], 0, 20); ?>...</h6>
                                    <p><?php echo substr($artikel_item['konten'], 0, 50); ?>...</p>
                                </div>
                                <div class="col-lg-5">
                                    <figure class="img-play-video">
                                        <img src="https://alfatihahtravel.com/admin/assets/images/artikel/<?php echo $artikel_item['artikel_img']; ?>" alt="Image" class="img-fluid rounded-20">
                                    </figure>
                                </div>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- </body> -->