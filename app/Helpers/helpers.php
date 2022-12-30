<?php

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

?>
