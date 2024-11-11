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

    .dropdown-form {
        display: none;
    }

    .map-iframe {
        max-width: 100%;
        height: 400px;
        display: none;
    }
</style><!-- Detail Paket Section -->
<div class="untree_co-section" style="padding-top: 170px!important;">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="custom-block" data-aos="fade-up" data-aos-delay="100">
                    <h2 class="section-title">Pemesanan</h2>
                    <form id="registration-form" class="contact-form bg-white mt-4" action="<?php echo site_url() . 'pemesanan/add' ?>" method="post" enctype="multipart/form-data">
                        <br>
                        <div id="wizard">
                            <h3>Step 1 Title</h3>
                            <section>
                                <h5 class="bd-wizard-step-title mb-4">Langkah Pertama</h5>
                                <h3 style="font-weight: bold;">Data Pendaftar</h3>
                                <p style="color: dimgray;">Data pendaftar diisi oleh dengan siapa calon jamaah akan didaftarkan. Pendaftar bertanggung jawab atas kebenaran data Jamaah yang didaftarkan nantinya.</p>
                                <div class="form-group">
                                    <input type="text" placeholder="NIK" required name="nik" value="<?php echo $this->input->post('nik'); ?>" class="form-control" id="nik" />
                                    <!-- <small id="nikHelp" class="form-text text-muted">We'll never share your nik with anyone else.</small> -->
                                </div>
                                <div class="form-group">
                                    <input type="text" placeholder="Nama Jamaah" required name="nama_pendaftar" value="<?php echo $this->input->post('nama_pendaftar'); ?>" class="form-control" id="nama_pendaftar" />
                                </div>
                                <div class="form-group">
                                    <select name="jenis_kelamin" class="custom-select">
                                        <option value="">Jenis Kelamin</option>
                                        <?php
                                        $jenis_kelamin_values = array(
                                            'Laki-Laki' => 'Laki-Laki',
                                            'Perempuan' => 'Perempuan',

                                        );

                                        foreach ($jenis_kelamin_values as $value => $display_text) {
                                            $selected = ($value == $this->input->post('jenis_kelamin')) ? ' selected="selected"' : "";

                                            echo '<option value="' . $value . '" ' . $selected . '>' . $display_text . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="text" placeholder="Email" required name="email" value="<?php echo $this->input->post('email'); ?>" class="form-control" id="email" />
                                </div>
                                <div class="form-group">
                                    <div class="alert alert-primary" role="alert">
                                        Sistem akan menghubungi anda melalui Nomor Whatsapp, Pastikan Nomor yang anda cantumkan Whatsappnya aktif ya,
                                    </div>
                                    <input type="text" placeholder="Nomor Whatsapp" required name="nomor_telepon" value="<?php echo $this->input->post('nomor_telepon'); ?>" class="form-control" id="nomor_telepon" />
                                </div>
                                <div class="form-group">
                                    <textarea name="alamat" placeholder="Alamat" class="form-control" id="alamat" cols="30" rows="5"></textarea>
                                </div>
                                <div class="form-group d-none">
                                    <input type="text" class="form-control" id="pesan_apa" value="<?php echo $paket[0]['nama_program']; ?>" name="pesan_apa">
                                </div>
                                <div class="form-group">
                                    <input type="number" placeholder="Jamaah Berapa Orang ?" required name="berapa_orang" value="<?php echo $this->input->post('berapa_orang'); ?>" class="form-control" id="berapa_orang" />
                                </div>
                                <br>
                                <p style="color: dimgray;">Sampaikan kepada kami apa yang anda butuhkan terkait paket tertentu seperti keinginan
                                <ul>
                                    <li>Durasi Bepergian</li>
                                    <li>Tanggal Berangkat</li>
                                    <li>Kelas Paket</li>
                                    <li>dll.</li>
                                </ul>
                                </p>
                                <div class="form-group">
                                    <textarea name="request" placeholder="Request" class="form-control" id="request" cols="30" rows="5"></textarea>
                                </div>
                            </section>
                            <h3>Step 2 Title</h3>
                            <section id="jamaahSection">
                                <h5 class="bd-wizard-step-title mb-4">Langkah Kedua</h5>
                                <h3 class="mb-4" style="font-weight: bold;">Pilih Metode Pendaftaran</h3>
                                <div class="row purpose-radios-wrapper">
                                    <div class="col">
                                        <div class="purpose-radio">
                                            <input type="radio" name="purpose" id="marketing" class="purpose-radio-input" value="marketing" checked>
                                            <label for="marketing" class="purpose-radio-label">
                                                <span class="label-icon">
                                                    <img src="<?php echo base_url('assets/') ?>images/icons/whatsapp.svg" alt="byWa" class="label-icon-default" style="width: 50px;">
                                                    <img src="<?php echo base_url('assets/') ?>images/icons/whatsappor.svg" alt="byWa" class="label-icon-active" style="width: 50px;">
                                                </span>
                                                <span class="label-text px-4 text-center">Hubungi Marketing Kami</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="purpose-radio">
                                            <input type="radio" name="purpose" id="kantor" class="purpose-radio-input" value="kantor">
                                            <label for="kantor" class="purpose-radio-label">
                                                <span class="label-icon">
                                                    <img src="<?php echo base_url('assets/') ?>images/icons/maps.svg" alt="Datang" class="label-icon-default" style="width: 50px;">
                                                    <img src="<?php echo base_url('assets/') ?>images/icons/mapsor.svg" alt="Datang" class="label-icon-active" style="width: 50px;">
                                                </span>
                                                <span class="label-text px-4 text-center">Datang ke Kantor Terdekat</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <!-- Dropdown Form -->
                                <div class="dropdown-form mt-3" id="branchDropdown">
                                    <div class="form-group">
                                        <label for="branch">Pilih Kantor Terdekat:</label>
                                        <select class="form-control" name="branch" id="branchSelect">
                                            <option value="surabaya">Kantor Pusat Surabaya</option>
                                            <option value="pasuruan">Kantor Rosana Pasuruan</option>
                                            <option value="malang">Kantor Rosana Malang</option>
                                            <option value="probolinggo">Kantor Rosana Probolinggo</option>
                                            <option value="jember">Kantor Rosana Jember</option>
                                            <option value="situbondo">Kantor Rosana Situbondo</option>
                                            <!-- Add other branch options here -->
                                        </select>
                                    </div>
                                </div>
                                <!-- Embedded Google Maps Iframes -->
                                <iframe class="map-iframe" id="surabayaMap" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4693.554911769428!2d112.76053467574492!3d-7.375639472594392!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7e59965663827%3A0x238a5f3c6e67dbbe!2sRosana%20Travel%20Surabaya%20-%20Graha%20Rosana%20(Official)!5e1!3m2!1sen!2sid!4v1731289011244!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                <iframe class="map-iframe" id="pasuruanMap" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15816.675014434899!2d112.902946!3d-7.664999!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7cf567c652c2d%3A0x168233139d4ce4fd!2sRosana%20Travel%20Pasuruan%20(Official)!5e0!3m2!1sen!2sid!4v1704771956661!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                <iframe class="map-iframe" id="malangMap" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.4778808784868!2d112.62545287575229!3d-7.949466979199226!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd629da4fb99367%3A0xe3da68a3291f261!2sRosana%20Travel%20Malang%20(Official)!5e0!3m2!1sen!2sid!4v1704771981242!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                <iframe class="map-iframe" id="probolinggoMap" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.339303865974!2d113.19214437574972!3d-7.753790876886696!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7ad89a98e1021%3A0x6089a82fceb380c0!2sRosana%20Travel%20Umroh%20Haji%20Probolinggo%20(Official)!5e0!3m2!1sen!2sid!4v1704772422642!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                <iframe class="map-iframe" id="jemberMap" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.4111455880525!2d113.70551412500892!3d-8.161265841869415!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd69449dd069aff%3A0x4d7d68f0a2590734!2sRosana%20Travel%20Jember%20(Official)!5e0!3m2!1sen!2sid!4v1704772536857!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                <iframe class="map-iframe" id="situbondoMap" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.7176228082126!2d114.01264077574912!3d-7.713418176417322!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd729103ee8db75%3A0x1a4fd1c29bcf36a6!2sRosana%20Travel%20umroh%20dan%20haji%20Situbondo%20(Official)!5e0!3m2!1sen!2sid!4v1704772624756!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </section>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="container">
                    <div class="row justify-content-left text-left mb-5">
                        <div class="col-md-5">
                            <img src="https://rosanatravel.com/admin/assets/images/<?php echo $paket[0]['paket_img']; ?>" alt="Image" class="img-fluid mb-4" style="border-radius: 20px;">
                        </div>
                        <div class="">
                            <div class="pt-0 p-3 mx-2">
                                <h2 class="section-title text-left mb-3"><?php echo $paket[0]['nama_program']; ?></h2>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>