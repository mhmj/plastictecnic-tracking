<template>
    <form method="post" @submit.prevent="deleteCategory">
        <div class="modal fade" id="delete-category-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">
                            Delete Record
                            <small class="m-0 text-muted">
                                Are you sure want to delete this record?
                            </small>
                        </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fal fa-times"></i></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-striped m-0">
                            <tbody>
                            <tr>
                                <td>Name</td>
                                <td>:</td>
                                <td>{{this.Category.name}}</td>
                            </tr>
                            <tr>
                                <td>Description</td>
                                <td>:</td>
                                <td>{{this.Category.description}}</td>
                            </tr>
                            <tr>
                                <td>Remark</td>
                                <td>:</td>
                                <td>{{this.Category.remark}} </td>
                            </tr>
                            <tr>
                                <td>Created</td>
                                <td>:</td>
                                <td>{{this.Category.created_at}} </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</template>
<script>
    export default {
        props: ['data'],
        data() {
            return {
                dataTable:null,
                Category:this.data,
            }
        },
        watch: {
            'data': function() {
                this.Category = this.data;
            }
        },
        methods:{
            deleteCategory(){
                $("#delete-category-modal").modal('hide');


                var url = '/api/v1/Category/Deletes/'+ this.Category.id +'/category', method = 'delete';
                fetch(url, {
                    method: method,
                    body: JSON.stringify(),
                    headers: {
                        'content-type': 'application/json'
                    }
                }).then((response) => {
                    this.$notify({
                        title: 'Success',
                        message: 'Successfully Delete Category',
                        type: 'success'
                    });
                    Event.$emit('fetchCategory');
                    Event.$emit('updateTable');
                })
            },
        }



    }

</script>