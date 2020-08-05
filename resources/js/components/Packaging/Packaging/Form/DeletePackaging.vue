<template>
    <form method="post" @submit.prevent="deletePackaging">
        <div class="modal fade" id="delete-packaging-modal" tabindex="-1" role="dialog" aria-hidden="true">
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
                                <td>Type</td>
                                <td>:</td>
                                <td>{{this.Packaging.type_name}}</td>
                            </tr>
                            <tr>
                                <td>No</td>
                                <td>:</td>
                                <td>{{this.Packaging.packaging_no}}</td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>:</td>
                                <td>{{this.Packaging.status}} </td>
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
                Packaging:this.data,
            }
        },
        watch: {
            'data': function() {
                this.Packaging = this.data;
            }
        },
        methods:{
            deletePackaging(){
                $("#delete-packaging-modal").modal('hide');

                var url = '/api/v1/Packaging/Deletes/'+ this.Packaging.id +'/packaging', method = 'delete';
                fetch(url, {
                    method: method,
                    body: JSON.stringify(),
                    headers: {
                        'content-type': 'application/json'
                    }
                }).then((response) => {
                    Event.$emit('fetchPackaging', this.Packaging.category_id.id);
                    Event.$emit('updateTable');
                })
            },
        }



    }

</script>