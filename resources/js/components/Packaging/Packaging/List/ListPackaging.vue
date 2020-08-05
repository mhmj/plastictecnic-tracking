<template>
    <main id="js-page-content" role="main" class="page-content">
        <div class="row">
            <div class="col-6">
                <div class="subheader">
                    <h1 class="subheader-title">
                        <i class='subheader-icon fal fa-box'></i> Packaging
                    </h1>
                </div>
            </div>
            <div class="col-6" style="display: flex; justify-content: flex-end;" >
                <div class="subheader">
                    <button type="submit" class="btn btn-md btn-primary" v-on:click="openCreateRecord()">New</button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div id="panel-1" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            List Packaging
                        </h2>
                    </div>
                    <div class="panel-container show">
                        <div class="panel-content">
                            <ul class="nav nav-tabs nav-tabs-clean" role="tablist">
                                <li v-for="PackagingsCategory in PackagingsCategories" class="nav-item">
                                    <a v-on:click="fetchPackaging(PackagingsCategory.id)" :class="[{'active': PackagingsCategory.name === 'Pallet'},'nav-link']" data-toggle="tab" href="#tab-home" role="tab">{{PackagingsCategory.name}}</a>
                                </li>
                            </ul>
                            <div class="tab-content p-3">
                                <div class="tab-pane fade show active" id="tab-home" role="tabpanel" aria-labelledby="tab-home">
                                    <element-packaging :data="this.Packagings"></element-packaging>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <create-packaging></create-packaging>
        </div>
    </main>
</template>

<script>
    export default {
        data() {
            return {
                PackagingsCategories:[],
                Packagings:[],
                dataTable:null,
            }
        },
        created(){
            this.ListPackagingType();
            this.fetchFirstTime();
        },
        mounted() {
            Event.$on('fetchPackaging', (id) => {
                this.fetchPackaging(id);
            });
        },

        methods : {
            openCreateRecord(){
                $(".create-packaging-modal").modal('show');
            },
            ListPackagingType(){
                fetch('/api/v1/Packaging/Lists/category').then(response => response.json())
                    .then(response => {
                        this.PackagingsCategories = response;
                    })
                    .catch(error => console.log(error))

            },
            fetchFirstTime(){
                fetch('/api/v1/Packaging/Lists/'+ 1 +'/packaging-details').then(response => response.json())
                    .then(response => {
                        this.Packagings = response.data;
                    })
                    .catch(error => console.log(error))
            },
            fetchPackaging(id){
                fetch('/api/v1/Packaging/Lists/'+ id +'/packaging-details').then(response => response.json())
                    .then(response => {
                        this.Packagings = response.data;
                    })
                    .catch(error => console.log(error))
            },
        }
    }

</script>

