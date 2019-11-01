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
			<form class="form-auth" action="<?=base_url('stockmanager/add_product_data')?>" method="post">
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
					<h3 class="page-title col-md-6">Products</h3>
					<div class="form-group col-md-6 col-md-offset-9">
						<button type="submit" class="btn btn-success "><i class="fa fa-plus-circle"></i> Add</button>
					</div>
				</div>
				<div class="row"><div class="col-md-6 col-md-offset-3">
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Product Details</h3>
						</div>
						<div class="panel-body">
							<div class="form-group">
								<label for="product_name" class="control-label sr-only">Product Name</label>
								<input type="text" class="form-control" name ="product_name" id="product_name" value="" placeholder="Product Name">
							</div>
							<br>
							<select class="company form-control" id="company" name="company_id"></select>
							<br><br>
							<div class="row" style="display:flex">
								<div class="form-group col-md-6">
									<label for="price" class="control-label sr-only">Price</label>
									<input type="text" class="form-control" name ="price" id="price" value="" placeholder="Price">
								</div>
								<!-- Quantity is in doubted -->
								<div class="form-group col-md-6">
									<label for="quantity" class="control-label sr-only">Quantity</label>
									<input type="text" class="form-control" name ="quantity" id="quantity" disabled="disabled" value="" placeholder="Quantity">
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
<?php include __DIR__."/../footer.php";?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
<script>
// company_suggests
$(document).ready(function(){
$('.company').select2({
placeholder: 'Select Company',
ajax: {
  url: '<?=base_url("stockmanager/company_list_suggests")?>',
  dataType: 'json',
  delay: 250,
  processResults: function (data) {
	  console.log(data)
	return {
	  results: data
	};
	
  },
  cache: true
}
});
})
</script>