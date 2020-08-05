<template>
    <div class="modal fade create-shipment-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-right">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title h3">Register New Shipment</h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fal fa-times"></i></span>
                    </button>
                </div>
                <form method="post" @submit.prevent="shipmentChecked">
                    <div class="modal-body">
                        <div class="card mb-5">
                            <div class="card-body p-3">
                                <h5 class="form-label" style="margin-bottom: 20px">
                                    Details
                                    <span class="badge badge-primary fw-n position-absolute pos-top pos-right mt-3 mr-3"><i class="fal fa-edit"></i></span>
                                </h5>
                                <div class="row fs-b fw-300">
                                    <div class="col text-left">
                                        <form>
                                            <div class="row" style="margin-bottom: 10px;">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Delivery No</label>
                                                        <div class="row" v-if="('delivery_no' in errors)">
                                                            <div class="col">
                                                                <label class="text-danger">{{errors['delivery_no']}}</label>
                                                            </div>
                                                        </div>
                                                        <input type="text" class="form-control" v-model="Shipment.delivery_no" >
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Vehicle No</label>
                                                        <input type="text" class="form-control" v-model="Shipment.vehicle_no" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-bottom: 10px;">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Remark</label>
                                                        <input type="text" class="form-control" v-model="Shipment.remark" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-bottom: 10px;">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Status</label>
                                                        <v-select :options="['Created', 'Delivered']"  v-model="Shipment.status"></v-select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-bottom: 10px;">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Company</label>
                                                        <div class="row" v-if="('company_id' in errors)">
                                                            <div class="col">
                                                                <label class="text-danger">{{errors['company_id']}}</label>
                                                            </div>
                                                        </div>
                                                        <v-select :options="ListCompanies" :reduce="ListCompanies => ListCompanies.id " :label="ListCompanies.label" v-model="Shipment.company_id.id"></v-select>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" style="margin-top: -50px">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                errors: [],
                Shipment:{
                    id:'',
                    vehicle_no:'',
                    delivery_no:'',
                    created_by:'',
                    verified_by:'',
                    delivery_by:'',
                    received_by:'',
                    remark:'',
                    remark_2:'',
                    status:'',
                    company_id:{
                        id:'',
                        name:'',
                    },
                },
                ListCompanies:[],
            }
        },
        created(){
            this.fetchCompany();
        },
        methods: {
            shipmentChecked()
            {
                this.errors = [];

                if(this.Shipment.delivery_no && this.Shipment.company_id.id)
                {
                    this.createShipment();
                }

                if(!this.Shipment.delivery_no)
                {
                    this.errors['delivery_no'] = "Fill the Delivery No"
                }

                if(!this.Shipment.company_id.id)
                {
                    this.errors['company_id'] = "Choose the Company"
                }
            },
            fetchCompany(){
                axios.get('/api/v1/Personnel/Company/Lists/dropdown-list-company')
                    .then(function (response) {
                        this.ListCompanies = $.map(response.data, function(value){
                            return {'id': value.id, 'label': value.name};
                        });
                    }.bind(this));
            },
            createShipment(){
                var url = '/api/v1/Shipment/Creates/shipment', method = 'post';
                fetch(url, {
                    method: method,
                    body: JSON.stringify({
                        delivery_no: this.Shipment.delivery_no,
                        vehicle_no: this.Shipment.vehicle_no,
                        remark: this.Shipment.remark,
                        status: this.Shipment.status,
                        created_by: this.Shipment.created_by,
                        verified_by: this.Shipment.verified_by,
                        delivery_by: this.Shipment.delivery_by,
                        received_by: this.Shipment.received_by,
                        company_id: this.Shipment.company_id.id,
                    }),
                    headers: {
                        'content-type': 'application/json'
                    }
                }).then((response) => {
                    Event.$emit('fetchShipment');
                    Event.$emit('updateTable');
                    this.clearForm();
                    $(".create-shipment-modal").modal('hide');
                    this.$notify({
                        title: 'Success',
                        message: 'Successfully Register Shipment',
                        type: 'success'
                    });
                })
            },
            clearForm(){
                this.Shipment ={
                    id:'',
                    vehicle_no:'',
                    created_by:'',
                    verified_by:'',
                    delivery_by:'',
                    received_by:'',
                    remark:'',
                    remark_2:'',
                    status:'',
                    company_id:{
                        id:'',
                        name:'',
                    },
                }
            }
        }
    }

</script>