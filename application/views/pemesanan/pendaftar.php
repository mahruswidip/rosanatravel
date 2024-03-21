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
                    <h2 class="section-title">Data Pendaftar</h2>
                    <br>
                    <p>NIK : <strong><?php echo $pendaftar['nik'] ?></strong></p>
                    <p>Nama Pendaftar : <strong><?php echo $pendaftar['nama_pendaftar'] ?></strong></p>
                    <p>Jenis Kelamin : <strong><?php echo $pendaftar['jenis_kelamin'] ?></strong></p>
                    <p>Nomor Telepon : <strong><?php echo $pendaftar['nomor_telepon'] ?></strong></p>
                    <p>Alamat : <strong><?php echo $pendaftar['alamat'] ?></strong></p>
                    <p>Email : <strong><?php echo $pendaftar['email'] ?></strong></p><br>
                    <h2 class="section-title">Paket yang Dipesan</h2>
                    <p class=""><?php echo $pendaftar['pesan_apa'] ?></p>
                    <p class="">Rencana Berangkat : <?php echo $pendaftar['berapa_orang'] ?> Orang</p>
                    <p class="">Request : <?php echo $pendaftar['request'] ?></p>
                </div>
            </div>
            <div class="col-lg-3">
                <img src="<?php echo base_url('assets/') ?>images/qrcodependaftar/<?php echo $this->session->userdata('uuid') . '.png' ?>" alt="">
            </div>
        </div>
    </div>
</div>

<script>

</script>