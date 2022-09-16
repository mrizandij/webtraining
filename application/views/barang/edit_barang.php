<form action="<?= base_url('barang/updatebarang'); ?>" method="post" class="formBarang">
    <div class="mb-3 form-group">
        <input type="text" readonly value="<?= $barang['kode_barang']; ?>" class="form-control" name="kodebarang"
            placeholder="Kode Barang">
    </div>
    <div class="mb-3 form-group">
        <input type="text" value="<?= $barang['nama_barang']; ?>" class="form-control" name="namabarang"
            placeholder="Nama Barang">
    </div>
    <div class="mb-3 form-group">
        <select name="satuan" class="form-select">
            <option value=""> -- Pilih Satuan --</option>
            <option <?php if ($barang['satuan'] == "pcs") {
                        echo "selected";
                    } ?> value="pcs"> pcs</option>
            <option <?php if ($barang['satuan'] == "unit") {
                        echo "selected";
                    } ?> value="unit"> unit </option>
        </select>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary w-100"> <svg xmlns="http://www.w3.org/2000/svg" class="icon"
                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <line x1="10" y1="14" x2="21" y2="3" />
                <path d="M21 3l-6.5 18a0.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a0.55 .55 0 0 1 0 -1l18 -6.5" />
            </svg>Update </button>
    </div>
</form>

<!-- jquery -->

<script>
$(function() {
    $('.formBarang').bootstrapValidator({
        fields: {
            kodebarang: {
                message: 'Kode barang tidak valid!',
                validators: {
                    notEmpty: {
                        message: ' Kode barang harus Diisi!'
                    }
                }
            },
            namabarang: {
                message: 'Nama barang tidak valid!',
                validators: {
                    notEmpty: {
                        message: 'Nama barang harus Diisi!'
                    }
                }
            },
            satuan: {
                message: 'Satuan tidak valid!',
                validators: {
                    notEmpty: {
                        message: 'Satuan harus Diisi!'
                    }
                }
            },
        }
    });
});
</script>