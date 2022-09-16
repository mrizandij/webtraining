<h2 class="page-title">
    Data Cabang
</h2>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <a href="#" class="btn btn-success mb-3" id="tambahcabang">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <line x1="12" y1="5" x2="12" y2="19" />
                        <line x1="5" y1="12" x2="19" y2="12" />
                    </svg>
                    Tambah Data </a>
                <div class="mb-3">
                    <?= $this->session->flashdata('msg'); ?>
                </div>
                <table id="tabelcabang" class="table table-striped table-bordered text-center">
                    <thead class="text-center">
                        <tr>
                            <th> NO. </th>
                            <th> KODE CABANG </th>
                            <th> NAMA CABANG </th>
                            <th> ALAMAT CABANG </th>
                            <th> TELEPON </th>
                            <th> AKSI </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($cabang as $c) { ?>
                        <tr>
                            <td> <?= $no; ?></td>
                            <td> <?= $c->kode_cabang; ?></td>
                            <td><?= $c->nama_cabang; ?></td>
                            <td><?= $c->alamat_cabang; ?></td>
                            <td><?= $c->telepon; ?></td>

                            <td>
                                <a href="#" data-kodecabang="<?= $c->kode_cabang; ?>"
                                    class="btn btn-sm btn-primary edit text-center">
                                    edit
                                </a>
                                <a href="#" data-href="<?= base_url(); ?>cabang/hapuscabang/<?= $c->kode_cabang; ?>"
                                    class="btn btn-sm btn-danger hapus">
                                    hapus
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

<div class="modal modal-blur fade" id="modalcabang" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Input Data Cabang</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="loadforminputcabang"></div>
            </div>
        </div>
    </div>
</div>
<div class="modal modal-blur fade" id="modaleditcabang" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Cabang</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="loadformeditcabang"></div>
            </div>
        </div>
    </div>
</div>
<div class="modal modal-blur fade" id="modalhapuscabang" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-title">Anda yakin ingin menghapus cabang ?</div>
                <div>Jika dihapus, Anda akan kehilangan data ini!</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link link-secondary mr-auto" data-dismiss="modal">
                    Tidak</button>
                <a href="" id="hapuscabang" class="btn btn-danger"> Iya, hapus</a>
            </div>
        </div>
    </div>

    <script>
    // jquery
    $(function() {
        $("#tambahcabang").click(function() {
            $("#modalcabang").modal("show");
            $("#loadforminputcabang").load("<?php echo base_url(); ?>cabang/inputcabang");
        });

        $(".edit").click(function() {
            var kodecabang = $(this).attr("data-kodecabang");
            $("#modaleditcabang").modal("show");
            $("#loadformeditcabang").load("<?php echo base_url(); ?>cabang/editcabang/" +
                kodecabang);
        });

        $(".hapus").click(function() {
            var href = $(this).attr("data-href");
            $("#modalhapuscabang").modal("show");
            $("#hapuscabang").attr("href", href);
        });

        $('#tabelcabang').DataTable();
    });
    </script>