<template>
    <main id="js-page-content" role="main" class="page-content">
        <div class="row">
            <div class="col-6">
                <div class="subheader">
                    <h1 class="subheader-title">
                        <i class='subheader-icon fal fa-user-friends'></i> User
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
                            List User
                        </h2>
                    </div>
                    <div class="panel-container show">
                        <div class="panel-content">
                            <element-user :data="this.Users"></element-user>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <create-user></create-user>
        </div>
    </main>
</template>

<script>
    export default {
        data() {
            return {
                Users:[],
            }
        },
        created(){
            this.fetchUser();
        },
        mounted() {
            Event.$on('fetchUser', () => {
                this.fetchUser();
            });
        },

        methods : {
            openCreateRecord(){
                $(".create-user-modal").modal('show');
            },
            fetchUser(){
                fetch('/api/v1/Personnel/User/Lists/all').then(response => response.json())
                    .then(response => {
                        this.Users = response.data;
                    })
                    .catch(error => console.log(error))
            },

        }
    }

</script>
