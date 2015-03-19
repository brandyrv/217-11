<?php
/*
    print_r($_GET);

    $qty = $_GET["qty"];
    $pid = $_GET["pid"];

    print_r($qty);
    print_r($pid);
*/

$qty = implode(',', $_GET["qty"]);
$pid = implode(',', $_GET["pid"]);
$name = implode(',', $_GET["name"]);
$price = implode(',', $_GET["price"]);

//process some of the order here
$form = <<<END_OF_FORM
    <form method="post" action="purchase.php" data-ajax="false">
        <input type="hidden" name="qty" value="$qty" />
        <input type="hidden" name="pid" value="$pid" />
        <input type="hidden" name="name" value="$name" />
        <input type="hidden" name="price" value="$price" />
        <div class="form">
            <div class="spacer">Name<br /><input type="text" name="fullName" /></div>
            <div class="spacer">Address<br /><input type="text" name="address" /></div>
            <div class="spacer">Phone<br /><input type="text" name="phone" /></div>
            <div class="spacer">E-Mail<br /><input type="email" name="email" /></div>
            <div class="spacer"><input class="submit" type="submit" name="submit" value="Submit Order" /></div>
        </div>
    </form>
END_OF_FORM;

echo json_encode($form);
?>