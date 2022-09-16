<form action="<?= base_url('cabang/updatecabang'); ?>" method="post" class="formCabang">
    <div class="mb-3 form-group">
        <input type="text" readonly value="<?= $cabang['kode_cabang']; ?>" class="form-control" name="kodecabang"
            placeholder="Kode Pelanggan">
    </div>
    <div class="mb-3 form-group">
        <input type="text" value="<?= $cabang['nama_cabang']; ?>" class="form-control" name="namacabang"
            placeholder="Nama Pelanggan">
    </div>
    <div class="mb-3 form-group">
        <input type="text" value="<?= $cabang['alamat_cabang']; ?>" class="form-control" name="alamatcabang"
            placeholder="Alamat Pelanggan">
    </div>
    <div class="mb-3 form-group">
        <input type="text" value="<?= $cabang['telepon']; ?>" class="form-control" name="telepon" placeholder="telepon">
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary w-100"> <svg xmlns="http://www.w3.org/2000/svg" class="icon"
                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <line x1="10" y1="14" x2="21" y2="3" />
                <path d="M21 3l-6.5 18a0.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a0.55 .55 0 0 1 0 -1l18 -6.5" />
            </svg> Update </button>
    </div>
</form>

<!-- jquery -->
<!-- validasi -->
<script>
$(function() {
    $('.formCabang').bootstrapValidator({
        fields: {
            kodecabang: {
                message: 'Kode pelanggan tidak valid!',
                validators: {
                    notEmpty: {
                        message: ' Kode pelanggan harus diisi!'
                    }
                }
            },
            namacabang: {
                message: 'Nama pelanggan tidak valid!',
                validators: {
                    notEmpty: {
                        message: 'Nama pelanggan harus diisi!'
                    }
                }
            },
            alamatcabang: {
                message: 'Alamat pelanggan tidak valid!',
                validators: {
                    notEmpty: {
                        message: 'Alamat pelanggan harus diisi!'
                    }
                }
            },
            telepon: {
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