<form action="<?= base_url('karyawan/simpankaryawan'); ?>" method="post" class="formKaryawan"
    enctype="multipart/form-data">
    <div class="mb-3 form-group">
        <input type="text" class="form-control" name="nama" placeholder="Nama Karyawan" autocomplete="off">
    </div>
    <div class="mb-3 form-group">
        <input type="text" class="form-control" value="<?= $kode_karyawan; ?>" name="kode_karyawan" readonly
            placeholder="Kode Karyawan">
    </div>
    <div class="mb-3 form-group">
        <input type="text" class="form-control" name="ttl" placeholder="Tempat Tanggal Lahir" autocomplete="off">
    </div>
    <div class="mb-3 form-group">
        <input type="text" class="form-control" name="alamat" placeholder="Alamat" autocomplete="off">
    </div>
    <div class="mb-3 form-group">
        <input type="text" class="form-control" name="jabatan" placeholder="Jabatan" autocomplete="off">
    </div>
    <div class="mb-3 form-group">
        <input type="text" class="form-control" name="departement" placeholder="Departement" autocomplete="off">
    </div>
    <div class="mb-3 form-group">
        <input type="text" class="form-control" name="telepon" placeholder="Telepon" autocomplete="off">
    </div>
    <div class="mb-3 form-group">
        <input type="text" class="form-control" name="email" placeholder="Email" autocomplete="off">
    </div>
    <!-- <div class="mb-3 form-group">
        <input type="date" class="form-control" name="tglreg" placeholder="Tanggal Regist">
    </div> -->

    <!-- <div class="mb-3 form-group">
        <input type="file" class="form-control" name="file" id="file">
    </div> -->
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



<script>

</script>
<!-- jquery -->


<script>
$(function() {
    $('.formKaryawan').bootstrapValidator({
        fields: {
            nama: {
                message: 'Nama Karyawan tidak valid!',
                validators: {
                    notEmpty: {
                        message: ' Nama Karyawan harus Diisi!'
                    }
                }
            },
            ttl: {
                message: 'Tanggal Lahir tidak valid!',
                validators: {
                    notEmpty: {
                        message: 'Tanggal Lahir harus Diisi!'
                    }
                }
            },
            alamat: {
                message: 'Alamat tidak valid!',
                validators: {
                    notEmpty: {
                        message: 'Alamat harus Diisi!'
                    }
                }
            },
            jabatan: {
                message: 'Jabatan tidak valid!',
                validators: {
                    notEmpty: {
                        message: 'Jabatan harus Diisi!'
                    }
                }
            },
            departement: {
                message: 'Departement tidak valid!',
                validators: {
                    notEmpty: {
                        message: 'Departement harus Diisi!'
                    }
                }
            },
            telepon: {
                message: 'Telepon tidak valid!',
                validators: {
                    notEmpty: {
                        message: 'Telepon harus Diisi!'
                    }
                }
            },
            email: {
                message: 'Email tidak valid!',
                validators: {
                    notEmpty: {
                        message: 'Email harus Diisi!'
                    }
                }
            },
            file: {
                message: 'Photo tidak valid!',
                validators: {
                    notEmpty: {
                        message: 'Photo harus Diisi!'
                    }
                }
            },
        }
    });
});
</script>