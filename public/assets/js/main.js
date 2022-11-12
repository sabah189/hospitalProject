console.log('test');

$(document).ready(()=>{



});


$(function () {
       
    let table= $('#patients-table').DataTable({
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Rechercher..."
        },
        dom: 'Bfrtip',
        'paging': true,
        'lengthChange': true,
        'searching': true,
        'ordering': true,
        'info': true,
        'autoWidth': true,
        "scrollX": true,
        columnDefs: [
            {
            orderable: false,
            className: 'select-checkbox',
            targets:   0
            }
        ],
        select: {
            style:    'os',
            selector: 'td:first-child'
        },
       /*  buttons: [   {
            extend:    'colvis',
            text:      '<i class="fas fa-bars"></i>',
            titleAttr: 'Colonnes',
            className: 'btn-light btn-sm border border-secondary rounded ml-1 mr-5'
        }, 
        {
            extend: 'print',
            text: '<i class="fas fa-print"></i>',
            titleAttr: 'Imprimer',
            className: 'btn-light btn-sm border border-secondary rounded ml-1'
        },
        {
            extend:    'copyHtml5',
            text:      '<i class="fa fa-files-o"></i>',
            titleAttr: 'Copier',
            className: 'btn-light btn-sm border border-secondary rounded ml-1'
        },
        {
            extend:    'excelHtml5',
            text:      '<i class="fa fa-file-excel-o"></i>',
            titleAttr: 'Exporter Excel',
            className: 'btn-light btn-sm border border-secondary rounded ml-1'
        },
        {
            extend:    'pdfHtml5',
            text:      '<i class="fa fa-file-pdf-o"></i>',
            titleAttr: 'Exporter PDF',
            className: 'btn-light btn-sm border border-secondary rounded ml-1'
        }
       
        ],*/
    "columnDefs": [
    {className: "dt-center" , targets: "_all"},
    { "width": "5px", targets: 0}, // checkbox
    { "width": "60px", "targets": 1 }, // action
    { "width": "5px", "targets": 2 }, // id
    { "width": "15px", "targets": 3 }, // Matricule
    { "width": "20px", "targets": 4 }, //first name
    { "width": "20px", "targets": 5 }, //second name
    { "width": "60px", "targets": 6 }, /* render: $.fn.dataTable.render.ellipsis( 12 ) }, // */ 
    { "width": "40px", "targets": 7 }, // date_integration
    { "width": "10px", "targets": 8 }, //grade
    { "width": "40px", "targets": 9 }, // email
    { "width": "20px", "targets": 10 }, // telephone

  
    ],
     'order': [[ 2, "desc" ]],
    });
       /*  table.buttons().container().insertAfter($('#doctor-table_filter label'));
        $('#patients-table_filter .btn-group .btn').addClass('tableButtons');
        $('#patients-table_filter label,#doctor-table_filter .btn-group').wrapAll( '<div id="dynamic-container"></div>');
        //$('#dynamic-container').css({"display": "flex","justify-content": "space-between"}); */
});

$(function () {
       
    let table= $('#departement-table').DataTable({
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Rechercher..."
        },
        dom: 'Bfrtip',
        'paging': true,
        'lengthChange': true,
        'searching': true,
        'ordering': true,
        'info': true,
        'autoWidth': false,
        "scrollX": false,
        columnDefs: [
            {
            orderable: false,
            className: 'select-checkbox',
            targets:   0
            }
        ],
        select: {
            style:    'os',
            selector: 'td:first-child'
        },
       /*  buttons: [   {
            extend:    'colvis',
            text:      '<i class="fas fa-bars"></i>',
            titleAttr: 'Colonnes',
            className: 'btn-light btn-sm border border-secondary rounded ml-1 mr-5'
        }, 
        {
            extend: 'print',
            text: '<i class="fas fa-print"></i>',
            titleAttr: 'Imprimer',
            className: 'btn-light btn-sm border border-secondary rounded ml-1'
        },
        {
            extend:    'copyHtml5',
            text:      '<i class="fa fa-files-o"></i>',
            titleAttr: 'Copier',
            className: 'btn-light btn-sm border border-secondary rounded ml-1'
        },
        {
            extend:    'excelHtml5',
            text:      '<i class="fa fa-file-excel-o"></i>',
            titleAttr: 'Exporter Excel',
            className: 'btn-light btn-sm border border-secondary rounded ml-1'
        },
        {
            extend:    'pdfHtml5',
            text:      '<i class="fa fa-file-pdf-o"></i>',
            titleAttr: 'Exporter PDF',
            className: 'btn-light btn-sm border border-secondary rounded ml-1'
        }
       
        ],*/
    "columnDefs": [
    {className: "dt-center" , targets: "_all"},
    { "width": "5px", targets: 0}, // checkbox
    { "width": "60px", "targets": 1 }, // action
    { "width": "5px", "targets": 2 }, // id
    { "width": "15px", "targets": 3 }, // Matricule
    { "width": "20px", "targets": 4 }, //first name
    { "width": "20px", "targets": 5 }, //second name
   
 
  
    ],
     'order': [[ 2, "desc" ]],
    });
       /*  table.buttons().container().insertAfter($('#doctor-table_filter label'));
        $('#patients-table_filter .btn-group .btn').addClass('tableButtons');
        $('#patients-table_filter label,#doctor-table_filter .btn-group').wrapAll( '<div id="dynamic-container"></div>');
        //$('#dynamic-container').css({"display": "flex","justify-content": "space-between"}); */
});
   