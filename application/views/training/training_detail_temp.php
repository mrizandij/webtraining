    <?php
    $no = 1;
    foreach ($karyawantemp as $b) {
    ?>
    <tr>
        <td align="center"> <?= $no; ?></td>
        <td align="center"> <?= $b->kode_karyawan; ?></td>
        <td align="center"> <?= $b->nama; ?></td>
        <td align="center"> <?= $b->jabatan; ?></td>
        <td align="center"> <?= $b->departement; ?></td>
        <td align="center"> <?= $b->email; ?></td>
        <td align="center"> <?= $b->ket; ?></td>
        <td align="center">
            <a href="#" class="btn btn-danger btn-sm hapus" data-kodekaryawan="<?= $b->kode_karyawan; ?>"
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
    </div>
    <tr>
        <th colspan="7"> <b>TOTAL KARYAWAN </b> </th>
        <th class="text-center">
        </th>
    </tr>

    <script>
$(function() {
    function loaddatakaryawan() {
        var id_user = $("#id_user").val();
        $.ajax({
            type: 'POST',
            url: "<?= base_url(); ?>training/getDataKaryawanTemp",
            data: {
                id_user: id_user
            },
            cache: false,
            success: function(respond) {
                $("#loaddatakaryawan").html(respond);
            }
        });
    }

    $(".hapus").click(function() {
        var kodekaryawan = $(this).attr("data-kodekaryawan");
        var iduser = $(this).attr("data-iduser");
        $.ajax({
            type: 'POST',
            url: '<?= base_url(); ?>training/hapusKaryawanTemp',
            data: {
                kodekaryawan: kodekaryawan,
                iduser: iduser
            },
            cache: false,
            success: function(respond) {
                if (respond == 1) {
                    swal("Deleted", "Data berhasil dihapus", "success");
                    loaddatakaryawan();
                }
            }
        });
    });
});
    </script>