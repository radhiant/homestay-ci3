<!-- Modal Tambah-->
<div class="modal fade" id="tkamarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="<?= base_url() ?>kamar/proses_tambah" name="myForm" method="POST" enctype="multipart/form-data"
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
                        <label>Nomor Kamar</label>
                        <input type="text" class="form-control" name="nokamar">
                    </div>

                    <div class="form-group">
                        <label>Type Kamar</label>
                        <input type="text" class="form-control" name="type">
                    </div>

                    <div class="form-group">
                        <label>Biaya Kamar</label>
                        <input type="text" class="form-control" name="biaya" id="nilai">
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
<div class="modal fade" id="ukamarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="<?= base_url() ?>kamar/proses_ubah" name="myFormUpdate" method="POST"
            enctype="multipart/form-data" onsubmit="return validateFormUpdate()">
            <div class="modal-content">

                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Data</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-white">×</span>
                    </button>
                </div>
                <div class="modal-body">

                    <input type="hidden" class="form-control" name="idkamar" id="idkamar">

                    <div class="form-group">
                        <label>Nomor Kamar</label>
                        <input type="text" class="form-control" name="nokamar" id="nokamar">
                    </div>

                    <div class="form-group">
                        <label>Type Kamar</label>
                        <input type="text" class="form-control" name="type" id="type">
                    </div>

                    <div class="form-group">
                        <label>Biaya Kamar</label>
                        <input type="text" class="form-control" name="biaya" id="nilaiU">
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