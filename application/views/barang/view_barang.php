<h2 class="page-title">
    Data Barang

</h2>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <a href="#" class="btn btn-success mb-3" id="tambahbarang">
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
                <table id="tabelbarang" class="table table-striped table-bordered text-center">
                    <thead class="text-center">
                        <tr>
                            <th> NO. </th>
                            <th> KODE BARANG</th>
                            <th> NAMA BARANG</th>
                            <th> SATUAN</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($barang as $b) { ?>
                        <tr>
                            <td> <?= $no; ?></td>
                            <td> <?= $b->kode_barang; ?></td>
                            <td><?= $b->nama_barang; ?></td>
                            <td><?= $b->satuan; ?></td>
                            <td>
                                <a href="#" data-kodebarang="<?= $b->kode_barang; ?>"
                                    class="btn btn-sm btn-primary edit text-center">
                                    edit
                                </a>
                                <a href="#" data-href="<?= base_url(); ?>barang/hapusbarang/<?= $b->kode_barang; ?>"
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

<div class="modal modal-blur fade" id="modalbarang" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Input Data Barang</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="loadforminputbarang"></div>
            </div>
        </div>
    </div>
</div>

<div class="modal modal-blur fade" id="modaleditbarang" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Barang</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="loadformeditbarang"></div>
            </div>
        </div>
    </div>
</div>
<div class="modal modal-blur fade" id="modalhapusbarang" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-title">Anda yakin ingin menghapus data ?</div>
                <div>Jika dihapus, Anda akan kehilangan data ini!</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link link-secondary mr-auto" data-dismiss="modal"> Tidak</button>
                <a href="" id="hapusbarang" class="btn btn-danger"> Iya, hapus</a>
            </div>
        </div>
    </div>

    <script>
    // jquery
    $(function() {
        $("#tambahbarang").click(function() {
            $("#modalbarang").modal("show");
            $("#loadforminputbarang").load("<?php echo base_url(); ?>barang/inputbarang");
        });

        $(".edit").click(function() {
            var kodebarang = $(this).attr("data-kodebarang");
            $("#modaleditbarang").modal("show");
            $("#loadformeditbarang").load("<?php echo base_url(); ?>barang/editbarang/" + kodebarang);
        });

        $(".hapus").click(function() {
            var href = $(this).attr("data-href");
            $("#modalhapusbarang").modal("show");
            $("#hapusbarang").attr("href", href);
        });

        $('#tabelbarang').DataTable();
    });
    </script>