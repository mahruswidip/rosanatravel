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

<?php
// Fungsi untuk menghasilkan Angka UUID
function generateNumericUUID()
{
    // Menggunakan timestamp dan tambahan random untuk memastikan unik
    $numericUuid = time() . mt_rand(100000, 999999);
    return $numericUuid;
}
?>

<div class="untree_co-section" style="padding-top: 170px!important;">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="custom-block" data-aos="fade-up" data-aos-delay="100">
                    <h2 class="section-title">Konfirmasi Pemesanan</h2>
                    <br>
                    <p>UUID : <strong><?php echo generateNumericUUID(); ?></strong></p>
                    <p>NIK : <strong><?php echo $this->session->userdata('nik') ?></strong></p>
                    <p>Nama Pendaftar : <strong><?php echo $this->session->userdata('nama_pendaftar') ?></strong></p>
                    <p>Jenis Kelamin : <strong><?php echo $this->session->userdata('jenis_kelamin') ?></strong></p>
                    <p>Nomor Telepon : <strong><?php echo $this->session->userdata('nomor_telepon') ?></strong></p>
                    <p>Alamat : <strong><?php echo $this->session->userdata('alamat') ?></strong></p>
                    <p>Email : <strong><?php echo $this->session->userdata('email') ?></strong></p>
                    <h6 class="font-weight-bold mt-2">Detail Paket yang dipesan</h6>
                    <p class=""><?php echo $this->session->userdata('pesan_apa') ?></p>
                    <p class="">Rencana Berangkat : <?php echo $this->session->userdata('berapa_orang') ?> Orang</p>
                    <!-- <?php print_r($this->session->all_userdata()) ?> -->
                </div>
            </div>

        </div>
    </div>
</div>

<script>

</script>