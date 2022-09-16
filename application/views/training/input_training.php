 <div>
     <?= $this->session->flashdata('msg'); ?>
 </div>

 <form id="formTraining" method="POST" action="<?= base_url(); ?>training/simpantraining">
     <input type="hidden" id="cekKaryawan">
     <div class="row">
         <div class="col-md-12">
             <div class="card">
                 <div class="card-header">
                     <h2 class="card title"> Data Training </h2>
                 </div>
                 <div class="card-body">
                     <input type="hidden" readonly name="no_training" id="no_training">
                     <div class="input-icon mb-3">
                         <span class="input-icon-addon">
                             <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                 viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                 stroke-linecap="round" stroke-linejoin="round">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                 <path d="M3 19a9 9 0 0 1 9 0a9 9 0 0 1 9 0" />
                                 <path d="M3 6a9 9 0 0 1 9 0a9 9 0 0 1 9 0" />
                                 <line x1="3" y1="6" x2="3" y2="19" />
                                 <line x1="12" y1="6" x2="12" y2="19" />
                                 <line x1="21" y1="6" x2="21" y2="19" />
                             </svg>
                         </span>
                         <input type="text" class="form-control" name="training" id="training"
                             placeholder="Judul Training" autocomplete="off">
                     </div>
                     <div class="input-icon mb-3">
                         <span class="input-icon-addon">
                             <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                 viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                 stroke-linecap="round" stroke-linejoin="round">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                 <circle cx="12" cy="7" r="4" />
                                 <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                             </svg>
                         </span>
                         <input type="text" class="form-control" name="trainer" id="trainer" placeholder="Nama Trainer"
                             autocomplete="off">
                     </div>
                     <div class="input-icon mb-3">
                         <span class="input-icon-addon">
                             <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                 viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                 stroke-linecap="round" stroke-linejoin="round">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                 <rect x="4" y="5" width="16" height="16" rx="2" />
                                 <line x1="16" y1="3" x2="16" y2="7" />
                                 <line x1="8" y1="3" x2="8" y2="7" />
                                 <line x1="4" y1="11" x2="20" y2="11" />
                                 <line x1="11" y1="15" x2="12" y2="15" />
                                 <line x1="12" y1="15" x2="12" y2="18" />
                             </svg>
                         </span>
                         <input type="text" class="form-control" value="<?= date("Y-m-d"); ?>" name="tgltraining"
                             id="tgltraining" placeholder="Tangggal Training">
                     </div>
                     <div class="col-md-12">
                         <div class="input-icon mb-3">
                             <span class="input-icon-addon">
                                 <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                     viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                     stroke-linecap="round" stroke-linejoin="round">
                                     <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                     <circle cx="12" cy="7" r="4" />
                                     <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                 </svg>
                             </span>
                             <input type="hidden" value="<?= $this->session->userdata('id_user'); ?>" name="id_user"
                                 id="id_user">
                             <input type="text" readonly value="<?= $this->session->userdata('id_user')  . " - " .
                                                                    $this->session->userdata('nama_lengkap'); ?>"
                                 class="form-control" name="username" id="username" placeholder="ID User">
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>

     <div class="row mt-3">
         <div class="col-md-12">
             <div class="card">
                 <div class="card-header">
                     <h2 class="card title"> Data Karyawan</h2>
                 </div>

                 <!-- <div class="card-body">
                     <div class="row">
                         <div class="col-md-4">
                             <div class="input-icon mb-3">
                                 <span class="input-icon-addon">
                                     <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                         viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                         stroke-linecap="round" stroke-linejoin="round">
                                         <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                         <circle cx="12" cy="7" r="4" />
                                         <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                     </svg>
                                 </span>
                                 <input type="text" readonly class="form-control" name="kodekaryawan" id="kodekaryawan"
                                     placeholder="Kode Karyawan">
                             </div>
                         </div>

                         <div class="col-md-4">
                             <div class="input-icon mb-3">
                                 <span class="input-icon-addon">
                                     <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                         viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                         stroke-linecap="round" stroke-linejoin="round">
                                         <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                         <circle cx="12" cy="7" r="4" />
                                         <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                     </svg>
                                 </span>
                                 <input type="text" readonly class="form-control" name="namakaryawan" id="namakaryawan"
                                     placeholder="Nama Karyawan">
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="input-icon mb-3">
                                 <span class="input-icon-addon">
                                     <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                         viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                         stroke-linecap="round" stroke-linejoin="round">
                                         <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                         <rect x="4" y="4" width="6" height="6" rx=" 1" />
                                         <rect x="14" y="4" width="6" height="6" rx="1" />
                                         <rect x="4" y="14" width="6" height="6" rx="1" />
                                         <rect x="14" y="14" width="6" height="6" rx="1" />
                                     </svg>
                                 </span>
                                 <input type="text" readonly class="form-control" name="jabatan" id="jabatan"
                                     placeholder="Jabatan">
                             </div>
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-md-4">
                             <div class="input-icon mb-3">
                                 <span class="input-icon-addon">
                                     <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                         viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                         stroke-linecap="round" stroke-linejoin="round">
                                         <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                         <rect x="4" y="4" width="6" height="6" rx=" 1" />
                                         <rect x="14" y="4" width="6" height="6" rx="1" />
                                         <rect x="4" y="14" width="6" height="6" rx="1" />
                                         <rect x="14" y="14" width="6" height="6" rx="1" />
                                     </svg>
                                 </span>
                                 <input type="text" readonly class="form-control" name="departement" id="departement"
                                     placeholder="Departement">
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="input-icon mb-3">
                                 <span class="input-icon-addon">
                                     <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                         viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                         stroke-linecap="round" stroke-linejoin="round">
                                         <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                         <rect x="3" y="5" width="18" height="14" rx="2" />
                                         <polyline points="3 7 12 13 21 7" />
                                     </svg>
                                 </span>
                                 <input type="text" readonly class="form-control" name="email" id="email"
                                     placeholder="Email">
                             </div>
                         </div>

                         <div class="col-md-4">
                             <div class="input-icon mb-3">
                                 <select name="ket" id="ket" class="form-select">
                                     <option value="">Pilih Keterangan </option>
                                     <option value="lulus"> Lulus </option>
                                     <option value="tidak lulus"> Tidak Lulus</option>
                                 </select>
                             </div>
                         </div>

                     </div>
                     <div class="col-md-12 mb-4">
                         <a href="#" id="tambahkaryawan" class="btn btn-secondary w-100">
                             Kirim Data
                         </a>
                     </div> -->

                 <div class="card">
                     <table id="karyawan_info_table" class="table table-bordered">
                         <thead>
                             <tr>
                                 <th> NAMA KARYAWAN </th>
                                 <th> JABATAN </th>
                                 <th> DEPARTEMENT </th>
                                 <th> EMAIL </th>
                                 <th> KETERANGAN </th>
                                 <th>
                                     <button type="button" id="add_row" class="btn btn-primary btn-sm">
                                         <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                             viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                             stroke-linecap="round" stroke-linejoin="round">
                                             <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                             <line x1="12" y1="5" x2="12" y2="19" />
                                             <line x1="5" y1="12" x2="19" y2="12" />
                                         </svg>
                                     </button>
                                 </th>
                             </tr>
                         </thead>
                         <tbody>
                             <tr id="row_1">
                                 <td>
                                     <select class="form-control select_group product" data-row-id="row_1"
                                         id="karyawan_1" name="karyawan[]" style="width:100%;"
                                         onchange="getProductData()" required>
                                         <option value=""> </option>
                                         <?php foreach ($karyawan as $k => $v) : ?>
                                         <option value="<?= $v['kode_karyawan']; ?>">
                                             <?= $v['nama']; ?>
                                         </option>
                                         <?php endforeach; ?>
                                     </select>
                                 </td>
                                 <td>
                                     <input type="text" name="jabatan[]" id="jabatan_1" class="form-control" disabled
                                         autocomplete="off">
                                     <input type="hidden" name="jabatan_value[]" id="jabatan_value_1"
                                         class="form-control" autocomplete="off">
                                 </td>
                                 <td>
                                     <input type="text" name="departement[]" id="departement_1" class="form-control"
                                         disabled autocomplete="off">
                                     <input type="hidden" name="departement_value[]" id="departement_value_1"
                                         class="form-control" autocomplete="off">
                                 </td>
                                 <td>
                                     <input type="text" name="email[]" id="email_1" class="form-control" disabled
                                         autocomplete="off">
                                     <input type="hidden" name="email_value[]" id="email_value_1" class="form-control"
                                         autocomplete="off">
                                 </td>
                                 <td>
                                     <select name="ket[]" id="ket_1" class="form-select" required onkeyup="getTotal(1)">
                                         <option value=""></option>
                                         <option value=" lulus"> Lulus </option>
                                         <option value="tidak lulus"> Tidak Lulus</option>
                                     </select>
                                 </td>
                                 <td>
                                     <button type="button" class="btn btn-danger btn-sm" onclick="removeRow('1')">
                                         <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                             viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                             stroke-linecap="round" stroke-linejoin="round">
                                             <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                             <line x1="4" y1="7" x2="20" y2="7" />
                                             <line x1="10" y1="11" x2="10" y2="17" />
                                             <line x1="14" y1="11" x2="14" y2="17" />
                                             <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                             <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                         </svg>
                                     </button>
                                 </td>
                             </tr>
                         </tbody>
                     </table>
                 </div>
                 <div class="row">
                     <button type="submit" class="btn btn-primary w-100">
                         Simpan Data
                     </button>
                 </div>
 </form>

 <script type="text/javascript">
var base_url = "<?= base_url(); ?>";

document.addEventListener("DOMContentLoaded", function() {
    flatpickr(document.getElementById('tgltraining'), {});
});
$("#tabeldatakaryawan").DataTable();
 </script>

 <script>
$(document).ready(function() {
            $(".select_group").select2();
            // $("#description").wysihtml5();

            $("#mainOrdersNav").addClass('active');
            $("#addOrderNav").addClass('active');

            var btnCust = '<button type="button" class="btn btn-secondary" title="Add picture tags" ' +
                ' onclick="alert(\'Call your custom code here.\')">' +
                '<i class="glyphicon glyphicon-tag"></i>' +
                '</button>';

            // Add new row in the table
            $("#add_row").unbind('click').bind('click', function() {
                var table = $("#karyawan_info_table");
                var count_table_tbody_tr = $("#karyawan_info_table tbody tr").length;
                var row_id = count_table_tbody_tr + 1;

                $.ajax({
                    url: base_url + "training/getTableKaryawanRow",
                    type: 'post',
                    dataType: 'json',
                    success: function(response) {

                        // console.log(reponse.x);
                        var html = '<tr id="row_' + row_id + '">' +
                            '<td>' +
                            '<select class="form-control select_group product" data-row-id="' +
                            row_id + '" id="karyawan_' + row_id +
                            '" name="karyawan[]" style="width:100%;" onchange="getProductData(' +
                            row_id + ')">' +
                            '<option value=""></option>';
                        $.each(response, function(index, value) {
                            html += '<option value="' + value.id + '">' + value.name +
                                '</option>';
                        });

                        html += '</select>' +
                            '</td>' +
                            '<td> <input type="text" name="jabatan[]" id="jabatan_' + row_id +
                            '" class="form-control" disabled><input type="hidden" name="jabatan_value[]" id="jabatan_value_' +
                            row_id + '" class="form-control"> </td>' +
                            '<td><input type="text" name="amount[]" id="amount_' + row_id +
                            '" class="form-control" disabled><input type="hidden" name="amount_value[]" id="amount_value_' +
                            row_id + '" class="form-control"></td>' +
                            '<td><button type="button" class="btn btn-danger btn-sm" onclick="removeRow(\'' +
                            row_id + '\')"><i class="fa fa-close"></i></button></td>' +
                            '</tr>';

                        if (count_table_tbody_tr >= 1) {
                            $("#karyawan_info_table tbody tr:last").after(html);
                        } else {
                            $("#karyawan_info_table tbody").html(html);
                        }

                        $(".karyawan").select2();

                    }
                });

                return false;
            });


            function getProductData(row_id) {
                debugger;
                alert('test');
                // var karyawan_id = $("#karyawan_" + row_id).val();
                // if (karyawan_id == "") {
                //     $("#jabatan_" + row_id).val("");
                //     $("#jabatan_value_" + row_id).val("");

                //     // $("#karyawan_" + row_id).val("");

                //     // $("#amount_" + row_id).val("");
                //     // $("#amount_value_" + row_id).val("");

                // } else {
                //     $.ajax({
                //         url: base_url + "training/getKaryawanValueByKode",
                //         type: 'post',
                //         data: {
                //             karyawan_id: karyawan_id
                //         },
                //         dataType: 'json',
                //         success: function(response) {
                //             // setting the rate value into the rate input field

                //             $("#jabatan_" + row_id).val();
                //             $("#jabatan_value_" + row_id).val();

                //             // $("#karyawan_" + row_id).val();
                //             // $("#karyawan_value_" + row_id).val();

                //             // var total = Number(response.price) * 1;
                //             // total = total.toFixed(2);
                //             // $("#amount_" + row_id).val(total);
                //             // $("#amount_value_" + row_id).val(total);                            
                //         } // /success
                //     }); // /ajax function to fetch the product data
                // }
            }

            function removeRow(tr_id) {
                $("#karyawan_info_table tbody tr#row_" + tr_id).remove();
            }
 </script>
 <script>

 </script>