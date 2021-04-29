<form action="<?= base_url() ?>user/proses_tambah" name="myForm" method="POST" enctype="multipart/form-data"
    onsubmit="return validateForm()">

    <div class="row mb-4">

        <div class="col-lg-8">
            <div class="card">
                <div class="card-header bg-primary">
                    <h6 class="font-weight-bold text-white mt-2">Form User</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" class="form-control" name="nmlengkap">
                    </div>

                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username">
                    </div>

                    <div class="form-group">
                        <label>Level</label>
                        <select class="form-control" name="level">
                            <option value="">--Pilih--</option>
                            <option value="1">Admin</option>
                            <option value="2">Operator</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="pwd">
                    </div>

                    <div class="form-group">
                        <label>Ulangi Password</label>
                        <input type="password" class="form-control" name="pwdU">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 ">
            <div class="card mb-4">
                <div class="card-header bg-primary">
                    <h6 class="font-weight-bold text-white mt-2">Foto</h6>
                </div>
                <div class="card-body">

                    <div class="alert alert-info alert-icon d-flex shadow" role="alert">
                        <div class="alert-icon-aside">
                            <i class="fas fa-exclamation-circle"></i>
                        </div>
                        <div class="alert-icon-content ml-1 mt-1">
                            <h6 class="alert-heading">Extensi Gambar</h6>
                            .jpg .jpeg .png
                        </div>
                    </div>

                    <img src="<?= base_url() ?>assets/upload/user/undraw_profile.svg" alt="blankimg"
                        class="imagecheck-image mb-2 rounded-circle" id="outputImg" width="100%" >

                    <div class="form-group" onmouseenter="bIn('#ifile')" onmouseleave="bOut('#ifile')">
                        <div class="custom-file" id="ifile">
                            <input class="custom-file-input" type="file" id="GetFile" name="photo"
                                onchange="VerifyFileNameAndFileSize()" accept=".png,.jpeg,.jpg">
                            <label class="custom-file-label" for="customFile">Pilih File</label>
                        </div>
                    </div>

                </div>
            </div>

            <div onmouseenter="bIn('#pTambah')" onmouseleave="bOut('#pTambah')" class="mb-2">
                <button id="pTambah" class="btn btn-primary btn-lg btn-block shadow" onclick="loadingklik()">Simpan Data
                    <i class="fas fa-check-circle"></i></button>
            </div>

            <div onmouseenter="bIn('#batal')" onmouseleave="bOut('#batal')">
                <a id="batal" href="<?= base_url() ?>user" class="btn btn-danger btn-lg btn-block shadow">Batal <i
                        class="fas fa-times"></i></a>
            </div>

        </div>

    </div>

</form>