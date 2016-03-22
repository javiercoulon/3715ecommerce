var Product_Categories = [];
var offset = 0;
var limit = 8;
$(document).ready(function() {



    $(".btn_filter_type").click(function() {
        $(this).toggleClass('btn-success');
        if ($(this).hasClass('btn-success')) {
            addToArray($(this).attr('id_cat'));
        } else {
            console.info($(this).attr('id_cat') + ' ' + (typeof $(this).attr('id_cat')));
            removeFromArray($(this).attr('id_cat'))
        }
        console.info(Product_Categories);
        updateProducts();

    });

    addEventToProducts()
    addEventToPagination()

    if (parseInt(NOFITEMS) > 0) {
        $("#checkout_btn").css("visibility", "visible");
        $("#product_numbers").html("<b>" + NOFITEMS + "</b>")
    }

    var offset = $("#checkout_btn").offset();
    $('#notification_success').css({
        position: "absolute",
        top: offset.top + 50, left: offset.left
    });
     $('#notification_error').css({
        position: "absolute",
        top: offset.top + 50, left: offset.left
    });   
    

});


function resetEvents() {

    addEventToProducts()
    addEventToPagination()
}
function addEventToProducts() {
    $(".product_options .product_option_command .btn").click(function() {
        var product_container = $(this).parent().parent().parent().
                parent().parent().parent().parent();
        var product_id_container = product_container.children(".product_id_container:first-child");
        var product_quantity_container = product_container.find(".product_quantity:first-child");
        var product_id = parseInt(product_id_container.val());
        var product_quantity = parseInt(product_quantity_container.val());
        //alert(product_id + " q: " + product_quantity);
        //console.info(product_quantity.val())
        sendAddRequest(product_id, product_quantity,product_container);

    });
}

function sendAddRequest(id, quantity,container) {
    $.ajax({
        type: "POST",
        data: {product_id: id, product_quantity: quantity},
        url: BACKEND_URL + "add_to_cart.php",
        success: function(msg) {
            console.info(msg);
            updateCartStatusList((msg),container);
            //show message
        }
    });
}

function updateCartStatusList(json,container) {
    if (json && json.success && json.success == 1) {
        var nofitems = parseInt(json.number_of_items);
        if (nofitems > 0) {
            $("#product_numbers").html("<b>" + nofitems + "</b>")
            $("#checkout_btn").css("visibility", "visible");
            
        } else {
            $("#checkout_btn").css("visibility", "hidden");
             
        }
        animateElement($('#notification_success'));
    }else{
        animateElement($('#notification_error'));
    }
    if(json.params.product_quantity>0){
        container.addClass('product_container_incart');
    }else{
        container.removeClass('product_container_incart');
    }
    
    
}
function animateElement(element){
    element.fadeIn();
    setTimeout(function(){
        element.fadeOut('slow');
    },2000);
}
function addEventToPagination() {
    $(".btn_pagination").click(function(e) {
        e.preventDefault();
        if (!$(this).hasClass('active')) {
            offset = parseInt($(this).attr('offset'));
            updateProducts();
        }
        else {

        }
    });
}

function addToArray(val) {
    Product_Categories.push(val);

}

function removeFromArray(val) {
    for (var i in Product_Categories) {
        if (Product_Categories[i] == val) {
            Product_Categories.splice(i, 1);
            break;
        }
    }
}

function updateProducts() {
    var product_query = $("#product_query").val();
    var sendquery = false;
    var sendFilter = false;
    if (product_query.length > 0) {
        sendquery = true;
    }
    if (Product_Categories.length > 0) {
        sendFilter = true;
    }

    if (!sendFilter && !sendquery && offset < 0) {
        return;
    }

    $.ajax({
        type: "POST",
        data: {operation: 'reload', query: product_query, filters: Product_Categories, type: '_asinc', offset: offset, max: limit},
        url: BACKEND_URL + "list_products.php",
        success: function(msg) {
            console.info(msg);
            updateProductsList((msg));
        }
    });


}

function updateProductsList(json) {
    var product_container = $("#products_container");
    if (json.products) {
        product_container.html('');
        for (var i = 0; i < json.products.length; i++) {
            var product = json.products[i];
            console.info(product)
            var newHtml = '';
            newHtml += '<div class="product_container '+((!isNaN(product.product_incart)&&parseInt(product.product_incart)>0)?"product_container_incart":"")+'">'
            newHtml += '      <input type="hidden" name="product_id" value="' + product.product_id + '" class="product_id_container">'
            newHtml += '      <div class="product_details">';
            newHtml += '          <div class="product_title">';
            newHtml += product["product_title"];
            newHtml += '          </div>';
            newHtml += '          <div class="product_image">';
            newHtml += '               <img class="product_pure_image" src="' + IMAGE_URL + product.product_image + '">';
            newHtml += '           </div>';
            newHtml += '           <div class="product_description_container">';
            newHtml += '               <div class="product_description">';
            newHtml += product.product_description;
            newHtml += '                   <ul class="product_data">';
            newHtml += '                       <li>Weigh: ' + product.product_weigh + '</li>';
            newHtml += '                       <li>Color: ' + product.product_color + '</li>';
            newHtml += '                       <li>Status: ' + product.product_status + '</li>';
            newHtml += '                  </ul>';
            newHtml += '              </div>';
            newHtml += '              <div class="product_options">';
            newHtml += '                 <div class="row">';
            newHtml += '                      <div class="col-xs-12 col-md-6">';
            newHtml += '                          <span class="product_option_label">Quantity</span>';
            newHtml += '                          <span class="product_option_command">';
            newHtml += '                              <input type="number" min="0" value="'+((!isNaN(product.product_incart)&&parseInt(product.product_incart)>0)?product.product_incart:"")+'" max="' + product.product_quantity + '" class="form-control product_quantity">';
            newHtml += '                          </span>';
            newHtml += '                      </div>';
            newHtml += '                      <div class="col-xs-12 col-md-6">';
            newHtml += '                          <span class="product_option_label">Operation</span>';
            newHtml += '                          <span class="product_option_command">';
            newHtml += '                              <button class="btn btn-primary form-control">Add to Cart</button>';
            newHtml += '                          </span>';
            newHtml += '                      </div>';
            newHtml += '                  </div>';
            newHtml += '              </div>';
            newHtml += '          </div>';
            if (product.observation) {
                newHtml += '<div class="product_observation">';
                newHtml += product.obvservation;
                newHtml += '</div>';
            }
            if (!isNaN(product.product_discount) && parseInt(product.product_discount) > 0) {
                newHtml += ' <span class="product_discountcontainer">' + (parseInt(product.product_discount)) + '</span>';
            }
            newHtml += '      </div>';
            newHtml += '  </div>';
            product_container.html(product_container.html() + newHtml)
        }


        //update pagination
        var num_of_pages = !isNaN(json.num_of_pages) ? parseInt(json.num_of_pages) : 0;
        var pagination_container = $("#pagination_container");
        pagination_container.html('');
        for (var i = 0; i < num_of_pages; i++) {
            pagination_container.html(pagination_container.html() + '<li class="' +
                    ((i == json.params.offset) ? "active" : "") +
                    '"><a class="btn_pagination" offset="' + (i) + '" href="#">' + (i + 1) + '</a></li>');
        }



    }
    resetEvents();
}