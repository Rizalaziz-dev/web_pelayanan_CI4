var validator;

$(function () {
	load_table();
	
	// form-add-edit submit event trap
	$('#form-add-edit').on('submit', function(e) { 
        e.preventDefault();  //prevent form from submitting
    });
	
	$('#btn-create').on('click', function(){
		add();
	});
	
	$('#modal-add-edit').on('shown.bs.modal', function(){
		clear_validation();
		$('#card_number').focus();
	});
});

$(document).ready(function(){
	$.validator.setDefaults({
		submitHandler: function () {
		  save();
		}
	  });
  
	validator = $('#form-add-edit').validate({
		rules: {
		  card_number: {
			required: true,
		  },
		  member_name: {
			required: true,
		  },
		  member_address: {
			required: true
		  },
		  member_phone: {
			required: true
		  },
		},
		messages: {
		  card_number: {
			required: "Please enter member id or smartcard number"
		  },
		  member_name: {
			required: "Please enter member full name"
		  },
		  member_address: {
			required: "Please enter member address"
		  },
		  member_phone: "Please enter member phone"
		},
		errorElement: 'span',
		errorPlacement: function (error, element) {
		  error.addClass('invalid-feedback');
		  element.closest('.form-group').append(error);
		},
		highlight: function (element, errorClass, validClass) {
		  $(element).addClass('is-invalid');
		},
		unhighlight: function (element, errorClass, validClass) {
		  $(element).removeClass('is-invalid');
		}
	  });
});

// fungsi untuk memberikan waktu delay terhadap penekanan tombol
function delay(callback, ms) {
  var timer = 0;
  return function() {
    var context = this, args = arguments;
    clearTimeout(timer);
    timer = setTimeout(function () {
      callback.apply(context, args);
    }, ms || 0);
  };
}

// load datatables function
function load_table()
{
	$('#tabel-member').DataTable({
	  processing: true,
      serverSide: true,
	  ordering: true,
	  deferRender: true,
	  ajax: {
		url: base_url + 'member/data',
		/* dataSrc: 'data', */
		data: function(d) {
			//d.keywords = $('#keywords').val();
		}
	  },
	  columns: [
		{ data: 'card_number', className: 'center' },
		{ data: 'member_name', className: 'center' },
		{ data: 'member_address' },
		{ data: 'member_phone' , "className": "center"},
		{ render: function(data, type, row, meta) {
			// hanya menggunakan meta.row index untuk ambil data di tabel
				var html = '<a href="javascript:void(0)" onclick="edit('+meta.row+')">Edit</a>&nbsp;&nbsp;';
				html += '<a href="javascript:void(0)" onclick=remove('+meta.row+')>Delete</a>';
				return html;
			},
			"className": "dt-center"
		}
	  ],
	  responsive: true,
	  bFilter: true,
	  order: [[ 0, 'asc' ]],
	  pagingType: 'full_numbers',
	  language: {
		searchPlaceholder: 'Search...',
		sSearch: '',
		lengthMenu: '_MENU_ items/page',
		info: 'Showing _START_ to _END_ of _TOTAL_ entries',
		paginate: {
			"first":      "First",
			"last":       "Last",
			"next":       "Next",
			"previous":   "Prev"
		}
	  }
	});
	
	// Select2 for datatables page size
	//$('.dataTables_length select').select2({ minimumResultsForSearch: Infinity, width:60 });
}

// refresh data table branch
function refresh_table()
{
	$('#tabel-member').DataTable().ajax.reload();
}

function add()
{
	clear_form();
	$('#action').val('create');
	$('#member_id').val('');
	$('#modal-form-title').html('Add New Member');
	$('#modal-add-edit').modal('show');
}

function edit(rowIndex)
{
	if(rowIndex != undefined) {
		var table = $('#tabel-member').DataTable();
		var data  = table.row(rowIndex).data();
		
		// pengisian values ke form fields..
		$('#card_number').val(data.card_number);
		$('#member_name').val(data.member_name);
		$('#member_address').val(data.member_address);
		$('#member_phone').val(data.member_phone);
		$('#member_id').val(data.member_id);
		
		$('input[name="action"]').val('edit'); // action simpan
		$('#modal-form-title').html('Add New Member'); // title modal
		
		// show modal
		$('#modal-add-edit').modal('show');
	}
}

function clear_form()
{
	$('#member_id').val('');
	$('#card_number').val('');
	$('#member_name').val('');
	$('#member_address').val('');
	$('#member_phone').val('');
}

// fungsi penyimpanan data ke server
function save()
{
	var btn_title = $('#btn-add-edit').html();
	$('#btn-add-edit').html('Please wait..');
	$('#btn-add-edit').prop('disabled', true);
	
	$.ajax({
		url: base_url + 'member/save',
		type: 'POST',
		dataType: 'JSON',
		data: {
			action: $('#action').val(),
			card_number: $('#card_number').val(),
			member_name: $('#member_name').val(),
			member_address: $('#member_address').val(),
			member_phone: $('#member_phone').val(),
			member_id: $('#member_id').val()
		},
		success: function(response) {
			
			$('#btn-add-edit').html(btn_title);
			$('#btn-add-edit').prop('disabled', false);
			if(response.success == true) {
				$('#modal-add-edit').modal('hide');
				refresh_table();	
				//show_alert(response)
				toastr.success(response.message)
			}else{
				//$('#error-container').html(response.message);
				toastr.error(response.message);
			}
		}
	}); 
}

// hapus data
function remove(rowIndex)
{
	if(rowIndex != undefined) {
		var table = $('#tabel-member').DataTable();
		var data  = table.row(rowIndex).data();
		
		$('#btn-delete-confirm').attr('onclick', 'remove_confirm('+rowIndex+')');
		$('#modal-delete-confirm').modal('show');
	}
}

// konfirmasi hapus data
function remove_confirm(rowIndex)
{
	if(rowIndex != undefined) {
		var table = $('#tabel-member').DataTable();
		var data  = table.row(rowIndex).data();
		
		var btn_title = $('#btn-delete-confirm').html();
		$('#btn-delete-confirm').html('Please wait..');
		$('#btn-delete-confirm').prop('disabled', true);
	
		$.ajax({
			url: base_url + 'member/remove',
			type: 'POST',
			dataType: "JSON",
			data: {
				member_id: data.member_id
			},
			success: function(response) {
				var title = '';
				if(response.success == true) {
					toastr.success(response.message);
					$('#modal-delete-confirm').modal('hide');
					refresh_table();
				}else{
					toastr.error(response.message);
				}
				//show_alert(response, title);
				$('#btn-delete-confirm').html(btn_title);
				$('#btn-delete-confirm').prop('disabled', false);
			}
		});
	}
}

function clear_validation()
{
	validator.resetForm();
}