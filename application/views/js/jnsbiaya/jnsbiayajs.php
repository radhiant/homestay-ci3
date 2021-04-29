<!-- Modal Tambah-->
<div class="modal fade" id="tjnsbiayaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="<?= base_url() ?>jnsbiaya/proses_tambah" name="myForm" method="POST" enctype="multipart/form-data"
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
                        <label>ID Jenis Barang</label>
                        <input type="text" class="form-control" name="idjnsbiaya" value="<?= $kode ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label>Jenis Barang</label>
                        <input type="text" class="form-control" name="namaK" >
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
<div class="modal fade" id="ujnsbiayaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="<?= base_url() ?>jnsbiaya/proses_ubah" name="myFormUpdate" method="POST"
            enctype="multipart/form-data" onsubmit="return validateFormUpdate()">
            <div class="modal-content">

                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Data</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-white">×</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label>ID Jenis Barang</label>
                        <input type="text" class="form-control" name="idjnsbiaya" id="idjnsbiaya" readonly>
                    </div>

                    <div class="form-group">
                        <label>Jenis Barang</label>
                        <input type="text" class="form-control" name="namaK" id="namaK">
                    </div>

                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea name="ket" id="ket" class="form-control"></textarea>
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