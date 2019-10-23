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
					<h1>ADD MONEY PAGE</h1>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
		<div class="clearfix"></div>
		<?php include __DIR__."/../footer.php";?>
