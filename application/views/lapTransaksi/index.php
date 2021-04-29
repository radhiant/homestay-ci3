<?php 

 function getBulan($bulan)
{
    switch ($bulan) {
        case "January":
          return 'Januari';
          break;
        case "February":
            return 'Februari';
          break;
        case "March":
            return 'Maret';
          break;
        case "April":
            return 'April';
          break;
        case "May":
            return 'Mei';
          break;
        case "June":
            return 'Juni';
          break;
        case "July":
            return 'Juli';
          break;
        case "August":
            return 'Agustus';
          break;
        case "September":
            return 'September';
          break;
        case "October":
            return 'Oktober';
          break;
        case "November":
            return 'November';
          break;
        case "December":
            return 'Desember';
          break;
          
        default:
        return 'Pilih Bulan';
      }
}

?>
<div class="row">

    <div class="col-lg-12">
        <div class="d-flex justify-content-between">
            <h1 class="h4 mb-4 text-gray-800 font-weight-bold">
                <span class="badge badge-primary btn-circle"><i class="fas fa-print mt-1 mb-1"></i></span> Laporan
                Transaksi
            </h1>

            <div class="d-flex">

                <input type="hidden" id="bln" name="bln" value="<?= $bulan ?>">
                <input type="hidden" id="thn" name="thn" value="<?= $tahun ?>">
                <input type="hidden" id="pmbyrn" name="pmbyrn" value="<?= $pmbyrn ?>">

                <div class="dropdown">
                    <button class="btn btn-sm btn-primary dropdown-toggle rounded-pill shadow mr-2" id="bulan"
                        type="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"><?= getBulan($bulan) ?></button>
                    <div class="dropdown-menu ">
                        <a href="javascript:void(0);" id="jan"
                            class="dropdown-item <?= $bulan == 'January' ? 'active' : '' ?>" onclick="jan()">Januari</a>

                        <a href="javascript:void(0);" id="feb"
                            class="dropdown-item <?= $bulan == 'February' ? 'active' : '' ?>"
                            onclick="feb()">Februari</a>

                        <a href="javascript:void(0);" id="mart"
                            class="dropdown-item <?= $bulan == 'March' ? 'active' : '' ?>" onclick="mart()">Maret</a>

                        <a href="javascript:void(0);" id="apr"
                            class="dropdown-item <?= $bulan == 'April' ? 'active' : '' ?>" onclick="apr()">April</a>

                        <a href="javascript:void(0);" id="may"
                            class="dropdown-item <?= $bulan == 'May' ? 'active' : '' ?>" onclick="may()">Mei</a>

                        <a href="javascript:void(0);" id="jun"
                            class="dropdown-item <?= $bulan == 'June' ? 'active' : '' ?>" onclick="jun()">Juni</a>

                        <a href="javascript:void(0);" id="jul"
                            class="dropdown-item <?= $bulan == 'July' ? 'active' : '' ?>" onclick="jul()">Juli</a>

                        <a href="javascript:void(0);" id="agus"
                            class="dropdown-item <?= $bulan == 'August' ? 'active' : '' ?>" onclick="agus()">Agustus</a>

                        <a href="javascript:void(0);" id="sep"
                            class="dropdown-item <?= $bulan == 'September' ? 'active' : '' ?>"
                            onclick="sep()">September</a>

                        <a href="javascript:void(0);" id="oct"
                            class="dropdown-item <?= $bulan == 'October' ? 'active' : '' ?>" onclick="oct()">Oktober</a>

                        <a href="javascript:void(0);" id="nov"
                            class="dropdown-item <?= $bulan == 'November' ? 'active' : '' ?>"
                            onclick="nov()">November</a>

                        <a href="javascript:void(0);" id="dec"
                            class="dropdown-item <?= $bulan == 'December' ? 'active' : '' ?>"
                            onclick="dec()">Desember</a>

                        <div class="dropdown-divider"></div>
                        <a href="javascript:void(0);" class="dropdown-item" onclick="reset()">Reset</a>

                    </div>
                </div>

                <div class="dropdown">
                    <button class="btn btn-sm btn-primary dropdown-toggle rounded-pill shadow mr-2" id="tahun"
                        type="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"><?= $tahun ?></button>
                    <div class="dropdown-menu ">
                        <a class="dropdown-item <?= $tahun == $twoyearago ? 'active' : '' ?>" id="tya"
                            href="javascript:void(0);" onclick="tya('<?= $twoyearago ?>')"><?= $twoyearago ?></a>
                        <a class="dropdown-item <?= $tahun == $previousyear ? 'active' : '' ?>" id="py"
                            href="javascript:void(0);" onclick="py('<?= $previousyear ?>')"><?= $previousyear ?></a>
                        <a class="dropdown-item <?= $tahun == $yearnow ? 'active' : '' ?>" id="yn"
                            href="javascript:void(0);" onclick="yn('<?= $yearnow ?>')"><?= $yearnow ?></a>
                    </div>
                </div>

                <div>
                    <a href="javascript:void(0);" onclick="filter()"
                        class="btn btn-sm btn-success rounded-pill shadow mr-2"><i class="fas fa-filter"></i>
                        Filter</a>
                </div>

                <div>
                    <a href="javascript:void(0);" onclick="print()"
                        class="btn btn-sm btn-primary rounded-pill shadow"><i class="fas fa-print"></i>
                        Print</a>
                </div>
            </div>

        </div>
    </div>

    <div class="col-xl-12 col-md-12 mb-4">
        <div class="card shadow">
            <div class="card-body p-0 position-relative">

                <table class="table table-striped table-bordered nowrap" id="table-1" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Pelanggan</th>
                            <th>Kamar</th>
                            <th>Sales</th>
                            <th>Pembayaran</th>
                            <th>Pendapatan</th>
                            <th>Fee Sales %</th>
                            <th>Fee Sales 2</th>
                            <th>Total Pendapatan</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php 
                        $sbtotal = 0; $sbfee = 0; $sbfee2 = 0; $sbttlp = 0; $no = 1; 
                        foreach($transaksi as $d): ?>
                        <tr>
                            <td><?= $no++ ?>.</td>
                            <td><?= $d->pelanggan_nama ?></td>
                            <td><?= $d->kamar_no ?></td>
                            <td><?= $d->sales_nama?></td>
                            <td><?= $d->pendapatan_pembayaran == null ? "(kosong)" : $d->pendapatan_pembayaran ?></td>
                            <td><?= 'Rp '.number_format($d->pendapatan_total,0,",",".") ?></td>
                            <td>
                                <?php 
                                $fee = ($d->sales_biaya/100)*$d->pendapatan_total; 
                                echo 'Rp '.number_format($fee,0,",",".");
                            ?>
                            </td>
                            <td><?= 'Rp '.number_format($d->pendapatan_fee,0,",",".") ?></td>
                            <td>
                                <?php 
                                $ttlPendapatan = $d->pendapatan_total - ($fee + $d->pendapatan_fee);
                                echo 'Rp '.number_format($ttlPendapatan,0,",",".");
                            ?>
                            </td>
                        </tr>

                        <?php 
                            $sbtotal += $d->pendapatan_total; 
                            $sbfee += $fee; 
                            $sbfee2 += $d->pendapatan_fee; 
                            $sbttlp += $ttlPendapatan;
                        ?>

                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <th colspan="5">
                            <center><b> <i>TOTAL</i> </b></center>
                        </th>
                        <th><?= 'Rp '.number_format($sbtotal,0,",",".") ?></th>
                        <th><?= 'Rp '.number_format($sbfee,0,",",".") ?></th>
                        <th><?= 'Rp '.number_format($sbfee2,0,",",".") ?></th>
                        <th><?= 'Rp '.number_format($sbttlp,0,",",".") ?></th>
                    </tfoot>
                </table>

            </div>
        </div>
    </div>

</div>