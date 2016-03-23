<?php
session_start();
require_once "../../resources/constants.php";
$PAGE_TITLE = "My Profile"; //actual title
$PAGE_CSSs = array(); //your needed css
$PAGE_JSs = array(); // your needed js
require_once $_RESOURCESPATH . 'connection.php';
include_once $_RESOURCESPATH . "template_first.php";
?>

<div class="checkout_container">
    <fieldset class="fieldset">
        <legend>View Profile</legend>
        <h3>My Personal Information</h3>
        <table class="table table-hover table-stripped">
            <tr>
                <th>Email</th>
                <th>Address</th>
                <th>Shipping Address</th>
                <th>Phone Number</th>
                <th>Postal Code</th>
                <th>Date Registered</th>
            </tr>
            <tr>
                <?php
                $result = mysqli_query($db, "SELECT user_id,creation_date,adress,shipping_adress,postal_code,phone_number,status,email FROM fp_user where user_id='" . $_SESSION['user_id'] . "' ");
                if ($result && ($row = mysqli_fetch_assoc($result))) {
                    $user_id = $row['user_id'];
                    $user_creationd = $row['creation_date'];
                    $user_address = $row['adress'];
                    $user_saddress = $row['shipping_adress'];
                    $user_pcode = $row['postal_code'];
                    $user_pnumber = $row['phone_number'];
                    $user_status = $row['status'];
                    $user_email = $row['email'];
                    echo '<td>' . $user_email . '</td><td>' . $user_address . '</td><td>' . $user_saddress . '</td><td>' . $user_pnumber . '</td><td>' . $user_pcode . '</td><td>' . $user_creationd . '</td>';
                } else {
                    header('Location: ' . $_SERVERURLROOT);
                    exit;
                }
                ?>
            </tr>
        </table>
        <hr>
        <h3>Sale information</h3>
        <table class="table table-hover table-bordered">
            <?php
            $first_row = false;

            $result = mysqli_query($db, "SELECT sell_id,sell_date,user_id,sell_state,observation,pmethod_id,required_date,sell_code,shipper_name, count(*) as num
                        FROM fp_sell,`fp_sale details` where fp_sell.sell_id = `fp_sale details`.sale_id and user_id='" . $_SESSION['user_id'] . "' group by sell_id ;
");
            while ($result && ($row = mysqli_fetch_assoc($result))) {
                if (!$first_row) {
                    $first_row = true;
                    echo '<tr><th>Date </th><th>Code</th><th>Shipping Method</th><th>Number of products</th><th>Obvservations</th><th>State</th></tr>';
                }
                $status = "not determined";
                switch ($row['sell_state']) {
                    case '1':
                        $status = 'Requested';
                        break;
                    case '2':
                        $status = 'In progress';
                        break;
                    case '3':
                        $status = 'Delivered';
                        break;
                    default:
                        break;
                }
                echo '<tr>
                                                <td>' . $row['sell_date'] . '</td>
                                                <td>' . $row['sell_code'] . '</td>
                                                <td>' . $row['shipper_name'] . '</td>
                                                <td> ' . $row['num'] . '</td>
                                                <td> ' . $row['observation'] . '</td>
                                                <td> ' . $status . '</td>
                                             </tr>';
            }

            if (!$first_row) {
                echo '<tr><th>No products [error]</th></tr>';
            }
            ?>
        </table>        
    </fieldset>
</div>
<?php
include_once $_RESOURCESPATH . "template_last.php";
?>