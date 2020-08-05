<template>
    <main id="js-page-content" role="main" class="page-content">
        <div class="row">
            <div class="col-6">
                <div class="subheader">
                    <h1 class="subheader-title">
                        <i class='subheader-icon fal fa-box'></i> Category
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
                            List Category
                        </h2>
                    </div>
                    <div class="panel-container show">
                        <div class="panel-content">
                            <element-category :data="this.Categories"></element-category>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <create-category></create-category>
        </div>
    </main>
</template>

<script>
    export default {
        data() {
            return {
                Categories:[],
                dataTable:null,
            }
        },
        created(){
            this.fetchCategory();
        },
        mounted() {
            Event.$on('fetchCategory', () => {
                this.fetchCategory();
            });
        },

        methods : {
            openCreateRecord(){
                $(".create-category-modal").modal('show');
            },
            fetchCategory(){
                fetch('/api/v1/Category/Lists/category').then(response => response.json())
                    .then(response => {
                        this.Categories = response.data;
                    })
                    .catch(error => console.log(error))
            },
        }
    }

</script>

