<!-- Modal Tambah-->
<div class="modal  fade" id="tsalesModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="<?= base_url() ?>sales/proses_tambah" name="myForm" method="POST" enctype="multipart/form-data"
            onsubmit="return validateForm()">
            <div class="modal-content">

                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-white">×</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label>Nama Sales</label>
                        <input type="text" class="form-control" name="namaS">
                    </div>

                    <div class="form-group">
                        <label>No Telepon</label>
                        <input type="text" class="form-control" name="notelp">
                    </div>

                    <div class="form-group">
                        <label>Tanggal Bayar</label>
                        <input type="text" class="form-control datepicker" name="tglbayar" autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label>Biaya Sales <b>(%)</b></label>
                        <input type="number" step="any" class="form-control" name="biayaS">
                    </div>

                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea name="ket" class="form-control"></textarea>
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

<!-- Modal Ubah-->
<div class="modal fade" id="usalesModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="<?= base_url() ?>sales/proses_ubah" name="myFormUpdate" method="POST"
            enctype="multipart/form-data" onsubmit="return validateFormUpdate()">
            <div class="modal-content">

                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Data</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-white">×</span>
                    </button>
                </div>
                <div class="modal-body">

                    <input type="hidden" class="form-control" name="idsales" id="idsales">

                    <div class="form-group">
                        <label>Nama Sales</label>
                        <input type="text" class="form-control" name="namaS" id="namaS">
                    </div>

                    <div class="form-group">
                        <label>No Telepon</label>
                        <input type="text" class="form-control" name="notelp" id="notelp">
                    </div>

                    <div class="form-group">
                        <label>Tanggal Bayar</label>
                        <input type="text" class="form-control datepicker" name="tglbayar" id="tglbayar" autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label>Biaya Sales <b>(%)</b></label>
                        <input type="text" step="any" class="form-control" name="biayaS" id="biayaS">
                    </div>

                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea name="ket" class="form-control" id="ket"></textarea>
                    </div>


                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger shadow rounded-pill" type="button" data-dismiss="modal">Batal <i
                            class="fas fa-times-circle"></i></button>
                    <button type="submit" class="btn btn-success shadow rounded-pill" onclick="loadingklik()" id="bSubmit">Simpan
                        Perubahan <i class="fas fa-check-circle"></i></button>
                    <a href="#" class="btn btn-success shadow rounded-pill disabled" id="bSubmitDisable">Memuat...</a>


                </div>
            </div>
        </form>
    </div>
</div>

