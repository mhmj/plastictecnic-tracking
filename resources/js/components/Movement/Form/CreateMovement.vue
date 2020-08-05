<template>
    <div class="modal fade create-movement-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-right">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title h3">Add Packaging</h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fal fa-times"></i></span>
                    </button>
                </div>
                <form method="post" @submit.prevent="packingListChecked">
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
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Category: </label>
                                                        <div class="row" v-if="('category_id' in errors)">
                                                            <div class="col">
                                                                <label class="text-danger">{{errors['category_id']}}</label>
                                                            </div>
                                                        </div>
                                                        <v-select  :options="ListCategory" :reduce="ListCategory => ListCategory.id " :label="ListCategory.label" v-model="category_id" @input="TypeList()"></v-select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-bottom: 10px;">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Type</label>
                                                        <div class="row" v-if="('type_name' in errors)">
                                                            <div class="col">
                                                                <label class="text-danger">{{errors['type_name']}}</label>
                                                            </div>
                                                        </div>
                                                        <v-select :options="ListType" :reduce="ListType => ListType.id " :label="ListType.label" v-model="type_name" @input="fetchPackaging()"></v-select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-bottom: 10px;">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Packaging No</label>
                                                        <div class="row" v-if="('packaging_no' in errors)">
                                                            <div class="col">
                                                                <label class="text-danger">{{errors['packaging_no']}}</label>
                                                            </div>
                                                        </div>
                                                        <v-select :options="ListPackaging" :reduce="ListPackaging => ListPackaging.id " :label="ListPackaging.label" v-model="packaging_no"></v-select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-bottom: 10px;">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Remark</label>
                                                        <input type="text" class="form-control" v-model="remark" >
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
                category_id:'',
                type_name:'',
                packaging_no:'',
                status: 'OUT',
                status_received: 'OUT',
                remark:'',
                ListCategory:[],
                ListPackaging:[],
                ListType:[],
            }
        },
        created(){
            this.categoryList();
        },
        methods: {
            categoryList(){

                axios.get('/api/v1/Packaging/Lists/category')
                    .then(function (response) {
                        this.ListCategory = $.map(response.data, function (value) {
                            return {'id': value.id, 'label': value.name};
                        });
                    }.bind(this));
            },
            TypeList(){
                this.type_name = '';
                axios.get('/api/v1/Packaging/Lists/'+ this.category_id +'/type')
                    .then(function (response) {
                        this.ListType = $.map(response.data, function (value) {
                            return {'id': value.name, 'label': value.name};
                        });
                    }.bind(this));
            },
            fetchPackaging(){
                axios.get('/api/v1/Packaging/Lists/'+ this.type_name +'/packaging-no')
                    .then(function (response) {
                        this.ListPackaging = $.map(response.data, function (value) {
                            return {'id': value.packaging_no, 'label': value.packaging_no};
                        });
                    }.bind(this));
            },
            packingListChecked()
            {
                this.errors = [];

                if(this.category_id && this.type_name && this.packaging_no)
                {
                    this.createMovement();
                }

                if(!this.category_id)
                {
                    this.errors['category_id'] = "Choose the Category"
                }

                if(!this.type_name)
                {
                    this.errors['type_name'] = "Choose the Type"
                }
                if(!this.packaging_no)
                {
                    this.errors['packaging_no'] = "Choose the packaging"
                }
            },
            createMovement(){
                var url = '/api/v1/Movement/Creates/movement', method = 'post';
                fetch(url, {
                    method: method,
                    body: JSON.stringify({
                        type_name: this.type_name,
                        packaging_no: this.packaging_no,
                        delivery_no: this.$parent.$parent.Shipment.delivery_no,
                        shipment_id: this.$parent.$parent.Shipment.id,
                        remark: this.remark,
                        status: this.status,
                        status_received: this.status_received,
                    }),
                    headers: {
                        'content-type': 'application/json'
                    }
                }).then((response) => {
                    this.clearForm();
                    $(".create-movement-modal").modal('hide');
                    Event.$emit('fetchPackagingShipment');
                    Event.$emit('updateTablePackagingMovement');
                    this.$notify({
                        title: 'Success',
                        message: 'Successfully Add Packaging To Shipment',
                        type: 'success'
                    });
                })
            },
            clearForm(){
                this.errors = [];
                this.category_id = '';
                this. type_name = '';
                this.status = 'OUT';
                this.status_received = 'OUT';
                this.packaging_no = '';
                this.remark = '';

            }
        }
    }

</script>