<?php
//status show
function status($status){
    if ($status == 1){
        $status = 'checked';
    }
    else{
        $status = '';
    }
    return $status;
}

//investor account credit
function creditBalance($amount){
    return $amount;
}
