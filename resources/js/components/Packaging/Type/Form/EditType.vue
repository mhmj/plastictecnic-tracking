<template>
    <div class="modal fade type-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-right">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title h3">{{Types.name}}</h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fal fa-times"></i></span>
                    </button>
                </div>
                <form method="post" @submit.prevent="TypeChecked">
                    <div class="modal-body">
                        <div class="card mb-5">
                            <div class="card-body p-3">
                                <h5 class="form-label" style="margin-bottom: 20px">
                                    {{Types.name}} Details
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
                                                <v-select disabled :options="ListCategory" :reduce="ListCategory => ListCategory.id " :label="ListCategory.label" v-model="Types.category_id.id" ></v-select>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Name</label>
                                                <div class="row" v-if="('name' in errors)">
                                                    <div class="col">
                                                        <label class="text-danger">{{errors['name']}}</label>
                                                    </div>
                                                </div>
                                                <input type="text" disabled class="form-control" v-model="Types.name" >
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Size</label>
                                                <input type="text" class="form-control" v-model="Types.size" >
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Description</label>
                                                <input type="text" class="form-control" v-model="Types.description" >
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Remark</label>
                                                <input type="text" class="form-control" v-model="Types.remark" >
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
        props: ['data'],
        data() {
            return {
                dataTable:null,
                errors: [],
                Types:{
                    id: '',
                    category_id:{
                        id: '',
                        name:'',
                        description:'',
                        remark: '',
                        remark_2: '',
                        created_at: '',
                        updated_at: ''
                    },
                    name:'',
                    size:'',
                    description:'',
                    remark:'',
                    created_at:'',
                },
                ListCategory:[],
            }
        },
        created(){
          this.categoryList();
        },
        watch: {
            'data': function() {
                this.Types = this.data;
            }
        },
        methods: {
            TypeChecked()
            {
                this.errors = [];

                if(this.Types.category_id.id && this.Types.name)
                {
                    this.updateType();
                }

                if(!this.Types.category_id.id)
                {
                    this.errors['category_id'] = "Choose the Category"
                }

                if(!this.Types.name)
                {
                    this.errors['name'] = "Fill the Type Name"
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
              updateType(){
                  $(".type-modal").modal('hide');
                  this.$notify({
                      title: 'Success',
                      message: 'Successfully Update Type',
                      type: 'success'
                  });

                  let currentObj = this;
                const config = {
                    headers: { 'content-type': 'multipart/form-data' }
                }

                let formData = new FormData();

                formData.append("category_id", this.Types.category_id.id);
                formData.append("name", this.Types.name);
                formData.append("size", this.Types.size);
                formData.append("description", this.Types.description);
                formData.append("color", this.Types.color);
                formData.append("remark", this.Types.remark);

                  if(!this.Types.description){
                      formData.append("description", "-");
                  }

                  if(!this.Types.remark){
                      formData.append("remark", "-");
                  }

                let vm= this;
                axios.post('/api/v1/Type/Updates/'+ this.Types.id +'/type', formData, config)
                    .then(function (data) {
                        Event.$emit('fetchType');
                        Event.$emit('updateTable');
                    })
                    .catch(function (error) {
                        currentObj.output = error;
                    });
            },
        },



    }

</script>