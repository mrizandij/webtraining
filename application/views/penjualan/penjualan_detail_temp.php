<?php
$no = 1;
foreach ($karyawantemp as $b) {
    $totalpenjualan = $totalpenjualan + $b->total;
?>
<tr>
    <td align="center"> <?= $no; ?></td>
    <td align="center"> <?= $b->kode_barang; ?></td>
    <td align="center"> <?= $b->nama_barang; ?></td>
    <td align="right"> <?= number_format($b->harga, '0', '', '.'); ?> </td>
    <td align="center"> <?= $b->qty; ?></td>
    <td align="right"> <?= number_format($b->total, '0', '', '.'); ?></td>
    <td align="center">
        <a href="#" class="btn btn-danger btn-sm hapus" data-kodebarang="<?= $b->kode_barang; ?>"
            data-iduser="<?= $b->id_user; ?>">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <line x1="4" y1="7" x2="20" y2="7" />
                <line x1="10" y1="11" x2="10" y2="17" />
                <line x1="14" y1="11" x2="14" y2="17" />
                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
            </svg>
        </a>
    </td>
</tr>
<?php
    $no++;
} ?>
<tr>
    <th colspan="5"> GRAND TOTAL </th>
    <th class="text-right">
        <p id="grandtotal"> <?= number_format($totalpenjualan, '0', '', '.'); ?> </p>
    </th>
    <th></th>
</tr>

<script>
$(function() {
    function loaddatabarang() {
        var id_user = $("#id_user").val();
        $.ajax({
            type: 'POST',
            url: "<?= base_url(); ?>penjualan/getDataBarangTemp",
            data: {
                id_user: id_user
            },
            cache: false,
            success: function(respond) {
                $("#loaddatabarang").html(respond);
            }
        });
    }

    function loadgrandtotal() {
        var grandtotal = $("#grandtotal").text();
        $("#totalpenjualan").text(grandtotal);

    }
    loadgrandtotal();

    $(".hapus").click(function() {
        var kodebarang = $(this).attr("data-kodebarang");
        var iduser = $(this).attr("data-iduser");
        $.ajax({
            type: 'POST',
            url: '<?= base_url(); ?>penjualan/hapusBarangTemp',
            data: {
                kodebarang: kodebarang,
                iduser: iduser
            },
            cache: false,
            success: function(respond) {
                if (respond == 1) {
                    swal("Deleted", "Data berhasil dihapus", "success");
                    loaddatabarang();
                }
            }
        });
    });
});
</script>