<?php
Class Jenjang_Library {
    public $jenjang;
    public $jenjang_kelas;

    public function __construct()
    {
        $this->jenjang = array();
        $this->jenjang[0] = 'tidak diketahui';
        $this->jenjang[1] = 'playgroup';
        $this->jenjang[2] = 'TK';
        $this->jenjang[3] = 'SD';
        $this->jenjang[4] = 'SMP / MI / MTs';
        $this->jenjang[5] = 'SMK / SMA / MA';
        $this->jenjang[6] = 'D3';
        $this->jenjang[7] = 'S1/D4';
        $this->jenjang[8] = 'S2';
        $this->jenjang[9] = 'S3';

        $this->jenjang_kelas = array();
        $this->jenjang_kelas[0] = 'playgroup/TK';
        $this->jenjang_kelas[1] = 'Kelas 1 SD';
        $this->jenjang_kelas[2] = 'Kelas 2 SD';
        $this->jenjang_kelas[3] = 'Kelas 3 SD';
        $this->jenjang_kelas[4] = 'Kelas 4 SD';
        $this->jenjang_kelas[5] = 'Kelas 5 SD';
        $this->jenjang_kelas[6] = 'Kelas 6 SD';
        $this->jenjang_kelas[7] = 'Kelas 1 SMP';
        $this->jenjang_kelas[8] = 'Kelas 2 SMP';
        $this->jenjang_kelas[9] = 'Kelas 3 SMP';
        $this->jenjang_kelas[10] = 'Kelas 1 SMA';
        $this->jenjang_kelas[11] = 'Kelas 2 SMA';
        $this->jenjang_kelas[12] = 'Kelas 3 SMA';
    }

    public function get($key='',$utype='jenjang')
    {
        if (!is_null($key) && isset($this->{$utype}[$key])) {
            return $this->{$utype}[$key];
        } else {
            return 'Tidak berjenjang';
        }
    }

    public function data($utype='jenjang')
    {
        return $this->{$utype};
    }
}