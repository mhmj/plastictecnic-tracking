<template>
    <main id="js-page-content" role="main" class="page-content">
        <div class="row">
            <div class="col-6">
                <div class="subheader">
                    <h1 class="subheader-title">
                        <i class='subheader-icon fal fa-building'></i> Company
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
                            List Company
                        </h2>
                    </div>
                    <div class="panel-container show">
                        <div class="panel-content">
                            <element-company :data="this.Companies"></element-company>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <create-company></create-company>
        </div>
    </main>
</template>

<script>
    export default {
        data() {
            return {
                Companies:[],
            }
        },
        created(){
            this.fetchCompany();
        },
        mounted() {
            Event.$on('fetchCompany', () => {
                this.fetchCompany();
            });
        },

        methods : {
            openCreateRecord(){
                $(".create-company-modal").modal('show');
            },
            fetchCompany(){
                fetch('/api/v1/Personnel/Company/Lists/all').then(response => response.json())
                    .then(response => {
                        this.Companies = response.data;
                    })
                    .catch(error => console.log(error))
            },

        }
    }

</script>
