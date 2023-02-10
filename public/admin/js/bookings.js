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
        columns: [{
                data: 'random_id',
                name: 'random_id',
                "render": function(data, type, row, meta) {
                    return row.random_id;
                }
            },
            { data: 'created_at', name: 'created_at' },
            { data: 'total', name: 'total' },
            {
                data: 'status',
                name: 'status',
                "render": function(data, type, row, meta) {
                    if (row.status == 'Order Placed') {
                        var color = 'bg-success';
                    }
                    if (row.status == 'In Progress') {
                        var color = 'bg-warning';
                    }
                    if (row.status == 'Canceled') {
                        var color = 'bg-danger';
                    }
                    return '<span class="badge ' + color + ' ">' + row.status + '</span>';
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
                data: 'id',
                name: 'id',
                searchable: false,
                class: 'table-action',
                "render": function(data, type, row, meta) {
                    return '<a href="javascript:void(0);" class="action-icon open-view" title="view" data-id="' + row.id + '">\
                                <i class="ri-eye-line"></i></a>';
                }
            },
        ]
    });

});