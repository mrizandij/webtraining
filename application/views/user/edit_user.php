<form action="<?= base_url('user/updateUser'); ?>" method="post" class="formUser">
    <div class="mb-3 form-group">
        <input type="text" readonly value="<?= $user['id_user']; ?>" class="form-control" name="iduser"
            placeholder="ID User">
    </div>
    <div class="mb-3 form-group">
        <input type="text" value="<?= $user['nama_lengkap']; ?>" class="form-control" name="namalengkap"
            placeholder="Nama Lengkap">
    </div>
    <div class="mb-3 form-group">
        <input type="text" value="<?= $user['no_hp']; ?>" class="form-control" name="telepon" placeholder="Telepon">
    </div>
    <div class="mb-3 form-group">
        <input type="text" value="<?= $user['username']; ?>" class="form-control" name="username"
            placeholder="Username">
    </div>
    <div class="mb-3 form-group">
        <input type="text" value="<?= $user['password']; ?>" class="form-control" name="password"
            placeholder="Password">
    </div>
    <div class="mb-3 form-group">
        <input type="text" value="<?= $user['level']; ?>" class="form-control" name="level" placeholder="Level">
    </div>
    <div class="mb-3 form-group">
        <input type="text" value="<?= $user['kode_cabang']; ?>" class="form-control" name="kodecabang"
            placeholder="Kode Cabang">
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
    $('.formUser').bootstrapValidator({
        fields: {
            iduser: {
                message: 'ID user tidak valid!',
                validators: {
                    notEmpty: {
                        message: ' Nama training harus Diisi!'
                    }
                }
            },
            namalengkap: {
                message: 'Nama lengkap tidak valid!',
                validators: {
                    notEmpty: {
                        message: 'Nama lengkap harus Diisi!'
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
            username: {
                message: 'Username tidak valid!',
                validators: {
                    notEmpty: {
                        message: 'Username harus Diisi!'
                    }
                }
            },
            password: {
                message: 'Password  tidak valid!',
                validators: {
                    notEmpty: {
                        message: 'Password harus Diisi!'
                    }
                }
            },
            level: {
                message: 'Level tidak valid!',
                validators: {
                    notEmpty: {
                        message: 'Level harus Diisi!'
                    }
                }
            },
            kodecabang: {
                message: 'Kode cabang tidak valid!',
                validators: {
                    notEmpty: {
                        message: 'Kode cabang harus Diisi!'
                    }
                }
            },
        }
    });
});
</script>