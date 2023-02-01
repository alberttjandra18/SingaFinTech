<?php

$exit = false;
$payment = false;

//Cart
$cart["Cola"] = 0;
$cart["Fanta"] = 0;
$cart["Sprite"] = 0;
$cart["Soda"] = 0;
$cart["Rinso"] = 0;
$cart["Kuah"] = 0;

do {
    //Print Menu
    echo "\nMenu:\n";
    echo "1. Cola \t\t Rp.1\n";
    echo "2. Fanta \t\t Rp.2\n";
    echo "3. Sprite \t\t Rp.2\n";
    echo "4. Soda Kebahagian \t Rp.5\n";
    echo "5. Rinso \t\t Rp.3\n";
    echo "6. Kuah Indomie \t Rp.40\n";
    echo "9. Done\n";
    echo "0. Exit\n";

    //Receive Input
    $menu_input = readline('Please input your choise:');
    echo "\nYour Choise is:".$menu_input;
    switch($menu_input) {
        case 1:
            $cart["Cola"]++;
            break;
        case 2:
            $cart["Fanta"]++;
            break;
        case 3:
            $cart["Sprite"]++;
            break;
        case 4:
            $cart["Soda"]++;
            break;
        case 5:
            $cart["Rinso"]++;
            break;
        case 6:
            $cart["Kuah"]++;
            break;
        case 9:
            $payment = true;
            $exit = true;
            break;
        case 0:
            $exit = true;
            break;
        default:
            echo "\nPlease Input Correct Choices";
            break;
    }
    //Page Breaker
    echo "\n\n-----------";

    //Display Cart
    echo "\nYour Current Cart:";
    if($cart["Cola"] != 0)
        echo "\n Cola: ".$cart["Cola"];
    if($cart["Fanta"] != 0)
        echo "\n Fanta: ".$cart["Fanta"];
    if($cart["Sprite"] != 0)
        echo "\n Sprite: ".$cart["Sprite"];
    if($cart["Soda"] != 0)
        echo "\n Soda Kebahagiaan: ".$cart["Soda"];
    if($cart["Rinso"] != 0)
        echo "\n Rinso: ".$cart["Rinso"];
    if($cart["Kuah"] != 0)
        echo "\n Kuah Indomie: ".$cart["Kuah"];

    //Page Breaker
    echo "\n-----------";
} while(!$exit);

//Payment
$total_amount = ($cart["Cola"])+($cart["Fanta"]*2)+($cart["Sprite"]*2)+($cart["Soda"]*5)+($cart["Rinso"]*3)+($cart["Kuah"]*4);
    echo "\nYour total amount is: Rp.".$total_amount."\n";

if($payment && $total_amount>0) {
    do {
        $total_payment = (int)readline('Please insert amount: Rp.');
        echo "\nYou have paid: Rp.".$total_payment;

        if($total_payment < $total_amount)
            echo "\nNot Enough, need to add: Rp.".($total_amount-$total_payment)." more. Your total amount is Rp.".$total_amount;
    } while($total_payment < $total_amount);

    //Change Calculation
    $balance = $total_payment - $total_amount;

    //Cash
    $cash["100"] = 0;
    $cash["50"] = 0;
    $cash["20"] = 0;
    $cash["10"] = 0;
    $cash["5"] = 0;
    $cash["1"] = 0;

    if($balance>0) {
        while($balance>=100) {
            $balance -= 100;
            $cash["100"]++;
        }
        while($balance>=50) {
            $balance -= 50;
            $cash["50"]++;
        }
        while($balance>=20) {
            $balance -= 20;
            $cash["20"]++;
        }
        while($balance>=10) {
            $balance -= 10;
            $cash["10"]++;
        }
        while($balance>=5) {
            $balance -= 5;
            $cash["5"]++;
        }
        while($balance>0) {
            $balance -= 1;
            $cash["1"]++;
        }
        //Display Cart
        echo "\nYour Change:";
        if($cash["100"] != 0)
            echo "\n Rp.100: ".$cash["100"];
        if($cash["50"] != 0)
            echo "\n Rp.50: ".$cash["50"];
        if($cash["20"] != 0)
            echo "\n Rp.20: ".$cash["20"];
        if($cash["10"] != 0)
            echo "\n Rp.10: ".$cash["10"];
        if($cash["5"] != 0)
            echo "\n Rp.5: ".$cash["5"];
        if($cash["1"] != 0)
            echo "\n Rp.1: ".$cash["1"];
    }
}

echo "\nThank you\nExit.\n";
