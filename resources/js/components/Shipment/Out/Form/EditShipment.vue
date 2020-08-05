<template>
    <div class="col-xl-12">
        <form method="post" @submit.prevent="shipmentChecked">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>
                        Shipment Details
                    </h2>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <h6>
                                                <label class="form-label">Delivery No</label>
                                            </h6>
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
                                            <h6>
                                                <label class="form-label">Vehicle No</label>
                                            </h6>
                                            <div class="row" v-if="('vehicle_no' in errors)">
                                                <div class="col">
                                                    <label class="text-danger">{{errors['vehicle_no']}}</label>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" v-model="Shipment.vehicle_no" >
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 15px">
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <h6>
                                                        <label class="form-label">Remark</label>
                                                    </h6>
                                                    <input type="text" class="form-control" v-model="Shipment.remark" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row"  style="margin-top: 10px">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <h6>
                                                        <label class="form-label">Status</label>
                                                    </h6>
                                                    <v-select :options="['Created', 'Delivered']"  v-model="Shipment.status"></v-select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="row" >
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <h6>
                                                        <label class="form-label">Created By</label>
                                                    </h6>
                                                    <input type="text" class="form-control" v-model="Shipment.created_by" >
                                                </div>
                                            </div>
                                            <!--<div class="col-6">-->
                                                <!--<div class="form-group">-->
                                                    <!--<h6>-->
                                                        <!--<label class="form-label">Verified By</label>-->
                                                    <!--</h6>-->
                                                    <!--<input type="text" class="form-control" v-model="Shipment.verified_by" >-->
                                                <!--</div>-->
                                            <!--</div>-->
                                        </div>
                                        <div class="row" style="margin-top: 15px">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <h6>
                                                        <label class="form-label">Delivered By</label>
                                                    </h6>
                                                    <input type="text" class="form-control" v-model="Shipment.delivery_by" >
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <h6>
                                                        <label class="form-label">Received By</label>
                                                    </h6>
                                                    <input type="text" class="form-control" v-model="Shipment.received_by" >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row"  style="margin-top: 10px;">
                                    <div class="col-12" style="display: flex; justify-content: flex-end">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>
<script>
    export default {
        props:['data'],
        data() {
            return {
                id: null,
                errors: [],
                Shipment:this.data,
            }
        },
        created(){
        },
        watch: {
            'data': function() {
                this.Shipment = this.data;
            }
        },

        methods:{
            shipmentChecked()
            {
                this.errors = [];

                if(this.Shipment.delivery_no && this.Shipment.vehicle_no)
                {
                    this.updateShipment();
                }

                if(!this.Shipment.delivery_no)
                {
                    this.errors['delivery_no'] = "Fill the Delivery No"
                }

                if(!this.Shipment.vehicle_no)
                {
                    this.errors['vehicle_no'] = "Fill the Vehicle No"
                }
            },
            updateShipment(){
                var url = '/api/v1/Shipment/Updates/'+ this.Shipment.id +'/shipment', method = 'post';
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
                    this.$notify({
                        title: 'Success',
                        message: 'Successfully Update Shipment',
                        type: 'success'
                    });
                })
            },
        }
    }

</script>