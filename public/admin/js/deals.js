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
            {data: 'id', name:'id',
                    "render": function ( data, type, row, meta ) {
                        return meta.row+1;
                    }
                },
                {data: 'name', name: 'name'},
                {data: 'is_deals', name:'is_deals',
                    "render": function ( data, type, row, meta ) {
                        var deals = {
                            0: {'text': 'tour', 'color': 'success'},
                            1: {'text': 'deals', 'color': 'danger'},
                        };
                        return '<span class="badge bg-'+deals[row.is_deals].color+'">'+deals[row.is_deals].text+'</span>';
                    }
                },
                {data: 'status', name:'status',
                    "render": function ( data, type, row, meta ) {
                        var status = {
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

