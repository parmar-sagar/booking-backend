$(document).ready(function() {
    "use strict";
    // let id = currentLoggedInUser.id
    currentLoggedInUser = JSON.parse(currentLoggedInUser)
    //console.log(currentLoggedInUser.id)
    if(currentLoggedInUser.is_admin == 1){
        table.DataTable({
            language: {
                paginate: {
                    previous: "<i class='mdi mdi-chevron-left'>",
                    next: "<i class='mdi mdi-chevron-right'>"
                }
            },
            drawCallback: function() {
                $(".dataTables_paginate > .pagination").addClass("pagination-rounded"),
                    document.querySelector(".dataTables_wrapper .row").querySelectorAll(".col-md-6").forEach(function(e) {
                        e.classList.add("col-sm-6"), e.classList.remove("col-sm-12"), e.classList.remove("col-md-6")
                    })
            },
            processing: true,
            serverSide: true,
            ordering: false,
            ajax: table.data('table-href'),
            ajax: {
                url:table.data('table-href'),
                data: function(d){
                   d.action = $('#filter').val();
                   d.startDate = $('#start-date').val();
                   d.endDate = $('#end-date').val();
                }
             },
             
            columns: [
               
                    {
                        data: 'random_id',
                        name: 'random_id',
                        "render": function(data, type, row, meta) {
                            console.log(currentLoggedInUser.id)
                           
                                return row.tour_name+' x '+row.supplier_id;
                          
                           
                        }
                    },
                    {
                        data: 'random_id',
                        name: 'random_id',
                        "render": function(data, type, row, meta) {
                           
                                return row.first_name;
                
                           
                        }
                    },
                    {
                        data: 'random_id',
                        name: 'random_id',
                        "render": function(data, type, row, meta) {
                            
                                return row.date_of_tour;
                          
                            
                        }
                    },
                    {
                        data: 'random_id',
                        name: 'random_id',
                        "render": function(data, type, row, meta) {
                           
                                return row.pickup_time;
                          
                          
                        }
                    },
                    {
                        data: 'random_id',
                        name: 'random_id',
                        "render": function(data, type, row, meta) {
                           
                                return row.no_of_travelers;
                           
                           
                        }
                    },
                    {
                        data: 'payment_status',
                        name: 'payment_status',
                        "render": function(data, type, row, meta) {
                           
                                if (row.payment_status == 'Paid') {
                                    var color = 'bg-success';
                                }
                                if (row.payment_status == 'Unpaid') {
                                    var color = 'bg-warning';
                                }
                                return '<span class="badge ' + color + ' ">' + row.payment_status + '</span>';
                          
                           
                        }
                    },
                    {
                        data: 'random_id',
                        name: 'random_id',
                        "render": function(data, type, row, meta) {
                           
                                return row.voucher;
                           
                            
                        }
                    },
                    {
                        data: 'random_id',
                        name: 'random_id',
                        "render": function(data, type, row, meta) {
                           
                                return row.voucher_expiry_date;
                          
                            
                        }
                    },
                    {
                        data: 'id',
                        name: 'id',
                        searchable: false,
                        class: 'table-action',
                        "render": function(data, type, row, meta) {
                            let action =(row.is_redeem == 2) ? 'Redeemed' : 'Redeem';
                            let classadd = (row.is_redeem == 2) ? 'success' : 'warning';
                            let disabled = (row.is_redeem == 2) ? 'disabled' : '';
                            let redeemDate = (row.is_redeem == 2) ? row.redeem_date : '';
        
                            let permission =(row.is_permission) ? 'disabled' : '';
                            
                                return '<button type="button" class="btn btn-'+classadd+'" '+disabled+' '+permission+' btn-sm" id="redeem" data-id="' + row.id + '">'+action+'</button>\
                                <span>'+redeemDate+'</span>';
                           
                           
                        }
                    },
              
               
            ]
        });
    }else if(currentLoggedInUser.is_admin == 0){
        table.DataTable({
            language: {
                paginate: {
                    previous: "<i class='mdi mdi-chevron-left'>",
                    next: "<i class='mdi mdi-chevron-right'>"
                }
            },
            drawCallback: function() {
                $(".dataTables_paginate > .pagination").addClass("pagination-rounded"),
                    document.querySelector(".dataTables_wrapper .row").querySelectorAll(".col-md-6").forEach(function(e) {
                        e.classList.add("col-sm-6"), e.classList.remove("col-sm-12"), e.classList.remove("col-md-6")
                    })
            },
            processing: true,
            serverSide: true,
            ordering: false,
            ajax: table.data('table-href'),
            ajax: {
                url:table.data('table-href'),
                data: function(d){
                   d.action = $('#filter').val();
                   d.startDate = $('#start-date').val();
                   d.endDate = $('#end-date').val();
                }
             },
             
            columns: [
               
                    {
                        data: 'random_id',
                        name: 'random_id',
                        "render": function(data, type, row, meta) {
                            if(currentLoggedInUser.id == row.supplier_id){
                                return row.tour_name+' x '+row.supplier_id;
                            }else{
                               
                            }
                           
                        }
                    },
                    {
                        data: 'random_id',
                        name: 'random_id',
                        "render": function(data, type, row, meta) {
                            if(currentLoggedInUser.id == row.supplier_id){
                                return row.first_name;
                            }
                           
                        }
                    },
                    {
                        data: 'random_id',
                        name: 'random_id',
                        "render": function(data, type, row, meta) {
                            if(currentLoggedInUser.id == row.supplier_id){
                                return row.date_of_tour;
                            }
                            
                        }
                    },
                    {
                        data: 'random_id',
                        name: 'random_id',
                        "render": function(data, type, row, meta) {
                            if(currentLoggedInUser.id == row.supplier_id){
                                return row.pickup_time;
                            }
                          
                        }
                    },
                    {
                        data: 'random_id',
                        name: 'random_id',
                        "render": function(data, type, row, meta) {
                            if(currentLoggedInUser.id == row.supplier_id){
                                return row.no_of_travelers;
                            }
                           
                        }
                    },
                    {
                        data: 'payment_status',
                        name: 'payment_status',
                        "render": function(data, type, row, meta) {
                            if(currentLoggedInUser.id == row.supplier_id){
                                if (row.payment_status == 'Paid') {
                                    var color = 'bg-success';
                                }
                                if (row.payment_status == 'Unpaid') {
                                    var color = 'bg-warning';
                                }
                                return '<span class="badge ' + color + ' ">' + row.payment_status + '</span>';
                            }
                           
                        }
                    },
                    {
                        data: 'random_id',
                        name: 'random_id',
                        "render": function(data, type, row, meta) {
                            if(currentLoggedInUser.id == row.supplier_id){
                                return row.voucher;
                            }
                            
                        }
                    },
                    {
                        data: 'random_id',
                        name: 'random_id',
                        "render": function(data, type, row, meta) {
                            if(currentLoggedInUser.id == row.supplier_id){
                                return row.voucher_expiry_date;
                            }
                            
                        }
                    },
                    {
                        data: 'id',
                        name: 'id',
                        searchable: false,
                        class: 'table-action',
                        "render": function(data, type, row, meta) {
                            let action =(row.is_redeem == 2) ? 'Redeemed' : 'Redeem';
                            let classadd = (row.is_redeem == 2) ? 'success' : 'warning';
                            let disabled = (row.is_redeem == 2) ? 'disabled' : '';
                            let redeemDate = (row.is_redeem == 2) ? row.redeem_date : '';
        
                            let permission =(row.is_permission) ? 'disabled' : '';
                            if(currentLoggedInUser.id == row.supplier_id){
                                return '<button type="button" class="btn btn-'+classadd+'" '+disabled+' '+permission+' btn-sm" id="redeem" data-id="' + row.id + '">'+action+'</button>\
                                <span>'+redeemDate+'</span>';
                            }
                           
                        }
                    },
              
               
            ]
        });
    }
   
    $('#filter').change(function(){
        table.DataTable().draw();
     });
     $('#submit-filter').on('click',function(){
        table.DataTable().draw();
     })
        $('#clear-filter').on('click',function(){
        $('#start-date').val('');
        $('#end-date').val('');
        table.DataTable().draw();
    })
    

});