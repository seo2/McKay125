<?
		include('header.php');
		include('sidebar.php');
		?>

		<!-- start: Content -->
		<div class="main">


			<div class="row">
			    <div class="col-md-12">
                    <form class="form-horizontal" id="formExcel" method="post" accept-charset="utf-8">
			        <div class="panel panel-default">
			            <div class="panel-heading">
			                <h2>Códigos en batch</h2>
			            </div>
			            <div class="panel-body">
			                <div class="row">
			                	<div class="col-sm-6">
									<div class="form-group">
				                        <label class="col-md-3 control-label" for="file-input">Archivo Excel</label>
				                        <div class="col-md-9">
				                            <input type="file" id="upload" name="upload" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" required>
				                        </div>
				                    </div>
			                	</div>
			                	<div class="col-sm-6">
	
			                	</div>
			                </div>
			            </div>
			            <div class="panel-footer">
			                <button type="submit" class="btn btn-sm btn-primary" id="btnSubir"><i class="fa fa-dot-circle-o"></i> Guardar</button>
			            </div>
			        </div>

			        </form>

			    </div>
			</div>
			<!--/.row-->


				
		</div>
		<!-- end: Content -->
		
		
		<footer>

			<div class="row">

				<div class="col-sm-5">
					&copy; 2015 Cloudcore
				</div><!--/.col-->

			</div><!--/.row-->	

		</footer>
		
				<div class="modal fade" id="myModal">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Modal title</h4>
					</div>
					<div class="modal-body">
						<p>Here settings can be configured...</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary">Save changes</button>
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
		
		<!-- start: JavaScript-->
		<!--[if !IE]>-->

				<script src="assets/js/jquery-2.1.1.min.js"></script>

		<!--<![endif]-->

		<!--[if IE]>

			<script src="assets/js/jquery-1.11.1.min.js"></script>

		<![endif]-->

		<!--[if !IE]>-->

			<script type="text/javascript">
				window.jQuery || document.write("<script src='assets/js/jquery-2.1.1.min.js'>"+"<"+"/script>");
			</script>

		<!--<![endif]-->

		<!--[if IE]>

			<script type="text/javascript">
		 	window.jQuery || document.write("<script src='assets/js/jquery-1.11.1.min.js'>"+"<"+"/script>");
			</script>

		<![endif]-->
		<script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		
		<script src="assets/plugins/jquery-ui/js/jquery-ui-1.10.4.min.js"></script>
		<script src="assets/plugins/select2/js/select2.min.js"></script>
		<script src="assets/plugins/autosize/jquery.autosize.min.js"></script>
		<script src="assets/plugins/placeholder/jquery.placeholder.min.js"></script>
		<script src="assets/plugins/maskedinput/jquery.maskedinput.min.js"></script>
		<script src="assets/plugins/inputlimiter/js/jquery.inputlimiter.1.3.1.min.js"></script>
		<script src="assets/plugins/datepicker/js/bootstrap-datepicker.min.js"></script>
		<script src="assets/plugins/timepicker/js/bootstrap-timepicker.min.js"></script>
		<script src="assets/plugins/moment/moment.min.js"></script>
		<script src="assets/plugins/daterangepicker/js/daterangepicker.min.js"></script>
		<script src="assets/plugins/hotkeys/jquery.hotkeys.min.js"></script>
		<script src="assets/plugins/wysiwyg/bootstrap-wysiwyg.min.js"></script>
		<script src="assets/plugins/colorpicker/js/bootstrap-colorpicker.min.js"></script>
	

		<!-- theme scripts -->
		<script src="assets/plugins/pace/pace.min.js"></script>
		<script src="assets/js/jquery.mmenu.min.js"></script>
		<script src="assets/js/core.min.js"></script>
		
		<!-- inline scripts related to this page -->
		<script src="assets/js/pages/form-elements.js"></script>
		<script src="assets/plugins/jquery-cookie/jquery.cookie.min.js"></script>
		<script src="assets/js/demo.min.js"></script>
		
		<!-- Scritps de Seo2 -->
		<script src="assets/js/sweetalert.min.js"></script>
		<script src="assets/js/jquery.validate.js"></script>
		<script src="assets/js/jquery.Rut.min.js"></script>
		<script src="assets/js/cloudcore.js"></script>
		<!-- end: JavaScript-->

	</body>
</html>