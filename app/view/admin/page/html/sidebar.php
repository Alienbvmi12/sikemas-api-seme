<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading">Menu</div>
            <a class="nav-link <?= $active === 'dashboard' ? "active" : "" ?>" href="<?= base_url_admin("") ?>">
                <div class="sb-nav-link-icon"><i class="bi bi-house"></i></div>
                Dashboard
            </a>
            <a class="nav-link <?= $active === 'user' ? "active" : "" ?>" href="<?= base_url_admin("user/") ?>">
                <div class="sb-nav-link-icon"><i class="bi bi-bicycle"></i></div>
                Users
            </a>
            <a class="nav-link <?= $active === 'warga' ? "active" : "" ?>" href="<?= base_url_admin("warga/") ?>">
                <div class="sb-nav-link-icon"><i class="bi bi-tags"></i></div>
                Warga
            </a>
            <a class="nav-link <?= $active === 'alamat' ? "active" : "" ?>" href="<?= base_url_admin("alamat/") ?>">
                <div class="sb-nav-link-icon"><i class="bi bi-bicycle"></i></div>
                Alamat
            </a>
            <a class="nav-link <?= $active === 'ronda' ? "active" : "" ?>" href="<?= base_url_admin("ronda/") ?>">
                <div class="sb-nav-link-icon"><i class="bi bi-bicycle"></i></div>
                Jadwal Ronda
            </a>
            <a class="nav-link <?= $active === 'aspirasi' ? "active" : "" ?>" href="<?= base_url_admin("aspirasi/") ?>">
                <div class="sb-nav-link-icon"><i class="bi bi-bicycle"></i></div>
                Aspirasi
            </a>
            <a class="nav-link <?= $active === 'darurat' ? "active" : "" ?>" href="<?= base_url_admin("darurat/") ?>">
                <div class="sb-nav-link-icon"><i class="bi bi-bicycle"></i></div>
                Histori Kejadian Darurat
            </a>
            <a class="nav-link <?= $active === 'log' ? "active" : "" ?>" href="<?= base_url_admin("log/") ?>">
                <div class="sb-nav-link-icon"><i class="bi bi-bicycle"></i></div>
                Histori Log
            </a>
        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small">Logged in as:</div>
        <?= $admin->username ?>
    </div>
</nav>