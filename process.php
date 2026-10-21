<?php

$firstkWh = ""; //string
$error = ""; //string
$showBill = false; //boolean

if (isset($_POST['calculate'])) {
    //echo "<p>The input for the first kWh is " . $_POST['first'] . "</p>";
    //echo "<p>The input for the first kWh is " . $charge1 . "</p>";

    //variable declaration
    $firstkWh = $_POST['first'];
    $secondkWh = $_POST['second'];
    $thirdkWh = $_POST['third'];
    $fourthkWh = $_POST['fourth'];
    $fifthkWh = $_POST['fifth'];

    //first validation
    //will check if user did not enter any value, then the charge will be 0
    if ($firstkWh == "") {
        $firstkWh = 0;
    }
    if ($secondkWh == "") {
        $secondkWh = 0;
    }
    if ($thirdkWh == "") {
        $thirdkWh = 0;
    }
    if ($fourthkWh == "") {
        $fourthkWh = 0;
    }
    if ($fifthkWh == "") {
        $fifthkWh = 0;
    }

    //second validation
    //will check if user enter negative value, then the charge will be 0
    //if ($firstkWh < 0) {
    //  $firstkWh = 0;
    //}
    //if ($secondkWh < 0) {
    //  $secondkWh = 0;
    //}
    //if ($thirdkWh < 0) {
    //  $thirdkWh = 0;
    //}
    //if ($fourthkWh < 0) {
    //  $fourthkWh = 0;
    //}
    //if ($fifthkWh < 0) {
    //  $fifthkWh = 0;
    //}   

    //second validation
    if ($firstkWh < 0 || $secondkWh < 0 || $thirdkWh < 0 || $fourthkWh < 0 || $fifthkWh < 0) {
        $error = "Please enter a valid value (0 or more)";
    }

    //third validation
    else if ($firstkWh > 200) {
        $error = "Please enter a valid value (0-200)for the first kWh";
    } else if ($secondkWh > 100) {
        $error = "Please enter a valid value (0-100) for the second kWh";
    }

    if ($thirdkWh > 300) {
        $error = "Please enter a valid value (0-300) for the third kWh";
    } else if ($fourthkWh > 300) {
        $error = "Please enter a valid value (0-300) for the fourth kWh";
    }

    //fourth validation
    //will check if user did not enter any value, then the charge will be 0
    else if ($firstkWh + $secondkWh + $thirdkWh + $fourthkWh + $fifthkWh == 0) {
        $error = "Please enter a value (0 or more for at least one kWh";
    } else {

        //$charge1 = $_POST['first'] * 0.218;
        $charge1 = $firstkWh * 0.218;
        $charge2 = $secondkWh * 0.334;
        $charge3 = $thirdkWh * 0.516;
        $charge4 = $fourthkWh * 0.546;
        $charge5 = $fifthkWh * 0.571;

        //total kWh
        $totalKwh = $firstkWh + $secondkWh + $thirdkWh + $fourthkWh + $fifthkWh;
        //total charge
        $totalcharge = $charge1 + $charge2 + $charge3 + $charge4 + $charge5;

        if ($totalcharge < 3) {
            $totalcharge = 3;
        }

        //kalau lebihg 600 kWh, kena tambah SST 6% 
        if ($totalKwh > 600) {
            //6% = 0.06
            //$totalSst = $totalcharge * 1.06;
            //$totalcharge = $totalcharge + $totalSst;

            //cara cepat nak kira, darabkan terus dengan 1.06, akan terus dapat hasil
            $totalcharge = $totalcharge * 1.06;
        }

        $showBill = true;

    }

}
?>