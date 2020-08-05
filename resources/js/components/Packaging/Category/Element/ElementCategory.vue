<template>
    <div>
        <table id="dt-category" class="dt-category table table-bordered table-hover table-striped w-100">
            <thead class="bg-primary-600">
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Remark</th>
                <th>Created</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="Category in data">
                <td>
                    <a href="javascript:void(0);" v-on:click="openEditRecord(Category)" class="text-primary">
                        {{Category.name}}
                    </a>
                </td>
                <td>{{Category.description}}</td>
                <td>{{Category.remark}}</td>
                <td>{{Category.created_at}}</td>
                <td style="width: 15%; display:flex; justify-content: flex-end">
                    <a href="javascript:void(0);" v-on:click="openEditRecord(Category)" class="btn btn-sm btn-outline-primary mr-2">
                        <i class="fal fa-edit"></i>
                    </a>
                    <a href="javascript:void(0);" v-on:click="openDeleteRecord(Category)" class="btn btn-sm btn-outline-danger mr-2">
                        <i class="fal fa-trash"></i>
                    </a>
                </td>
            </tr>
            </tbody>
            <tfoot>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Remark</th>
                <th>Created</th>
                <th></th>
            </tr>
            </tfoot>
        </table>
        <edit-category :data="this.Category"></edit-category>
        <delete-category :data="this.Category"></delete-category>
    </div>
</template>
<script>
    export default {
        props: ['data'],
        data() {
            return {
                Category:{
                    name: '',
                    description: '',
                    remark: '',
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
                    $('#dt-category').DataTable().destroy();
                }
                this.$nextTick(() =>
                {
                    this.dataTable = $('#dt-category').DataTable(
                        {
                            responsive: true,
                            lengthChange: false,
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
                $(".category-modal").modal('show');
                this.Category = id;
            },
            closeEditRecord(){
                $(".category-modal").modal.toggle();
            },
            openDeleteRecord(id){
                $("#delete-category-modal").modal('show');
                this.Category = id;
            }
        }

    }

</script>