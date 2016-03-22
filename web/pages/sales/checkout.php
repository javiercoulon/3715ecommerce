<?php
session_start();
require_once "../../resources/constants.php";
$PAGE_TITLE = "Checkout"; //actual title
$PAGE_CSSs = array(); //your needed css
$PAGE_JSs = array(); // your needed js
require_once $_RESOURCESPATH . 'connection.php';
include_once $_RESOURCESPATH . "template_first.php";
    
?>

<div class="checkout_container">
    <fieldset class="fieldset">
        <legend>Checkout - last part</legend>
        <form class="form-horizontal" method="post" action="<?php echo $_SERVERURLROOT;?>resources/backend/sales/checkout.php">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Payment Method</label>
                <div class="col-sm-10">
                    <select class="form-control" name="pmethod">
                        <?php
                        $result = mysqli_query($db, "SELECT pmethod_id,name FROM fp_payment_method;");
                        while ($result && ($row = mysqli_fetch_assoc($result))) {
                            echo '<option value="' . $row['pmethod_id'] . '">' . $row['name'] . '</option>';
                        }
                        ?>	
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Shipping Method</label>
                <div class="col-sm-10">
                    <select class="form-control" name="shipper">
                        <option>Bus</option>
                        <option>Plane</option>
                        <option>Train</option>
                    </select>
                </div>
            </div>   
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Required Date</label>
                <div class="col-sm-10">
                    <input type="date" name="requiredate" class="form-control" required="required" placeholder="Date"/>
                </div>
            </div>        
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Observations</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="observations" required="required"></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <fieldset>
                        <legend>
                            Details
                        </legend>
                        <table class="table table-hover table-bordered">
                            <?php
                            $selection = $_SESSION["selection"];
                            if (!isset($selection) || empty($selection)) {
                                //header  location .. redirect to the products page
                            }

                            reset($selection); // go to the beginning of the array
                            $first_row = false;
                            $total_subtotal = 0;
                            $total_discount = 0;
                            $total_total = 0;
                            while (list($key, $value) = each($selection)) {
                                $result = mysqli_query($db, "SELECT product_id,name,description,price,quantity,category_id,stock_id,
                                       weight,observations,discount FROM fp_product where product_id='" . $key . "'");
                                if ($result && ($row = mysqli_fetch_assoc($result))) {
                                    $sub_total = $row['price'] * ($value);
                                    $discount = $sub_total * ($row['discount'] / 100);
                                    $total = $sub_total - $discount;
                                    if (!$first_row) {
                                        $first_row = true;
                                        echo '<tr><th>Product</th><th>Description</th><th>Quantity</th><th>Price</th><th>Subtotal</th><th>Discount</th><th>Total</th></tr>';
                                    }
                                    $total_subtotal+=$sub_total;
                                    $total_total+=$total;
                                    $total_discount+=$discount;
                                    echo '<tr>
                                                <td>' . $row['name'] . '</td>
                                                <td>' . $row['description'] . '</td>
                                                <td>' . $value . '</td>
                                                <td>$ ' . $row['price'] . '</td>
                                                <td>$ ' . $sub_total . '</td>
                                                <td>$ ' . $discount . '</td>
                                                <td>$ ' . $total . '</td>
                                             </tr>';
                                }
                            }
                            if ($first_row) {
                                echo ' <tr><td colspan=7><center><h1>Summary<h1></center></td>
                                       <tr><td></td><th>Subtotal</th><td>$ ' . $total_subtotal . '</td><th>Discount</th><td>$ ' . $total_discount . '</td><th>Total</th><td>$ ' . $total_total . '</td></tr>';
                            } else {
                                echo '<tr><th>No products [error]</th></tr>';
                                //redirect
                            }
                            ?>
                        </table>
                    </fieldset>
                </div>

            </div>
            <div class="form-group">
                <p>
                <ul>
                    <li>*The shipping method could be altered in order to improve the timing.</li>
                    <li>*The payment details will be according with the availability of money in your account.</li>
                    <li>*Reclamations could be sent to the email.</li>
                    <li>*You will receive a notification when the request has been successfully done.</li>
                    <li>*Check your items before submitting.</li>
                </ul>
                </p>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary form-control">I`m sure, finish my request</button>
                </div>
            </div>
        </form>
    </fieldset>
</div>
<?php
echo "<script>
              NOFITEMS='" . count($selection) . "';
              BACKEND_URL='" . $_SERVERURLROOT . "resources/backend/products/';
              IMAGE_URL='" . $_SERVERURLROOT . "resources/imgs/products/';
      </script>";
include_once $_RESOURCESPATH . "template_last.php";
?>