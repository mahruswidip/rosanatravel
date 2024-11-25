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
            <div class="col">
                <div class="alert alert-success py-4" role="alert">
                    <h3 class="alert-heading">Pendaftaran Berhasil !</h3>
                    <p>Kami akan segera menghubungi anda melalui Nomor Whatsapp:
                        <strong><?php echo $this->session->userdata('nomor_telepon') ?></strong>. Pendaftaran dan
                        pemilihan paket anda telah berhasil dilakukan. <br> Simpan QR Code ini dan tunjukkan kepada tim
                        marketing kami.
                    </p>
                </div>
            </div>
        </div>
        <div class="row mx-3 mt-4">
            <div class="col-lg-7">
                <div class="custom-block" data-aos="fade-up" data-aos-delay="100">
                    <h2 class="section-title">Konfirmasi Pemesanan</h2>
                    <br>
                    <p>UUID : <strong></strong></p>
                    <p>NIK : <strong></strong></p>
                    <p>Nama Pendaftar : <strong></strong></p>
                    <p>Jenis Kelamin : <strong></strong></p>
                    <p>Nomor Telepon : <strong></strong></p>
                    <p>Alamat : <strong></strong></p>
                    <p>Email : <strong></strong></p>
                    <h6 class="font-weight-bold mt-2">Detail Paket yang dipesan</h6>
                    <p class=""></p>
                    <p class="">Rencana Berangkat : ?> Orang</p>
                </div>
            </div>
            <div class="col-lg-3">
                <img src="<?php echo base_url('assets/') ?>images/qrcodependaftar/<?php echo $this->session->userdata('uuid') . '.png' ?>"
                    alt="">
            </div>
        </div>
    </div>
</div>

<script>

</script>