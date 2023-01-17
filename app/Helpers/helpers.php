<?php

function monthNameArray(){
    $result = [0=>"--Semua Bulan--", 1=>'Januari', 2=>"Februari", 3=>"Maret", 4=>"April",
               5=>"Mei", 6=>"Juni", 7=>"Juli", 8=>"Agustus", 9=>"September", 10=>"Oktober",
               11=>"November",12=>"Desember"];
    return $result;
}

function breadcrumb($pages){
    $result = '';
    $n = count($pages);
    $i = 1;

    foreach($pages as $key => $value){
        if ($i == $n) {
            $result .= '<li class="breadcrumb-item active">' .$key . '</li>';
        }
        else {
            $result .= '<li class="breadcrumb-item">' . '<a href="' . $value . '">' . $key. '</a>' . '</li>';
        }
        $i++;
    }
    // dd($result);
    return $result;
}

function genderStatus($sex){
    if ($sex == 1) {
        return "Laki-laki";
    }
    return "Perempuan";
}

function splitPhoneNumber($phone){
    $s_phone = str_split($phone, 4);
    if (isset($s_phone[3])) {
        # code...
        $result =  $s_phone[0].='-'.$s_phone[1].'-'.$s_phone[2].$s_phone[3];
    }
    $result =  $s_phone[0].='-'.$s_phone[1].'-'.$s_phone[2];
    // dd($s_phone);
    return $result;
}

function submissionStatus($status){
    switch ($status) {
        case 1:
            return "Disetujui";
            break;
        case 2:
            return "Ditolak";
            break;
        default:
            return "Sedang diproses";
            break;
    }
}

function rolesName($role){
    switch ($role) {
        case 13:
            return "Jamaah";
            break;
        case 24:
            return "Sekretaris";
            break;
        case 35:
            return "Admin";
            break;
        default:
            return "Sedang diproses";
            break;
    }
}
?>
