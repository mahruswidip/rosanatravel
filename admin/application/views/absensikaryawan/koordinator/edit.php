<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <p class="mb-0">Edit Karyawan</p>
                    </div>
                </div>
                <div class="card-body">
                    <?php if ($this->session->flashdata('success')): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <span class="alert-text"><strong>Berhasil!</strong> <?php echo $this->session->flashdata('success'); ?></span>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>
                    <form action="<?php echo site_url('absen_koor/edit/' . $karyawan['id_karyawan']); ?>" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Nama</label>
                                    <input type="text" name="user_name" class="form-control" value="<?php echo $karyawan['user_name']; ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">User Login</label>
                                    <input type="text" name="user_email" class="form-control" value="<?php echo $karyawan['user_email']; ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Password (Kosongkan jika tidak diubah)</label>
                                    <input type="password" name="pass" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Kantor Cabang</label>
                                    <select name="fk_id_kantor" class="form-control" required>
                                        <option value="">Pilih Kantor Cabang</option>
                                        <?php foreach ($kantor_cabang as $kantor): ?>
                                            <option value="<?php echo $kantor->id_kantor; ?>" 
                                                <?php echo (isset($karyawan['fk_id_kantor']) && $kantor->id_kantor == $karyawan['fk_id_kantor']) ? 'selected' : ''; ?>>
                                                <?php echo $kantor->kota; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Nomor HP</label>
                                    <input type="text" name="nomor_hp" class="form-control" value="<?php echo $karyawan['nomor_hp']; ?>" required>
                                </div>
                            </div>
                        </div>
                        <hr class="horizontal dark mt-0">
                        <button class="btn btn-primary btn-sm" type="submit">Simpan</button>
                        <a href="<?php echo site_url('absen_koor/index'); ?>" class="btn btn-secondary btn-sm">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
