<!-- Outer Row -->
<div class="row justify-content-center mt-5">

    <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">

                <div class="row">
                    <div class="col-lg-6 d-none d-lg-block">
                        <br>
                        <img src="<?= base_url() ?>assets/upload/default/home.svg" width="100%" class="mt-5 mb-4 ml-4">
                    </div>
                    <div class="col-lg-6">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h5 text-gray-900 mb-4">Homestay Management</h1>
                            </div>
                            <form class="user" method="POST" name="myForm" action="<?= base_url() ?>login/proses_login"
                                enctype="multipart/form-data" onsubmit="return validateForm()">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user"
                                        aria-describedby="textHelp" placeholder="Username..." name="user"
                                        value="<?= $this->session->flashdata('username') ?>">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user"
                                        id="exampleInputPassword" placeholder="Password..." name="pwd"
                                        value="<?= $this->session->flashdata('pwd') ?>">
                                </div>
                                <br><br>
                                <hr class="sidebar-divider d-none d-md-block">
                                <button type="submit" class="btn btn-primary btn-block btn-user"
                                    onclick="lodingklik()"><i class="fas fa-lock"></i> Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>