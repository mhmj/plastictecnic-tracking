<template>
    <div class="modal fade create-category-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-right">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title h3">Register New Category</h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fal fa-times"></i></span>
                    </button>
                </div>
                <form method="post" @submit.prevent="categoryChecked">
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
        methods: {
            categoryChecked()
            {
                this.errors = [];

                if(this.Category.name)
                {
                    this.createCategory();
                }

                if(!this.Category.name)
                {
                    this.errors['name'] = "Fill the Category Name"
                }
            },
            createCategory(){
                var url = '/api/v1/Category/Creates/category', method = 'post';
                fetch(url, {
                    method: method,
                    body: JSON.stringify({
                        name: this.Category.name,
                        description: this.Category.description,
                        remark: this.Category.remark,
                    }),
                    headers: {
                        'content-type': 'application/json'
                    }
                }).then((response) => {
                    Event.$emit('fetchCategory');
                    Event.$emit('updateTable');
                    this.clearForm();
                    $(".create-category-modal").modal('hide');
                    this.$notify({
                        title: 'Success',
                        message: 'Successfully Register Category',
                        type: 'success'
                    });
                })
            },
            clearForm(){
                this.Category = {
                    name: '',
                    description: '',
                    remark: '',
                }
            }
        }
    }

</script>