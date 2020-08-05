<template>
    <div class="col-4">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>
                    Scanner
                </h2>

            </div>
            <div class="panel-container show">
                <div class="panel-content">
                    <!--<element-shipment :data="this.Shipment"></element-shipment>-->
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                Shipment:[],
            }
        },
        created(){
            //this.fetchShipment();
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
