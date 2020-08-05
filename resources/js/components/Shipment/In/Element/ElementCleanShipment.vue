<template>
<div>
    <div class="row">
        <div class="col-5">
            <div id="panel-1" class="panel">
                <div class="panel-container show">
                    <div class="panel-content">

                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="row">
                <div class="col-lg-12">
                    <div id="panel-2" class="panel">
                        <div class="panel-container show">
                            <div class="panel-content">
                                <div class="form-group">
                                    <label class="form-label">Packaging No</label>
                                    <form method="post" @submit.prevent="checkPackagingNo">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <v-select  style="padding: 0px;" class="dropdown-item" :options="ListType" :reduce="ListType => ListType.id " :label="ListType.label" v-model="options"></v-select>
                                            </div>
                                            <input type="text" style="height: 30px" aria-label="Packaging No" class="form-control" placeholder="123456" id="CleanPackagingNo" v-model="packaging_no">
                                            <div class="input-group-append">
                                                <button type="submit"  style="height: 30px" class="btn btn-primary shadow-0">
                                                    <p style="margin-top: -3px;">Search</p>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <update-movement :data="this.ListPackaging" state="clean"></update-movement>
        </div>
    </div>
    <remove-movement :data="this.Packaging"></remove-movement>
</div>
</template>

<script>
    export default {
        data() {
            return {
                packaging_no:'',
                condition:true,
                ListPackaging:[],
                Packaging:[],
                dataTable:null,
                options: 'PAL001 - ',
                ListType:[],
            }
        },
        created(){
            this.TypeList();
        },
        mounted() {
            Event.$on('updateTablePackagingMovement', () => {
                this.updateTable();
            });
        },
        watch: {
            ListPackaging() {
                this.updateTable();
            }
        },

        methods : {
            updateTable(){
                if (this.dataTable) {
                    $('#dt-clean-shipping-in').DataTable().destroy();
                }
                this.$nextTick(() =>
                {
                    this.dataTable = $('#dt-clean-shipping-in').DataTable(
                        {
                            responsive: true,
                            lengthChange: false,
                            paging: false,
                            info: false,
                            order: [
                                [0, 'desc']
                            ],
                            rowGroup:
                                {
                                    dataSrc: 0
                                },
                            dom:
                            "<'row mb-3'<'col-sm-12 col-md-6 d-flex align-items-center justify-content-start'f><'col-sm-12 col-md-6 d-flex align-items-center justify-content-end'lB>>" +
                            "<'row'<'col-sm-12'tr>>" +
                            "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>> ",
                            buttons: [
                            ]
                        });
                });
            },
            openDeleteRecord(id){
                $("#delete-movement-modal").modal('show');
                this.Packaging = id;
            },
            TypeList(){
                axios.get('/api/v1/Packaging/Lists/all-type')
                    .then(function (response) {
                        this.ListType = $.map(response.data, function (value) {
                            return {'id': value.name + ' - ', 'label': value.name + ' - '};
                        });
                    }.bind(this));
            },
            checkPackagingNo(){
                for(var i=0; i < this.ListPackaging.length; i++){
                    if( this.ListPackaging[i].packaging_no == this.packaging_no){
                        this.condition= false;
                    }
                    else {
                        this.condition = true;
                    }
                }

                if(this.condition === true)
                {
                    this.fetchPackaging();
                }

                if(this.condition === false)
                {
                    this.$notify({
                        title: 'Error',
                        message: 'The record already exist in the table',
                        type: 'error'
                    });
                }
            },
            fetchPackaging(){
                this.packaging_no = this.options + this.packaging_no;
                fetch('/api/v1/Movement/Lists/'+ this.packaging_no +'/OUT/search').then(response => response.json())
                    .then(response => {

                        if(!Object.keys(response).length )
                        {
                            this.$notify({
                                title: 'Error',
                                message: 'The package already in the warehouse',
                                type: 'error'
                            });
                        }
                        if(Object.keys(response).length)
                        {
                            this.ListPackaging.push(response);
                        }
                        this.packaging_no = '';
                    })
                    .catch(error => console.log(error))
            },
        }
    }

</script>

