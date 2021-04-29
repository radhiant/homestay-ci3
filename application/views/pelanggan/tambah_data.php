<form action="<?= base_url() ?>pelanggan/proses_tambah" name="myForm" method="POST" enctype="multipart/form-data"
    onsubmit="return validateForm()" enctype="multipart/form-data">
    <div class="row mb-5">

        <!-- <div class="col-lg-12">
            <div class="alert alert-danger alert-icon d-flex shadow" role="alert">
                <div class="alert-icon-aside mt-1">
                    <i class="fas fa-exclamation-circle"></i>
                </div>
                <div class="alert-icon-content ml-1 mt-1">
                    <h6 class="alert-heading mt-1">Masih dalam perbaikan !</h6>
                </div>
            </div>
        </div> -->

        <div class="col-lg-12 mb-3 d-flex justify-content-between">
            <div class="d-flex ">
                <div>
                    <a href="<?= base_url() ?>pelanggan" class="btn btn-primary rounded-circle mr-1"><i
                            class="fas fa-arrow-left"></i></a>
                </div>
                <h1 class="h3 font-weight-bold mt-1">Pelanggan</h1>
            </div>

            <div class="d-flex">
                <div>
                    <button type="submit" class="btn btn-primary rounded-pill shadow mr-2" onclick="loadingklik()">
                        <span class="text">Simpan</span> <i class="fas fa-check-circle"></i>
                    </button>
                </div>
                <div>
                    <a href="<?= base_url() ?>pelanggan" class="btn btn-danger rounded-pill shadow">
                        <span class="text">Batal</span> <i class="fas fa-times-circle"></i>
                    </a>
                </div>
            </div>

        </div>



        <div class="col-lg-8">
            <div class="card">

                <div class="card-header bg-primary text-white">
                    <h6 class="font-weight-bold text-white mt-2">Form Tambah</h6>
                </div>

                <div class="card-body">

                    <div class="form-group">
                        <label>No KTP</label>
                        <input type="text" class="form-control" name="noktp">
                    </div>

                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" class="form-control" name="namaL">
                    </div>

                    <div class="form-group">
                        <label>Kelamin</label>
                        <select name="kelamin" class="form-control">
                            <option value="1">Laki-laki</option>
                            <option value="2">Perempuan</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>No Telp</label>
                        <input type="text" class="form-control" name="notelp">
                    </div>

                    <div class="form-group">
                        <label>Pekerjaan</label>
                        <input type="text" class="form-control" name="pekerjaan">
                    </div>

                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="alamat" class="form-control"></textarea>
                    </div>

                    <input id="mydata" type="hidden" class="form-control" name="mydata" value="" />

                </div>

            </div>
        </div>

        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <h6 class="font-weight-bold text-white mt-2">Foto KTP</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <div id="my_camera"></div>
                        <div id="results"></div>
                        <img src="<?= base_url() ?>assets/upload/default/img01.jpg" width="100%"
                            class="rounded shadow mb-4" id="bingkai">
                        <center>
                            <div id="bukaKamera">
                                <a href="#" class="btn btn-primary rounded-pill shadow" onclick="bukaKamera()">
                                    <i class="fas fa-camera"></i> Buka Kamera
                                </a>
                            </div>
                        </center>


                        <div id="uploadGambar">

                            <center>
                                <br>
                                --atau--
                            </center>

                            <div class="form-group">
                                
                                <div class="custom-file mt-3" id="ifile">
                                    <input class="custom-file-input" type="file" id="GetFile" name="photo"
                                        onchange="VerifyFileNameAndFileSize()" accept=".png,.jpeg,.jpg">
                                    <label class="custom-file-label" for="customFile">Upload...</label>
                                </div>
                            </div>

                        </div>

                        <center>
                            <div id="pre_take_buttons">
                                <a href="#" class="btn btn-primary rounded-pill shadow mt-3"
                                    onclick="preview_snapshot()">
                                    <i class="fas fa-camera-retro"></i> Preview
                                </a>
                            </div>
                        </center>

                        <center>
                            <div id="post_take_buttons" style="display:none" class="mt-3">
                                <a href="#" class="btn btn-primary rounded-pill shadow" onclick="cancel_preview()">
                                    <i class="fas fa-sync-alt"></i> Ganti
                                </a>
                                <a href="#" class="btn btn-success rounded-pill shadow" onclick="save_photo()"
                                    style="font-weight:bold;">
                                    <i class="fas fa-check-circle"></i> Simpan Photo
                                </a>
                            </div>
                        </center>

                    </div>
                </div>
            </div>

        </div>

    </div>

</form>