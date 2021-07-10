<?php
/*awal hitung hari libur nasional*/
        $jumlah_hari = date('t');
        date_default_timezone_set("Asia/Jakarta");
        $array = json_decode(file_get_contents("https://raw.githubusercontent.com/guangrei/Json-Indonesia-holidays/master/calendar.json"),true);
        $month = date('m');
        $year = date('Y');
        $jumlah_libur_minggu=array();
        $jumlah_libur_nasional=array();
        for ($d = 1; $d <= $jumlah_hari; $d++)
        {
            $time = mktime(12, 0, 0, $month, $d, $year);
            if (date('m', $time) == $month)
            {   
                $hari_bulan = date('Ymd', $time);
                if(isset($array[$hari_bulan]))
                {   
                    $keterangan=$d."-".$month."-".$year." ".$array[$hari_bulan]["deskripsi"];
                    $jumlah_libur_nasional[]=$d;
                }
                elseif(date("D",strtotime($hari_bulan))==="Sun")
                {
                    $jumlah_libur_minggu[]=$d;
                }
            }
        }
        $minggu=count($jumlah_libur_minggu);
        $nasional=count($jumlah_libur_nasional);
        $hari_kerja=($jumlah_hari-($minggu+$nasional));
        /*akhir hitung hari libur nasional*/
?>
