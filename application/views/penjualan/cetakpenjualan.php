<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> CETAK FAKTUR </title>
    <style>
    table {
        font-family: arial;
    }
    </style>
</head>

<body>
    <center>
        <table style="width:100%" border="0">
            <h2 style="font-family: Arial, Helvetica, sans-serif;"> CETAK FAKTUR</h2>
            <tr>
                <td>
                    <table border="0">
                        <tr>
                            <td> No Faktur</td>
                            <td> :</td>
                            <td> <?= $penjualan['no_faktur']; ?> </td>
                        </tr>
                        <tr>
                            <td> Tanggal </td>
                            <td> :</td>
                            <td> <?= $penjualan['tgltransaksi']; ?> </td>
                        </tr>
                    </table>
                </td>
                <td style="width:35%"> </td>
                <td>
                    <table border="0">
                        <tr>
                            <td> Kode Pelanggan </td>
                            <td> :</td>
                            <td> <?= $penjualan['kode_pelanggan']; ?> </td>
                        </tr>
                        <tr>
                            <td> Nama Pelanggan </td>
                            <td> :</td>
                            <td> <?= $penjualan['nama_pelanggan']; ?> </td>
                        </tr>
                        <tr>
                            <td> Alamat Pelanggan </td>
                            <td> :</td>
                            <td> <?= $penjualan['alamat_pelanggan']; ?> </td>
                        </tr>
                    </table>
                </td>
                </td>
            </tr>
        </table>
        <br>
        <table style="width:100%; border-collapse:collapse;" border=" 1">
            <tr style="font-weight:bold; text-align:center">
                <td> NO </td>
                <td> KODE BARANG</td>
                <td> NAMA BARANG </td>
                <td> HARGA </td>
                <td> QTY </td>
                <td> SUBTOTAL </td>
            </tr>
            <?php $no = 1;
            $total = 0;
            foreach ($detail as $d) {
                $totalharga = $d->qty * $d->harga;
                $total = $total + $totalharga;
            ?>
            <tr>
                <td align="center"> <?= $no; ?></td>
                <td align="center"><?= $d->kode_barang; ?></td>
                <td align="center"> <?= $d->nama_barang; ?></td>
                <td align="right"> <?= number_format($d->harga, '0', '', '.'); ?></td>
                <td align="center"> <?= $d->qty; ?></td>
                <td align="right"> <?= number_format($totalharga, '0', '', '.'); ?></td>
            </tr>
            <?php $no++;
            } ?>
            <tr>
                <td align="right" style="font-weight:bold; font-size:16" colspan="5"> TOTAL </td>
                <td align="right" style="font-weight:bold; font-size:16" colspan="5">
                    <?= number_format($total, '0', '', '.') ?> </td>
            </tr>
            <tr style="font-size:16; font-weight:bold">
                <td colspan="6">
                    <i>
                        <?= ucwords(terbilang($total)); ?>
                    </i>
                </td>
            </tr>
        </table>
    </center>

</body>

</html>