<h2 class="page-title">
    Data Harga

</h2>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <a href="#" class="btn btn-success mb-3" id="tambahharga">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <line x1="12" y1="5" x2="12" y2="19" />
                        <line x1="5" y1="12" x2="19" y2="12" />
                    </svg>
                    Tambah Harga </a>
                <div class="mb-3">
                    <?= $this->session->flashdata('msg'); ?>
                </div>
                <table id="tabelharga" class="table table-striped table-bordered text-center">
                    <thead class="text-center">
                        <tr>
                            <th> NO. </th>
                            <th> KODE HARGA</th>
                            <th> KODE BARANG</th>
                            <th> NAMA BARANG</th>
                            <th> SATUAN</th>
                            <th> HARGA</th>
                            <th> STOK</th>
                            <th> CABANG</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($harga as $h) { ?>
                        <tr>
                            <td> <?= $no; ?></td>
                            <td> <?= $h->kode_harga; ?> </td>
                            <td> <?= $h->kode_barang; ?> </td>
                            <td> <?= $h->nama_barang; ?> </td>
                            <td> <?= $h->satuan; ?> </td>
                            <td class="text-right"> <?= number_format($h->harga, '0', '', '.'); ?> </td>
                            <td> <?= $h->stok; ?> </td>
                            <td> <?= $h->kode_cabang; ?> </td>
                            <td>
                                <a href="#" data-kodeharga="<?= $h->kode_harga; ?>"
                                    class="btn btn-sm btn-primary edit text-center">
                                    edit
                                </a>
                                <a href="#" data-href="<?= base_url(); ?>barang/hapusharga/<?= $h->kode_harga; ?>"
                                    class="btn btn-sm btn-danger hapus">
                                    hapus
                                </a>
                            </td>

                        </tr>

                        <?php $no++;
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>

<div class="modal modal-blur fade" id="modalharga" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Input Data Harga</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="loadforminputharga"></div>
            </div>
        </div>
    </div>
</div>

<div class="modal modal-blur fade" id="modaleditharga" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Harga</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="loadformeditharga"></div>
            </div>
        </div>
    </div>
</div>
<div class="modal modal-blur fade" id="modalhapusharga" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-title">Anda yakin ingin menghapus data ?</div>
                <div>Jika dihapus, Anda akan kehilangan data ini!</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link link-secondary mr-auto" data-dismiss="modal"> Tidak</button>
                <a href="" id="hapusharga" class="btn btn-danger"> Iya, hapus</a>
            </div>
        </div>
    </div>

    <script>
    // jquery
    $(function() {
        $("#tambahharga").click(function() {
            $("#modalharga").modal("show");
            $("#loadforminputharga").load("<?php echo base_url(); ?>barang/inputharga");
        });

        $(".edit").click(function() {
            var kodeharga = $(this).attr("data-kodeharga");
            $("#modaleditharga").modal("show");
            $("#loadformeditharga").load("<?php echo base_url(); ?>barang/editharga/" + kodeharga);
        });

        $(".hapus").click(function() {
            var href = $(this).attr("data-href");
            $("#modalhapusharga").modal("show");
            $("#hapusharga").attr("href", href);
        });

        $('#tabelharga').DataTable();
    });
    </script>