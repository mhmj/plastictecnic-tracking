<template>
    <main id="js-page-content" role="main" class="page-content">
        <div class="row">
            <div class="col-6">
                <div class="subheader">
                    <h1 class="subheader-title">
                        <i class='subheader-icon fal fa-box'></i> Shipment In
                    </h1>
                </div>
            </div>
            <div class="col-6" style="display: flex; justify-content: flex-end;" >
                <div class="subheader">
                    <button type="submit" class="btn btn-md btn-primary" v-on:click="">New</button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div id="panel-1" class="panel">
                    <div class="panel-hdr">
                        <h2>
                        </h2>
                    </div>
                    <div class="panel-container show">
                        <div class="panel-content">
                            <ul class="nav nav-pills nav-justified" role="tablist">
                                <li class="nav-item "><a class="nav-link  active" data-toggle="tab" href="#tab-clean">Clean</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab-damage">Damage</a></li>
                            </ul>
                            <div class="tab-content p-3">
                                <div class="tab-pane fade show active" id="tab-clean" role="tabpanel" aria-labelledby="tab-clean">
                                    <element-clean-shipment-in></element-clean-shipment-in>
                                </div>
                                <div class="tab-pane fade show " id="tab-damage" role="tabpanel" aria-labelledby="tab-damage">
                                    <element-damage-shipment-in></element-damage-shipment-in>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <!--<div class="tab-content p-3">-->
                    <!--<div class="tab-pane fade show active" id="tab-clean" role="tabpanel" aria-labelledby="tab-clean">-->
                        <!--<element-clean-shipment-in></element-clean-shipment-in>-->
                    <!--</div>-->
                    <!--<div class="tab-pane fade show " id="tab-damage" role="tabpanel" aria-labelledby="tab-damage">-->
                        <!--<element-damage-shipment-in></element-damage-shipment-in>-->
                    <!--</div>-->
                <!--</div>-->

            </div>
        </div>
        <div class="row">
            <!--<create-packaging></create-packaging>-->
        </div>
    </main>
</template>

<script>
    export default {
        data() {
            return {

            }
        },
        created(){

        },
        mounted() {

        },

        methods : {

        }
    }

</script>

