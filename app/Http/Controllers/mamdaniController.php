<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\karyawan;
use App\hasil;
use Carbon\Carbon;

class mamdaniController extends Controller
{
    //
    public function index()
    {
        # code...
        $datakaryawan = karyawan::all();

        $showdata = [];
        $predikat =[];

        foreach ($datakaryawan as $key => $value)
        {
            $hasilkhd = $this->hitungKehadiran($value->kehadiran);
            $hasiltjb = $this->hitungTanggungjawab($value->tanggungjawab);
            $hasilkds = $this->hitungKedisiplinan($value->kedisiplinan);

            $predikat = $this->hitungPred($hasilkhd,$hasiltjb,$hasilkds);
            $defuzzy = $this->hitungPrestasi($predikat);

            array_push( $showdata, [
                'id' => $value->id,
                'nama' => $value->nama,
                'hasilkhd' => $hasilkhd,
                'hasiltjb' => $hasiltjb,
                'hasilkds' => $hasilkds,
                'predikat' => $predikat
            ]);
        }

        // print_r($showdata);
        // die();

        $query = hasil::orderBy('created_at', 'DESC')->get();
        $active_button = true;
        if (count($query) > 0) {
            $bln_karyawan = substr($query[0]->created_at,5,2);
            $bln = substr(Carbon::now()->toDateString(),5,2);

            if ($bln_karyawan == $bln) {
                $active_button = false;
            }
        }


        $data = [
            'list' => $showdata,
            'active_button' => $active_button
        ];

        return view('pages.mamdani')->with('data', $data);
    }

    public function simpanOutput()
    {
        # Menyimpan Hasil Output ke dalam DB!
        $datakaryawan = karyawan::all();

        $showdata = [];
        $predikat =[];

        foreach ($datakaryawan as $key => $value)
        {
            $hasilkhd = $this->hitungKehadiran($value->kehadiran);
            $hasiltjb = $this->hitungTanggungjawab($value->tanggungjawab);
            $hasilkds = $this->hitungKedisiplinan($value->kedisiplinan);

            $predikat = $this->hitungPred($hasilkhd,$hasiltjb,$hasilkds);

            array_push( $showdata, [
                'id' => $value->id,
                'nama' => $value->nama,
                'hasilkhd' => $hasilkhd,
                'hasiltjb' => $hasiltjb,
                'hasilkds' => $hasilkds,
                'predikat' => $predikat
            ]);
        }

        foreach($showdata as $key => $value){
            $data = new hasil;
            $data->nama = $value['nama'];
            $data->khdkurang = $value['hasilkhd']['khdkurang'];
            $data->khdcukup = $value['hasilkhd']['khdcukup'];
            $data->khdbaik = $value['hasilkhd']['khdbaik'];
            $data->tjbrendah = $value['hasiltjb']['tjbrendah'];
            $data->tjbsedang = $value['hasiltjb']['tjbsedang'];
            $data->tjbtinggi = $value['hasiltjb']['tjbtinggi'];
            $data->kdskurang = $value['hasilkds']['kdskurang'];
            $data->kdscukup = $value['hasilkds']['kdscukup'];
            $data->kdsbaik = $value['hasilkds']['kdsbaik'];
            $data->maxrendah = $value['predikat']['maxrendah'];
            $data->maxtinggi = $value['predikat']['maxtinggi'];
            $data->z1 = $value['predikat']['z1'];
            $data->z2 = $value['predikat']['z2'];
            $data->m1 = $value['predikat']['m1'];
            $data->m2 = $value['predikat']['m2'];
            $data->m3 = $value['predikat']['m3'];
            $data->a1 = $value['predikat']['a1'];
            $data->a2 = $value['predikat']['a2'];
            $data->a3 = $value['predikat']['a3'];
            $data->z = $value['predikat']['z'];

            $data->save();
        }
        return redirect('/mamdani')->with('message','Simpan Data Output Berhasil');
    }

    public function hitungKehadiran($x)
    {
        # code...
        if ($x <= 0) {
            # code...
            $khdkurang = 1;

        } elseif ($x > 0 && $x < 15) {
            # code...
            $khdkurang = (15-$x)/(15-0);

        } elseif ($x >= 15) {
            # code...
            $khdkurang = 0;

        }

        if ($x <= 15) {
            # code...
            $khdcukup = 0;

        } elseif ($x >= 20){
            # code...
            $khdcukup = 0;

        } elseif ($x > 15 && $x < 17) {
            # code...
            $khdcukup = ($x-15)/(17-15);

        } elseif ($x > 17 && $x < 20) {
            # code...
            $khdcukup = (20-$x)/(20-17);

        } elseif ($x == 17){
            $khdcukup = 1;
        }

        if ($x <= 20) {
            # code...
            $khdbaik = 0;

        } elseif ($x > 20 && $x < 25) {
            # code...
            $khdbaik = ($x-20)/(25-20);

        } elseif ($x >= 25) {
            # code...
            $khdbaik = 1;
        }

        $data = [
            'khdkurang' => $khdkurang,
            'khdcukup' => $khdcukup,
            'khdbaik' => $khdbaik,
            ];
        return $data;
    }

    public function hitungTanggungjawab($y)
    {
        # code...
        if ($y <= 0) {
            # code...
            $tjbrendah = 1;

        } elseif ($y > 0 && $y < 60) {
            # code...
            $tjbrendah = (60-$y)/(60-0);

        } elseif ($y >= 60) {
            # code...
            $tjbrendah = 0;
        }

        if ($y <= 60) {
            # code...
            $tjbsedang = 0;

        } elseif ($y >= 80){
            # code...
            $tjbsedang = 0;

        } elseif ($y > 60 && $y < 70) {
            # code...
            $tjbsedang = ($y-60)/(70-60);

        } elseif ($y > 70 && $y < 80) {
            # code...
            $tjbsedang = (80-$y)/(80-70);

        } elseif ($y == 70){
            $tjbsedang = 1;
        }

        if ($y <= 80) {
            # code...
            $tjbtinggi = 0;

        } elseif ($y > 80 && $y < 100) {
            # code...
            $tjbtinggi = ($y-80)/(100-80);

        } elseif ($y >= 100) {
            # code...
            $tjbtinggi = 1;
        }

        $data = [
            'tjbrendah' => $tjbrendah,
            'tjbsedang' => $tjbsedang,
            'tjbtinggi' => $tjbtinggi,
            ];
        return $data;
    }

    public function hitungKedisiplinan($z)
    {
        # code...
        if ($z <= 0) {
            # code...
            $kdskurang = 1;

        } elseif ($z > 0 && $z < 60) {
            # code...
            $kdskurang = (60-$z)/(60-0);

        } elseif ($z >= 60) {
            # code...
            $kdskurang = 0;
        }

        if ($z <= 60) {
            # code...
            $kdscukup = 0;

        } elseif ($z >= 80) {
            # code...
            $kdscukup = 0;

        } elseif ($z > 60 && $z < 70) {
            # code...
            $kdscukup = ($z-60)/(70-60);

        } elseif ($z > 70 && $z < 80) {
            # code...
            $kdscukup = (80-$z)/(80-70);

        } elseif ($z == 70) {
            # code...
            $kdscukup = 1;
        }

        if ($z <= 80) {
            # code...
            $kdsbaik = 0;

        } elseif ($z > 80 && $z < 100) {
            # code...
            $kdsbaik = ($z-80)/(100-80);

        } elseif ($z >= 100) {
            # code...
            $kdsbaik = 1;
        }

        $data = [
            'kdskurang' => $kdskurang,
            'kdscukup' => $kdscukup,
            'kdsbaik' => $kdsbaik,
            ];
        return $data;
    }

    public function hitungPred($hasilkhd,$hasiltjb,$hasilkds)
    {
        # code...
        //KHD
        $hasilkhdkurang = $hasilkhd['khdkurang'];
        $hasilkhdcukup = $hasilkhd['khdcukup'];
        $hasilkhdbaik = $hasilkhd['khdbaik'];

        //TJB
        $hasiltjbrendah = $hasiltjb['tjbrendah'];
        $hasiltjbsedang = $hasiltjb['tjbsedang'];
        $hasiltjbtinggi = $hasiltjb['tjbtinggi'];

        //KDS
        $hasilkdskurang = $hasilkds['kdskurang'];
        $hasilkdscukup = $hasilkds['kdscukup'];
        $hasilkdsbaik = $hasilkds['kdsbaik'];

        //Aplikasi Fungsi Implikasi
        $role1 = min($hasilkhdbaik,$hasiltjbtinggi,$hasilkdsbaik);
        $role2 = min($hasilkhdbaik,$hasiltjbtinggi,$hasilkdscukup);
        $role3 = min($hasilkhdbaik,$hasiltjbtinggi,$hasilkdskurang);
        $role4 = min($hasilkhdbaik,$hasiltjbsedang,$hasilkdsbaik);
        $role5 = min($hasilkhdbaik,$hasiltjbsedang,$hasilkdscukup);
        $role6 = min($hasilkhdbaik,$hasiltjbsedang,$hasilkdskurang);
        $role7 = min($hasilkhdbaik,$hasiltjbrendah,$hasilkdsbaik);
        $role8 = min($hasilkhdbaik,$hasiltjbrendah,$hasilkdscukup);
        $role9 = min($hasilkhdbaik,$hasiltjbrendah,$hasilkdskurang);
        $role10 = min($hasilkhdcukup,$hasiltjbtinggi,$hasilkdsbaik);
        $role11 = min($hasilkhdcukup,$hasiltjbtinggi,$hasilkdscukup);
        $role12 = min($hasilkhdcukup,$hasiltjbtinggi,$hasilkdskurang);
        $role13 = min($hasilkhdcukup,$hasiltjbsedang,$hasilkdsbaik);
        $role14 = min($hasilkhdcukup,$hasiltjbsedang,$hasilkdscukup);
        $role15 = min($hasilkhdcukup,$hasiltjbsedang,$hasilkdskurang);
        $role16 = min($hasilkhdcukup,$hasiltjbrendah,$hasilkdsbaik);
        $role17 = min($hasilkhdcukup,$hasiltjbrendah,$hasilkdscukup);
        $role18 = min($hasilkhdcukup,$hasiltjbrendah,$hasilkdskurang);
        $role19 = min($hasilkhdkurang,$hasiltjbtinggi,$hasilkdsbaik);
        $role20 = min($hasilkhdkurang,$hasiltjbtinggi,$hasilkdscukup);
        $role21 = min($hasilkhdkurang,$hasiltjbtinggi,$hasilkdskurang);
        $role22 = min($hasilkhdkurang,$hasiltjbsedang,$hasilkdsbaik);
        $role23 = min($hasilkhdkurang,$hasiltjbsedang,$hasilkdscukup);
        $role24 = min($hasilkhdkurang,$hasiltjbsedang,$hasilkdskurang);
        $role25 = min($hasilkhdkurang,$hasiltjbrendah,$hasilkdsbaik);
        $role26 = min($hasilkhdkurang,$hasiltjbrendah,$hasilkdscukup);
        $role27 = min($hasilkhdkurang,$hasiltjbrendah,$hasilkdskurang);

        //Nilai MAX untuk Komposisi Aturan
        $maxRendah = max($role1,$role2,$role3,$role4,$role5,$role6,$role7,$role8,$role10,$role12,
                        $role13,$role14,$role16,$role19,$role20,$role21,$role22,$role25);
        $maxTinggi = max($role9,$role11,$role15,$role17,$role18,$role23,$role24,$role26,$role27);

        //Nilai Z (Komposisi Aturan)
        $z1 = (80 * $maxRendah) + 10;
        $z2 = (80 * $maxTinggi) + 10;

        //Nilai M (Penentuan Momen Untuk Setiap Daerah)
        $m1 = (($maxRendah / 2)*($z1*$z1))-(($maxRendah / 2)*(0*0));
        $m2 = ( (((1 / 80) / 3) * ($z2*$z2*$z2)) - ((((10 / 80) / 2)) * ($z2*$z2)) ) - ( (((1 / 80) / 3) * ($z1*$z1*$z1)) - ((((10 / 80) / 2)) * ($z1*$z1)) );
        $m3 = (($maxTinggi / 2)*(100*100))-(($maxTinggi / 2)*($z2*$z2));

        //Nilai A (Penentuan Area Untuk Setiap Daerah)
        $a1 = ($z1 - 10) * $maxRendah;
        $a2 = (($maxRendah + $maxTinggi)*($z2 - $z1)) / 2;
        $a3 = (100 - $z2) * $maxTinggi;

        //Mencari Titik Pusat Dari Daerah Fuzzy
        $totalm = $m1 + $m2 + $m3;
        $totala = $a1 + $a2 + $a3;
        $z=($totala!=0)?($totalm/$totala):0;

        $data = [
            'role1' => $role1,
            'role2' => $role2,
            'role3' => $role3,
            'role4' => $role4,
            'role5' => $role5,
            'role6' => $role6,
            'role7' => $role7,
            'role8' => $role8,
            'role9' => $role9,
            'role10' => $role10,
            'role11' => $role11,
            'role12' => $role12,
            'role13' => $role13,
            'role14' => $role14,
            'role15' => $role15,
            'role16' => $role16,
            'role17' => $role17,
            'role18' => $role18,
            'role19' => $role19,
            'role20' => $role20,
            'role21' => $role21,
            'role22' => $role22,
            'role23' => $role23,
            'role24' => $role24,
            'role25' => $role25,
            'role26' => $role26,
            'role27' => $role27,
            'maxrendah' => $maxRendah,
            'maxtinggi' => $maxTinggi,
            'z1' => $z1,
            'z2' => $z2,
            'm1' => $m1,
            'm2' => $m2,
            'm3' => $m3,
            'a1' => $a1,
            'a2' => $a2,
            'a3' => $a3,
            'z' => $z,
            ];
        return $data;
    }

    public function hitungPrestasi($predikat)
    {
        # code...
        $z = $predikat['z'];

        // $hasil = max($z);
        // return $hasil;
    }

    // public function toHitung()
    // {
    //     # code...
    //     $show = rolefuzzy::orderBy('id', 'ASC')->get();
    //     return view('pages.admin.mamdani')->with('list', $show);
    // }
}
