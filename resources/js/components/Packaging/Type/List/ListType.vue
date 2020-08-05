<template>
    <main id="js-page-content" role="main" class="page-content">
        <div class="row">
            <div class="col-6">
                <div class="subheader">
                    <h1 class="subheader-title">
                        <i class='subheader-icon fal fa-box'></i> Type
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
                            List Type
                        </h2>
                    </div>
                    <div class="panel-container show">
                        <div class="panel-content">
                            <element-type :data="Types" v-bind:key="Types.id"></element-type>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <create-type></create-type>
        </div>
    </main>
</template>

<script>
    export default {
        data() {
            return {
                Types:[],
                dataTable:null,
            }
        },
        created(){
            this.fetchType();
        },
        mounted() {
            Event.$on('fetchType', () => {
                this.fetchType();
            });
        },

        methods : {
            openCreateRecord(){
                $(".create-type-modal").modal('show');
            },
            fetchType(){
                fetch('/api/v1/Type/Lists/type').then(response => response.json())
                    .then(response => {
                        this.Types = response.data;
                    })
                    .catch(error => console.log(error))
            },
        }
    }

</script>

