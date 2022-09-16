<h2 class="page-title-mb-3">
    Data Penjualan
    <div>
        <?= $this->session->flashdata('msg'); ?>
    </div>
</h2>
<form id="formPenjualan" method="POST" action="<?= base_url(); ?>penjualan/simpanpenjualan">
    <input type="hidden" id="cekBarang">
    <div class="row">
        <div class="col-md-5">
            <div class="card">
                <div class="card-body">
                    <!-- <div class="input-icon mb-3">
                        <span class="input-icon-addon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M4 7v-1a2 2 0 0 1 2 -2h2" />
                                <path d="M4 17v1a2 2 0 0 0 2 2h2" />
                                <path d="M16 4h2a2 2 0 0 1 2 2v1" />
                                <path d="M16 20h2a2 2 0 0 0 2 -2v-1" />
                                <rect x="5" y="11" width="1" height="2" />
                                <line x1="10" y1="11" x2="10" y2="13" />
                                <rect x="14" y="11" width="1" height="2" />
                                <line x1="19" y1="11" x2="19" y2="13" />
                            </svg>
                        </span>
                <input type="text" readonly class="form-control" name="no_invoice"
                            placeholder="No Invoice"> -->
                    <input type="hidden" name="no_invoice">
                    <!-- </div> -->
                    <div class="input-icon mb-3">
                        <span class="input-icon-addon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M4 7v-1a2 2 0 0 1 2 -2h2" />
                                <path d="M4 17v1a2 2 0 0 0 2 2h2" />
                                <path d="M16 4h2a2 2 0 0 1 2 2v1" />
                                <path d="M16 20h2a2 2 0 0 0 2 -2v-1" />
                                <rect x="5" y="11" width="1" height="2" />
                                <line x1="10" y1="11" x2="10" y2="13" />
                                <rect x="14" y="11" width="1" height="2" />
                                <line x1="19" y1="11" x2="19" y2="13" />
                            </svg>
                        </span>
                        <input type="text" readonly value="<?= $no_faktur; ?>" class="form-control" name="no_faktur"
                            id="no_faktur" placeholder="No Faktur">
                    </div>
                    <div class="input-icon mb-3">
                        <span class="input-icon-addon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <rect x="4" y="5" width="16" height="16" rx="2" />
                                <line x1="16" y1="3" x2="16" y2="7" />
                                <line x1="8" y1="3" x2="8" y2="7" />
                                <line x1="4" y1="11" x2="20" y2="11" />
                                <line x1="11" y1="15" x2="12" y2="15" />
                                <line x1="12" y1="15" x2="12" y2="18" />
                            </svg>
                        </span>
                        <input type="text" class="form-control" value="<?= date("Y-m-d"); ?>" name="tgltransaksi"
                            id="tgltransaksi" placeholder="Tangggal Transaksi">
                    </div>
                    <div class="input-icon mb-3">
                        <span class="input-icon-addon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <circle cx="12" cy="7" r="4" />
                                <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                            </svg>
                        </span>
                        <input type="hidden" name="kodepelanggan" id="kodepelanggan">
                        <input type="text" autocomplete="off" class="form-control" name="namapelanggan"
                            id="namapelanggan" placeholder="Pelanggan">
                    </div>
                    <div class="mb-3">
                        <select name="jenistransaksi" id="jenistransaksi" class="form-select">
                            <option value="">Pilih Jenis Transaksi </option>
                            <option value="tunai"> Tunai </option>
                            <option value="kredit"> Kredit </option>
                        </select>
                    </div>
                    <div class="input-icon mb-3" id="jt">
                        <span class="input-icon-addon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <rect x="4" y="5" width="16" height="16" rx="2" />
                                <line x1="16" y1="3" x2="16" y2="7" />
                                <line x1="8" y1="3" x2="8" y2="7" />
                                <line x1="4" y1="11" x2="20" y2="11" />
                                <line x1="11" y1="15" x2="12" y2="15" />
                                <line x1="12" y1="15" x2="12" y2="18" />
                            </svg>
                        </span>
                        <input readonly type="text" class="form-control" name="jatuhtempo" id="jatuhtempo"
                            placeholder="Jatuh Tempo">
                    </div>
                    <div class="input-icon mb-3">
                        <span class="input-icon-addon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <circle cx="12" cy="7" r="4" />
                                <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                            </svg>
                        </span>
                        <input type="hidden" value="<?= $this->session->userdata('id_user'); ?>" name="id_user"
                            id="id_user">
                        <input type="text" readonly value="<?= $this->session->userdata('id_user')  . " - " .
                                                                $this->session->userdata('nama_lengkap'); ?>"
                            class="form-control" name="username" id="username" placeholder="Kasir">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card card-sm">
                <div class="card-body d-flex align-items-center">
                    <span class="bg-blue text-white avatar mr-3" style="height:9rem, width:9rem">
                        <svg xmlns="http://www.w3.org/2000/svg" style="font-size:5rem" class=" icon" width="24"
                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <circle cx="9" cy="19" r="2" />
                            <circle cx="17" cy="19" r="2" />
                            <path d="M3 3h2l2 12a3 3 0 0 0 3 2h7a3 3 0 0 0 3 -2l1 -7h-15.2" />
                        </svg>
                    </span>
                    <div class="mr-3">
                        <div class="font-weight-large">
                            <h2 id="totalpenjualan" style="font-size: 4rem;"> 0 </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card title"> Data Barang</h4>
                    </div>
                    <div class="card body">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="input-icon mb-3">
                                    <span class="input-icon-addon">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M4 7v-1a2 2 0 0 1 2 -2h2" />
                                            <path d="M4 17v1a2 2 0 0 0 2 2h2" />
                                            <path d="M16 4h2a2 2 0 0 1 2 2v1" />
                                            <path d="M16 20h2a2 2 0 0 0 2 -2v-1" />
                                            <rect x="5" y="11" width="1" height="2" />
                                            <line x1="10" y1="11" x2="10" y2="13" />
                                            <rect x="14" y="11" width="1" height="2" />
                                            <line x1="19" y1="11" x2="19" y2="13" />
                                        </svg>
                                    </span>
                                    <input type="text" readonly class="form-control" name="kodebarang" id="kodebarang"
                                        placeholder="Kode Barang">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-icon mb-3">
                                    <span class="input-icon-addon">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <rect x="4" y="4" width="6" height="6" rx=" 1" />
                                            <rect x="14" y="4" width="6" height="6" rx="1" />
                                            <rect x="4" y="14" width="6" height="6" rx="1" />
                                            <rect x="14" y="14" width="6" height="6" rx="1" />
                                        </svg>
                                    </span>
                                    <input type="text" readonly class="form-control" name="namabarang" id="namabarang"
                                        placeholder="Nama Barang">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="input-icon mb-3">
                                    <span class="input-icon-addon">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path
                                                d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2" />
                                            <path d="M12 3v3m0 12v3" />
                                        </svg>
                                    </span>
                                    <input type="text" readonly class="form-control" name="harga" id="harga"
                                        placeholder="Harga" style="text-align: right;">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="input-icon mb-3">
                                    <span class="input-icon-addon">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <rect width="6" height="6" x="9" y="5" rx="1" />
                                            <line x1="4" y1="7" x2="5" y2="7" />
                                            <line x1="4" y1="11" x2="5" y2="11" />
                                            <line x1="19" y1="7" x2="20" y2="7" />
                                            <line x1="19" y1="11" x2="20" y2="11" />
                                            <line x1="4" y1="15" x2="20" y2="15" />
                                            <line x1="4" y1="19" x2="20" y2="19" />
                                        </svg>
                                    </span>
                                    <input type="text" class="form-control" name="qty" id="qty" placeholder="QTY">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <a href="#" id="tambahbarang" class="btn btn-primary"> Simpan
                                </a>
                            </div>
                            <div class="card">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th> No. </th>
                                            <th> KODE BARANG </th>
                                            <th> NAMA BARANG </th>
                                            <th> HARGA </th>
                                            <th> QTY </th>
                                            <th> TOTAL </th>
                                            <th> AKSI </th>
                                        </tr>
                                    </thead>
                                    <tbody id="loaddatabarang">
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <button type="submit" class="btn btn-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <line x1="10" y1="14" x2="21" y2="3" />
                                        <path
                                            d="M21 3l-6.5 18a0.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a0.55 .55 0 0 1 0 -1l18 -6.5" />
                                    </svg>
                                    Simpan </button>
                            </div>

                            <div class="modal modal-blur fade" id="modalpelanggan" tabindex="-1" role="dialog"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title"> Data Pelanggan</h5>
                                            <button type="button" class="btn-close" data-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <table id="tabelpelanggan"
                                                class="table table-striped table-bordered text-center">
                                                <thead>
                                                    <tr>
                                                        <th> NO. </th>
                                                        <th> KODE PELANGGAN </th>
                                                        <th> NAMA PELANGGAN </th>
                                                        <th> ALAMAT PELANGGAN </th>
                                                        <th> NO HP </th>
                                                        <th> CABANG </th>
                                                        <th> AKSI </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    foreach ($pelanggan as $p) { ?>
                                                    <tr>
                                                        <td> <?= $no; ?></td>
                                                        <td> <?= $p->kode_pelanggan; ?></td>
                                                        <td><?= $p->nama_pelanggan; ?></td>
                                                        <td><?= $p->alamat_pelanggan; ?></td>
                                                        <td><?= $p->no_hp; ?></td>
                                                        <td><?= $p->nama_cabang; ?></td>
                                                        <td>
                                                            <a href="#" class="btn btn-primary pilih"
                                                                data-kodepel="<?= $p->kode_pelanggan; ?>"
                                                                data-namapel="<?= $p->nama_pelanggan; ?>"> Pilih </a>
                                                        </td>
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

                            <div class="modal modal-blur fade" id="modalbarangharga" tabindex="-1" role="dialog"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title"> Data Harga Barang </h5>
                                            <button type="button" class="btn-close" data-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <table id="tabelharga" class="table table-striped table-bordered">
                                                <thead class="text-center">
                                                    <tr>
                                                        <th> NO. </th>
                                                        <th> KODE HARGA</th>
                                                        <th> KODE BARANG</th>
                                                        <th> NAMA BARANG</th>
                                                        <th> SATUAN</th>
                                                        <th> HARGA</th>
                                                        <th> STOK</th>
                                                        <th> CABANG</th>
                                                        <th>AKSI</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    foreach ($harga as $h) { ?>
                                                    <tr>
                                                        <td> <?= $no; ?></td>
                                                        <td> <?= $h->kode_harga; ?> </td>
                                                        <td> <?= $h->kode_barang; ?> </td>
                                                        <td> <?= $h->nama_barang; ?> </td>
                                                        <td> <?= $h->satuan; ?> </td>
                                                        <td class="text-right">
                                                            <?= number_format($h->harga, '0', '', '.'); ?> </td>
                                                        <td> <?= $h->stok; ?> </td>
                                                        <td> <?= $h->kode_cabang; ?> </td>
                                                        <td>
                                                            <a href="#" class="btn btn-primary pilihbarang"
                                                                data-kodebarang="<?= $h->kode_barang; ?>"
                                                                data-namabarang="<?= $h->nama_barang; ?>"
                                                                data-harga="<?= $h->harga; ?>"> Pilih </a>
                                                        </td>
                                                    </tr>

                                                    <?php $no++;
                                                    } ?>
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
document.addEventListener("DOMContentLoaded", function() {
    flatpickr(document.getElementById('tgltransaksi'), {});
});
</script>

<script>
$(function() {
    function hidejatuhtempo() {
        $("#jt").hide();
    }

    function showjt() {
        $("#jt").show();
    }

    function getjatuhtempo() {
        var tgltransaksi = $("#tgltransaksi").val();
        $.ajax({
            type: 'POST',
            url: '<?= base_url(); ?>penjualan/getjatuhtempo',
            data: {
                tgltransaksi: tgltransaksi
            },
            cache: false,
            success: function(respond) {
                $("#jatuhtempo").val(respond);
            }
        });
    }

    function cekBarang() {
        $.ajax({
            type: 'POST',
            url: '<?= base_url(); ?>penjualan/cekBarang',
            cache: false,
            success: function(respond) {
                $("#cekBarang").val(respond);
            }
        });
    }

    function loaddatabarang() {
        var id_user = $("#id_user").val();
        $.ajax({
            type: 'POST',
            url: '<?= base_url(); ?>penjualan/getDataBarangTemp',
            data: {
                id_user: id_user
            },
            cache: false,
            success: function(respond) {
                $("#loaddatabarang").html(respond);
            }
        });
    }

    loaddatabarang();
    cekBarang();
    getjatuhtempo();
    hidejatuhtempo();

    $("#jenistransaksi").change(function() {
        var jenistransaksi = $(this).val();
        if (jenistransaksi == "kredit") {
            showjt();
        } else {
            hidejatuhtempo();
        }
    });

    $("#tgltransaksi").change(function() {
        getjatuhtempo();
    });

    $("#formPenjualan").submit(function() {
        var no_faktur = $("#no_faktur").val();
        var tgltransaksi = $("#tgltransaksi").val();
        var kode_pelanggan = $("#kodepelanggan").val();
        var jenistransaksi = $("#jenistransaksi").val();

        if (no_faktur == "") {
            swal("Oopps!", "No Faktur harus diisi", "warning");
            return false;
        } else if (tgltransaksi == "") {
            swal("Oopps!", "Tanggal transaksi harus diisi", "warning");
            return false;
        } else if (kode_pelanggan == "") {
            swal("Oopps!", "Nama pelanggan harus diisi", "warning");
            return false;
        } else if (jenistransaksi == "") {
            swal("Oopps!", " Jenis transaksi harus diisi", "warning");
            return false;
        } else {
            return true;
        }
    });

    $("#namapelanggan").click(function() {
        $("#modalpelanggan").modal("show");
    });
    $("#tabelpelanggan").DataTable();

    $(".pilih").click(function() {
        var kodepelanggan = $(this).attr("data-kodepel");
        var namapelanggan = $(this).attr("data-namapel");
        $("#kodepelanggan").val(kodepelanggan);
        $("#namapelanggan").val(namapelanggan);
        $("#modalpelanggan").modal("hide");
    });

    $("#kodebarang").click(function() {
        $("#modalbarangharga").modal("show");
    });

    $("#tabelharga").DataTable();

    $(".pilihbarang").click(function() {
        var kodebarang = $(this).attr("data-kodebarang");
        var namabarang = $(this).attr("data-namabarang");
        var harga = $(this).attr("data-harga");
        $("#kodebarang").val(kodebarang);
        $("#namabarang").val(namabarang);
        $("#harga").val(harga);
        $("#modalbarangharga").modal("hide");
    });

    // addbarang meng. ajax
    $("#tambahbarang").click(function() {
        var kode_barang = $("#kodebarang").val();
        var harga = $("#harga").val();
        var qty = $("#qty").val();
        var id_user = $("#id_user").val();

        if (kode_barang == "") {
            swal("Oopps!", "Kode barang harus diisi", "warning");
        } else if (qty == "" || qty == 0) {
            swal("Oopps!", "QTY harus diisi", "warning");
        } else {
            $.ajax({
                type: 'POST',
                url: '<?= base_url(); ?>penjualan/simpanbarangtemp',
                data: {
                    kode_barang: kode_barang,
                    harga: harga,
                    qty: qty,
                    id_user: id_user,
                },
                cache: false,
                success: function(respond) {
                    if (respond == 1) {
                        swal("Oopss", "Data sudah ada", "warning");
                    } else {
                        loaddatabarang();
                    }
                }
            });
        }
    });
});
</script>