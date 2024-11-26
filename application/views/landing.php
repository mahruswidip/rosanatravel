<!-- Modal -->
<div class="modal fade" id="promoModal" tabindex="-1" aria-labelledby="promoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">PROMO TERBARU</h5>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            <div class="modal-body d-flex align-items-center">
                <!-- Gambar loading -->
                <!-- <div class="spinner-border" role="status" id="loadingImage">
                </div> -->
                <!-- <img src="loading.gif" alt="Loading..." class="loading-img" id="loadingImage"> -->

                <!-- Gambar utama (sembunyikan saat loading) -->
                <img src="https://rosanatravel.com/admin/assets/images/<?php echo $paket_terbaru[0]['paket_img'] ?>"
                    alt="Image" class="img-fluid" style="display: block;" id="mainImage">
            </div>
            <div class="modal-footer">
                <a href="https://api.whatsapp.com/send?phone=6281133360600&text=Halo%2C%20saya%20ingin%20tahu%20lebih%20lanjut%20mengenai%20Promo%20Terbaru%20<?php echo $paket_terbaru[0]['nama_program'] ?>%20yang%20ada%20di%20Website%2C%20%F0%9F%98%8A"
                    class="btn btn-primary">Info Lebih Lanjut</a>
            </div>
        </div>
    </div>
</div>
<div class="hero">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7 mt-5">
                <div class="intro-wrap">
                    <h1 class="mb-5"><span class="d-block">Selagi Muda, </span> Ayo berangkat <span
                            class="typed-words"></span></h1>

                    <div class="row">
                        <div class="col-12">
                            <form class="form" action="<?php echo base_url('landing/search_paket'); ?>" method="post">
                                <div class="row mb-2">
                                    <div class="col-sm-12 col-md-6 mb-3 mb-lg-0 col-lg-4">
                                        <select name="destinasi" class="form-control custom-select">
                                            <option value="">Destinasi</option>
                                            <option value="Umroh">Umroh</option>
                                            <option value="Haji">Haji</option>
                                            <option value="Tour">Wisata Halal</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-12 col-md-6 mb-3 mb-lg-0 col-lg-5">
                                        <input type="text" class="form-control" name="daterange">
                                    </div>
                                </div>
                                <div class="row align-items-center py-3">
                                    <div class="col-sm-12 col-md-6 mb-3 col-lg-8">
                                        <input type="submit" class="btn btn-primary btn-block" value="Cari Perjalanan">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="slides">
                    <img src="<?php echo base_url('assets/') ?>images/slider/mekkah1.jpg" alt="Image"
                        class="img-fluid active">
                    <img src="<?php echo base_url('assets/') ?>images/slider/madinah.jpg" alt="Image" class="img-fluid">
                    <img src="<?php echo base_url('assets/') ?>images/slider/halal.jpg" alt="Image" class="img-fluid">
                    <!-- <img src="<?php echo base_url('assets/') ?>images/hero-slider-1.jpg" alt="Image" class="img-fluid active">
                    <img src="<?php echo base_url('assets/') ?>images/hero-slider-2.jpg" alt="Image" class="img-fluid">
                    <img src="<?php echo base_url('assets/') ?>images/hero-slider-3.jpg" alt="Image" class="img-fluid"> -->
                </div>
            </div>
        </div>
    </div>
</div>


<div class="untree_co-section">
    <div class="container">
        <div class="row mb-5 justify-content-center">
            <div class="col-lg-6 text-center">
                <h2 class="section-title text-center mb-3">Pelayanan Kami</h2>
                <p>Kami menyediakan layanan terbaik untuk kepuasan pelanggan. Dengan tim profesional kami, kami
                    berkomitmen untuk memberikan solusi yang tepat dan berkualitas.</p>
            </div>
        </div>
        <div class="row align-items-stretch">
            <div class="col-lg-4 order-lg-1">
                <div class="h-100">
                    <div class="frame h-100">
                        <div class="feature-img-bg h-100"
                            style="background-image: url('<?php echo base_url('assets/') ?>images/slider/mekkah3.jpg');">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6 col-sm-6 col-lg-4 feature-1-wrap d-md-flex flex-md-column order-lg-1">

                <div class="feature-1 d-md-flex">
                    <div class="align-self-center">
                        <img style="height: 3rem;" src="<?php echo base_url('assets/images/icons/haji.png') ?>" alt=""
                            class="mb-4">
                        <h3>Haji Plus Kuota</h3>
                        <p class="mb-0">Nikmati kenyamanan Haji Plus dengan kuota yang telah dialokasikan.</p>
                    </div>
                </div>

                <div class="feature-1 ">
                    <div class="align-self-center">
                        <img style="height: 3rem;" src="<?php echo base_url('assets/images/icons/umroh.png') ?>" alt=""
                            class="mb-4">
                        <h3>Umrah</h3>
                        <p class="mb-0">Berangkatlah dalam perjalanan spiritual dengan paket Umrah kami.</p>
                    </div>
                </div>

            </div>

            <div class="col-6 col-sm-6 col-lg-4 feature-1-wrap d-md-flex flex-md-column order-lg-3">

                <div class="feature-1 d-md-flex">
                    <div class="align-self-center">
                        <img style="height: 3rem;" src="<?php echo base_url('assets/images/icons/hajitanpa.png') ?>"
                            alt="" class="mb-4">
                        <h3>Haji Plus Tanpa Antri</h3>
                        <p class="mb-0">Lewati antrian dan nikmati pengalaman Haji Plus tanpa kesulitan.</p>
                    </div>
                </div>

                <div class="feature-1 d-md-flex">
                    <div class="align-self-center">
                        <img style="height: 3rem;" src="<?php echo base_url('assets/images/icons/halal.png') ?>" alt=""
                            class="mb-4">
                        <h3>Wisata Halal</h3>
                        <p class="mb-0">Jelajahi dunia dengan penawaran Wisata Halal kami.</p>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
<!-- 
<div class="untree_co-section count-numbers py-5">
    <div class="container">
        <div class="row">
            <div class="col-6 col-sm-6 col-md-6 col-lg-3">
                <div class="counter-wrap">
                    <div class="counter">
                        <span class="" data-number="9313">0</span>
                    </div>
                    <span class="caption">Jumlah Keberangkatan</span>
                </div>
            </div>
            <div class="col-6 col-sm-6 col-md-6 col-lg-3">
                <div class="counter-wrap">
                    <div class="counter">
                        <span class="" data-number="8492">0</span>
                    </div>
                    <span class="caption">Jumlah Paket Aktif</span>
                </div>
            </div>
            <div class="col-6 col-sm-6 col-md-6 col-lg-3">
                <div class="counter-wrap">
                    <div class="counter">
                        <span class="" data-number="100">0</span>
                    </div>
                    <span class="caption">No. of Employees</span>
                </div>
            </div>
            <div class="col-6 col-sm-6 col-md-6 col-lg-3">
                <div class="counter-wrap">
                    <div class="counter">
                        <span class="" data-number="120">0</span>
                    </div>
                    <span class="caption">No. of Countries</span>
                </div>
            </div>
        </div>
    </div>
</div> -->

<style>
    .ellipsis {
        max-width: 220px;
        /* Adjust this value based on your design */
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>

<div class="untree_co-section testimonial-section mt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 text-center">
                <h2 class="section-title text-center mb-5">Apa Kata Mereka ?</h2>

                <script src="https://static.elfsight.com/platform/platform.js" async></script>
                <div class="elfsight-app-82d580b6-2a34-4109-946a-fd92912607a4" data-elfsight-app-lazy></div>

                <!-- <div class="owl-single owl-carousel no-nav">
                    <div class="testimonial mx-auto">
                        <figure class="img-wrap">
                            <img src="<?php echo base_url('assets/') ?>images/testimoni/burosana.png" alt="Image" class="img-fluid">
                        </figure>
                        <h3 class="name">Ibu Hj. Rosana Hayati</h3>
                        <blockquote>
                            <p>&ldquo;Kami Harus membawa sesuatu yang berbeda. Inovasi dan perbaikan pelayanan menunjukkan bahwa kami dinamis dan memahami keinginan pelanggan.&rdquo;</p>
                        </blockquote>
                    </div>

                    <div class="testimonial mx-auto">
                        <figure class="img-wrap">
                            <img src="<?php echo base_url('assets/') ?>images/testimoni/pakgunawan.jpg" alt="Image" class="img-fluid">
                        </figure>
                        <h3 class="name">Bpk. H. Gunawan Aprilianto</h3>
                        <blockquote>
                            <p>&ldquo;Kami sangat puas dengan pelayanan Rosana Travel dalam membimbing ibadah Umroh dan Haji kami bersama seluruh rombongan Pandawa 87 Group.&rdquo;</p>
                        </blockquote>
                    </div>

                    <div class="testimonial mx-auto">
                        <figure class="img-wrap">
                            <img src="<?php echo base_url('assets/') ?>images/testimoni/pakbu.png" alt="Image" class="img-fluid">
                        </figure>
                        <h3 class="name">Bpk. H. Fakhruddin & Ibu Hj. Silvi</h3>
                        <blockquote>
                            <p>&ldquo;Alhamdulillah kita merasa nyaman, petugasnya sangat ramah dan juga bersahabat.&rdquo;</p>
                        </blockquote>
                    </div>

                    <div class="testimonial mx-auto">
                        <figure class="img-wrap">
                            <img src="<?php echo base_url('assets/') ?>images/testimoni/paksaudara.png" alt="Image" class="img-fluid">
                        </figure>
                        <h3 class="name">Bpk. H. Soeyono</h3>
                        <blockquote>
                            <p>&ldquo;Rasa kekeluargaan yang baik terhadap crew (kepada jamaah) itu betul-betul kayak saudara. Betul-betul kayak saudara dan itu yang saya rasakan.&rdquo;</p>
                        </blockquote>
                    </div>

                </div> -->

            </div>
        </div>
    </div>
</div>

<div class="untree_co-section">
    <div class="container">
        <div class="row justify-content-center text-center mb-5">
            <div class="col-lg-6">
                <h2 class="section-title text-center mb-3">Paket Terbaru Kami</h2>
            </div>
        </div>
        <div class="row">
            <?php foreach ($paket as $paket_item) : ?>
                <a href="<?php echo base_url('paket/detail_paket/' . $paket_item['id_paket']); ?>">
                    <div class="col-6 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                        <div class="media-1">
                            <?php
                            $imageSrc = 'https://rosanatravel.com/admin/assets/images/' . $paket_item['paket_img'];
                            $filter = ($paket_item['is_aktif'] == 0) ? 'grayscale(100%)' : 'none';
                            ?>
                            <div style="position: relative; overflow: hidden;">
                                <img src="<?php echo $imageSrc; ?>" alt="Image" class="img-fluid mb-4"
                                    style="box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1); filter: <?php echo $filter; ?>">
                                <?php if ($paket_item['is_aktif'] == 0) : ?>
                                    <div
                                        style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 100%; height: 30%; background-color: rgba(255, 0, 0, 0.5); display: flex; flex-direction: column; justify-content: center; align-items: center;">
                                        <span style="color: white; font-weight: bold;">SOLD OUT</span>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <span class="d-flex align-items-center loc mb-2">
                                <i class="fas fa-calendar-alt mr-3"></i>
                                <span style="font-weight:600;">
                                    <?php echo $tanggalConverted = date_format(date_create($paket_item['tanggal_keberangkatan']), 'd F Y'); ?>
                                </span>
                            </span>
                            <div class="d-flex align-items-center">
                                <div>
                                    <h3 class="ellipsis"><?php echo $paket_item['nama_program']; ?></h3>
                                    <div class="price ml-auto">
                                        <span>DP Mulai - Rp.
                                            <?php echo number_format($paket_item['uang_muka'], 0, ',', '.'); ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row align-items-center py-3">
                                <div class="col-sm-12 col-md-6 mb-3 col-lg-8">
                                    <a href="<?php echo base_url('paket/detail_paket/' . $paket_item['id_paket']); ?>"
                                        class="btn btn-outline-success btn-sm">Detail <i
                                            class="fas fa-arrow-right ml-2"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>


    </div>
</div>

<div class="untree_co-section">
    <div class="container">
        <div class="row text-center justify-content-center mb-5">
            <div class="col-lg-7">
                <h2 class="section-title text-center">Blog Artikel</h2>
                <h4 style="font-size: large;">Baca juga informasi menarik, tips & trik seputar traveling berikut ini.
                </h4>
            </div>
        </div>
        <?php foreach ($artikel as $artikel_item) : ?>
            <a href="<?php echo site_url('artikel/view/' . $artikel_item['id_artikel']); ?>">
                <div class="row justify-content-between align-items-center">
                    <div class="col-lg-5">
                        <figure class="img-play-video">
                            <img src="https://rosanatravel.com/admin/assets/images/artikel/<?php echo $artikel_item['artikel_img']; ?>"
                                alt="Image" class="img-fluid rounded-20">
                        </figure>
                    </div>
                    <div class="col-lg-6">
                        <h4 class="section-title text-left"><?php echo $artikel_item['judul_artikel']; ?></h4>
                        <p><?php echo substr($artikel_item['konten'], 0, 200); ?>...</p>
                    </div>
                </div>
            </a>
        <?php endforeach; ?>
    </div>
</div>

<div class="untree_co-section" id="galeri">
    <div class="container">
        <div class="row text-center justify-content-center mb-5">
            <div class="col-lg-7">
                <h2 class="section-title text-center">Galeri Kami</h2>
            </div>
        </div>
        <div class="owl-carousel owl-3-slider">
            <?php foreach ($galeri as $galeri_item) : ?>
                <div class="item">
                    <a class="media-thumb"
                        href="https://rosanatravel.com/admin/assets/images/galeri/<?php echo $galeri_item['nama']; ?>"
                        data-fancybox="gallery">
                        <img src="https://rosanatravel.com/admin/assets/images/galeri/<?php echo $galeri_item['nama']; ?>"
                            alt="Image" class="img-fluid">
                    </a>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</div>

<!-- 
<div class="untree_co-section testimonial-section mt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 text-center">
                <h2 class="section-title text-center mb-5">Apa Kata Mereka ?</h2>

                <div class="owl-single owl-carousel no-nav">
                    <div class="testimonial mx-auto">
                        <figure class="img-wrap">
                            <img src="<?php echo base_url('assets/') ?>images/testimoni/burosana.png" alt="Image" class="img-fluid">
                        </figure>
                        <h3 class="name">Ibu Hj. Rosana Hayati</h3>
                        <blockquote>
                            <p>&ldquo;Kami Harus membawa sesuatu yang berbeda. Inovasi dan perbaikan pelayanan menunjukkan bahwa kami dinamis dan memahami keinginan pelanggan.&rdquo;</p>
                        </blockquote>
                    </div>

                    <div class="testimonial mx-auto">
                        <figure class="img-wrap">
                            <img src="<?php echo base_url('assets/') ?>images/testimoni/pakgunawan.jpg" alt="Image" class="img-fluid">
                        </figure>
                        <h3 class="name">Bpk. H. Gunawan Aprilianto</h3>
                        <blockquote>
                            <p>&ldquo;Kami sangat puas dengan pelayanan Rosana Travel dalam membimbing ibadah Umroh dan Haji kami bersama seluruh rombongan Pandawa 87 Group.&rdquo;</p>
                        </blockquote>
                    </div>

                    <div class="testimonial mx-auto">
                        <figure class="img-wrap">
                            <img src="<?php echo base_url('assets/') ?>images/testimoni/pakbu.png" alt="Image" class="img-fluid">
                        </figure>
                        <h3 class="name">Bpk. H. Fakhruddin & Ibu Hj. Silvi</h3>
                        <blockquote>
                            <p>&ldquo;Alhamdulillah kita merasa nyaman, petugasnya sangat ramah dan juga bersahabat.&rdquo;</p>
                        </blockquote>
                    </div>

                    <div class="testimonial mx-auto">
                        <figure class="img-wrap">
                            <img src="<?php echo base_url('assets/') ?>images/testimoni/paksaudara.png" alt="Image" class="img-fluid">
                        </figure>
                        <h3 class="name">Bpk. H. Soeyono</h3>
                        <blockquote>
                            <p>&ldquo;Rasa kekeluargaan yang baik terhadap crew (kepada jamaah) itu betul-betul kayak saudara. Betul-betul kayak saudara dan itu yang saya rasakan.&rdquo;</p>
                        </blockquote>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div> -->


<div class="untree_co-section" id="tentang-kami">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-5">
                <figure class="img-play-video">
                    <a id="play-video" class="video-play-button"
                        href="https://www.youtube.com/watch?v=Q9kUi9ZY-Bs&ab_channel=RosanaTravel" data-fancybox>
                        <span></span>
                    </a>
                    <img src="<?php echo base_url('assets/') ?>images/hero-slider-99.jpg" alt="Image"
                        class="img-fluid rounded-20">
                </figure>
            </div>

            <div class="col-lg-6">
                <h2 class="section-title text-left mb-4">Tentang Kami</h2>
                <p>Persaingan bisnis biro perjalanan wisata yang makin ketat, membuat kami harus berpikir keras untuk
                    dapat tetap eksis dan menjadi pilihan pelanggan dalam setiap perjalanan wisata mereka. Dengan
                    berbekal pengalaman yang lebih dari 25 tahun tentunya bukan hal mustahil untuk kami dapat bertahan
                    menjadi yang terdepan.</p>
                <p> Mengantongi <b> Izin Resmi dari KEMENAG RI sebagai Penyelenggara Ibadah Haji Khusus (PIHK) - No. 193
                        Tahun 2019 dan Penyelenggara Perjalanan Ibadah Umroh (PPIU) - No. 787 Tahun 2019 </b></p>
                <p class="mb-4">PT. Rosana Biro Perjalanan Wisata terus berinovasi dan berpacu meningkatkan pelayanan
                    yang profesional dan kekeluargaan untuk dapat secara maksimal melayani dari hati.</p>

                <div class="tab-pane" id="v-pills-visimisi" role="tabpanel" aria-labelledby="v-pills-visimisi-tab">
                    <div class="row justify-content-center">
                        <div class="col-md-6 text-center">
                            <i class="fas fa-binoculars fa-flip-horizontal"
                                style="font-size: xxx-large; background-color:transparent!important;color:#025287;"></i>
                            <h3 class="mt-4">Visi</h3>
                            <p class="font-normal">
                                Menjadi perusahaan penyedia kebutuhan wisata yang terdepan di Indonesia
                            </p>
                        </div>
                        <div class="col-md-6 text-center">
                            <i class="fas fa-lightbulb"
                                style="font-size: xxx-large; background-color:transparent!important;color:#025287;"></i>
                            <h3 class="text-center mt-4">Misi</h3>
                            <ol class="text-left">
                                <li> Menyediakan produk-produk yang berkualitas baik dan berfokus pada kebutuhan
                                    pelanggan</li>
                                <br>
                                <li> Memberikan pelayanan yang profesional dan amanah untuk membangun loyalitas
                                    pelanggan</li>
                                <br>
                                <li> Meningkatkan kedekatan dengan pelangan melalui hubungan yang harmonis, komunikatif,
                                    dan kekeluargaan</li>
                                <br>
                                <li> Menyelenggarakan tata kelola perusahaan dengan management yang baik dengan sumber
                                    daya manusia yang berkuaitas</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="untree_co-section">
    <div class="container" style="max-width: 1250px!important;">
        <div class="row justify-content-center mb-5">
            <div class="col-md-6 text-center">
                <h2 class="section-title mb-3 text-center">Kantor Resmi Kami</h2>
                <p>Telusuri Kantor Resmi Kami yang Menyebar di Berbagai Lokasi untuk Melayani Anda Lebih Dekat.</p>
            </div>
        </div>

        <div class="row">
            <div class="col mb-4">
                <div class="team">
                    <img src="<?php echo base_url('assets/') ?>images/kontak/kantor/sby.jpg" alt="Image"
                        class="img-fluid mb-4 rounded-20">
                    <div class="px-3">
                        <h3 class="mb-0">Surabaya</h3>
                        <a href="https://maps.app.goo.gl/LvCU6VbJRCfEpYWu9">
                            <p><i class="fas fa-map-marker-alt"></i>&nbsp;Barat Bandara Juanda, Jl. Raya Sedati Gede
                                No.5-B, Sedati Gede, Kabupaten Sidoarjo, Jawa Timur 61253</p>
                        </a>
                    </div>
                    <a href="https://g.page/r/Cb7bZ248X4ojEBM/review"
                        class="btn btn-outline-success btn-sm">Review us on Google<i
                            class="fas fa-arrow-right ml-2"></i></a>
                </div>
            </div>
            <div class="col mb-4">
                <div class="team">
                    <img src="<?php echo base_url('assets/') ?>images/kontak/kantor/mlg.jpg" alt="Image"
                        class="img-fluid mb-4 rounded-20">
                    <div class="px-3">
                        <h3 class="mb-0">Malang</h3>
                        <a href="https://maps.app.goo.gl/mjH65SgAWFGUfeHB9">
                            <p><i class="fas fa-map-marker-alt"></i>&nbsp;Jl. Kalpataru No.83 kav b, Jatimulyo, Kec.
                                Lowokwaru, Kota Malang, Jawa Timur 65141</p>
                        </a>
                    </div>
                    <a href="https://g.page/r/CWHykTKKpj0OEBM/review"
                        class="btn btn-outline-success btn-sm">Review us on Google<i
                            class="fas fa-arrow-right ml-2"></i></a>
                </div>
            </div>
            <div class="col mb-4">
                <div class="team">
                    <img src="<?php echo base_url('assets/') ?>images/kontak/kantor/prob.jpg" alt="Image"
                        class="img-fluid mb-4 rounded-20">
                    <div class="px-3">
                        <h3 class="mb-0">Probolinggo</h3>
                        <a href="https://maps.app.goo.gl/2zWQsaLn5MKHSWsbA">
                            <p><i class="fas fa-map-marker-alt"></i>&nbsp;Jl. Soekarno - Hatta No.137, Curahgrinting,
                                Kec. Kanigaran, Kota Probolinggo, Jawa Timur 67212</p>
                        </a>
                    </div>
                    <a href="https://maps.app.goo.gl/XbwEuQX6rPAA6nXN7"
                        class="btn btn-outline-success btn-sm">Review us on Google<i
                            class="fas fa-arrow-right ml-2"></i></a>
                </div>
            </div>

            <div class="col mb-4">
                <div class="team">
                    <img src="<?php echo base_url('assets/') ?>images/kontak/kantor/jbr.jpg" alt="Image"
                        class="img-fluid mb-4 rounded-20">
                    <div class="px-3">
                        <h3 class="mb-0">Jember</h3>
                        <a href="https://maps.app.goo.gl/XJN3Zc9hoQoSVM467">
                            <p><i class="fas fa-map-marker-alt"></i>&nbsp;Jl. PB Sudirman Ruko Sudirman No.4F, Wetan
                                Ktr., Jemberlor, Kec. Patrang, Kabupaten Jember, Jawa Timur 68118</p>
                        </a>
                    </div>
                    <a href="https://maps.app.goo.gl/XJN3Zc9hoQoSVM467"
                        class="btn btn-outline-success btn-sm">Review us on Google<i
                            class="fas fa-arrow-right ml-2"></i></a>
                </div>
            </div>
            <div class="col mb-4">
                <div class="team">
                    <img src="<?php echo base_url('assets/') ?>images/kontak/kantor/stbd.jpg" alt="Image"
                        class="img-fluid mb-4 rounded-20">
                    <div class="px-3">
                        <h3 class="mb-0">Situbondo</h3>
                        <a href="https://maps.app.goo.gl/t1TYT3ufyksrSPvo6">
                            <p><i class="fas fa-map-marker-alt"></i>&nbsp;Jl. Argopuro No.28-C, Krajan Mimbaan, Mimbaan,
                                Kec. Panji, Kabupaten Situbondo, Jawa Timur 68323</p>
                        </a>
                    </div>
                    <a href="https://maps.app.goo.gl/t1TYT3ufyksrSPvo6"
                        class="btn btn-outline-success btn-sm">Review us on Google<i
                            class="fas fa-arrow-right ml-2"></i></a>
                </div>
            </div>
            <!-- <div class="col-lg-3 mb-4">
                <div class="team">
                    <img src="<?php echo base_url('assets/') ?>images/kontak/kantor/stbd.jpg" alt="Image" class="img-fluid mb-4 rounded-20">
                    <div class="px-3">
                        <h3 class="mb-0">Jakarta</h3>
                        <a href="https://maps.app.goo.gl/TgNxp71PCWi9iFZ28">
                            <p><span class="icon-room mr-2"></span>Jl. Pegambiran No.5 12, RT.12/RW.7, Rawamangun, Kec. Pulo Gadung, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13220</p>
                        </a>
                    </div>
                </div>
            </div> -->

        </div>

    </div>
</div>

<div class="untree_co-section">
    <div class="container">
        <div class="row text-center justify-content-center mb-5">
            <div class="col-lg-7">
                <h2 class="section-title text-center">Seberapa Jauh kami Sudah Berjalan</h2>
                <h4 style="font-size: large;">Riwayat perjalanan kami, memulai perusahaan Biro Perjalanan Wisata dari 0
                </h4>
            </div>
        </div>
        <div class="row justify-content-center mb-5">
            <iframe width="1050" height="520" src="https://www.youtube.com/embed/bW5fhyUEXto?si=Bjpn5pQkRcXRfOGK"
                class="rounded-20" title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen></iframe>
        </div>
    </div>
</div>
<div class="untree_co-section">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <img src="<?php echo base_url('assets/') ?>images/kontak/akreditasi.jpg"
                alt="Free HTML Template by Untree.co" class="img-fluid rounded-20">
        </div>
    </div>
</div>




<div class="py-5 cta-section">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-12">
                <h2 class="mb-2 text-white">Ayo, Tunggu apa lagi ?</h2>
                <p class="mb-4 lead text-white text-white-opacity">Hubungi kami dan dapatkan promo dan penawaran menarik
                </p>
                <p class="mb-0"><a
                        href="https://api.whatsapp.com/send/?phone=628113003258&text=Halo%20Rosana%20Travel%2C%20Saya%20ingin%20mengetahui%20lebih%20lanjut%20mengenai%20paket%20Di%20Rosana%20Travel%20&app_absent=0"
                        class="btn btn-outline-white text-white btn-md font-weight-bold">Halo Rosana Travel</a></p>
            </div>
        </div>
    </div>
</div>

<section id="contact" class="contact py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-4" data-aos="fade-right">
                <div class="section-title">
                    <h2>Kontak Kami</h2>
                </div>
                <p class="py-4">Temukan Dukungan untuk Kebutuhan Perjalanan Anda. Dapatkan jawaban dan solusi atas
                    pertanyaan Anda di sini. Kami selalu siap untuk membantu Anda.</p>
            </div>

            <div class="col-lg-8" data-aos="fade-up" data-aos-delay="100">
                <iframe style="border:0; width: 100%; height: 270px;"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3954.168803059516!2d112.90037107579782!3d-7.6649936758579384!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7cf567c652c2d%3A0x168233139d4ce4fd!2sRosana%20Travel%20Pasuruan%20(Official)!5e0!3m2!1sen!2sid!4v1702372637803!5m2!1sen!2sid"
                    frameborder="0" allowfullscreen></iframe>
                <div class="info mt-4">
                    <i class="bi bi-geo-alt"></i>
                    <h4>Kantor Pusat :</h4>
                    <p>Jl. Dokter Setiabudi No.20, Purutrejo, Kec. Purworejo, Kota Pasuruan, Jawa Timur 67117</p>
                </div>
                <div class="row">
                    <div class="col-lg-6 mt-4">
                        <div class="info">
                            <i class="bi bi-envelope"></i>
                            <h4>Email :</h4>
                            <p>info@rosanatravel.com</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="info w-100 mt-4">
                            <i class="bi bi-phone"></i>
                            <h4>Nomor HP / Whatsapp :</h4>
                            <p>+62 811 333 60600</p>
                        </div>
                    </div>
                </div>
                <!-- 
                <form action="forms/contact.php" method="post" role="form" class="php-email-form mt-4">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                        </div>
                        <div class="col-md-6 form-group mt-3 mt-md-0">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                    </div>
                    <div class="form-group mt-3">
                        <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                    </div>
                    <div class="my-3">
                        <div class="loading">Loading</div>
                        <div class="error-message"></div>
                        <div class="sent-message">Your message has been sent. Thank you!</div>
                    </div>
                    <div class="text-center"><button type="submit">Send Message</button></div>
                </form> -->
            </div>
        </div>

    </div>
</section><!-- End Contact Section -->


<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<!-- Bootstrap CSS -->
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="..."> -->
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    // Ambil elemen gambar dan loading
    var mainImage = document.getElementById('mainImage');
    var loadingImage = document.getElementById('loadingImage');

    // Event listener ketika gambar utama selesai dimuat
    mainImage.addEventListener('load', function() {
        // Sembunyikan gambar loading
        loadingImage.style.display = 'none';
        // Tampilkan gambar utama
        mainImage.style.display = 'block';
    });

    // Event listener ketika terjadi kesalahan saat memuat gambar utama
    mainImage.addEventListener('error', function() {
        // Sembunyikan gambar loading
        loadingImage.style.display = 'none';
        // Tampilkan pesan kesalahan atau gambar placeholder lainnya
        // (Misalnya, tampilkan pesan 'Gagal memuat gambar' atau gambar default)
    });
    // Fungsi untuk mendapatkan nilai dari sessionStorage
    function getSessionStorageItem(key) {
        return sessionStorage.getItem(key);
    }

    // Fungsi untuk menetapkan nilai ke sessionStorage
    function setSessionStorageItem(key, value) {
        sessionStorage.setItem(key, value);
    }

    // Fungsi untuk menampilkan modal jika belum pernah ditutup
    function showPopup() {
        var reloadCount = getSessionStorageItem('reloadCount') || 0;

        // Tampilkan modal hanya jika pengguna belum reload lebih dari 2 kali
        if (reloadCount < 5) {
            $('#promoModal').modal('show');
            setSessionStorageItem('reloadCount', parseInt(reloadCount) + 1);
        }
    }

    // Panggil fungsi showPopup saat halaman dimuat
    $(document).ready(function() {
        showPopup();
        // sessionStorage.clear(); // Jika perlu menghapus semua data sesi
    });
</script>