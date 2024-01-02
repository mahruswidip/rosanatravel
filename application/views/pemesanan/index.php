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
        <div class="row">
            <div class="col-lg-6">
                <div class="custom-block" data-aos="fade-up" data-aos-delay="100">
                    <h2 class="section-title">Pemesanan</h2>
                    <form class="contact-form bg-white mt-4" action="<?php echo site_url() . 'pemesanan/add' ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="text-black" for="nik">NIK</label>
                            <input type="text" required name="nik" value="<?php echo $this->input->post('nik'); ?>" class="form-control" id="nik" />
                            <!-- <small id="nikHelp" class="form-text text-muted">We'll never share your nik with anyone else.</small> -->
                        </div>
                        <div class="form-group">
                            <label class="text-black" for="nama_jamaah">Nama Jamaah</label>
                            <input type="text" required name="nama_jamaah" value="<?php echo $this->input->post('nama_jamaah'); ?>" class="form-control" id="nama_jamaah" />
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="custom-select">
                                <option value="">Pilih</option>
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
                            <label class="text-black" for="email">Email address</label>
                            <input type="text" required name="email" value="<?php echo $this->input->post('email'); ?>" class="form-control" id="email" />
                        </div>
                        <div class="form-group">
                            <label class="text-black" for="nomor_telepon">Nomor Telepon (WA)</label>
                            <input type="text" required name="nomor_telepon" value="<?php echo $this->input->post('nomor_telepon'); ?>" class="form-control" id="nomor_telepon" />
                        </div>
                        <div class="form-group">
                            <label class="text-black" for="alamat">Alamat</label>
                            <textarea name="alamat" class="form-control" id="alamat" cols="30" rows="5"></textarea>
                        </div>
                        <div class="form-group d-none">
                            <label class="text-black" for="pesan_apa">Pesan Apa</label>
                            <input type="text" class="form-control" id="pesan_apa" value="<?php echo $paket[0]['nama_program']; ?>" name="pesan_apa">
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <div class="form-group">
                                    <label class="text-black" for="nomor_telepon">Rencana Berangkat Berapa Orang ?</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="number" required name="nomor_telepon" value="<?php echo $this->input->post('nomor_telepon'); ?>" class="form-control" id="nomor_telepon" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="container">
                    <div class="row justify-content-left text-left mb-5">
                        <div class="col-md-5">
                            <img src="https://alfatihahtravel.com/admin/assets/images/<?php echo $paket[0]['paket_img']; ?>" alt="Image" class="img-fluid mb-4" style="border-radius: 20px;">
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