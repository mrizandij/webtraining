<form method="POST" action="<?= base_url(); ?>penjualan/simpanbayar" id="formBayar">
    <input type="hidden" name="no_faktur" value="<?= $no_faktur; ?>">
    <div class="input-icon mb-3">
        <span class="input-icon-addon">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <rect x="4" y="5" width="16" height="16" rx="2" />
                <line x1="16" y1="3" x2="16" y2="7" />
                <line x1="8" y1="3" x2="8" y2="7" />
                <line x1="4" y1="11" x2="20" y2="11" />
                <line x1="11" y1="15" x2="12" y2="15" />
                <line x1="12" y1="15" x2="12" y2="18" />
            </svg>
        </span>
        <input type="date" class="form-control" value="<?= date("Y-m-d"); ?>" name="tglbayar" id="tglbayar"
            placeholder="Tanggal Bayar">
    </div>
    <div class="input-icon mb-3">
        <span class="input-icon-addon">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2" />
                <path d="M12 3v3m0 12v3" />
            </svg>
        </span>
        <input style="text-align:right" type="text" class="form-control" f name="jmlbayar" id="jmlbayar"
            placeholder="Jumlah Bayar">
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary align-center w-100">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <line x1="10" y1="14" x2="21" y2="3" />
                <path d="M21 3l-6.5 18a0.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a0.55 .55 0 0 1 0 -1l18 -6.5" />
            </svg>
            BAYAR
        </button>
    </div>
</form>

<script>
flatpickr(document.getElementById('tglbayar'), {});
</script>
<script>
$(function() {
    $("#formBayar").submit(function() {
        var jmlbayar = $("#jmlbayar").val();
        if (jmlbayar == "" || jmlbayar == 0) {
            swal("Ooops", "Jumlah bayar tidak boleh kosong", "warning");
            return false;
        } else {
            return true;
        }
    });
});
</script>