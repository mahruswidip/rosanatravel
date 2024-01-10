<div class="modal" id="modalQr" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- <p><?php echo $this->session->userdata('nik'); ?></p> -->
                <p>TESTTT</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#modalQr').modal('show'); // Gantilah '#modalQr' dengan ID modal Anda
        // sessionStorage.clear(); // Jika perlu menghapus semua data sesi
    });
</script>