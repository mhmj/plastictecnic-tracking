<template>
    <div class="modal fade category-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-right">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title h3">{{this.Category.name}}</h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fal fa-times"></i></span>
                    </button>
                </div>
                <form method="post" @submit.prevent="categoryChecked">
                    <div class="modal-body">
                        <div class="card mb-5">
                            <div class="card-body p-3">
                                <h5 class="form-label" style="margin-bottom: 20px">
                                    {{Category.name}} Details
                                    <span class="badge badge-primary fw-n position-absolute pos-top pos-right mt-3 mr-3"><i class="fal fa-edit"></i></span>
                                </h5>
                                <div class="row fs-b fw-300">
                                    <div class="col text-left">
                                        <form>
                                            <div class="form-group">
                                                <label class="form-label">Name</label>
                                                <div class="row" v-if="('name' in errors)">
                                                    <div class="col">
                                                        <label class="text-danger">{{errors['name']}}</label>
                                                    </div>
                                                </div>
                                                <input type="text" class="form-control" v-model="Category.name" >
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Description</label>
                                                <input type="text" class="form-control" v-model="Category.description" >
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Remark</label>
                                                <input type="text" class="form-control" v-model="Category.remark" >
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
                Category:{
                    name: '',
                    description: '',
                    remark: '',
                },
            }
        },
        created(){

        },
        watch: {
            'data': function() {
                this.Category = this.data;
            }
        },
        methods: {
            categoryChecked()
            {
                this.errors = [];

                if(this.Category.name)
                {
                    this.updateCategory();
                }

                if(!this.Category.name)
                {
                    this.errors['name'] = "Fill the Category Name"
                }
            },
              updateCategory(){
                  $(".category-modal").modal('hide');
                  this.$notify({
                      title: 'Success',
                      message: 'Successfully Update Category',
                      type: 'success'
                  });
                  let currentObj = this;
                const config = {
                    headers: { 'content-type': 'multipart/form-data' }
                }

                let formData = new FormData();

                formData.append("name", this.Category.name);
                formData.append("description", this.Category.description);
                formData.append("remark", this.Category.remark);

                if(!this.Category.remark)
                {
                  formData.append("remark", "-");
                }

                let vm= this;
                axios.post('/api/v1/Category/Updates/'+ this.Category.id +'/category', formData, config)
                    .then(function (data) {
                        Event.$emit('fetchCategory');
                        Event.$emit('updateTable');
                    })
                    .catch(function (error) {
                        currentObj.output = error;
                    });
            },
        },



    }

</script>