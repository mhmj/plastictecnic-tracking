<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/vendors.bundle.js') }}"></script>
<script src="{{ asset('js/app.bundle.js') }}"></script>

<!-- The order of scripts is irrelevant. Please check out the plugin pages for more details about these plugins below: -->


<script src="{{ asset('js/datagrid/datatables/datatables.bundle.js') }}"></script>
<script src="{{ asset('js/datagrid/datatables/datatables.export.js') }}"></script>
<script>
    $(document).ready(function()
    {
//        $('#dt-packaging').dataTable(
//            {
//                responsive: true,
//                lengthChange: false,
//                dom:
//                /*	--- Layout Structure
//                 --- Options
//                 l	-	length changing input control
//                 f	-	filtering input
//                 t	-	The table!
//                 i	-	Table information summary
//                 p	-	pagination control
//                 r	-	processing display element
//                 B	-	buttons
//                 R	-	ColReorder
//                 S	-	Select
//
//                 --- Markup
//                 < and >				- div element
//                 <"class" and >		- div with a class
//                 <"#id" and >		- div with an ID
//                 <"#id.class" and >	- div with an ID and a class
//
//                 --- Further reading
//                 https://datatables.net/reference/option/dom
//                 --------------------------------------
//                 */
//                "<'row mb-3'<'col-sm-12 col-md-6 d-flex align-items-center justify-content-start'f><'col-sm-12 col-md-6 d-flex align-items-center justify-content-end'lB>>" +
//                "<'row'<'col-sm-12'tr>>" +
//                "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>> ",
//                buttons: [
//                    /*{
//                     extend:    'colvis',
//                     text:      'Column Visibility',
//                     titleAttr: 'Col visibility',
//                     className: 'mr-sm-3'
//                     },*/
//                    {
//                        extend: 'pdfHtml5',
//                        text: 'PDF',
//                        titleAttr: 'Generate PDF',
//                        className: 'btn-outline-danger btn-sm mr-1'
//                    },
//                    {
//                        extend: 'excelHtml5',
//                        text: 'Excel',
//                        titleAttr: 'Generate Excel',
//                        className: 'btn-outline-success btn-sm mr-1'
//                    },
//                    {
//                        extend: 'csvHtml5',
//                        text: 'CSV',
//                        titleAttr: 'Generate CSV',
//                        className: 'btn-outline-primary btn-sm mr-1'
//                    },
//                    {
//                        extend: 'copyHtml5',
//                        text: 'Copy',
//                        titleAttr: 'Copy to clipboard',
//                        className: 'btn-outline-primary btn-sm mr-1'
//                    },
//                    {
//                        extend: 'print',
//                        text: 'Print',
//                        titleAttr: 'Print Table',
//                        className: 'btn-outline-primary btn-sm'
//                    }
//                ]
//            });
//        $.ajax({
//            type: 'GET',
//            url: '/api/v1/Packaging/1/packaging-details',
//            mimeType: 'json',
//            success: function(data) {
//                $.each(data, function(i, data) {
//                    var body = "<tr>";
//                    body    += "<td>1</td>";
//                    body    += "<td>" + data.type_name +"-"+ data.type_name + "</td>";
//
//                    body    += "<td>" + data.status + "</td>";
//                    body    += "<td>" + data.remark + "</td>";
//                    body    += "</tr>";
//                    $( "#dt-packaging tbody" ).append(body);
//                });
//                /*DataTables instantiation.*/
//                $('#dt-packaging').DataTable(
//                    {
//                        responsive: true,
//                        lengthChange: false,
//                        dom:
//                        /*	--- Layout Structure
//                         --- Options
//                         l	-	length changing input control
//                         f	-	filtering input
//                         t	-	The table!
//                         i	-	Table information summary
//                         p	-	pagination control
//                         r	-	processing display element
//                         B	-	buttons
//                         R	-	ColReorder
//                         S	-	Select
//
//                         --- Markup
//                         < and >				- div element
//                         <"class" and >		- div with a class
//                         <"#id" and >		- div with an ID
//                         <"#id.class" and >	- div with an ID and a class
//
//                         --- Further reading
//                         https://datatables.net/reference/option/dom
//                         --------------------------------------
//                         */
//                        "<'row mb-3'<'col-sm-12 col-md-6 d-flex align-items-center justify-content-start'f><'col-sm-12 col-md-6 d-flex align-items-center justify-content-end'lB>>" +
//                        "<'row'<'col-sm-12'tr>>" +
//                        "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>> ",
//                        buttons: [
//                            /*{
//                             extend:    'colvis',
//                             text:      'Column Visibility',
//                             titleAttr: 'Col visibility',
//                             className: 'mr-sm-3'
//                             },*/
//                            {
//                                extend: 'pdfHtml5',
//                                text: 'PDF',
//                                titleAttr: 'Generate PDF',
//                                className: 'btn-outline-danger btn-sm mr-1'
//                            },
//                            {
//                                extend: 'excelHtml5',
//                                text: 'Excel',
//                                titleAttr: 'Generate Excel',
//                                className: 'btn-outline-success btn-sm mr-1'
//                            },
//                            {
//                                extend: 'csvHtml5',
//                                text: 'CSV',
//                                titleAttr: 'Generate CSV',
//                                className: 'btn-outline-primary btn-sm mr-1'
//                            },
//                            {
//                                extend: 'copyHtml5',
//                                text: 'Copy',
//                                titleAttr: 'Copy to clipboard',
//                                className: 'btn-outline-primary btn-sm mr-1'
//                            },
//                            {
//                                extend: 'print',
//                                text: 'Print',
//                                titleAttr: 'Print Table',
//                                className: 'btn-outline-primary btn-sm'
//                            }
//                        ]
//                    });
//            },
//            error: function() {
//                alert('Fail!');
//            }
//        });
        // initialize datatable
    });

</script>

<script type="text/javascript">
    /* Activate smart panels */
    $('#js-page-content').smartPanel();

</script>

<script src="{{ asset('js/dependency/moment/moment.js') }}"></script>
<script src="{{ asset('js/miscellaneous/fullcalendar/fullcalendar.bundle.js') }}"></script>
<script src="{{ asset('js/statistics/sparkline/sparkline.bundle.js') }}"></script>
<script src="{{ asset('js/statistics/easypiechart/easypiechart.bundle.js') }}"></script>
<script src="{{ asset('js/statistics/flot/flot.bundle.js') }}"></script>
<script src="{{ asset('js/miscellaneous/jqvmap/jqvmap.bundle.js') }}"></script>

