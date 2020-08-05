<template>
    <div>
        <table id="dt-user" class="table table-bordered table-hover table-striped w-100">
            <thead class="bg-primary-600">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Role</th>
                <th>Company</th>
                <th>Remark</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="User in data">
                <td>{{User.name}}</td>
                <td>{{User.email}}</td>
                <td>{{User.phone_no}}</td>
                <td>{{User.role}}</td>
                <td>{{User.company_id.name}}</td>
                <td>{{User.remark}}</td>
                <td style="width: 15%; display:flex; justify-content: flex-end">
                    <a href="javascript:void(0);" v-on:click="openEditRecord(User)" class="btn btn-sm btn-outline-primary mr-2">
                        <i class="fal fa-edit"></i>
                    </a>
                    <a href="javascript:void(0);" v-on:click="openDeleteRecord(User)" class="btn btn-sm btn-outline-danger mr-2">
                        <i class="fal fa-trash"></i>
                    </a>
                </td>
            </tr>
            </tbody>
            <tfoot>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Role</th>
                <th>Company</th>
                <th>Remark</th>
                <th></th>
            </tr>
            </tfoot>
        </table>
        <edit-user :data="this.User"></edit-user>
        <delete-user :data="this.User"></delete-user>
    </div>
</template>
<script>
    export default {
        props: ['data'],
        data() {
            return {
                User: [],
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
                    $('#dt-user').DataTable().destroy();
                }
                this.$nextTick(() =>
                {
                    this.dataTable = $('#dt-user').DataTable(
                        {

                            responsive: true,
                            lengthChange: false,
                            order: [
                                [4, 'desc']
                            ],
                            rowGroup:
                                {
                                    dataSrc: 4
                                },
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
                $(".user-modal").modal('show');
                this.User = id;
            },
            closeEditRecord(){
                $(".user-modall").modal.toggle();
            },
            openCreateRecord(id){
                alert(id);
            },
            openDeleteRecord(id){
                $("#delete-user-modal").modal('show');
                this.User = id;
            }
        }

    }

</script>