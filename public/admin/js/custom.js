let table;
$(document).ready(function() {
    "use strict";
    table = $('#dataTable');

    $('#content-form').toggle();

    jQuery('body').on('click','.open-form',function(){
        let link = $(this).data('create-href');
      
        if(($(this).data('id'))){
            link = table.data('edit-href')+'/'+$(this).data('id');
        }
        $.ajax({
            url: link,
            success: function (response) {
                if((response.error)){
                    errorFun(response.error);
                }else{
                    $('#content-form, #content-table').toggle();
                    $('#content-form').html(response);
                    /* JQuery Validations */
                    $("#submit-form").validate();
                }
            },
            error: function (error) {
                warningFun();
            }
        });
    });

    jQuery('body').on('click','.goBack',function(){
        $('#content-form, #content-table').toggle();
    });

    /* Submit Form Using Ajax */
    $(document).on('submit','#submit-form',function(e){
        e.preventDefault();
        
        $.ajax({
            type: $(this).prop('method'),
            url: $(this).prop('action'),
            data:new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (response) {
                if((response.error)){
                    errorFun(response.error);
                }else{
                    $('#content-form, #content-table').toggle();
                    table.DataTable().ajax.reload();
                    $.toast({
                        heading: 'Success',
                        text: response.success,
                        showHideTransition: 'slide',
                        icon: 'success',
                        loaderBg: '#f96868',
                        position: 'top-center'
                    });
                }
            },error: function (error){
                warningFun();
            }
        });
    });

    // Warning Function
    function warningFun(){
        $.toast({
            heading: 'Warning',
            text: 'Something went wrong! Please try again!',
            showHideTransition: 'slide',
            icon: 'warning',
            loaderBg: '#57c7d4',
            position: 'top-center'
        });
    }

    // Error Function
    function errorFun(error){
        $.toast({
            heading: 'Error',
            text: error,
            showHideTransition: 'slide',
            icon: 'error',
            loaderBg: '#f2a654',
            position: 'top-center'
        });
    }

    /* Delete Record */
    jQuery('body').on('click','.delete',function(){
        let $this = $(this);
        let action = table.data('delete-href');
        let id = $this.data('id');
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
                    url: action+'/'+id,
                    success: function (response) {
                        $this.parents('tr').remove();
                        Swal.fire("Deleted!",data,"success");
                    },error: function (response) {
                        Swal.fire("Oops!", "something went wrong!", "warning");
                    }
                });
            } else if (result.dismiss === "cancel") {
                Swal.fire("Cancelled","Your records is safe :)","error");
            }
        });
    });

});