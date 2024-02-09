<div class="row">
  <div class="col-md-12">
    <table class="table table-bordered table-striped">


      <tr>
        <th class="col-md-4">Id</th>
        <td class="col-md-1">:</td>
        <td><?=$cam->id?></td>
      </tr>

      <tr>
        <th class="col-md-4">Cdate</th>
        <td class="col-md-1">:</td>
        <td><?=$cam->cdate?></td>
      </tr>


      <tr>
        <th class="col-md-4">B_User_Id</th>
        <td class="col-md-1">:</td>
        <td><?=$cam->b_user_id?></td>
      </tr>

      <tr>
        <th class="col-md-4">Nama Balai Wilayah Sungai (BWS)</th>
        <td class="col-md-1">:</td>
        <td><?=$cam->nama_bws?></td>
      </tr>

      <tr>
        <th class="col-md-4">Nama PJ</th>
        <td class="col-md-1">:</td>
        <td><?=$cam->nama_pj?></td>
      </tr>

      <tr>
        <th class="col-md-4">No Hp PJ</th>
        <td class="col-md-1">:</td>
        <td><?=$cam->nohp_pj?></td>
      </tr>

      <tr>
        <th class="col-md-4">Nama PPK</th>
        <td class="col-md-1">:</td>
        <td><?=$cam->nama_ppk?></td>
      </tr>

      <tr>
        <th class="col-md-4">No HP PPK</th>
        <td class="col-md-1">:</td>
        <td><?=$cam->nohp_ppk?></td>
      </tr>

      <tr>
        <th class="col-md-4">File Surat Permohonan</th>
        <td class="col-md-1">:</td>
        <td><?=$cam->file_surat_permohonan?></td>
      </tr>

      <tr>
        <th class="col-md-4">Deskripsi Permasalahan</th>
        <td class="col-md-1">:</td>
        <td><?=$cam->deskripsi_permasalahan?></td>
      </tr>

      <tr>
        <th class="col-md-4">Desa</th>
        <td class="col-md-1">:</td>
        <td><?=$cam->desa?></td>
      </tr>

      <tr>
        <th class="col-md-4">Kecamatan</th>
        <td class="col-md-1">:</td>
        <td><?=$cam->kecamatan?></td>
      </tr>

      <tr>
        <th class="col-md-4">Kabkota</th>
        <td class="col-md-1">:</td>
        <td><?=$cam->kabkota?></td>
      </tr>
      <tr>
        <th class="col-md-4">Provinsi</th>
        <td class="col-md-1">:</td>
        <td><?=$cam->provinsi?></td>
      </tr>
      <tr>
        <th class="col-md-4">Nama Cat</th>
        <td class="col-md-1">:</td>
        <td><?=$cam->nama_cat?></td>
      </tr>
      <tr>
        <th class="col-md-4">Peta Geologi</th>
        <td class="col-md-1">:</td>
        <td><?=$cam->peta_geologi?></td>
      </tr><tr>
        <th class="col-md-4">Pos Zona Konservasi</th>
        <td class="col-md-1">:</td>
        <td><?=$cam->pos_zona_konservasi?></td>
      </tr><tr>
        <th class="col-md-4">Outcome Infra</th>
        <td class="col-md-1">:</td>
        <td><?=$cam->outcome_infra?></td>
      </tr><tr>
        <th class="col-md-4">Rencana Vol Ambil</th>
        <td class="col-md-1">:</td>
        <td><?=$cam->rencana_vol_ambil?></td>
      </tr><tr>
        <th class="col-md-4">Catatan Penggunaan Air Tanah Sekitar Lokasi </th>
        <td class="col-md-1">:</td>
        <td><?=$cam->catatan_penggunaan_air_tanah_sekitar_lokasi?></td>
      </tr><tr>
        <th class="col-md-4">Jenis Kegiatan</th>
        <td class="col-md-1">:</td>
        <td><?=$cam->jenis_kegiatan?></td>
      </tr><tr>
        <th class="col-md-4">Koor X</th>
        <td class="col-md-1">:</td>
        <td><?=$cam->koor_x?></td>
      </tr><tr>
        <th class="col-md-4">Koor Y</th>
        <td class="col-md-1">:</td>
        <td><?=$cam->koor_y?></td>
      </tr>
      <tr>
        <th class="col-md-4">Status</th>
        <td class="col-md-1">:</td>
        <td>
          <?php if($cam->status_teks == 'pengajuan')
          { echo '<label class="label label-default">Pengajuan</label>'; }
          else if($cam->status_teks == 'evaluasi')
          { echo '<label class="label label-info">Evaluasi Dan Workshop Data</label>'; }
          ?>

        </td>
      </tr>
    </table>
  </div>
</div>
