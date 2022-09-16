<h2 class="page-title">
    Data Karyawan

</h2>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <a href="#" class="btn btn-success mb-3" id="tambahkaryawan">
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
                <table id="tabelkaryawan" class="table table-striped table-bordered text-center">
                    <thead class="text-center">
                        <tr>
                            <th> NO. </th>
                            <th> KODE KARYAWAN </th>
                            <th> NAMA KARYAWAN </th>
                            <th> TEMPAT TANGGAL LAHIR </th>
                            <th> ALAMAT </th>
                            <th> JABATAN </th>
                            <th> DEPARTEMEN </th>
                            <th> TELEPON </th>
                            <th> EMAIL </th>
                            <th> AKSI </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $num = 1;
                        foreach ($karyawan as $k) { ?>
                        <tr>
                            <td> <?= $num; ?></td>
                            <td> <?= $k->kode_karyawan; ?></td>
                            <td> <?= $k->nama; ?></td>
                            <td> <?= $k->ttl; ?></td>
                            <td> <?= $k->alamat; ?></td>
                            <td> <?= $k->jabatan; ?></td>
                            <td> <?= $k->departement; ?></td>
                            <td> <?= $k->telepon; ?></td>
                            <td> <?= $k->email; ?></td>
                            <!-- <td> <img src="<?= base_url("assets/file/$file"); ?>"></td> -->
                            <td>
                                <!-- <a href="#" data-nokaryawan="<?= $k->kode_karyawan; ?>" class="btn btn-sm btn-succes text-center">
                                    detail
                                </a> -->
                                <a href="#" data-kodekaryawan="<?= $k->kode_karyawan; ?>"
                                    class="btn btn-sm btn-primary edit text-center">
                                    edit
                                </a>
                                <a href="#"
                                    data-href="<?= base_url(); ?>karyawan/hapuskaryawan/<?= $k->kode_karyawan; ?>"
                                    class="btn btn-sm btn-danger hapus">
                                    hapus
                                </a>
                            </td>
                        </tr>
                        <?php
                            $num++;
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>

<div class="modal modal-blur fade" id="modalkaryawan" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Input Data Karyawan</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="loadforminputkaryawan"></div>
            </div>
        </div>
    </div>
</div>

<div class="modal modal-blur fade" id="modaleditkaryawan" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Karyawan</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="loadformeditkaryawan"></div>
            </div>
        </div>
    </div>
</div>
<div class="modal modal-blur fade" id="modalhapuskaryawan" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-title">Anda yakin ingin menghapus data ?</div>
                <div>Jika dihapus, Anda akan kehilangan data ini!</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link link-secondary mr-auto" data-dismiss="modal"> Tidak</button>
                <a href="" id="hapuskaryawan" class="btn btn-danger"> Iya, hapus</a>
            </div>
        </div>
    </div>

    <script>
    // jquery
    $(function() {
        $("#tambahkaryawan").click(function() {
            $("#modalkaryawan").modal("show");
            $("#loadforminputkaryawan").load("<?php echo base_url(); ?>karyawan/inputkaryawan");
        });

        $(".edit").click(function() {
            var kodekaryawan = $(this).attr("data-kodekaryawan");
            $("#modaleditkaryawan").modal("show");
            $("#loadformeditkaryawan").load("<?php echo base_url(); ?>karyawan/editkaryawan/" +
                kodekaryawan);
        });

        $(".hapus").click(function() {
            var href = $(this).attr("data-href");
            $("#modalhapuskaryawan").modal("show");
            $("#hapuskaryawan").attr("href", href);
        });

        $('#tabelkaryawan').DataTable();
    });
    </script>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        flatpickr(document.getElementById('dari'), {});
        flatpickr(document.getElementById('sampai'), {});
    });
    </script>