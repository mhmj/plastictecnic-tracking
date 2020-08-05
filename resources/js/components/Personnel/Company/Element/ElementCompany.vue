<template>
    <div>
        <table id="dt-company" class="table table-bordered table-hover table-striped w-100">
            <thead class="bg-primary-600">
            <tr>
                <th>Name</th>
                <th>Registration</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Remark</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="Company in data">
                <td>{{Company.name}}</td>
                <td>{{Company.registration_no}}</td>
                <td>{{Company.address}}</td>
                <td>{{Company.phone_no}}</td>
                <td>{{Company.remark}}</td>
                <td style="width: 15%; display:flex; justify-content: flex-end">
                    <a href="javascript:void(0);" v-on:click="openEditRecord(Company)" class="btn btn-sm btn-outline-primary mr-2">
                        <i class="fal fa-edit"></i>
                    </a>
                    <a href="javascript:void(0);" v-on:click="openDeleteRecord(Company)" class="btn btn-sm btn-outline-danger mr-2">
                        <i class="fal fa-trash"></i>
                    </a>
                </td>
            </tr>
            </tbody>
            <tfoot>
            <tr>
                <th>Name</th>
                <th>Registration</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Remark</th>
                <th></th>
            </tr>
            </tfoot>
        </table>
        <edit-company :data="this.Company"></edit-company>
        <delete-company :data="this.Company"></delete-company>
    </div>
</template>
<script>
    export default {
        props: ['data'],
        data() {
            return {
                Company: [],
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
                    $('#dt-company').DataTable().destroy();
                }
                this.$nextTick(() =>
                {
                    this.dataTable = $('#dt-company').DataTable(
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
                $(".company-modal").modal('show');
                this.Company = id;
            },
            closeEditRecord(){
                $(".company-modal").modal.toggle();
            },
            openCreateRecord(id){
                alert(id);
            },
            openDeleteRecord(id){
                $("#delete-company-modal").modal('show');
                this.Company = id;
            }
        }

    }

</script>