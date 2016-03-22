<?php
session_start();
require_once "../../resources/constants.php";
$PAGE_TITLE = "Products"; //actual title
$PAGE_CSSs = array("products_css.css"); //your needed css
$PAGE_JSs = array("products_script.js"); // your needed js
require_once $_RESOURCESPATH . 'connection.php';
include_once $_RESOURCESPATH . "template_first.php";
?>

<div class="product_listing_option row">
    <div class="col-xs-12 col-md-7">
        <?php
        $result = mysqli_query($db, "SELECT category_id,name FROM fp_category;");
        while ($result && ($row = mysqli_fetch_assoc($result))) {
            echo '<button type="button" class="btn btn-default navbar-btn btn_filter_type" id_cat="' . $row['category_id'] . '">' . $row['name'] . '</button>';
        }
        ?>						
    </div>
    <div class="col-xs-12 col-md-5">
        <form class="navbar-form" role="search">
            <div class="form-group">
                <input type="text" class="form-control" id="product_query" placeholder="Search">
            </div>
            <button class="btn btn-default">Search</button>
            <button id="checkout_btn" class="btn btn-primary">Checkout <span id="product_numbers" class="badge">4</span></button>
        </form>	
    </div>
    <hr>
</div>
<div id="products_container">
    <?php
    $_PRODUCTS_customoperation = 'init_load';
    include_once $_RESOURCESPATH . 'backend/products/list_products.php';
    ?>	
</div>
<div class="product_pagination">
    <nav>
        <ul class="pagination" id="pagination_container">
            <?php
            if (isset($num_of_pages) && $num_of_pages > 0) {
                for ($i = 0; $i < $num_of_pages; $i++) {
                    echo '<li class="' . (($i == $offset) ? "active" : "") . '"><a class="btn_pagination" offset="' . ($i) . '" href="#">' . ($i + 1) . '</a></li>';
                }
            }
            ?>
        </ul>
    </nav>
</div>
<div class="alert alert-success notification_square" id="notification_success" role="alert">Cart successfully modified</div>
<div class="alert alert-danger notification_square" id="notification_error" role="alert">Cannot add/remove from cart</div>


<style type="text/css">
    .product_listing_option{
        margin-bottom: 30px;
    }

</style>
<?php
echo "<script>
              NOFITEMS='" . count($selection) . "';
              BACKEND_URL='" . $_SERVERURLROOT . "resources/backend/products/';
              IMAGE_URL='" . $_SERVERURLROOT . "resources/imgs/products/';
      </script>";
include_once $_RESOURCESPATH . "template_last.php";
?>