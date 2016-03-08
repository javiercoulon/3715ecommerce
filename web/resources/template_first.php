<html>
	<head>
		<title>ECommerce | <?php echo isset($PAGE_TITLE)?$PAGE_TITLE:"-";?></title>
		<link rel="stylesheet" type="text/css" href="<?php echo $_CSSURL."bootstrap.min.css"?>">
		<?php 
		
			foreach($PAGE_CSSs as $css){
				echo '<link rel="stylesheet" type="text/css" href="'.$_CSSURL.''.$css.'">';
			}
		?>
	</head>
	<body>
		<div class="main_container">
			<div>
				<?php include_once $_RESOURCESPATH."header.php";?>
			</div>
			<div>