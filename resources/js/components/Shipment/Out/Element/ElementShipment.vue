<template>
    <div>
        <table id="dt-shipping" class="dt-shipping table table-bordered table-hover table-striped w-100">
            <thead class="bg-primary-600">
            <tr>
                <th>D.0</th>
                <th>Company</th>
                <th>Status</th>
                <th>Created</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="Shipping in data">
                <td><a :href="'shipment-out-details/'+Shipping.id" style="text-decoration: underline; color: blue">{{Shipping.delivery_no}}</a></td>
                <td>{{Shipping.company_id.name}}</td>
                <td>{{Shipping.status}}</td>
                <td>{{Shipping.created_at}}</td>
                <td style="width: 5%; display:flex; justify-content: flex-end">
                    <a :href="'shipment-out-details/'+Shipping.id"  class="btn btn-sm btn-outline-primary mr-2">
                        <i class="fal fa-edit"></i>
                    </a>
                </td>
            </tr>
            </tbody>
            <tfoot>
            <tr>
                <th>D.0</th>
                <th>Company</th>
                <th>Status</th>
                <th>Created</th>
                <th></th>
            </tr>
            </tfoot>
        </table>
    </div>
</template>
<script>
    export default {
        props: ['data'],
        data() {
            return {
                Shipping:{
                    id: '',
                    delivery_no: '',
                    company_id:{
                        id: '',
                        name:'',
                    },
                    vehicle_no:'',
                    created_by:'',
                    verified_by:'',
                    delivery_by:'',
                    received_by:'',
                    remark: '',
                    remark_2: '',
                    status: '',
                    created_at: '',
                    updated_at: '',
                },
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
            }
        },
        methods: {
            updateTable(){
                if (this.dataTable) {
                    $('#dt-shipping').DataTable().destroy();
                }
                this.$nextTick(() =>
                {
                    this.dataTable = $('#dt-shipping').DataTable(
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
                $(".shipping-modal").modal('show');
                this.Shipping = id;
            },
            closeEditRecord(){
                $(".shipping-modal").modal.toggle();
            },
        }

    }

</script>