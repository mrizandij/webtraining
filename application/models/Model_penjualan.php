<?php
class Model_penjualan extends CI_Model
{
    function cekBarang()
    {
        $id_user = $this->session->userdata('id_user');
        return $this->db->get_where('penjualan_detail_temp', array('id_user' => $id_user));
    }

    function getLastFaktur($bulan, $tahun, $cabang)
    {
        $this->db->select('no_faktur');
        $this->db->from('penjualan');
        $this->db->where('kode_cabang', $cabang);
        $this->db->where('MONTH(tgltransaksi)', $bulan);
        $this->db->where('YEAR(tgltransaksi)', $tahun);
        $this->db->order_by('no_faktur', 'desc');
        $this->db->join('users', 'penjualan.id_user = users.id_user');
        $this->db->limit(1);
        return $this->db->get();
    }

    function cekBarangTemp($kode_barang, $id_user)
    {
        return $this->db->get_where('penjualan_detail_temp', array('kode_barang' => $kode_barang, 'id_user' => $id_user));
    }
    function insertBarangTemp($data)
    {
        $this->db->insert('penjualan_detail_temp', $data);
    }

    function getDataBarangTemp($id_user)
    {
        $this->db->select('penjualan_detail_temp.kode_barang,id_user,nama_barang,harga,qty, (qty * harga) as total');
        $this->db->from('penjualan_detail_temp');
        $this->db->join('barang_master', 'penjualan_detail_temp.kode_barang =  barang_master.kode_barang');
        $this->db->where('id_user', $id_user);
        return $this->db->get();
    }

    function deleteBarangTemp($kode_barang, $id_user)
    {
        $hapus = $this->db->delete('penjualan_detail_temp', array('kode_barang' => $kode_barang, 'id_user' => $id_user));
        if ($hapus) {
            return 1;
        }
    }

    function insertPenjualan($data, $no_invoice)
    {
        $simpan = $this->db->insert('penjualan', $data);
        if ($simpan) {
            $detailpenjualan = $this->db->get_where('penjualan_detail_temp', array('id_user' => $data['id_user']));
            $totalpenjualan = 0;
            $berhasil = 0;
            $error = 0;
            foreach ($detailpenjualan->result() as $d) {
                $totalpenjualan = $totalpenjualan + ($d->qty * $d->harga);
                $datadetail = array(
                    'no_faktur' => $data['no_faktur'],
                    'kode_barang' => $d->kode_barang,
                    'harga' => $d->harga,
                    'qty' => $d->qty,
                );
                $simpandetail =  $this->db->insert('penjualan_detail', $datadetail);
                if ($simpandetail) {
                    $berhasil++;
                } else {
                    $error++;
                }
            }
            if ($error > 0) {
                $hapusdetailpenjualan = $this->db->delete('penjualan_detail', array('no_faktur' => $data['no_faktur']));
                $hapusdatapenjualan = $this->db->delete('penjualan', array('no_faktur' => $data['no_faktur']));
                $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert"
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="18" y1="6" x2="6" y2="18" /><line x1="6" y1="6" x2="18" y2="18" /></svg>
                 Data Gagal Disimpan 
                </div>');
                redirect('penjualan/inputpenjualan');
            } else {
                $hapustemporary = $this->db->delete('penjualan_detail_temp', array('id_user' => $data['id_user']));
                if ($hapustemporary) {
                    if ($data['jenistransaksi'] == "tunai") {
                        // $tahun = date('Y');
                        // $thn = substr($tahun, 2, 2);
                        // $getLastNobukti = $this->db->query("SELECT nobukti FROM historibayar WHERE YEAR(tglbayar) = '$tahun' ")->row_array();
                        // $nomorterakhir = $getLastNobukti['nobukti'];
                        // $nobukti = buatkode($nomorterakhir, $thn, 6);
                        // $databayar = array(
                        //     'nobukti' => $nobukti,
                        //     'no_faktur' => $data['no_faktur'],
                        //     'tglbayar' => $data['tgltransaksi'],
                        //     'bayar' => $totalpenjualan,
                        //     'id_user' => $data['id_user']
                        // );
                        // $bayar = $this->db->insert('historibayar', $databayar);

                        $databayar = array(
                            'nobukti' => $no_invoice,
                            'no_faktur' => $data['no_faktur'],
                            'tglbayar' => $data['tgltransaksi'],
                            'bayar' => $totalpenjualan,
                            'id_user' => $data['id_user']
                        );
                        $bayar = $this->db->insert('histori_bayar', $databayar);
                        if ($bayar) {
                            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert"                            
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>
                             Data Berhasil Disimpan
                            </div>');
                            redirect('penjualan/inputpenjualan');
                        } else {
                            $hapusdetailpenjualan = $this->db->delete('penjualan_detail', array('no_faktur' => $data['no_faktur']));
                            $hapusdatapenjualan = $this->db->delete('penjualan', array('no_faktur' => $data['no_faktur']));
                            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert"
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="18" y1="6" x2="6" y2="18" /><line x1="6" y1="6" x2="18" y2="18" /></svg>
                             Data Gagal Disimpan 
                            </div>');
                            redirect('penjualan/inputpenjualan');
                        }
                    } else {
                        $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert"                            
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>
                         Data Berhasil Disimpan
                        </div>');
                        redirect('penjualan/inputpenjualan');
                    }
                } else {
                    $hapusdetailpenjualan = $this->db->delete('penjualan_detail', array('no_fakttur' => $data['no_faktur']));
                    $hapusdatapenjualan = $this->db->delete('penjualan', array('no_faktur' => $data['no_faktur']));
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert"
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="18" y1="6" x2="6" y2="18" /><line x1="6" y1="6" x2="18" y2="18" /></svg>
                     Data Gagal Disimpan 
                    </div>');
                    redirect('penjualan/inputpenjualan');
                }
            }
        }
    }
    function getDataPenjualan($rowno, $rowperpage, $no_faktur, $namapelanggan, $dari, $sampai)
    {
        if ($no_faktur != "") {
            $this->db->where('penjualan.no_faktur', $no_faktur);
        }
        if ($namapelanggan != "") {
            $this->db->like('nama_pelanggan', $namapelanggan);
        }
        if ($dari != "") {
            $this->db->where('tgltransaksi >', $dari);
        }
        if ($sampai != "") {
            $this->db->where('tgltransaksi <', $sampai);
        }
        $this->db->select('penjualan.no_faktur,tgltransaksi,penjualan.kode_pelanggan,nama_pelanggan,jenistransaksi,jatuhtempo,penjualan.id_user,nama_lengkap, totalbayar, totalpenjualan');
        $this->db->from('penjualan');
        $this->db->join('pelanggan', 'penjualan.kode_pelanggan = pelanggan.kode_pelanggan');
        $this->db->join('users', 'penjualan.id_user = users.id_user');
        $this->db->join('view_totalpenjualan', 'penjualan.no_faktur = view_totalpenjualan.no_faktur');
        $this->db->join('view_totalbayar', 'penjualan.no_faktur = view_totalbayar.no_faktur', 'left');
        $this->db->limit($rowperpage, $rowno);
        return $this->db->get();
    }

    function getDataPenjualanCount($no_faktur, $namapelanggan, $dari, $sampai)
    {
        if ($no_faktur != "") {
            $this->db->where('penjualan.no_faktur', $no_faktur);
        }
        if ($namapelanggan != "") {
            $this->db->like('nama_pelanggan', $namapelanggan);
        }
        if ($dari != "") {
            $this->db->where('tgltransaksi >', $dari);
        }
        if ($sampai != "") {
            $this->db->where('tgltransaksi <', $sampai);
        }
        $this->db->select('penjualan.no_faktur,tgltransaksi,penjualan.kode_pelanggan,nama_pelanggan,jenistransaksi,jatuhtempo,penjualan.id_user,nama_lengkap, totalbayar, totalpenjualan');
        $this->db->from('penjualan');
        $this->db->join('pelanggan', 'penjualan.kode_pelanggan = pelanggan.kode_pelanggan');
        $this->db->join('users', 'penjualan.id_user = users.id_user');
        $this->db->join('view_totalpenjualan', 'penjualan.no_faktur = view_totalpenjualan.no_faktur');
        $this->db->join('view_totalbayar', 'penjualan.no_faktur = view_totalbayar.no_faktur', 'left');
        return $this->db->get();
    }

    function deletePenjualan($no_faktur)
    {
        $hapus = $this->db->delete('penjualan', array('no_faktur' => $no_faktur));
        if ($hapus) {
            $hapusdetail = $this->db->delete('penjualan_detail', array('no_faktur' => $no_faktur));
            if ($hapusdetail) {
                $hapushistoribayar = $this->db->delete('historibayar', array('no_faktur' => $no_faktur));
                if ($hapushistoribayar) {
                    $this->session->set_flashdata('msg', '<div class="alert alert-success"> Data berhasil dihapus </div>');
                    $this->db->delete('penjualan_detail', array('no_faktur' => $no_faktur));
                    redirect('penjualan');
                }
            }
        }
    }

    function getPenjualan($no_faktur)
    {
        $this->db->select('penjualan.no_faktur, tgltransaksi, penjualan.kode_pelanggan, alamat_pelanggan, nama_pelanggan, jenistransaksi, jatuhtempo,penjualan.id_user,nama_lengkap as kasir');
        $this->db->from('penjualan');
        $this->db->join('pelanggan', 'penjualan.kode_pelanggan = pelanggan.kode_pelanggan');
        $this->db->join('users', 'penjualan.id_user = users.id_user');
        $this->db->where('no_faktur', $no_faktur);
        return $this->db->get();
    }

    function getDetailPenjualan($no_faktur)
    {
        $this->db->select('penjualan_detail.kode_barang, nama_barang, penjualan_detail.harga, qty, satuan');
        $this->db->from('penjualan_detail');
        $this->db->join('barang_master', 'penjualan_detail.kode_barang = barang_master.kode_barang');
        $this->db->where('no_faktur', $no_faktur);
        return $this->db->get();
    }

    function getBayar($no_faktur)
    {
        return $this->db->get_where('historibayar', array('no_faktur' => $no_faktur));
    }

    function insertBayar()
    {
        $id_user = $this->session->userdata('id_user');
        $no_faktur = $this->input->post('no_faktur');
        $tglbayar = $this->input->post('tglbayar');
        $jmlbayar = $this->input->post('jmlbayar');
        // automatic number / no bukti
        $tahun = date("Y");
        $thn = substr($tahun, 2, 2);
        $getLastNobukti = $this->db->query("SELECT nobukti FROM historibayar WHERE YEAR(tglbayar)= '$tahun' ")->row_array();
        $nomorterakhir = $getLastNobukti['nobukti'];
        $nobukti = buatkode($nomorterakhir, $thn, 6);
        $databayar = array(
            'nobukti' => $nobukti,
            'no_faktur' => $no_faktur,
            'tglbayar' => $tglbayar,
            'bayar' => $jmlbayar,
            'id_user' => $id_user
        );
        $bayar = $this->db->insert('historibayar', $databayar);
        if ($bayar) {
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert"> 
            Data Berhasil Disimpan !   </div>');
            redirect('penjualan/detailfaktur/' . $no_faktur);
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert"> 
            Data Gagal Disimpan !   </div>');
            redirect('penjualan/detailfaktur/' . $no_faktur);
        }
    }
}