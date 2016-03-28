<?php
echo 'called';
$PAGE_TITLE = "Error"; //actual title
if(isset($_POST['error'])){
    $error_message=$_POST['error'];
    require_once "../resources/constants.php";
}
?>



<html>
    <head>
        <title>ECommerce | <?php echo isset($PAGE_TITLE) ? $PAGE_TITLE : "-"; ?></title>
        <meta charset="utf-8">
        <link rel="icon"       type="image/png"  href="<?php echo $_IMAGESURL; ?>favicon.png">
        <link rel="stylesheet" type="text/css" href="<?php echo $_CSSURL . "bootstrap.min.css" ?>">   
        <style>
            .error_container{
                margin-top: 8%;
            }
            .error_message{
                padding: 15px;
                display: block;
                font-weight: 900;
                margin-top: 20%;
                word-break: break-all;
            }
            .btn{
                display: inline-block;
                margin: 0 auto;
            }
            .btn_container{
                display: block;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <div class="container error_container">
            <hr>
            <div class="row">
                <div class="col-xs-12 col-md-8">
                    <img src="<?php echo $_IMAGESURL; ?>sad_face.jpg" class="img img-responsive"/>
                </div>
                <div class="col-xs-12 col-md-4">
                    <span class="error_message text-danger bg-danger"><?php echo $error_message; ?></span>
                    <hr>
                    <span class="btn_container">
                        <a id="btn_action" class=" btn btn-primary btn-lg ">Return to Homepage</a>
                        <script>
                            window.onload=function(){
                                document.getElementById('btn_action').onclick=(function(e){
                                    e.preventDefault();
                                    window.location.replace(<?php echo $_SERVERURLROOT;?>);
                                });
                            };
                        </script>
                    </span>
                </div>                
            </div>
        </div>
    </body>
</html>