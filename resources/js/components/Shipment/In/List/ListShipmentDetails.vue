<template>
    <main id="js-page-content" role="main" class="page-content">
        <div class="subheader">
            <h1 class="subheader-title">
                <i class='subheader-icon fal fa-shipping-fast'></i> {{Shipment.company_id.name}} - <span class="text-primary text-bold" style="font-weight: bold"> {{Shipment.delivery_no}}</span>
            </h1>
        </div>
        <div class="row">
            <edit-shipment :data="this.Shipment"></edit-shipment>

        </div>
        <div class="row">
            <element-scanner></element-scanner>
            <list-movement></list-movement>
        </div>
    </main>
</template>

<script>
    export default {
        props:['data'],
        data() {
            return {
                id: null,
                ListPackaging:[],
                Shipment:{
                    id:'',
                    vehicle_no:'',
                    delivery_no:'',
                    created_by:'',
                    verified_by:'',
                    delivery_by:'',
                    received_by:'',
                    remark:'',
                    remark_2:'',
                    status:'',
                    company_id:{
                        id:'',
                        name:'',
                    },
                },
            }
        },
        created(){
            this.fetchShipmentDetails();
            this.fetchPackagingShipment();
            this.id= this.data;
        },
        mounted() {
            Event.$on('fetchShipmentDetails', () => {
                this.fetchShipmentDetails();
            });
            Event.$on('fetchPackagingShipment', () => {
                this.fetchPackagingShipment();
            });
        },

        methods : {
            fetchShipmentDetails(){
                fetch('/api/v1/Shipment/Lists/'+ this.data +'/details').then(response => response.json())
                    .then(response => {
                        this.Shipment = response.data;
                    })
                    .catch(error => console.log(error))
            },
            fetchPackagingShipment(){
                fetch('/api/v1/Movement/Lists/'+ this.data +'/movement').then(response => response.json())
                    .then(response => {
                        this.ListPackaging = response.data;
                    })
                    .catch(error => console.log(error))
            },

        }
    }

</script>
