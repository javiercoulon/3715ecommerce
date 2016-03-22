 var Product_Categories=[];
 $(document).ready(function(){


                $(".product_options .product_option_command .btn").click(function(){
                  var product_container=$(this).parent().parent().parent().
                          parent().parent().parent().parent();
                  var product_id_container=product_container.children(".product_id_container:first-child"); 
                  var product_quantity_container=product_container.find(".product_quantity:first-child");
                  var product_id=parseInt(product_id_container.val());
                  var product_quantity=parseInt(product_quantity_container.val());
                  alert(product_id+" q: "+product_quantity)
                  //console.info(product_quantity.val())
                    
                });
                $(".btn_filter_type").click(function(){
                  $(this).toggleClass('btn-success');
                  if($(this).hasClass('btn-success')){
                    addToArray($(this).attr('id_cat'));
                  }else{
                    console.info($(this).attr('id_cat')+' '+(typeof $(this).attr('id_cat')));
                   removeFromArray($(this).attr('id_cat'))
                  }
                  console.info(Product_Categories);
                  updateProducts();

                });
                
            });



 function addToArray(val){
   Product_Categories.push(val);

 }

 function removeFromArray(val){
    for(var i in Product_Categories){
        if(Product_Categories[i]==val){
            Product_Categories.splice(i,1);
            break;
            }
    }
 }

 function updateProducts(){
    var product_query=$("#product_query").val();
    var sendquery=false;
    var sendFilter=false;
    if(product_query.length>0){
      sendquery=true;
    }
    if(Product_Categories.length>0){
      sendFilter=true;
    }

    if(!sendFilter&&!sendquery){
      return;
    }

    $.ajax({
       type: "POST",
       data: {operation:'reload',query:product_query,filters:Product_Categories,type:'_asinc',offset:0,max:10},
       url: BACKEND_URL+"list_products.php",
       success: function(msg){
        console.info(msg);
       }
    });


 }