<h2 class="page-title">
    Data User
</h2>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <a href="#" class="btn btn-success mb-3" id="tambahuser">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <line x1="12" y1="5" x2="12" y2="19" />
                        <line x1="5" y1="12" x2="19" y2="12" />
                    </svg>
                    Tambah User </a>
                <div class="mb-3">
                    <?= $this->session->flashdata('msg'); ?>
                </div>
                <table id="tabeltuser" class="table table-striped table-bordered text-center">
                    <thead class="text-center">
                        <tr>
                            <th> NO. </th>
                            <th> ID USER </th>
                            <th> NAMA_LENGKAP </th>
                            <th> TELEPON </th>
                            <th> USERNAME </th>
                            <th> PASSWORD </th>
                            <th> LEVEL </th>
                            <th> KODE CABANG </th>
                            <th> AKSI </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($user as $u) { ?>
                        <tr>
                            <td> <?= $no; ?></td>
                            <td> <?= $u->id_user; ?></td>
                            <td> <?= $u->nama_lengkap; ?></td>
                            <td> <?= $u->no_hp; ?></td>
                            <td> <?= $u->username; ?></td>
                            <td> - </td>
                            <td> <?= $u->level; ?></td>
                            <td> <?= $u->kode_cabang; ?></td>
                            <td>
                                <a href="#" data-kodeuser="<?= $u->id_user; ?>"
                                    class="btn btn-sm btn-primary edit text-center">
                                    edit
                                </a>
                                <a href="#" data-href="<?= base_url(); ?>user/hapususer/<?= $u->id_user; ?>"
                                    class="btn btn-sm btn-danger hapus center"> hapus
                                </a>
                            </td>
                        </tr>
                        <?php
                            $no++;
                        } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>

<div class="modal modal-blur fade" id="modaluser" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Input Data User </h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="loadforminputuser"></div>
            </div>
        </div>
    </div>
</div>

<div class="modal modal-blur fade" id="modaledituser" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit User </h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="loadformedituser"></div>
            </div>
        </div>
    </div>
</div>
<div class="modal modal-blur fade" id="modalhapususer" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-title">Anda yakin ingin menghapus data training ?</div>
                <div>Jika dihapus, Anda akan kehilangan data ini!</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link link-secondary mr-auto" data-dismiss="modal"> Tidak</button>
                <a href="" id="hapususer" class="btn btn-danger"> Iya, hapus</a>
            </div>
        </div>
    </div>

    <script>
    // jquery
    $(function() {
        $("#tambahuser").click(function() {
            $("#modaluser").modal("show");
            $("#loadforminputuser").load("<?= base_url(); ?>user/inputuser");
        });

        $(".edit").click(function() {
            var kodeuser = $(this).attr("data-kodeuser");
            $("#modaledituser").modal("show");
            $("#loadformedituser").load("<?= base_url(); ?>user/edituser/" +
                kodeuser);
        });

        $(".hapus").click(function() {
            var href = $(this).attr("data-href");
            $("#modalhapususer").modal("show");
            $("#hapususer").attr("href", href);
        });

        $('#tabeluser').DataTable();
    });
    </script>