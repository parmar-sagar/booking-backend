/* Open Any From */
jQuery('body').on('click','.openForm',function(){
	var action = $(this).attr('data-url');
	$.ajax({
		url: action,
	}).done(function(data) {
		// console.log('this');
		// console.log(data);
		$('#kt_table_content, #kt_table_form').toggle();
		$('#kt_table_form').html(data);
	}).fail(function(data) {
		toastr.error("something went wrong please try again!");
	});
});

jQuery('body').on('click','.delete',function(){
	let action = $(this).attr('data-url');

Swal.fire({
	title: "Are you sure?",
	text: "Once deleted, you will not be able to recover this records!",
	icon: "warning",
	showCancelButton: true,
	confirmButtonText: "Yes, delete it!",
	cancelButtonText: "No, cancel!",
	reverseButtons: true
}).then(function(result) {
	if (result.value) {
		$.ajax({
			url: action,
		}).done(function(data) {
			table.ajax.reload();
			Swal.fire("Deleted!",data,"success");
		}).fail(function() {
			Swal.fire("Oops!","something went wrong!", "warning");
		});
	} else if (result.dismiss === "cancel") {
		Swal.fire("Cancelled","Your records is safe :)","error");
	} 
});
});

/* Submit Form Using Ajax */
$(document).on('submit','#submitForm',function(e){
	e.preventDefault();
	var $this = $(this).parent();

	$this.find('button#submitButton').prop('disabled',true);

	$this.find('.alert-info').show();

	var processData = $this.find('.processData').val();

	$this.find('.alert-info .validation').html(processData);
	
	$.ajax({
		url: $(this).prop('action'),
		type: $(this).prop('method'),
		data:new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
	}).done(function(data) {
		$this.find('.alert-info').hide();
		if((data.error)){
			$this.find('.alert-success').hide();
			$this.find('.alert-danger').show();
          	$this.find('.alert-danger ul').html('');
          	$this.find('.alert-danger .validation').html(data.error);
		}else{
			table.ajax.reload();
			toastr.success(data);
			$('#kt_table_content , #kt_table_form').toggle();
		}
		$this.find('button#submitButton').prop('disabled',false);
	}).fail(function(data) {
		$this.find('.alert-info').hide();
        $this.find('.alert-danger').show();
        $this.find('.alert-danger ul').html('');
        $this.find('.alert-danger .validation').html('something is wrong please try again!');
        $this.find('button#submitButton').prop('disabled',false);
	});
   });

/* Load Main Page Or Back Button */
jQuery('body').on('click','.loadMainPage',function(){
	table.ajax.reload();
});