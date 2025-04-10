<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <p class="mb-0">Tambah Karyawan</p>
                    </div>
                </div>
                <div class="card-body">
                    <?php if ($this->session->flashdata('success')): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <span class="alert-text"><strong>Berhasil!</strong> <?php echo $this->session->flashdata('success'); ?></span>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>
                    <form action="<?php echo site_url('absen_admin/add'); ?>" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Nama</label>
                                    <input type="text" name="user_name" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">User Login</label>
                                    <input type="text" name="user_email" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Password</label>
                                    <input type="password" name="pass" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Kantor Cabang</label>
                                    <select name="fk_id_kantor" class="form-control" required>
                                        <option value="">-- Pilih Kantor Cabang --</option>
                                        <?php if (!empty($kantor_cabang)) : ?>
                                            <?php foreach ($kantor_cabang as $kantor) : ?>
                                                <option value="<?php echo $kantor->id_kantor; ?>">
                                                    <?php echo htmlspecialchars($kantor->kota); ?>
                                                </option>
                                            <?php endforeach; ?>
                                        <?php else : ?>
                                            <option value="">Data tidak tersedia</option>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Nomor HP</label>
                                    <input type="text" name="nomor_hp" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Badan Usaha</label>
                                    <select name="company" class="form-control" required>
                                        <option value="">-- Pilih Badan Usaha --</option>
                                        <option value="Rosana Travel">Rosana Travel</option>
                                        <option value="Nipindo Travel">Nipindo Travel</option>
                                        <option value="Warung Wakro">Warung Wakro</option>
                                        <option value="Binaland">Binaland</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">User Level</label>
                                    <select name="user_level" class="form-control" required>
                                        <option value="">-- Pilih User Level --</option>
                                        <option value="5">Koordinator</option>
                                        <option value="6">Karyawan</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr class="horizontal dark mt-0">
                        <button class="btn btn-primary btn-sm" type="submit">Tambah</button>
                        <a href="<?php echo site_url('absen_admin/index'); ?>" class="btn btn-secondary btn-sm">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>