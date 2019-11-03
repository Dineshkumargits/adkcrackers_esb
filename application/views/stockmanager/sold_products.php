<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if(!isset($this->session->userdata['logged_in']))
{
    header("location:".base_url('admin'));
}
?>
<?php $active = basename($_SERVER['PHP_SELF'], ".php");include __DIR__."/../header.php";?>
<!-- MAIN -->
<div class="main">
	<!-- MAIN CONTENT -->
	<div class="main-content">
		<div class="container-fluid">
			<!-- form -->
			<form class="form-auth" action="<?=base_url('stockmanager/sold_products_data')?>" method="post">
				<?php
					$success_msg= $this->session->flashdata('success_msg');
					$error_msg= $this->session->flashdata('error_msg');
					if($success_msg){
						?>
						<div class="alert alert-success alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<i class="fa fa-check-circle"></i> <?php echo '  '.$success_msg; ?>
						</div>
					<?php
					}
					if($error_msg){
						?>
						<div class="alert alert-danger alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<i class="fa fa-times-circle"></i> <?php echo '  '.$error_msg; ?>
						</div>
						<?php
					}
				?>
				<div class="row" style="display:flex">
					<h3 class="page-title col-md-6">Sold Products</h3>
					<div class="form-group col-md-6 col-md-offset-9">
						<button type="submit" class="btn btn-success "><i class="fa fa-plus-circle"></i> Add</button>
					</div>
				</div>
				<div class="row"><div class="col-md-10 col-md-offset-1">
					<div class="panel">
						<div class="row" style="display:flex">
							<div class="panel-heading col-md-6" >
								<h3 class="panel-title">Product Details</h3>
							</div>
							<div class="form-group col-md-6 col-md-offset-6" style="margin-top:20px;margin-right:25px">
								<label for="date" class="control-label sr-only">Date</label>
								<input type="text" class="form-control" name ="date" id="date" value="" placeholder="Date">
							</div>	
						</div>
						<div class="panel-body">
							<div class="col-md-6">
								<select class = "product form-control" name="product_id" id="product"></select>
								<br><br>
								<select class="client form-control" id="client" name="client_id"></select>
								<br><br>
								<div class="form-group">
									<label for="price" class="control-label sr-only">Price</label>
									<input type="text" class="form-control" name ="price" id="price" value="" placeholder="Price">
								</div>
							</div>
							<div class="col-md-6">
								<select class="company form-control" id="company" name="company_id"></select>
								<br><br>
								<select class="agent form-control" id="agent" name="agent_id" ></select>
								<br><br>
								<div class="form-group">
									<label for="quantity" class="control-label sr-only">Quantity</label>
									<input type="text" class="form-control" name ="quantity" id="quantity" value="" placeholder="Quantity">
								</div>
							</div>
						</div>
					</div></div>
				</div>
			</form>
		</div>
	</div>
	<!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->
<div class="clearfix"></div>

<script src="<?=base_url('assets/scripts/datepicker')?>/mootools-core.js" type="text/javascript"></script>
<script src="<?=base_url('assets/scripts/datepicker')?>/mootools-more.js" type="text/javascript"></script>
<!-- <script src="<?=base_url('assets/scripts/datepicker')?>/Locale.en-US.DatePicker.js" type="text/javascript"></script> -->
<script src="<?=base_url('assets/scripts/datepicker')?>/Picker.js" type="text/javascript"></script>
<script src="<?=base_url('assets/scripts/datepicker')?>/Picker.Attach.js" type="text/javascript"></script>
<script src="<?=base_url('assets/scripts/datepicker')?>/Picker.Date.js" type="text/javascript"></script>
<?php include __DIR__."/../footer.php";?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
<script>
// company_suggests
$(document).ready(function(){
new Picker.Date($$('#date'), {
		timePicker: false,
		positionOffset: {x: 5, y: 0},
		pickerClass: 'datepicker_bootstrap',
		format:null,
		useFadeInOut: !Browser.ie
	});
$('.company').select2({
placeholder: 'Select Company',
ajax: {
  url: '<?=base_url("stockmanager/company_list_suggests")?>',
  dataType: 'json',
  delay: 250,
  processResults: function (data) {
	return {
	  results: data
	};
  },
  cache: true
}
});
$('.client').select2({
placeholder: 'Select Client',
ajax: {
  url: '<?=base_url("stockmanager/client_list_suggests")?>',
  dataType: 'json',
  delay: 250,
  processResults: function (data) {
	return {
	  results: data
	};
  },
  cache: true
}
});
$('.product').select2({
placeholder: 'Select Product',
ajax: {
  url: '<?=base_url("stockmanager/product_list_suggests")?>',
  dataType: 'json',
  delay: 250,
  processResults: function (data) {
	return {
	  results: data
	};
  },
  cache: true
}
});
$('#product').on('select2:select', function (e){
	var prod = e.params.data;
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		$('#company').empty().trigger('change');
		if (this.readyState == 4 && this.status == 200) {
			let company_data = JSON.parse(this.responseText);
			console.log(company_data);
			$('#company').select2({data:company_data});
		

			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				$('#agent').empty().trigger('change');
				if (this.readyState == 4 && this.status == 200) {
				let agent_data = JSON.parse(this.responseText);
				$('#agent').select2({data:agent_data});
				}
			};
			xhttp.open("GET", '<?=base_url("stockmanager/agent_list_suggests_by_company?c_id=")?>'+company_data[0].id, true);
			xhttp.send();
		}
	};
	xhttp.open("GET", '<?=base_url("stockmanager/getCompanyByProductId?p_id=")?>'+prod.id, true);
	xhttp.send();
});
$('#company').on('select2:select', function (e) {
    var data = e.params.data;
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		$('#agent').empty().trigger('change');
		if (this.readyState == 4 && this.status == 200) {
		let data = JSON.parse(this.responseText);
		$('#agent').select2({data:data});
		}
	};
	xhttp.open("GET", '<?=base_url("stockmanager/agent_list_suggests_by_company?c_id=")?>'+data.id, true);
	xhttp.send();
});
$('#agent').select2({placeholder:"Select Agent",allowClear:true});
})
</script>