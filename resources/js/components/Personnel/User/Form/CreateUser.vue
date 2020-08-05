<template>
    <div class="modal fade create-user-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-right">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title h3">Register New User</h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fal fa-times"></i></span>
                    </button>
                </div>
                <form method="post" @submit.prevent="userChecked">
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
                                                <input type="text" class="form-control" v-model="User.name" >
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Email</label>
                                                <div class="row" v-if="('email' in errors)">
                                                    <div class="col">
                                                        <label class="text-danger">{{errors['email']}}</label>
                                                    </div>
                                                </div>
                                                <input type="text" class="form-control" v-model="User.email" >
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Phone</label>
                                                <input type="text" class="form-control" v-model="User.phone_no" >
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Role</label>
                                                <div class="row" v-if="('role' in errors)">
                                                    <div class="col">
                                                        <label class="text-danger">{{errors['role']}}</label>
                                                    </div>
                                                </div>
                                                <v-select :options="['Admin', 'Staff', 'Customer']"  v-model="User.role"></v-select>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Company</label>
                                                <div class="row" v-if="('company_id' in errors)">
                                                    <div class="col">
                                                        <label class="text-danger">{{errors['company_id']}}</label>
                                                    </div>
                                                </div>
                                                <v-select :options="ListCompanies" :reduce="ListCompanies => ListCompanies.id " :label="ListCompanies.label" v-model="User.company_id"></v-select>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Remark</label>
                                                <input type="text" class="form-control" v-model="User.remark" >
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
                User: [],
                ListCompanies:[],
            }
        },
        created(){
            this.fetchCompany();
        },
        methods: {
            userChecked()
            {
                this.errors = [];

                if(this.User.name && this.User.email && this.User.role && this.User.company_id)
                {
                    this.createUser();
                }

                if(!this.User.name)
                {
                    this.errors['name'] = "Fill the Name"
                }
                if(!this.User.email)
                {
                    this.errors['email'] = "Fill the email"
                }
                if(!this.User.role)
                {
                    this.errors['role'] = "Choose the role"
                }
                if(!this.User.company_id)
                {
                    this.errors['company_id'] = "Choose the company"
                }
            },
            open1() {
                $(".create-user-modal").modal('hide');
            },
            fetchCompany(){
                axios.get('/api/v1/Personnel/Company/Lists/dropdown-list-company')
                    .then(function (response) {
                        this.ListCompanies = $.map(response.data, function(value){
                            return {'id': value.id, 'label': value.name};
                        });
                    }.bind(this));
            },
            createUser(){
                var url = '/api/v1/Personnel/User/Creates/user', method = 'post';
                fetch(url, {
                    method: method,
                    body: JSON.stringify({
                        name: this.User.name,
                        email: this.User.email,
                        phone_no: this.User.phone_no,
                        role: this.User.role,
                        company_id: this.User.company_id,
                        remark: this.User.remark,
                    }),
                    headers: {
                        'content-type': 'application/json'
                    }
                }).then((response) => {
                    Event.$emit('fetchUser');
                    Event.$emit('updateTable');
                    this.clearForm();
                    $(".create-user-modal").modal('hide');
                    this.$notify({
                        title: 'Success',
                        message: 'Successfully Register User',
                        type: 'success'
                    });
                })
            },
            clearForm(){
                this.User=[];
            }
        }
    }

</script>