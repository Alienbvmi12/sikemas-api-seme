<?php
	$admin_name = $sess->admin->username ?? '';
	if(isset($sess->admin->nama)) if(strlen($sess->admin->nama)>1) $admin_name = $sess->admin->nama;
	if(!isset($this->current_page)) $this->current_page = "";
	if(!isset($this->current_parent)) $this->current_parent = "";
	$current_page = $this->current_page;
	$current_parent = $this->current_parent;
	$parent = array();
	foreach(($sess->admin->menus->left ?? []) as $key=>$v){
		$parent[$v->identifier] = 0;
		if(count($v->childs)>0){
			foreach($v->childs as $f){
				if($current_page==$f->identifier){
					$current_page = $v->identifier;
					$parent[$v->identifier] = 1;
				}
			}
		}
	}
	$admin_foto = '';
	if(isset($sess->admin->foto))$admin_foto = $sess->admin->foto;
	if(empty($admin_foto)) $admin_foto = 'media/user-default.png';
	$admin_foto = $this->cdn_url($admin_foto);

    $admin_logo_url = '';
    if (isset($this->config->semevar->admin_logo) && strlen($this->config->semevar->admin_logo) > 4) {
        $admin_logo_url = $this->cdn_url($this->config->semevar->admin_logo);
    }
?>
<div id="sidebar">
	<!-- Wrapper for scrolling functionality -->
	<div id="sidebar-scroll">
		<!-- Sidebar Content -->
		<div class="sidebar-content">
			<!-- Brand -->
			<a href="<?=base_url_admin(); ?>" class="sidebar-brand">
				<img src="<?=$admin_logo_url?>" onerror="this.onerror=null;this.src='';" style="width: 90%;" />
			</a>
			<!-- END Brand -->

			<!-- User Info -->
			<div class="sidebar-section sidebar-user clearfix sidebar-nav-mini-hide">
				<div class="sidebar-user-avatar">
					<a href="<?=base_url_admin('profil'); ?>">
						<img src="<?=$admin_foto?>" alt="avatar" onerror="this.onerror=null;this.src='<?=base_url('media/user-default.png')?>';" />
					</a>
				</div>
				<div class="sidebar-user-name"><?=$admin_name; ?></div>
				<div class="sidebar-user-links">
					<a href="<?=base_url_admin('profil'); ?>" data-toggle="tooltip" data-placement="bottom" title="Profile"><i class="gi gi-user"></i></a>
					<a href="<?=base_url_admin("logout"); ?>" data-toggle="tooltip" data-placement="bottom" title="Logout"><i class="gi gi-exit"></i></a>
				</div>
			</div>
			<!-- END User Info -->

			<!-- Sidebar Navigation -->
			<ul class="sidebar-nav">
				<li class="">
					<a href="#" class="sidebar-nav-menu ">
						<i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i>
						<i class="fa fa-cog fa-spin sidebar-nav-icon"></i>
						<span class="sidebar-nav-mini-hide">ERP Master</span>
					</a>
					<ul class="">
						<li>
							<a href="<?=base_url_admin('erpmaster/institusi/')?>" class="">
								Institusi
							</a>
						</li>
					</ul>
				</li>
				<li class="">
					<a href="#" class="">
						<i class="fa fa-eye"></i> <span>Nama Modul</span>
					</a>
				</li>
				<li class="">
					<a href="#" class="sidebar-nav-menu ">
						<i class=" sidebar-nav-mini-hide"></i>
						<i class="fa fa-home sidebar-nav-icon"></i>
						<span class="sidebar-nav-mini-hide">Dashboard</span>
					</a>
				</li>
			</ul>
			<ul class="sidebar-nav">
				<li class="active">
					<a href="dashboard" class="sidebar-nav-menu ">
						<i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i>
						<i class="fa fa-home sidebar-nav-icon"></i>
						<span class="sidebar-nav-mini-hide">Data Guru</span>
					</a>
					<ul class="">
						<li>
							<a href="#" class="active">
								Wali Kelas
							</a>
							<a href="#" class="active">
								Guru Mapel
							</a>
						</li>
					</ul>
				</li>
			</ul>
			<ul class="sidebar-nav">
				<li class="active">
					<a href="#" class="sidebar-nav-menu ">
						<i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i>
						<i class="fa fa-home sidebar-nav-icon"></i>
						<span class="sidebar-nav-mini-hide">Nama Staff</span>
					</a>
					<ul class="">
						<li>
							<a href="#" class="active">
								Tata Usaha
							</a>
							<a href="#" class="active">
								Petugas Keamanan
							</a>
							<a href="#" class="active">
								Staff Perpustakaan
							</a>
							<a href="#" class="active">
								Petugas Kebersihan
							</a>
						</li>
					</ul>
				</li>
			</ul>
			<ul class="sidebar-nav">
				<li class="active">
					<a href="#" class="sidebar-nav-menu ">
						<i class="sidebar-nav-mini-hide"></i>
						<i class="fa fa-home sidebar-nav-icon"></i>
						<span class="sidebar-nav-mini-hide">Data Peserta didik</span>
					</a>
				</li>
			</ul>
			<ul class="sidebar-nav">
				<li class="active">
					<a href="#" class="sidebar-nav-menu ">
						<i class=" sidebar-nav-mini-hide"></i>
						<i class="fa fa-home sidebar-nav-icon"></i>
						<span class="sidebar-nav-mini-hide">Mapel</span>
					</a>
					<ul class="">
						<li>

						</li>
					</ul>
				</li>
			</ul>
			<ul class="sidebar-nav">
				<li class="active">
					<a href="#" class="sidebar-nav-menu ">
						<i class="sidebar-nav-mini-hide"></i>
						<i class="fa fa-home sidebar-nav-icon"></i>
						<span class="sidebar-nav-mini-hide">Rombel</span>
					</a>
					<ul class="">
					</ul>
				</li>
			</ul>
			<ul class="sidebar-nav">
				<li class="active">
					<a href="#" class="sidebar-nav-menu ">
						<i class="sidebar-nav-mini-hide"></i>
						<i class="fa fa-home sidebar-nav-icon"></i>
						<span class="sidebar-nav-mini-hide">Administrasi</span>
					</a>
					<ul class="">
						<li>
							<a href="#" class="active">
								Pembayaran Pesertadidik
							</a>
							<a href="#" class="active">
								Pembayaran SPP
							</a>
							<a href="#" class="active">
								Staff Perpustakaan
							</a>
							<a href="#" class="active">
								Kelola Pembayaran
							</a>
						</li>
					</ul>
				</li>
			</ul>
			<!-- END Sidebar Navigation -->

		</div>
		<!-- END Sidebar Content -->
	</div>
	<!-- END Wrapper for scrolling functionality -->
</div>
