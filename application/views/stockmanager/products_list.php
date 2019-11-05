<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if(!isset($this->session->userdata['logged_in']))
{
    header("location:".base_url('admin'));
}
?>
<?php $active = basename($_SERVER['PHP_SELF'], ".php");include __DIR__."/../header.php";?>
<!-- MAIN -->

<!-- <script src="<?php echo base_url('assets/jquery/jquery-2.1.4.min.js')?>" type="text/javascript"></script> -->
<script src="<?=base_url('assets')?>/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js')?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js')?>" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
<!-- <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet"> -->

<div class="main">
	<!-- MAIN CONTENT -->
	<div class="main-content">
		<div class="container-fluid">
			<h1 style="font-size:20pt">Products List</h1>
			<br />
			<button class="btn btn-success" onclick="add_product()"><i class="glyphicon glyphicon-plus"></i> Add Product</button>
			<button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
			<br />
			<br />
			<table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Product Name</th>
						<th>Company</th>
						<th>Price</th>
						<th>Quantity</th>
						<th style="width:125px;">Action</th>
					</tr>
				</thead>
				<tbody>
				</tbody>

				<tfoot>
				<tr>
					<th>Product Name</th>
					<th>Company</th>
					<th>Price</th>
					<th>Quantity</th>
					<th>Action</th>
				</tr>
				</tfoot>
			</table>
		</div>
	</div>
	<!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->

<script type="text/javascript">
var save_method; //for save method string
var table;

$(document).ready(function() {

// company_suggests
$('#company').select2({
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

//datatables
table = $('#table').DataTable({ 

	"processing": true, //Feature control the processing indicator.
	"serverSide": true, //Feature control DataTables' server-side processing mode.
	"order": [], //Initial no order.

	// Load data for the table's content from an Ajax source
	"ajax": {
		"url": "<?php echo site_url('stockmanager/product_list_data')?>",
		"type": "POST"
	},

	//Set column definition initialisation properties.
	"columnDefs": [
	{ 
		"targets": [ -1 ], //last column
		"orderable": false, //set not orderable
	},
	],

});

//datepicker
$('.datepicker').datepicker({
	autoclose: true,
	format: "yyyy-mm-dd",
	todayHighlight: true,
	orientation: "top auto",
	todayBtn: true,
	todayHighlight: true,  
});

});

function add_product()
{
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Add Products'); // Set Title to Bootstrap modal title
}

function edit_product(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
	$('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('stockmanager/products_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="id"]').val(data.id);
            $('[name="productname"]').val(data.name);
            $('[name="company_id"]').val(data.company_id);
            $('[name="price"]').val(data.price);
            $('[name="quantity"]').val(data.quantity);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Product'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax 
}

function save()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url;

    if(save_method == 'add') {
        url = "<?php echo site_url('stockmanager/add_product_data')?>";
    } else {
        url = "<?php echo site_url('stockmanager/product_update')?>";
    }

    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#form').serialize(),
        dataType: "JSON",
        success: function(data)
        {

            if(data.status) //if success close modal and reload ajax table
            {
                $('#modal_form').modal('hide');
                reload_table();
            }

            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 


        },
        error: function (jqXHR, textStatus, errorThrown)
        {
			console.log(data+"isduish");
            alert('Error adding / update data');
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 

        }
    });
}

function delete_product(id)
{
    if(confirm('Are you sure delete this data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('stockmanager/product_delete')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                $('#modal_form').modal('hide');
                reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });

    }
}
</script>

<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Add Products</h3>
            </div>
            <div class="modal-body form">
                <form action="<?=base_url('stockmanager/add_product_data')?>" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id"/> 
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Product Name</label>
                            <div class="col-md-9">
                                <input name="productname" placeholder="Product Name" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label col-md-3">Company</label>
                            <div class="col-md-9">
								<select class="form-control" id="company" name="company_id"></select>
                                <span class="help-block"></span>
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-md-3">Price</label>
                            <div class="col-md-9">
                                <input name="price" placeholder="Price" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Quantity</label>
                            <div class="col-md-9">
                                <input name="quantity" placeholder="Quantity" class="form-control" type="text" disabled="disabled">
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->
<?php include __DIR__."/../footer.php";?>

