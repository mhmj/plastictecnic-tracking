<template>
    <form method="post" @submit.prevent="updateRecord">
        <div id="panel-3" class="panel">
            <div class="panel-container show">
                <div class="panel-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <table id="dt-clean-shipping-in" class="dt-clean-shipping-in table table-bordered table-hover table-striped w-100">
                                <thead class="bg-primary-600">
                                <tr>
                                    <th>D.O</th>
                                    <th>Packaging</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="Packaging in this.ListPackaging">
                                    <td><a style="text-decoration: underline; color: blue">{{Packaging.delivery_no}}</a></td>
                                    <td>{{Packaging.packaging_no}}</td>
                                    <td>
                                        <a href="javascript:void(0);" v-on:click="$parent.openDeleteRecord(Packaging)" class="btn btn-sm btn-outline-danger mr-2">
                                            <i class="fal fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>D.O</th>
                                    <th>Packaging</th>
                                    <th></th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12" style="display: flex;justify-content: flex-end">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</template>

<script>
    export default {
        props: ['data','state'],
        data() {
            return {
                packaging_no:'',
                condition:true,
                ListPackaging:this.data,
                option: this.state,
                Packaging:[],
                dataTable:null,
            }
        },
        created(){
        },
        mounted() {

        },
        watch: {
            'data': function() {
                this.ListPackaging = this.data;
            }
        },

        methods : {
            updateRecord(){
                fetch('/api/v1/Movement/Updates/IN/'+ this.option +'/movement', {
                    method: 'post',
                    body: JSON.stringify(this.ListPackaging),
                    headers: {
                        'content-type': 'application/json'
                    }
                }).then(() => {
                    this.$notify({
                        title: 'Success',
                        message: 'Successfully Update The Record',
                        type: 'success'
                    });
                    this.$parent.ListPackaging = [];

                });
            },
        }
    }

</script>

