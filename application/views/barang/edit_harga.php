<form action="<?= base_url('barang/updateharga'); ?>" method="post" class="formHarga">
    <div class="mb-3 form-group">
        <input type="text" value="<?= $harga['kode_harga']; ?>" readonly class="form-control" name="kodeharga"
            id="kodeharga" placeholder="Kode Harga">
    </div>
    <div class="mb-3 form-group">
        <select disabled name="kodebarang" id="kodebarang" class="form-select">
            <option value=""> -- Pilih Barang --</option>
            <?php
            foreach ($barang as $b) { ?>
            <option <?php if ($harga['kode_barang'] == $b->kode_barang) {
                            echo "selected";
                        } ?> value="<?= $b->kode_barang; ?>">
                <?= $b->kode_barang . " - " . $b->nama_barang; ?> </option>
            <?php } ?>
        </select>
    </div>
    <div class="mb-3 form-group">
        <input type="text" value="<?= $harga['harga']; ?>" class="form-control" name="harga" id="harga"
            placeholder="Harga">
    </div>
    <div class="mb-3 form-group">
        <input type="text" value="<?= $harga['stok']; ?>" class="form-control" name="stok" id="stok" placeholder="Stok">
    </div>
    <div class="mb-3 form-group">
        <select disabled name="cabang" id="cabang" class="form-select" readonly>
            <option value=""> -- Pilih Cabang --</option>
            <?php
            foreach ($cabang as $c) { ?>
            <option <?php if ($harga['kode_cabang'] == $c->kode_cabang) {
                            echo "selected";
                        } ?> value="<?= $c->kode_cabang; ?>"> <?= $c->nama_cabang; ?> </option>
            <?php } ?>
        </select>
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-primary w-100"> <svg xmlns="http://www.w3.org/2000/svg" class="icon"
                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-li
                necap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <line x1="10" y1="14" x2="21" y2="3" />
                <path d="M21 3l-6.5 18a0.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a0.55 .55 0 0 1 0 -1l18 -6.5" />
            </svg> Update </button>
    </div>
</form>

<!-- jquery -->

<script>
$(function() {
    $('.formHarga').bootstrapValidator({
        fields: {
            kodebarang: {
                message: 'Kode barang tidak valid!',
                validators: {
                    notEmpty: {
                        message: ' Kode barang harus Diisi!'
                    }
                }
            },

            harga: {
                message: 'Harga tidak valid!',
                validators: {
                    notEmpty: {
                        message: 'Harga harus Diisi!'
                    }
                }
            },
            cabang: {
                message: 'Cabang tidak valid!',
                validators: {
                    notEmpty: {
                        message: 'Cabang harus Diisi!'
                    }
                }
            },
            stok: {
                message: 'Cabang tidak valid!',
                validators: {
                    notEmpty: {
                        message: 'Cabang harus Diisi!'
                    }
                }
            },
        }
    });

    function loadkodeharga() {
        var kodebarang = $("#kodebarang").val();
        var kodecabang = $("#cabang").val();
        var kodeharga = kodebarang + kodecabang;
        $("#kodeharga").val(kodeharga);
    }

    $("#kodebarang").change(function() {
        loadkodeharga();
    });
    $("#cabang").change(function() {
        loadkodeharga();
    });
});
</script>