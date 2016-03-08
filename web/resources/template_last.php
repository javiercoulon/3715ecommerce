			</div>
			<div>
				<script src="<?php echo $_JSURL.'jquery.js';?>"></script>
				<script src="<?php echo $_JSURL.'bootstrap.min.js';?>"></script>
				<?php 
				
				foreach($PAGE_JSs as $js){
						echo '<script src="'.$_JSURL.$js.'"></script>';
				 }

				include_once $_RESOURCESPATH."footer.php";
				
				?>
			</div>			
		</div>
	</body>
</html>
	