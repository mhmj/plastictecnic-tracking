<template>
    <div class="modal fade packaging-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-right">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title h3">{{this.Packaging.type_name}} - {{this.Packaging.packaging_no}}</h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fal fa-times"></i></span>
                    </button>
                </div>
                <form method="post" @submit.prevent="packagingChecked">
                    <div class="modal-body">
                        <div class="card mb-5">
                            <div class="card-body p-3">
                                <h5 class="form-label" style="margin-bottom: 20px">
                                    {{Packaging.category_id.name}} Details
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
                                                <v-select disabled  :options="ListCategory" :reduce="ListCategory => ListCategory.id " :label="ListCategory.label" v-model="Packaging.category_id.id" ></v-select>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Type</label>
                                                <div class="row" v-if="('type_name' in errors)">
                                                    <div class="col">
                                                        <label class="text-danger">{{errors['type_name']}}</label>
                                                    </div>
                                                </div>
                                                <v-select disabled :options="ListType" :reduce="ListType => ListType.id " :label="ListType.label" v-model="Packaging.type_name"></v-select>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">No</label>
                                                <div class="row" v-if="('packaging_no' in errors)">
                                                    <div class="col">
                                                        <label class="text-danger">{{errors['packaging_no']}}</label>
                                                    </div>
                                                </div>
                                                <input type="text" class="form-control" v-model="Packaging.packaging_no" >
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Status</label>
                                                <v-select :options="['IN', 'OUT']"  v-model="Packaging.status"></v-select>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Remark</label>
                                                <input type="text" class="form-control" v-model="Packaging.remark" >
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
        props: ['data'],
        data() {
            return {
                dataTable:null,
                errors: [],
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
          this.TypeList();
        },
        watch: {
            'data': function() {
                this.Packaging = this.data;
            }
        },
        methods: {
            packagingChecked()
            {
                this.errors = [];

                if(this.Packaging.category_id.id && this.Packaging.type_name && this.Packaging.packaging_no)
                {
                    this.updatePackaging();
                }

                if(!this.Packaging.category_id.id)
                {
                    this.errors['category_id'] = "Choose the Category"
                }

                if(!this.Packaging.type_name)
                {
                    this.errors['type_name'] = "Choose the Type"
                }

                if(!this.Packaging.packaging_no)
                {
                    this.errors['packaging_no'] = "Fill the Packaging No"
                }
            },
              categoryList(){
                  axios.get('/api/v1/Packaging/Lists/category')
                      .then(function (response) {
                          this.ListCategory = $.map(response.data, function(value){
                              return {'id': value.id, 'label': value.name};
                          });
                      }.bind(this));
              },
              TypeList(){
                axios.get('/api/v1/Packaging/Lists/all-type')
                    .then(function (response) {
                        this.ListType = $.map(response.data, function(value){
                            return {'id': value.name, 'label': value.name};
                        });
                    }.bind(this));
              },
              updatePackaging(){
                  $(".packaging-modal").modal('hide');
                  this.$notify({
                      title: 'Success',
                      message: 'Successfully Update Packaging',
                      type: 'success'
                  });


                  let currentObj = this;
                const config = {
                    headers: { 'content-type': 'multipart/form-data' }
                }

                let formData = new FormData();


                formData.append("type_name", this.Packaging.type_name);
                formData.append("category_id", this.Packaging.category_id.id);
                formData.append("packaging_no", this.Packaging.packaging_no);
                formData.append("status", this.Packaging.status);
                formData.append("remark", this.Packaging.remark);

                  if(!this.Packaging.remark){
                      formData.append("remark", "");
                  }
                if(!this.Packaging.remark_2){
                    formData.append("remark_2", "");
                }
                if(!this.Packaging.image){
                    formData.append("image", "");
                }
                if(this.Packaging.company_id){
                    formData.append("company_id", this.Packaging.job_start);
                }

                let vm= this;
                axios.post('/api/v1/Packaging/Updates/'+ this.Packaging.id +'/type', formData, config)
                    .then(function (data) {
                        Event.$emit('updateTable');
                        Event.$emit('fetchPackaging', this.Packaging.category_id);

                    })
                    .catch(function (error) {
                        currentObj.output = error;
                    });
            },
        },



    }

</script>