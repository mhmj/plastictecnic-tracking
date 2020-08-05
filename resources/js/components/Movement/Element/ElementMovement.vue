<template>
    <div>
        <table id="dt-shipment-packaging" class="dt-shipping table table-bordered table-hover table-striped w-100">
            <thead class="bg-primary-600">
            <tr>
                <th>Type</th>
                <th>No</th>
                <th>Remark</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="ListPackaging in data">
                <td>{{ListPackaging.type_name}}</td>
                <td>{{ListPackaging.packaging_no}}</td>
                <td>{{ListPackaging.remark}}</td>
                <td style="width: 15%; display:flex; justify-content: flex-end">
                    <!--<a href="javascript:void(0);" v-on:click="openEditRecord(Shipment)" class="btn btn-sm btn-outline-primary mr-2">-->
                    <!--<i class="fal fa-edit"></i>-->
                    <!--</a>-->
                    <a href="javascript:void(0);" v-on:click="openDeleteRecord(ListPackaging)" class="btn btn-sm btn-outline-danger mr-2">
                        <i class="fal fa-trash"></i>
                    </a>
                </td>
            </tr>
            </tbody>
            <tfoot>
            <tr>
                <th>Type</th>
                <th>No</th>
                <th>Remark</th>
                <th></th>
            </tr>
            </tfoot>
        </table>
        <!--<edit-packaging :data="this.Packaging"></edit-packaging>-->
        <delete-movement :data="this.ListPackaging"></delete-movement>
    </div>
</template>
<script>
    export default {
        props: ['data'],
        data() {
            return {
                ListPackaging:[],
                dataTable:null,
            }
        },
        mounted() {
            Event.$on('updateTablePackagingMovement', () => {
                this.updateTable();
            });
        },
        watch: {
            data() {
                this.updateTable();
            }
        },
        methods: {
            updateTable(){
                if (this.dataTable) {
                    $('#dt-shipment-packaging').DataTable().destroy();
                }
                this.$nextTick(() =>
                {
                    this.dataTable = $('#dt-shipment-packaging').DataTable(
                        {
                            responsive: true,
                            stateSave: true, //remembers your table settings (filter, scroll point, sort, etc)
                            processing: true,
                            pageLength: false,
                            deferRender: true,
                            scrollY: 300,
                            scrollCollapse: true,
                            scroller: true,
                            lengthChange: false,
                            order: [
                                [0, 'desc']
                            ],
                            rowGroup:
                                {
                                    dataSrc: 0
                                },
                            dom:
                            "<'row mb-3'<'col-sm-12 col-md-6 d-flex align-items-center justify-content-start'f><'col-sm-12 col-md-6 d-flex align-items-center justify-content-end'lB>>" +
                            "<'row'<'col-sm-12'tr>>" +
                            "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>> ",
                            buttons: [
                                {
                                    extend: 'excelHtml5',
                                    text: 'Excel',
                                    titleAttr: 'Generate Excel',
                                    className: 'btn-outline-success btn-sm mr-1'
                                },
                                {
                                    extend: 'csvHtml5',
                                    text: 'CSV',
                                    titleAttr: 'Generate CSV',
                                    className: 'btn-outline-primary btn-sm mr-1'
                                },
                                {
                                    extend: 'copyHtml5',
                                    text: 'Copy',
                                    titleAttr: 'Copy to clipboard',
                                    className: 'btn-outline-primary btn-sm mr-1'
                                },
                                {
                                    extend: 'print',
                                    text: 'Print',
                                    titleAttr: 'Print Table',
                                    className: 'btn-outline-primary btn-sm',

                                }
                            ]
                        });
                });
            },
            openDeleteRecord(id){
                $("#delete-movement-modal").modal('show');
                this.ListPackaging = id;
            }
        }

    }

</script>