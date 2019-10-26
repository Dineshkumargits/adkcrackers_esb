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
			<form class="form-auth" action="<?=base_url('stockmanager/add_company_data')?>" method="post">
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
					<h3 class="page-title col-md-6">Companies</h3>
					<div class="form-group col-md-6 col-md-offset-9">
						<button type="submit" class="btn btn-success "><i class="fa fa-check-circle"></i> Save</button>
					</div>
				</div>
				<div class="row">
					<div class="panel">
						<div class="col-md-6">
							<div class="panel-heading">
								<h3 class="panel-title">Company Details</h3>
							</div>
							<div class="panel-body">
								<!-- <div class="col-md-6"> -->
									<div class="form-group">
										<label for="company_name" class="control-label sr-only">Name</label>
										<input type="text" class="form-control" name ="company_name" id="company_name" value="" placeholder="Name">
									</div>
									<br>
									<div class="form-group">
										<label for="company_address" class="control-label sr-only">Address</label>
										<textarea class="form-control" name ="company_address" id="company_address" placeholder="Address" rows="3"></textarea>
									</div>
									<br>
									<div class="form-group">
										<label for="company_ph_no" class="control-label sr-only">Phone number</label>
										<input type="text" class="form-control" name ="company_ph_no" id="company_ph_no" value="" placeholder="Phone Number">
									</div>
									<br>
									<div class="form-group">
										<label for="agent_id" class="control-label sr-only">Agent Name</label>
										<input type="text" class="form-control" name ="agent_id" id="agent_id" value="" placeholder="Agent Name (optional)">
									</div>
								<!-- </div> -->
							</div>
						</div>
						<!-- Bank Details -->
						<div class="panel-heading">
							<h3 class="panel-title">Bank Details</h3>
						</div>
						<div class="panel-body">
							<div class="col-md-6">
								<div class="form-group">
									<label for="acc_no" class="control-label sr-only">Account Number</label>
									<input type="text" class="form-control" name ="co_acc_no" id="acc_no" value="" placeholder="Account Number">
								</div>
								<br>
								<div class="form-group">
									<label for="ifsc_code" class="control-label sr-only">IFSC Code</label>
									<input type="text" class="form-control" name ="co_ifsc_code" id="ifsc_code" value="" placeholder="IFSC Code">
								</div>
								<br>
								<div class="form-group">
									<label for="bank_name" class="control-label sr-only">Bank Name</label>
									<input type="text" class="form-control" name ="co_bank_name" id="bank_name" value="" placeholder="Bank Name">
								</div>
								<br>
								<label class="fancy-checkbox">
									<input type="checkbox" id="gpay" onclick="gpay_input()">
									<span>GPay</span>
								</label>
								<div class="form-group" style="display:none" id = "gpay_div"><br>
									<label for="gpay_no" class="control-label sr-only">GPay Number</label>
									<input type="text" class="form-control" name ="co_gpay_no" id="gpay_no" value="" placeholder="GPay Number">
								</div>
								<label class="fancy-checkbox">
									<input type="checkbox" id="bhim" onclick="bhim_input()">
									<span>BHIM UPI</span>
								</label>
								<div class="form-group" style="display:none" id = "bhim_div"><br>
									<label for="bhim_upi" class="control-label sr-only">BHIM UPI</label>
									<div class="col-md-12 input-group">
										<input type="text" class="form-control" name ="co_bhim_upi" id="bhim_upi" value="" placeholder="BHIM UPI">
										<span class="input-group-addon btn btn-info" disabled="disabled">@upi</span>
									</div>
									
								</div>
								<label class="fancy-checkbox">
									<input type="checkbox" id="phonepe" onclick="phonepe_input()">
									<span>PhonePe</span>
								</label>
								<div class="form-group" style="display:none" id = "phonepe_div"><br>
									<label for="phonepe_no" class="control-label sr-only">PhonePe Number</label>
									<input type="text" class="form-control" name ="co_phonepe_no" id="phonepe_no" value="" placeholder="PhonePe Number">
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
	<!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->
<div class="clearfix"></div>
<?php include __DIR__."/../footer.php";?>

<script>
function gpay_input()
{
	var checkbox = document.getElementById('gpay');
	var input = document.getElementById('gpay_div');
	var checkbox_ag = document.getElementById('ag_gpay');
	var ag_input = document.getElementById('ag_gpay_div')
	if(checkbox.checked == true)
		input.style.display = "block";
	else
		input.style.display = "none";
	if(checkbox_ag.checked == true)
		ag_input.style.display = "block";
	else
		ag_input.style.display = "none";
}
function bhim_input()
{
	var checkbox = document.getElementById('bhim');
	var input = document.getElementById('bhim_div');
	var ag_checkbox = document.getElementById('ag_bhim');
	var ag_input = document.getElementById('ag_bhim_div');
	if(checkbox.checked == true)
		input.style.display = "block";
	else
		input.style.display = "none";
	if(ag_checkbox.checked == true)
		ag_input.style.display = "block";
	else
		ag_input.style.display = "none";
}
function phonepe_input()
{
	var checkbox = document.getElementById('phonepe');
	var input = document.getElementById('phonepe_div');
	if(checkbox.checked == true)
		input.style.display = "block";
	else
		input.style.display = "none";
	var ag_checkbox = document.getElementById('ag_phonepe');
	var ag_input = document.getElementById('ag_phonepe_div');
	if(ag_checkbox.checked == true)
		ag_input.style.display = "block";
	else
		ag_input.style.display = "none";
}
</script>