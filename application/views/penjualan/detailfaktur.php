<h2 class="page-title-mb-3">
    Data Faktur
</h2>
<input type="hidden" id="cekBarang">
<div class="row">
    <div class="col-md-5">
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th> No Faktur</th>
                        <th><?= $penjualan['no_faktur']; ?></th>
                    </tr>
                    <tr>
                        <th> Tanggal Transaksi </th>
                        <th><?= $penjualan['tgltransaksi']; ?></th>
                    </tr>
                    <tr>
                        <th> Kode Pelanggan </th>
                        <th><?= $penjualan['kode_pelanggan']; ?></th>
                    </tr>
                    <tr>
                        <th> Nama Pelanggan </th>
                        <th><?= $penjualan['nama_pelanggan']; ?></th>
                    </tr>
                    <tr>
                        <th> Jenis Transaksi </th>
                        <th><?= ucwords($penjualan['jenistransaksi']); ?></th>
                    </tr>
                    <?php if ($penjualan['jenistransaksi'] == 'kredit') { ?>
                    <tr>
                        <th> Jatuh Tempo </th>
                        <th><?= $penjualan['jatuhtempo']; ?></th>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-7">
        <div class="card card-sm">
            <div class="card-body d-flex align-items-center">
                <span class="bg-blue text-white avatar mr-3" style="height:9rem, width:9rem">
                    <svg xmlns="http://www.w3.org/2000/svg" style="font-size:5rem" class=" icon" width="24" height="24"
                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <circle cx="9" cy="19" r="2" />
                        <circle cx="17" cy="19" r="2" />
                        <path d="M3 3h2l2 12a3 3 0 0 0 3 2h7a3 3 0 0 0 3 -2l1 -7h-15.2" />
                    </svg>
                </span>
                <div class="mr-3">
                    <div class="font-weight-large">
                        <h3 id="totalpenjualan" style="font-size: 4rem;"> 0 </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row-mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Data Barang</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr align="center">
                                    <th> NO. </th>
                                    <th> KODE BARANG </th>
                                    <th> NAMA BARANG </th>
                                    <th> HARGA </th>
                                    <th> QTY </th>
                                    <th> TOTAL </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                $grandtotal = 0;
                                foreach ($detail as $d) {
                                    $totalharga = $d->harga * $d->qty;
                                    $grandtotal = $grandtotal + $totalharga;
                                ?>
                                <tr>
                                    <td align="center"> <?= $no; ?> </td>
                                    <td align="center"> <?= $d->kode_barang; ?> </td>
                                    <td align="center"> <?= $d->nama_barang; ?> </td>
                                    <td align="right"> <?= number_format($d->harga, '0', '', '.'); ?> </td>
                                    <td align="center"> <?= $d->qty; ?> </td>
                                    <td align="right"> <?= number_format($totalharga, '0', '', '.'); ?> </td>
                                </tr>
                                <?php
                                    $no++;
                                } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="5" style="font-weight: bold;"> Grand Total </td>
                                    <td id="grandtotal" align="right"> <?= number_format($grandtotal, '0', '', '.'); ?>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row-mt-3">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> Histori Bayar</h4>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <a href="#" class="btn btn-success" id="bayar">
                        Bayar
                    </a>
                </div>
                <div class="mb-3">
                    <?= $this->session->flashdata('msg'); ?>
                </div>
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th> No </th>
                            <th> No Bukti </th>
                            <th> Tanggal Bayar </th>
                            <th> Jumlah Bayar </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($bayar as $b) { ?>
                        <tr>
                            <td> <?= $no; ?></td>
                            <td> <?= $b->nobukti; ?></td>
                            <td> <?= $b->tglbayar; ?></td>
                            <td align="right"> <?= number_format($b->bayar, '0', '', '.'); ?> </td>
                        </tr>
                        <?php
                            $no++;
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal modal-blur fade" id="modalbayar" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Input Bayar </h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="loadforminputbayar"></div>
            </div>
        </div>
    </div>
</div>


<script>
$(function() {
    var no_faktur = "<?= $penjualan['no_faktur']; ?>";
    var grandtotal = $("#grandtotal").text();
    $("#totalpenjualan").text(grandtotal);

    $("#bayar").click(function() {
        $("#modalbayar").modal("show");
        $("#loadforminputbayar").load('<?= base_url(); ?>penjualan/inputbayar/' + no_faktur);
    });
});
</script>