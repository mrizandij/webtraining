<form action="<?= base_url('karyawan/updatekaryawan'); ?>" method="post" class="formKaryawan">
    <div class="mb-3 form-group">
        <input type="text" readonly value="<?= $karyawan['kode_karyawan']; ?>" class="form-control" name="kode_karyawan"
            placeholder="Kode Karyawan" autocomplete="off">
    </div>
    <div class="mb-3 form-group">
        <input type="text" value="<?= $karyawan['nama']; ?>" class="form-control" name="nama"
            placeholder="Nama Karyawan" autocomplete="off">
    </div>
    <div class="mb-3 form-group">
        <input type="text" value="<?= $karyawan['ttl']; ?>" class="form-control" name="ttl" placeholder="Tanggal Lahir"
            autocomplete="off">
    </div>
    <div class="mb-3 form-group">
        <input type="text" value="<?= $karyawan['alamat']; ?>" class="form-control" name="alamat"
            placeholder="Alamat Karyawan" autocomplete="off">
    </div>
    <div class="mb-3 form-group">
        <input type="text" value="<?= $karyawan['jabatan']; ?>" class="form-control" name="jabatan"
            placeholder="jabatan Karyawan" autocomplete="off">
    </div>
    <div class="mb-3 form-group">
        <input type="text" value="<?= $karyawan['departement']; ?>" class="form-control" name="departement"
            placeholder="departement Karyawan" autocomplete="off">
    </div>
    <div class="mb-3 form-group">
        <input type="text" value="<?= $karyawan['telepon']; ?>" class="form-control" name="telepon"
            placeholder="telepon Karyawan" autocomplete="off">
    </div>
    <div class="mb-3 form-group">
        <input type="text" value="<?= $karyawan['email']; ?>" class="form-control" name="email"
            placeholder="email Karyawan" autocomplete="off">
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
    $('.formKaryawan').bootstrapValidator({
        fields: {
            nama: {
                message: 'Nama karyawan tidak valid!',
                validators: {
                    notEmpty: {
                        message: ' Haiii, Nama karyawan harus diisi yaa!'
                    }
                }
            },
            ttl: {
                message: 'Tanggal lahir tidak valid!',
                validators: {
                    notEmpty: {
                        message: 'Haiii, Tanggal lahir harus diisi yaa!'
                    }
                }
            },
            alamat: {
                message: 'Alamat tidak valid!',
                validators: {
                    notEmpty: {
                        message: 'Haiii, Alamat harus diisi yaa!'
                    }
                }
            },
            jabatan: {
                message: 'Jabatan tidak valid!',
                validators: {
                    notEmpty: {
                        message: 'Haiii, Jabatan harus di isi yaa!'
                    }
                }
            },
            departement: {
                message: 'Departement tidak valid!',
                validators: {
                    notEmpty: {
                        message: 'Haiii, Departement harus di isi yaa!'
                    }
                }
            },
            telepon: {
                tessage: 'Telepon tidak valid!',
                validators: {
                    notEmpty: {
                        tessage: 'Haiii, Telepon harus di isi yaa!'
                    }
                }
            },
            email: {
                message: 'Email tidak valid!',
                validators: {
                    notEmpty: {
                        message: 'Haiii, Email harus di isi yaa!'
                    }
                }
            },
        }
    });
});
</script>