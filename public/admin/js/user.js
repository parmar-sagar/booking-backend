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
            {data: 'first_name', name: 'first_name'},
            {data: 'last_name', name: 'last_name'},
            {data: 'email', name: 'email'},
            {data: 'mobile', name: 'mobile'},
            {data: 'created_at', name: 'created_at'},
            {data: 'status', name:'status', 
                "render": function ( data, type, row, meta ) {
                    let status = {
                        0: {'text': 'InActive', 'color': 'danger'},
                        1: {'text': 'Active', 'color': 'success'},
                    };
                    return '<span class="badge bg-'+status[row.status].color+'">'+status[row.status].text+'</span>';
                }
            },
            {data: 'id', name:'id',searchable: false,class:'table-action',
                "render": function ( data, type, row, meta ) {
                    return '<a href="javascript:void(0);" class="action-icon open-form" data-id="'+row.id+'">\
                            <i class="mdi mdi-square-edit-outline"></i></a>\
                            <a href="javascript:void(0);" class="action-icon delete" data-id="'+row.id+'">\
                            <i class="mdi mdi-delete"></i></a>';
                }
            },
        ]
    });
});