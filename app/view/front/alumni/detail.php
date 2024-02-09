<style>
    hr{
        border: none;
        height: 2px;
        background-color: #000000;
        width: 818px;
    }
    .kotak-foto{
        background-color: #DBDBDB;
        width: 430px;
        height: 430px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    .thetable{
        border-collapse: collapse;
    }
    .thetable, th, td{
        padding: 13px;
    }
</style>
<div class="container" style="margin-top: 80px ; margin-bottom:80px;">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-12" align="center">
                    <?php if (strlen($this->config->semevar->site_logo) > 4) { ?>
                        <img alt="<?= $this->config->semevar->site_name ?> logo" width="100px" height="auto" src="<?= $this->cdn_url($this->config->semevar->site_logo) ?>" />
                    <?php } else { ?>
                        <?= strtoupper($this->config->semevar->site_name) ?>
                    <?php } ?>
                </div>
                <div class="col-lg-12" align="center">
                    <h1 style="font-size: 30px;">Yayasan Miftahul Huda II</h1>
                </div>
                <div class="col-lg-12" align="center">
                    <p style="font-size: 20px;">jln. mulyasari no.147, dusun wetan, Bayasari, Kec. Jatinagara, Kabupaten Ciamis, Jawa Barat 46273</p>
                </div>
                <div class="col-lg-12">
                    <hr>
                </div>
                <div class="col-lg-12">
                    <h2 style="font-size: 30px; text-align:center;">Adam Marwadi</h2>
                    <br><br>
                </div>
                <div class="col-lg-5" align="center">
                    <div class="kotak-foto">
                    <img src="<?= base_url('media/contoh.jpg') ?>" height="400px" width="400px" alt="">
                    </div>
                </div>
                <div class="col-lg-7">
                    <table class="thetable" style="font-size:20px;">
                        <tr>
                            <th>NISN</th>
                            <th>:</th>
                            <td>100000</td>
                        </tr>
                        <tr>
                            <th>Nama Lengkap</th>
                            <th>:</th>
                            <td>Adam Marwadi</td>
                        </tr>
                        <tr>
                            <th>Jenjang</th>
                            <th>:</th>
                            <td>SMA</td>
                        </tr>
                        <tr>
                            <th>konsentrasi/jurusan</th>
                            <th>:</th>
                            <td>IPA</td>
                        </tr>
                        <tr>
                            <th>Jenis Kelamin</th>
                            <th>:</th>
                            <td>Laki-Laki</td>
                        </tr>
                        <tr>
                            <th>Tempat Tanggal Lahir</th>
                            <th>:</th>
                            <td>Tasik Malaya, 03 Desember 2005</td>
                        </tr>
                        <tr>
                            <th>Agama</th>
                            <th>:</th>
                            <td>Islam</td>
                        </tr>
                        <tr>
                            <th>Anak Ke</th>
                            <th>:</th>
                            <td>1 Dari 2 bersaudara</td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <th>:</th>
                            <td>Kp.Legok Nangka Rt03/Rw09, Desa Panyirapan, Kec. Soreang, Kab. Bandung</td>
                        </tr>
                        <tr>
                            <th>Nomor Telepon</th>
                            <th>:</th>
                            <td>081210080107</td>
                        </tr>
                        <tr>
                            <th>Nama Orang Tua/Wali</th>
                            <th>:</th>
                            <td>Atun</td>
                        </tr>
                        <tr>
                            <th>Nomer Telepon</th>
                            <th>:</th>
                            <td>100000</td>
                        </tr>
                        <tr>
                            <th>Pekerjaan Orang Tua/ Wali</th>
                            <th>:</th>
                            <td>Dosen Universitas Mataram</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>