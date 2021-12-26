<!-- Modal -->
<div class="modal fade" id="modallaporan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <?php echo form_open_multipart('siswa/masukLaporan') ?>
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Laporan Harian Prakerin</h5>
            </div>
            <div class="modal-body">
                <div class="alert alert-default" role="alert">
                    <strong>Perhatian!</strong> Silahkan mengisi semua input form yang di sediakan. <strong>Bukti</strong> bisa berupa pdf, doc atau juga gambar ber format png, jpg
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function() {
        $("#modallaporan").modal("show");
    });
</script>