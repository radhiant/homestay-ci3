<div class="row">

    <div class="col-lg-12">
        <div class="d-flex justify-content-between">
            <h1 class="h4 mb-4 text-gray-800 font-weight-bold"> <span class="badge badge-primary btn-circle"><i class="fas fa-th-large"></i></span>  Pilihan Sewa
            </h1>
        </div>


    </div>

    <div class="col-lg-12">
        <div class="card mb-5">
            <!-- Card Header - Accordion -->
            <div class="card-header bg-primary d-flex justify-content-between">
                <h6 class="font-weight-bold text-white mt-2">Data</h6>
                <div>
                    <a href="#" class="btn btn-success rounded-pill btn-sm shadow" data-target="#tpilsewaModal" data-toggle="modal">
                        <span class="text">Tambah Data</span> <i class="fas fa-plus"></i>
                    </a>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <form action="<?= base_url() ?>pilsewa/mhapus" method="POST" enctype="multipart/form-data"
                        id="formHapus" onsubmit="return validateHapus()">
                        <table class="table table-striped " id="table-1" width="100%">
                            <thead>
                                <tr>
                                    <th width="1%">
                                        <div class="custom-control custom-checkbox ml-2 ">
                                            <input type="checkbox" class="custom-control-input"
                                                onchange="checkAll(this)" name="chk[]" id="cbx">
                                            <label class="custom-control-label" for="cbx">
                                                <div class="hidden">Check</div>
                                            </label>
                                        </div>
                                    </th>
                                    <th width="1%">No</th>
                                    <th>ID Pilihan Sewa</th>
                                    <th>Pilihan Sewa</th>
                                    <th>Type Kamar</th>
                                    <th>Harga</th>
                                    <th>Keterangan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

                