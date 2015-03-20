<?php
$qty = explode(',', $_POST['qty']);
$pid = explode(',', $_POST['pid']);
$name = explode(',', $_POST['name']);
$price = explode(',', $_POST['price']);

$order = "";
$grandTotal = 0;
for ($i = 0; $i < count($pid); ++$i) {
    $subTotal = $qty[$i] * $price[$i];
    $grandTotal += $subTotal;
    $order .= "<tr>";
    $order .= "<td>" . $name[$i] . "</td>";
    $order .= "<td align=\"right\">" . $qty[$i] . "</td>";
    $order .= "<td align=\"right\">" . $price[$i] . "</td>";
    $order .= "<td align=\"right\">" . $subTotal . "</td>";
    $order .= "</tr>";
}

$to = "brandyrb@hotmail.com";
$subject = "Thank you for your order!";

$message = "
<html>
    <head>
        <title>Pizza Palace Order</title>
    </head>
    <body>
        <p>".$_POST["fullName"].", your order has been placed. We are firing up our ovens and processing your order now!</p>
        <p>
            <strong>Order Number:</strong> 5427<br />
            <table style=\"width:300px\">
                <tr>
                    <th align=\"left\">Item</th>
                    <th align=\"right\">Qty</th>
                    <th align=\"right\">Price</th>
                    <th align=\"right\">Total</th>
                </tr>
                ".$order."
                <tr>
                    <td colspan=\"2\"><strong>Grand Total</strong></td>
                    <td colspan=\"2\" align=\"right\"><strong>".$grandTotal."</strong></td>
                </tr>
            </table>
        </p>
    </body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <brandyrb@hotmail.com>' . "\r\n";
$headers .= 'Cc: brandyrv@gmail.com' . "\r\n";

mail($to,$subject,$message,$headers);

header("Location: http://217-11.brandyv.com/#order?confirm=true")
?>