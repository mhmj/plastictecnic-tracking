<template>
    <form method="post" @submit.prevent="deleteType">
        <div class="modal fade" id="delete-type-modal" tabindex="-1" role="dialog" aria-hidden="true">
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
                                <td>Category</td>
                                <td>:</td>
                                <td>{{this.Types.category_id.name}}</td>
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td>:</td>
                                <td>{{this.Types.name}}</td>
                            </tr>
                            <tr>
                                <td>Size</td>
                                <td>:</td>
                                <td>{{this.Types.size}} </td>
                            </tr>
                            <tr>
                                <td>Description</td>
                                <td>:</td>
                                <td>{{this.Types.description}} </td>
                            </tr>
                            <tr>
                                <td>Remark</td>
                                <td>:</td>
                                <td>{{this.Types.remark}} </td>
                            </tr>
                            <tr>
                                <td>Created</td>
                                <td>:</td>
                                <td>{{this.Types.size}} </td>
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
            }
        },
        watch: {
            'data': function() {
                this.Types = this.data;
            }
        },
        methods:{
            deleteType(){
                $("#delete-type-modal").modal('hide');

                var url = '/api/v1/Type/Deletes/'+ this.Types.id +'/type', method = 'delete';
                fetch(url, {
                    method: method,
                    body: JSON.stringify(),
                    headers: {
                        'content-type': 'application/json'
                    }
                }).then((response) => {
                    this.$notify({
                        title: 'Success',
                        message: 'Successfully Delete Type',
                        type: 'success'
                    });
                    Event.$emit('fetchType');
                    Event.$emit('updateTable');
                })
            },
        }



    }

</script>