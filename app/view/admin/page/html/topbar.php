<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="<?= base_url_admin() ?>">Sιƙҽɱαʂ Aԃɱιɳ 🤫</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-lin
    k btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="bi bi-list"></i></button>
    <!-- Navbar Search-->
    <!-- Navbar-->
    <ul class="navbar-nav d-flex justify-content-right" style="width : 100%;">
        <div class="nav-item d-flex" style="width : 90%; justify-content:right">
            <text id="lock" style="transition: 0.5s; font-size : 27px; margin-right: 5px"></text> 
            <text id="lok" style="transition: 0.5s; font-size : 20px;"></text>
        </div>
        <li class="nav-item dropdown d-flex me-3" style="width : 10%; justify-content: right">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="<?= base_url_admin("logout") ?>">Logout</a></li>
            </ul>
        </li>
    </ul>

</nav>

<script>
    //Clock

    let thisTime = 0;

    function rgb() {
        let lock = document.getElementById("lock");
        let lok = document.getElementById("lok");
        let coray = ["red", "orange", "yellow", "green", "lightblue", "blue", "purple", "white"];
        coray.forEach((val, idx) => {
            setTimeout(() => {
                lock.style.color = val;
                lok.style.color = val;
            }, 500 * (idx + 1));
        });
    }

    function wakt() {
        var waktu = new Date();
        var jam = waktu.getHours();
        var menit = waktu.getMinutes();
        var detik = waktu.getSeconds();
        var hari = waktu.getDate();
        var bulan = waktu.getMonth();
        var tahun = waktu.getFullYear();

        jam = updateTime(jam);
        menit = updateTime(menit);
        detik = updateTime(detik);

        if (thisTime != parseInt(menit)) {
            rgb();
        }

        thisTime = parseInt(menit);

        document.getElementById("lock").innerText = jam + ":" + menit + ":" + detik;



        switch (bulan) {
            case 0:
                document.getElementById("lok").innerText = hari + " " + "Januari" + " " + tahun;
                break;
            case 1:
                document.getElementById("lok").innerText = hari + " " + "Februari" + " " + tahun;
                break;
            case 2:
                document.getElementById("lok").innerText = hari + " " + "Maret" + " " + tahun;
                break;
            case 3:
                document.getElementById("lok").innerText = hari + " " + "April" + " " + tahun;
                break;
            case 4:
                document.getElementById("lok").innerText = hari + " " + "Mei" + " " + tahun;
                break;
            case 5:
                document.getElementById("lok").innerText = hari + " " + "Juni" + " " + tahun;
                break;
            case 6:
                document.getElementById("lok").innerText = hari + " " + "Juli" + " " + tahun;
                break;
            case 7:
                document.getElementById("lok").innerText = hari + " " + "Agustus" + " " + tahun;
                break;
            case 8:
                document.getElementById("lok").innerText = hari + " " + "September" + " " + tahun;
                break;
            case 9:
                document.getElementById("lok").innerText = hari + " " + "Oktober" + " " + tahun;
                break;
            case 10:
                document.getElementById("lok").innerText = hari + " " + "November" + " " + tahun;
                break;
            case 11:
                document.getElementById("lok").innerText = hari + " " + "Desember" + " " + tahun;
                break;


        }



        var t = setTimeout(function() {
            wakt()
        }, 1000);
    }

    function updateTime(k) {

        if (k < 10) {
            return "0" + k;
        } else {
            return k;
        }
    }

    wakt();
</script>