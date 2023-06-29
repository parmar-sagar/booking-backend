$(document).ready(function() {
    "use strict";
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
                    return row.random_id;
                }
            },
            { data: 'no_of_travelers', name: 'no_of_travelers' },
            { data: 'total', name: 'total' },
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
    $('#filter').change(function(){
        table.DataTable().draw();
     });
     $('#submit-filter').on('click',function(){
        table.DataTable().draw();
     })
    

});