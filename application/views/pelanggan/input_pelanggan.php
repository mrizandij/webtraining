<form action="<?= base_url('pelanggan/simpanpelanggan'); ?>" method="post" class="formPelanggan">
    <div class="mb-3 form-group">
        <input type="text" class="form-control" name="kodepelanggan" placeholder="Kode Pelanggan">
    </div>
    <div class="mb-3 form-group">
        <input type="text" class="form-control" name="namapelanggan" placeholder="Nama Pelanggan">
    </div>
    <div class="mb-3 form-group">
        <input type="text" class="form-control" name="alamatpelanggan" placeholder="Alamat Pelanggan">
    </div>
    <div class="mb-3 form-group">
        <input type="text" class="form-control" name="nohp" placeholder="No hp">
    </div>
    <div class="mb-3 form-group">
        <select name="cabang" class="form-select">
            <option value=""> Pilih Cabang </option>
            <?php
            foreach ($cabang as $c) { ?>
            <option value="<?= $c->kode_cabang ?>"> <?= $c->nama_cabang; ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary w-100"> <svg xmlns="http://www.w3.org/2000/svg" class="icon"
                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <line x1="10" y1="14" x2="21" y2="3" />
                <path d="M21 3l-6.5 18a0.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a0.55 .55 0 0 1 0 -1l18 -6.5" />
            </svg> Simpan </button>
    </div>
</form>

<!-- jquery -->
<!-- validasi -->
<script>
$(function() {
    $('.formPelanggan').bootstrapValidator({
        fields: {
            kodepelanggan: {
                message: 'Kode pelanggan tidak valid!',
                validators: {
                    notEmpty: {
                        message: ' Kode pelanggan harus diisi!'
                    }
                }
            },
            namapelanggan: {
                message: 'Nama pelanggan tidak valid!',
                validators: {
                    notEmpty: {
                        message: 'Nama pelanggan harus diisi!'
                    }
                }
            },
            alamatpelanggan: {
                message: 'Alamat pelanggan tidak valid!',
                validators: {
                    notEmpty: {
                        message: 'Alamat pelanggan harus diisi!'
                    }
                }
            },
            nohp: {
                message: 'No HP pelanggan tidak valid!',
                validators: {
                    notEmpty: {
                        message: 'No HP pelanggan harus diisi!'
                    }
                }
            },
            cabang: {
                message: 'Cabang tidak valid!',
                validators: {
                    notEmpty: {
                        message: 'Cabang harus diisi!'
                    }
                }
            },
        }
    });
});
</script>