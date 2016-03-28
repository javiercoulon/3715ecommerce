<?php 
    require_once $_RESOURCESPATH.'security.php';
?>
<html>
	<head>
		<title>ECommerce | <?php echo isset($PAGE_TITLE)?$PAGE_TITLE:"-";?></title>
                <meta charset="utf-8">
                <link rel="icon"       type="image/png"  href="<?php echo $_IMAGESURL;?>favicon.png">
		<link rel="stylesheet" type="text/css" href="<?php echo $_CSSURL."bootstrap.min.css"?>">
		<?php 
		
			foreach($PAGE_CSSs as $css){
				echo '<link rel="stylesheet" type="text/css" href="'.$_CSSURL.''.$css.'">';
			}
		?>
	</head>
	<body>
		<div class="main_container container">
			<div>
				<?php include_once $_RESOURCESPATH."header.php";?>
			</div>
			<div>