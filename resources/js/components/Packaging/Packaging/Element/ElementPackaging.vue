<template>
    <div>
        <table id="dt-packaging" class="dt-packaging table table-bordered table-hover table-striped w-100">
            <thead class="bg-primary-600">
            <tr>
                <th>Type</th>
                <th>No</th>
                <th>Status</th>
                <th>Remark</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="Packaging in data">
                <td>{{Packaging.type_name}}</td>
                <td>{{Packaging.packaging_no}}</td>
                <td>{{Packaging.status}}</td>
                <td>{{Packaging.remark}}</td>
                <td style="width: 15%; display:flex; justify-content: flex-end">
                    <a href="javascript:void(0);" v-on:click="openEditRecord(Packaging)" class="btn btn-sm btn-outline-primary mr-2">
                        <i class="fal fa-edit"></i>
                    </a>
                    <a href="javascript:void(0);" v-on:click="openDeleteRecord(Packaging)" class="btn btn-sm btn-outline-danger mr-2">
                        <i class="fal fa-trash"></i>
                    </a>
                </td>
            </tr>
            </tbody>
            <tfoot>
            <tr>
                <th>Type</th>
                <th>No</th>
                <th>Status</th>
                <th>Remark</th>
                <th></th>
            </tr>
            </tfoot>
        </table>
        <edit-packaging :data="this.Packaging"></edit-packaging>
        <delete-packaging :data="this.Packaging"></delete-packaging>
    </div>
</template>
<script>
    export default {
        props: ['data'],
        data() {
            return {
                Packaging:{
                    id: '',
                    type_name: '',
                    category_id:{
                        id: '',
                        name:'',
                    },
                    packaging_no:'',
                    status:'',
                    remark:'',
                    remark_2:'',
                    image:'',
                    company_id: '',
                },
                dataTable:null,
                editing: false,
            }
        },
        mounted() {
            Event.$on('updateTable', () => {
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
                    $('#dt-packaging').DataTable().destroy();
                }
                this.$nextTick(() =>
                {
                    this.dataTable = $('#dt-packaging').DataTable(
                        {
                            responsive: true,
                            lengthChange: false,
                            dom:
                            "<'row mb-3'<'col-sm-12 col-md-6 d-flex align-items-center justify-content-start'f><'col-sm-12 col-md-6 d-flex align-items-center justify-content-end'lB>>" +
                            "<'row'<'col-sm-12'tr>>" +
                            "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>> ",
                            buttons: [
                                /*{
                                 extend:    'colvis',
                                 text:      'Column Visibility',
                                 titleAttr: 'Col visibility',
                                 className: 'mr-sm-3'
                                 },*/
                                {
                                    extend: 'pdfHtml5',
                                    text: 'PDF',
                                    titleAttr: 'Generate PDF',
                                    className: 'btn-outline-danger btn-sm mr-1'
                                },
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
            openEditRecord(id){
                $(".packaging-modal").modal('show');
                this.Packaging = id;
            },
            closeEditRecord(){
                $(".packaging-modal").modal.toggle();
            },
            openCreateRecord(id){

//                $(".packaging-modal").modal('show');
//                this.Packaging = id;
                alert(id);
            },
            openDeleteRecord(id){
                $("#delete-packaging-modal").modal('show');
                this.Packaging = id;
            }
        }

    }

</script>