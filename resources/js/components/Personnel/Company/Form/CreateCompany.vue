<template>
    <div class="modal fade create-company-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-right">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title h3">Register New Company</h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fal fa-times"></i></span>
                    </button>
                </div>
                <form method="post" @submit.prevent="companyChecked">
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
                                                        <label class="form-label">Name</label>
                                                        <div class="row" v-if="('name' in errors)">
                                                            <div class="col">
                                                                <label class="text-danger">{{errors['name']}}</label>
                                                            </div>
                                                        </div>
                                                        <input type="text" class="form-control" v-model="Company.name" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-bottom: 10px;">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Registration</label>
                                                        <input type="text" class="form-control" v-model="Company.registration_no" >
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Phone</label>
                                                        <input type="text" class="form-control" v-model="Company.phone_no" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-bottom: 10px;">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Address</label>
                                                        <textarea class="form-control" rows="5" v-model="Company.address"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-bottom: 10px;">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Post Code</label>
                                                        <input type="text" class="form-control" v-model="Company.post_code" >
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="form-label">State</label>
                                                        <input type="text" class="form-control" v-model="Company.state" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-bottom: 10px;">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="form-label">City</label>
                                                        <input type="text" class="form-control" v-model="Company.location" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-bottom: 10px;">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Email</label>
                                                        <input type="text" class="form-control" v-model="Company.email" >
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
                dataTable:null,
                errors: [],
                Company:[],
            }
        },
        created(){
        },
        methods: {
            companyChecked()
            {
                this.errors = [];

                if(this.Company.name)
                {
                    this.createCompany();
                }

                if(!this.Company.name)
                {
                    this.errors['name'] = "Fill the Company Name"
                }
            },
            open1() {
                $(".create-company-modal").modal('hide');
            },
            createCompany(){
                var url = '/api/v1/Personnel/Company/Creates/company', method = 'post';
                fetch(url, {
                    method: method,
                    body: JSON.stringify({
                        name: this.Company.name,
                        registration_no: this.Company.registration_no,
                        address: this.Company.address,
                        post_code: this.Company.post_code,
                        state: this.Company.state,
                        phone_no: this.Company.phone_no,
                        location: this.Company.location,
                        email: this.Company.email,
                    }),
                    headers: {
                        'content-type': 'application/json'
                    }
                }).then((response) => {
                    Event.$emit('fetchCompany');
                    Event.$emit('updateTable');
                    this.clearForm();
                    $(".create-company-modal").modal('hide');
                    this.$notify({
                        title: 'Success',
                        message: 'Successfully Register Company',
                        type: 'success'
                    });
                })
            },
            clearForm(){
                this.Company=[];
            }
        }
    }

</script>