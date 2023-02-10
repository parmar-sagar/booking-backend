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
        columns: [
            {data: 'random_id', name:'random_id',
                    "render": function ( data, type, row, meta ) {
                        return row.random_id;
                    }
                },
                {data: 'created_at', name: 'created_at'},
                {data: 'total', name: 'total'}, 
                {data: 'status', name: 'status'},
                {data: 'payment_status', name:'payment_status'},
                {data: 'id', name:'id',searchable: false,class:'table-action',
                    "render": function ( data, type, row, meta ) {
                        return '<a href="javascript:void(0);" class="action-icon open-form" title="view" data-id="'+row.id+'">\
                                <i class="ri-eye-line"></i></a>';
                    }
                },
            ]
    });

});

