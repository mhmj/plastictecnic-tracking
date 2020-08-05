<template>
    <div>
        <table id="dt-type" class="dt-type table table-bordered table-hover table-striped w-100">
            <thead class="bg-primary-600">
            <tr>
                <th>Name</th>
                <th>Category</th>
                <th>Size</th>
                <th>Remark</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="Type in Types">
                <td>
                    <a href="javascript:void(0);" v-on:click="openEditRecord(Type)" class="text-primary">
                        {{Type.name}}
                    </a>
                </td>
                <td>{{Type.category_id.name}}</td>
                <td>{{Type.size}}</td>
                <td>{{Type.remark}}</td>
                <td style="width: 15%; display:flex; justify-content: flex-end">
                    <a href="javascript:void(0);" v-on:click="openEditRecord(Type)" class="btn btn-sm btn-outline-primary mr-2">
                        <i class="fal fa-edit"></i>
                    </a>
                    <a href="javascript:void(0);" v-on:click="openDeleteRecord(Type)" class="btn btn-sm btn-outline-danger mr-2">
                        <i class="fal fa-trash"></i>
                    </a>
                </td>
            </tr>
            </tbody>
            <tfoot>
            <tr>
                <th>Name</th>
                <th>Category</th>
                <th>Size</th>
                <th>Remark</th>
                <th></th>
            </tr>
            </tfoot>
        </table>
        <edit-type :data="Types1"></edit-type>
        <delete-type :data="Types1"></delete-type>
    </div>
</template>
<script>
    export default {
        props: ['data'],
        data() {
            return {
                Types: this.data,
                Types1:{},
                dataTable:null,
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
                this.Types = this.data;
                //console.log(this.Types)
            }
        },
        methods: {
            updateTable(){
                if (this.dataTable) {
                    $('#dt-type').DataTable().destroy();
                }
                this.$nextTick(() =>
                {
                    this.dataTable = $('#dt-type').DataTable(
                        {
                            responsive: true,
                            lengthChange: false,
                            order: [
                                [1, 'desc']
                            ],
                            rowGroup:
                                {
                                    dataSrc: 1
                                },
                            dom:
                            "<'row mb-3'<'col-sm-12 col-md-6 d-flex align-items-center justify-content-start'f><'col-sm-12 col-md-6 d-flex align-items-center justify-content-end'lB>>" +
                            "<'row'<'col-sm-12'tr>>" +
                            "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>> ",
                            buttons: [
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
                $(".type-modal").modal('show');
                this.Types1 = id;
            },
            closeEditRecord(){
                $(".type-modal").modal.toggle();
            },
            openDeleteRecord(id){
                $("#delete-type-modal").modal('show');
                this.Types1 = id;
            }
        }

    }

</script>