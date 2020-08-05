<template>
    <div class="modal fade create-packaging-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-right">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title h3">Register New Packaging</h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fal fa-times"></i></span>
                    </button>
                </div>
                <form method="post" @submit.prevent="packagingChecked">
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
                                            <div class="form-group">
                                                <label class="form-label">Category: </label>
                                                <div class="row" v-if="('category_id' in errors)">
                                                    <div class="col">
                                                        <label class="text-danger">{{errors['category_id']}}</label>
                                                    </div>
                                                </div>
                                                <v-select  :options="ListCategory" :reduce="ListCategory => ListCategory.id " :label="ListCategory.label" v-model="Packaging.category_id.id" @input="TypeList()"></v-select>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Type</label>
                                                <div class="row" v-if="('type_name' in errors)">
                                                    <div class="col">
                                                        <label class="text-danger">{{errors['type_name']}}</label>
                                                    </div>
                                                </div>
                                                <v-select :options="ListType" :reduce="ListType => ListType.id " :label="ListType.label" v-model="Packaging.type_name" @input="fetchNextPackagingNo()"></v-select>
                                                <label style="margin-top: 20px;" class="form-label">No</label>
                                            </div>
                                            <div class="form-group" style="margin-top: -20px">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">{{Packaging.type_name}} - </span>
                                                    </div>
                                                    <input disabled type="text" class="form-control" v-model="Packaging.packaging_no" >
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Quantity</label>
                                                <div class="row" v-if="('quantity' in errors)">
                                                    <div class="col">
                                                        <label class="text-danger">{{errors['quantity']}}</label>
                                                    </div>
                                                </div>
                                                <input type="text" class="form-control" v-model="quantity" >
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
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
                dataTable:null,
                errors: [],
                quantity: null,
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
                editing: false,
                ListCategory:[],
                ListType:[],
            }
        },
        created(){
            this.categoryList();
        },
        methods: {
            packagingChecked()
            {
                this.errors = [];

                if(this.Packaging.category_id.id && this.Packaging.type_name && this.quantity)
                {
                    this.createPackaging();
                }

                if(!this.Packaging.category_id.id)
                {
                    this.errors['category_id'] = "Choose the Category"
                }

                if(!this.Packaging.type_name)
                {
                    this.errors['type_name'] = "Choose the Type"
                }

                if(!this.quantity)
                {
                    this.errors['quantity'] = "Fill the Quantity"
                }
            },

            categoryList(){

                axios.get('/api/v1/Packaging/Lists/category')
                    .then(function (response) {
                        this.ListCategory = $.map(response.data, function (value) {
                            return {'id': value.id, 'label': value.name};
                        });
                    }.bind(this));
            },
            TypeList(){
                this.Packaging.type_name = '';
                this.Packaging.packaging_no = '';
                axios.get('/api/v1/Packaging/Lists/'+ this.Packaging.category_id.id +'/type')
                    .then(function (response) {
                        this.ListType = $.map(response.data, function (value) {
                            return {'id': value.name, 'label': value.name};
                        });
                    }.bind(this));
            },
            fetchNextPackagingNo(){
                fetch('/api/v1/Packaging/Lists/'+ this.Packaging.category_id.id +'/'+ this.Packaging.type_name +'/max-packaging_no').then(response => response.json())
                    .then(response => {
                        this.Packaging.packaging_no = response;
                    })
                    .catch(error => console.log(error))
            },
            createPackaging(){
                var url = '/api/v1/Packaging/Creates/'+ this.quantity +'/'+ this.Packaging.packaging_no +'/packaging', method = 'post';
                fetch(url, {
                    method: method,
                    body: JSON.stringify({
                        type_name: this.Packaging.type_name,
                        category_id: this.Packaging.category_id.id,
                    }),
                    headers: {
                        'content-type': 'application/json'
                    }
                }).then((response) => {
                    Event.$emit('fetchPackaging', this.Packaging.category_id.id);
                    Event.$emit('updateTable');
                    this.clearForm();
                    $(".create-packaging-modal").modal('hide');
                    this.$notify({
                        title: 'Success',
                        message: 'Successfully Register Packaging',
                        type: 'success'
                    });
                })
            },
            clearForm(){
                this.Packaging={
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
                    this.quantity = null;
            }
        }
    }

</script>