<?php


function set_role($user_role){
    switch ($user_role){
        case 'boss_lab';$user_task = 'رئیس آزمایشگاه';break;
        case 'boss_uni';$user_task = 'رئیس دانشکده';break;
        case 'manager';$user_task = 'مدیر فنی(مدیر گروه)';break;
        case 'customer';$user_task = 'متقاضی';break;
        case 'expert';$user_task = 'کارشناس آزمایشگاه';break;
        case 'reception';$user_task = 'دفتر آزمایشگاه مرکزی';break;
    }
    return $user_task;
}

function my_status($status){
    switch ($status) {
        case -2:
            return 'غیر قابل انجام';
            break;
        case -1:
            return 'اطلاعات کاربر تکمیل نشده است';
            break;
        case 0:
            return 'آزمون درخواست نشده';
            break;
        case 1:
            return 'منتظر تایید مدیر گروه';
            break;
        case 2:
            return 'منتظر نظر کارشناس';
            break;
        case 3:
            return 'منتظر تایید فیش بانکی';
            break;
        case 4:
            return 'منتظر پرداخت توسط کاربر';
            break;
        case 5:
            return 'منتظر جواب دهی';
            break;
        case 6:
            return 'تکمیل شده';
            break;
    }
}

?>