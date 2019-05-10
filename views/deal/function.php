<?php

function validateDeal(&$captionerr,&$detailerr,&$start_dateerr,&$end_dateerr, &$caption,&$detail,&$start_date,&$end_date){
 
    if (empty($caption)) {
        $captionerr =  "Please enter title";
        return false;
    }

 if (empty($detail)) {
        $detailerr =  "Please enter details about deal";
        return false;
    }

    //DATE VALIDATION
    $today = date("Y/m/d");


    if (empty($start_date)) {
        $start_dateerr =  "Please enter date";
        return false;
    }elseif ($today > $start_date) {
        $start_dateerr =  "Please enter valid date";
        return false;
    }


    if (empty($end_date)) {
        $end_dateerr =  "Please enter date";
        return false;
    }elseif ($start_date >= $end_date) {
        $end_dateerr =  "Please enter date greater than  start date";
        return false;
    }
      
return true;
}

function validateEditDeal(&$captionerr,&$detailerr,&$end_dateerr, &$caption,&$detail,&$end_date){

    if (empty($caption)) {
        $captionerr =  "Please enter title";
        return false;
    }
    if (empty($detail)) {
        $detailerr =  "Please enter details about deal";
        return false;
    }
    if (empty($end_date)) {
        $end_dateerr =  "Please enter date";
        return false;
    }elseif ($start_date >= $end_date) {
        $end_dateerr =  "Please enter date greater than  start date";
        return false;
    }
      
return true;
}



 