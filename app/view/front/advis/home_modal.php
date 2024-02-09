<style>
	.text-left {
		text-align: left !important;
	}
</style>

<!-- modal option -->
<div id="modal_option" class="modal fade " tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<!-- Modal Header -->
			<div class="modal-header text-center">
				<h2 class="modal-title">Pilihan</h2>
			</div>
			<!-- END Modal Header -->

			<!-- Modal Body -->
			<div class="modal-body">
				<div class="row">
					<div class="col-xs-12 btn-group-vertical ">
						<a id="adetail" href="#" class="btn btn-info" target="_blank">
							<i class="fa fa-info-circle"></i> Detail
						</a>
						<a id="aedit" href="#" class="btn btn-default" target="_blank">
							<i class="fa fa-pencil"></i> Edit
						</a>
					</div>
				</div>
				<div class="row" style="margin-top: 1em; ">
					<div class="col-md-12" style="border-top: 1px #afafaf dashed;">&nbsp;</div>
					<div class="col-xs-12 btn-group-vertical" style="">
						<button type="button" class="btn btn-primary btn-block text-left" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
					</div>
				</div>
				<!-- END Modal Body -->
			</div>
		</div>
	</div>
</div>



<!-- modal tambah -->
<div id="modal_tambah" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<!-- Modal Header -->
			<div class="modal-header text-center">
				<h2 class="modal-title">Form Permintaan Barang</h2>
			</div>
			<!-- END Modal Header -->

			<!-- Modal Body -->
			<div class="modal-body">
				<form id="ftambah" action="<?=base_url_admin(); ?>" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered" onsubmit="return false;">
					<fieldset>
						<legend>Produk</legend>
						<div class="form-group">
							<div class="col-md-4">
								<label for="iutype">Jenis Produk*</label>
								<select id="iutype" name="utype" class="form-control">
									<option value="utama">Produk Utama</option>
									<option value="variasi">Produk Variasi</option>
								</select>
							</div>
							<div class="col-md-4">
								<label for="ib_kategori_id">Kategori Produk</label>
								<select id="ib_kategori_id" name="b_kategori_id" class="form-control">
									<option value="null"> - </option>
									<?php if(isset($kategori)){ foreach($kategori as $kat){ if(!isset($kat->id)) continue; ?>
									<option value="<?=$kat->id; ?>"><?=$kat->nama; ?></option>
									<?php if(count($kat->childs)){ foreach($kat->childs as $kc){ ?>
									<option value="<?=$kc->id; ?>">--&nbsp;<?=$kc->nama; ?></option>
									<?php }}}} ?>
								</select>
							</div>
							<div class="col-md-4">
								<label for="isku">SKU*</label>
								<input id="isku" type="text" name="sku" class="form-control" minlength="2" maxlength="20" placeholder="huruf, angka, titik, strip(-)" required />
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12">
								<label class="" for="inama">Nama Produk</label>
								<input id="inama" type="text" name="nama" class="form-control" minlength="1" placeholder="Nama Produk" required />
							</div>
						</div>
					</fieldset>
					<div class="form-group form-actions">
						<div class="col-xs-12 text-right">
							<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-sm btn-primary">Simpan</button>
						</div>
					</div>
				</form>
			</div>
			<!-- END Modal Body -->
		</div>
	</div>
</div>

<!-- modal edit -->
<div id="modal_edit" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<!-- Modal Header -->
			<div class="modal-header text-center">
				<h2 class="modal-title">Edit</h2>
			</div>
			<!-- END Modal Header -->

			<!-- Modal Body -->
			<div class="modal-body">
				<form id="fedit" action="<?=base_url_admin(); ?>" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered" onsubmit="return false;">
					<fieldset>
						<div class="form-group">
							<div class="col-md-4">
								<label for="ieutype">Jenis Produk*</label>
								<select id="ieutype" name="utype" class="form-control">
									<option value="utama">Produk Utama</option>
									<option value="variasi">Produk Variasi</option>
								</select>
								<input id="ieid" name="id" type="hidden" value="" />
							</div>
							<div class="col-md-4">
								<label for="ieb_kategori_id">Kategori Produk</label>
								<select id="ieb_kategori_id" name="b_kategori_id" class="form-control">
									<option value="null"> - </option>
									<?php if(isset($kategori)){ foreach($kategori as $kat){ if(!isset($kat->id)) continue; ?>
									<option value="<?=$kat->id; ?>"><?=$kat->nama; ?></option>
									<?php if(count($kat->childs)){ foreach($kat->childs as $kc){ ?>
									<option value="<?=$kc->id; ?>">--&nbsp;<?=$kc->nama; ?></option>
									<?php }}}} ?>
								</select>
							</div>
							<div class="col-md-4">
								<label for="iesku">SKU*</label>
								<input id="iesku" type="text" name="sku" class="form-control" minlength="2" maxlength="20" placeholder="huruf, angka, titik, strip(-)" required />
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12">
								<label class="" for="ienama">Nama Produk</label>
								<input id="ienama" type="text" name="nama" class="form-control" minlength="1" placeholder="Nama Produk" required />
							</div>
						</div>
					</fieldset>
					<fieldset><legend>Properti</legend>
						<div class="form-group">
							<div class="col-md-12">
								<label class="" for="ieslug">SLUG</label>
								<input id="ieslug" type="text" name="slug" class="form-control" minlength="1" placeholder="Slug" required />
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-4">
								<label for="ieukuran">Ukuran*</label>
								<select id="ieukuran" name="ukuran" class="form-control">
									<option value="null"> - </option>
								</select>
							</div>
							<div class="col-md-4">
								<label for="iewarna">Warna*</label>
								<select id="iewarna" name="warna" class="form-control">
									<option value="null"> - </option>
								</select>
							</div>
							<div class="col-md-4">
								<label for="ierasa">Rasa*</label>
								<select id="ierasa" name="rasa" class="form-control">
									<option value="null"> - </option>
								</select>
							</div>
						</div>
					</fieldset>
					<fieldset><legend>Harga</legend>
						<div class="form-group">
							<div class="col-md-4">
								<label for="ieharga_beli">Harga Beli</label>
								<input id="ieharga_beli" name="harga_beli" type="text" class="form-control" minlength="1" placeholder="harga beli" />
							</div>
							<div class="col-md-4">
								<label for="ieharga_jual">Harga Jual*</label>
								<input id="ieharga_jual" type="text" name="harga_jual" class="form-control" placeholder="harga jual" required />
							</div>
							<div class="col-md-4">
								<label for="ieharga_retail">Harga Retail</label>
								<input id="ieharga_retail" type="text" name="harga_retail" class="form-control" placeholder="harga retail" />
							</div>
						</div>
					</fieldset>
					<fieldset><legend>Promo / Diskon</legend>
						<div class="form-group">
							<div class="col-md-4">
								<label for="iediskon_harga">Diskon Harga</label>
								<input id="iediskon_harga" name="diskon_harga" type="text" class="form-control" value="0" />
							</div>
							<div class="col-md-4">
								<label for="iediskon_persen">Diskon Persen (%)</label>
								<input id="iediskon_persen" name="diskon_persen" type="text" class="form-control" value="0" />
							</div>
							<div class="col-md-4">
								<label for="iediskon_expired">Diskon Expired</label>
								<input id="iediskon_expired" type="text" name="diskon_expired" class="form-control input-datepicker-close" data-date-format="yyyy-mm-dd" placeholder="TTTT-BB-HH" />
							</div>
						</div>
					</fieldset>
					<fieldset><legend>Packaging</legend>
						<div class="form-group">
							<div class="col-md-4">
								<label for="ieberat">Berat Packing (gram) *</label>
								<input id="ieberat" name="berat" type="text" class="form-control" value="" required />
							</div>
							<div class="col-md-4">
								<label for="iestok">Stok</label>
								<input id="iestok" name="stok" type="text" class="form-control" value="0" />
							</div>
							<div class="col-md-4">
								&nbsp;
							</div>
						</div>
					</fieldset>
					<fieldset><legend>Deskripsi Produk</legend>
						<div class="form-group">
							<div class="col-md-12">
								<label class="control-label" for="iedeskripsi_singkat">Deskripsi Singkat</label>
								<textarea id="iedeskripsi_singkat" name="deskripsi_singkat" class="ckeditor" rows="5"></textarea>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12">
								<label class="control-label" for="iedeskripsi">Deskripsi Lengkap</label>
								<textarea id="iedeskripsi" name="ideskripsi" class="ckeditor" rows="5"></textarea>
							</div>
						</div>
					</fieldset>
					<fieldset><legend>Lain-lain</legend>
						<div class="form-group">
							<div class="col-md-3">
								<label for="iereview">Review</label>
								<input id="iereview" name="review" type="text" class="form-control" value="0" />
							</div>
							<div class="col-md-3">
								<label for="ierating">Rating</label>
								<input id="ierating" name="rating" type="text" class="form-control" value="0" />
							</div>
							<div class="col-md-3">
								<label for="ieterjual">Terjual</label>
								<input id="ieterjual" name="terjual" type="text" class="form-control" value="0" />
							</div>
							<div class="col-md-3">
								<label for="iedilihat">Dilihat</label>
								<input id="iedilihat" name="dilihat" type="text" class="form-control" value="0" />
							</div>
						</div>
					</fieldset>
					<fieldset><legend>Penting</legend>
						<div class="form-group">
							<div class="col-md-3">
								<label for="ieis_can_wait">Bisa PO?</label>
								<select id="ieis_can_wait" name="iis_can_wait" class="form-control">
									<option value="0">Tidak</option>
									<option value="1">Iya</option>
								</select>
							</div>
							<div class="col-md-3">
								<label for="iewaiting_day">Proses PO (Hari)</label>
								<input id="iewaiting_day" name="waiting_day" type="text" class="form-control" value="0" />
							</div>
							<div class="col-md-3">
								<label for="ieis_visible">Dapat Dilihat</label>
								<select id="ieis_visible" name="is_visible" class="form-control">
									<option value="1">Iya</option>
									<option value="0">Tidak</option>
								</select>
							</div>
							<div class="col-md-3">
								<label for="ieis_active">Active</label>
								<select id="ieis_active" name="is_active" class="form-control">
									<option value="1">Iya</option>
									<option value="0">Tidak</option>
								</select>
							</div>
						</div>
					</fieldset>
					<div class="form-group form-actions">
						<div class="col-xs-12 text-right">
							<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
							<button id="bhapus" type="button" class="btn btn-sm btn-warning">Hapus</button>
							<button type="submit" class="btn btn-sm btn-primary">Simpan</button>
						</div>
					</div>
				</form>
			</div>
			<!-- END Modal Body -->
		</div>
	</div>
</div>
