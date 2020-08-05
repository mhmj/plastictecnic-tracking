<template>
    <main id="js-page-content" role="main" class="page-content">
        <div class="subheader">
            <div class="col-6">
                <div class="subheader">
                    <h1 class="subheader-title">
                        <i class='subheader-icon fal fa-shipping-fast'></i> Shipment Out
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
                            List Shipment
                        </h2>

                    </div>
                    <div class="panel-container show">
                        <div class="panel-content">
                            <element-shipment-out :data="this.Shipment"></element-shipment-out>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <create-shipment-out></create-shipment-out>
        </div>
    </main>
</template>

<script>
    export default {
        data() {
            return {
                Shipment:[],
            }
        },
        created(){
            this.fetchShipment();
        },
        mounted() {
            Event.$on('fetchShipment', () => {
                this.fetchShipment();
            });
        },

        methods : {
            openCreateRecord(){
                $(".create-shipment-modal").modal('show');
            },
            fetchShipment(){
                fetch('/api/v1/Shipment/Lists/all').then(response => response.json())
                    .then(response => {
                        this.Shipment = response.data;
                    })
                    .catch(error => console.log(error))
            },

        }
    }

</script>
