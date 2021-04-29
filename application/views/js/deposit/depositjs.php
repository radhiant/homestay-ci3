<!-- Modal Tambah-->
<div class="modal fade" id="kembaliModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="<?= base_url() ?>deposit/proses_pengembalian" name="myForm" method="POST"
            enctype="multipart/form-data" onsubmit="return validateForm()">
            <div class="modal-content">

                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="exampleModalLabel">Pengembalian</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-white">×</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label>ID Deposit</label>
                        <input type="text" class="form-control" name="iddeposit" id="iddeposit" readonly>
                    </div>

                    <div class="form-group">
                        <label>Tanggal kembali</label>
                        <input type="text" class="form-control datetimepicker" name="tglKembali" autocomplete="off" value="<?= date("Y-m-d H:i") ?>">
                    </div>

                    <div class="form-group">
                        <label>Nominal Kembali</label>
                        <input type="text" class="form-control" name="nominal" id="nominal">
                    </div>


                </div>
                <div class="modal-footer">
                <button class="btn btn-danger shadow rounded-pill" type="button" data-dismiss="modal">Batal <i
                            class="fas fa-times-circle"></i></button>
                    <button type="submit" class="btn btn-primary shadow rounded-pill" onclick="loadingklik()">Simpan <i
                            class="fas fa-check-circle"></i></button>
                </div>
            </div>
        </form>
    </div>
</div>