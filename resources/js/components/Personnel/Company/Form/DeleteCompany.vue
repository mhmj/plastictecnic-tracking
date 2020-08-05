<template>
    <form method="post" @submit.prevent="deleteCompany">
        <div class="modal fade" id="delete-company-modal" tabindex="-1" role="dialog" aria-hidden="true">
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
                                <td>{{this.Company.name}}</td>
                            </tr>
                            <tr>
                                <td>Registration</td>
                                <td>:</td>
                                <td>{{this.Company.registration_no}}</td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td>:</td>
                                <td>{{this.Company.address}} </td>
                            </tr>
                            <tr>
                                <td>Phone</td>
                                <td>:</td>
                                <td>{{this.Company.phone_no}} </td>
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
                Company:this.data,
            }
        },
        watch: {
            'data': function() {
                this.Company = this.data;
            }
        },
        methods:{
            deleteCompany(){
                $("#delete-company-modal").modal('hide');

                var url = '/api/v1/Personnel/Company/Deletes/'+ this.Company.id +'/company', method = 'delete';
                fetch(url, {
                    method: method,
                    body: JSON.stringify(),
                    headers: {
                        'content-type': 'application/json'
                    }
                }).then((response) => {
                    Event.$emit('fetchCompany');
                    Event.$emit('updateTable');
                    this.$notify({
                        title: 'Success',
                        message: 'Successfully Delete Company',
                        type: 'success'
                    });
                })
            },
        }



    }

</script>