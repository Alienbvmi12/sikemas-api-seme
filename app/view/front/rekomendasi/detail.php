<div class="row">
  <div class="col-md-12">
    <table class="table table-bordered table-striped">


      <tr>
        <th class="col-md-4">Id</th>
        <td class="col-md-1">:</td>
        <td><?=$crm->id?></td>
      </tr>
      <tr>
        <th class="col-md-4">Jenis</th>
        <td class="col-md-1">:</td>
        <td>
          <?php if($crm->utype == 'sumur_baru') { echo 'Pembangunan Sumur Baru'; }
          else if($crm->utype == 'perpanjangan_izin_sumur'){ echo 'Perpanjangan Izin Sumur'; }
          else if($crm->utype == 'sumur_imbuhan'){ echo 'Pembangunan Sumur Imbuhan'; }
          else if($crm->utype == 'sumur_pantau'){ echo 'Pembangunan Sumur Pantau'; }
          else if($crm->utype == 'izin_dewatering'){ echo 'Perizinan Dewatering'; }
          ?>

          <?=$crm->utype?>
        </td>
      </tr>
      <tr>
        <th class="col-md-4">cdate</th>
        <td class="col-md-1">:</td>
        <td><?=$crm->cdate?></td>
      </tr>


      <tr>
        <th class="col-md-4">b_user_id</th>
        <td class="col-md-1">:</td>
        <td><?=$crm->b_user_id?></td>
      </tr>

      <tr>
        <th class="col-md-4">Nama Perusahaan</th>
        <td class="col-md-1">:</td>
        <td><?=$crm->nama_perusahaan?></td>
      </tr>

      <tr>
        <th class="col-md-4">NPWP</th>
        <td class="col-md-1">:</td>
        <td><?=$crm->npwp?></td>
      </tr>

      <tr>
        <th class="col-md-4">Alamat</th>
        <td class="col-md-1">:</td>
        <td><?=$crm->alamat?></td>
      </tr>

      <tr>
        <th class="col-md-4">Email</th>
        <td class="col-md-1">:</td>
        <td><?=$crm->email?></td>
      </tr>

      <tr>
        <th class="col-md-4">Nama Direktur</th>
        <td class="col-md-1">:</td>
        <td><?=$crm->nama_direktur?></td>
      </tr>

      <tr>
        <th class="col-md-4">NPWP2</th>
        <td class="col-md-1">:</td>
        <td><?=$crm->npwp2?></td>
      </tr>

      <tr>
        <th class="col-md-4">Nama Cp</th>
        <td class="col-md-1">:</td>
        <td><?=$crm->nama_cp?></td>
      </tr>

      <tr>
        <th class="col-md-4">email2</th>
        <td class="col-md-1">:</td>
        <td><?=$crm->email2?></td>
      </tr>

      <tr>
        <th class="col-md-4">No Hp</th>
        <td class="col-md-1">:</td>
        <td><?=$crm->no_hp?></td>
      </tr>

      <tr>
        <th class="col-md-4">Koordinat X</th>
        <td class="col-md-1">:</td>
        <td><?=$crm->koordinat_x?></td>
      </tr>
      <tr>
        <th class="col-md-4">Koordinat Y</th>
        <td class="col-md-1">:</td>
        <td><?=$crm->koordinat_y?></td>
      </tr>
      <tr>
        <th class="col-md-4">Kelurahan Desa</th>
        <td class="col-md-1">:</td>
        <td><?=$crm->kelurahan_desa?></td>
      </tr>
      <tr>
        <th class="col-md-4">Kecamatan</th>
        <td class="col-md-1">:</td>
        <td><?=$crm->kecamatan?></td>
      </tr><tr>
        <th class="col-md-4">Kabupaten / Kota</th>
        <td class="col-md-1">:</td>
        <td><?=$crm->kabupaten_kota?></td>
      </tr><tr>
        <th class="col-md-4">Provinsi</th>
        <td class="col-md-1">:</td>
        <td><?=$crm->provinsi?></td>
      </tr><tr>
        <th class="col-md-4">Nama Cekungan Air Tanah</th>
        <td class="col-md-1">:</td>
        <td><?=$crm->nama_cekungan_air_tanah?></td>
      </tr><tr>
        <th class="col-md-4">Formasi Geologi</th>
        <td class="col-md-1">:</td>
        <td><?=$crm->formasi_geologi?></td>
      </tr><tr>
        <th class="col-md-4">Posisi Pada Peta Zona Konservasi</th>
        <td class="col-md-1">:</td>
        <td><?=$crm->posisi_pada_peta_zona_konservasi?></td>
      </tr><tr>
        <th class="col-md-4">Tujuan Penggunaan</th>
        <td class="col-md-1">:</td>
        <td><?=$crm->tujuan_penggunaan?></td>
      </tr><tr>
        <th class="col-md-4">Rencana Volume Pengambilan</th>
        <td class="col-md-1">:</td>
        <td><?=$crm->email?></td>
      </tr><tr>
        <th class="col-md-4">Jangka Waktu Yang Di Mohonkan</th>
        <td class="col-md-1">:</td>
        <td><?=$crm->jangka_waktu_yang_di_mohonkan?></td>
      </tr><tr>
        <th class="col-md-4">Perusahaan Perencana Sumur</th>
        <td class="col-md-1">:</td>
        <td><?=$crm->perusahaan_perencana_sumur?></td>
      </tr><tr>
        <th class="col-md-4">NPWP3</th>
        <td class="col-md-1">:</td>
        <td><?=$crm->npwp3?></td>
      </tr>
      <tr>
        <th class="col-md-4">Petugas Sumur Pantau Nama</th>
        <td class="col-md-1">:</td>
        <td><?=$crm->petugas_sumur_pantau_nama?></td>
      </tr>
      <tr>
        <th class="col-md-4">Petugas Sumur Pantau Telp</th>
        <td class="col-md-1">:</td>
        <td><?=$crm->petugas_sumur_pantau_telp?></td>
      </tr>
      <tr>
        <th class="col-md-4">Status</th>
        <td class="col-md-1">:</td>
        <td>
          <?php if($crm->status_teks == 'pengajuan')
          { echo '<label class="label label-default">Pengajuan</label>'; }
          else if($crm->status_teks == 'evaluasi')
          { echo '<label class="label label-info">Evaluasi Dan Workshop Data</label>'; }
          ?>

        </td>
      </tr>
    </table>
  </div>
</div>
