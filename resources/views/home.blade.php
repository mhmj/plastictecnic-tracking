@extends('layouts.dashboard.layout')

@section('content')
    <div class="page-wrapper">
        <div class="page-inner">
            @include('menu.menu')
            <div class="page-content-wrapper">
                @include('menu.header')
                <main id="js-page-content" role="main" class="page-content">
                    <div class="subheader">
                        <h1 class="subheader-title">
                            <i class='subheader-icon fal fa-home'></i> Home
                        </h1>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div id="panel-1" class="panel" data-panel-close="false" data-panel-fullscreen="false" data-panel-collapsed="false" data-panel-color="false" data-panel-locked="false" data-panel-refresh="false" data-panel-reset="false">
                                <div class="panel-hdr">
                                    <h2>
                                        Live Feeds
                                    </h2>
                                </div>
                                <div class="panel-container show">
                                    <div class="panel-content border-faded border-left-0 border-right-0 border-top-0">
                                        <div class="row no-gutters">
                                            <div class="col-lg-7 col-xl-8">
                                                <div class="position-relative">
                                                    <div class="custom-control custom-switch position-absolute pos-top pos-left ml-5 mt-3 z-index-cloud">
                                                        <input type="checkbox" class="custom-control-input" id="start_interval">
                                                        <label class="custom-control-label" for="start_interval">Live Update</label>
                                                    </div>
                                                    <div id="updating-chart" style="height:242px"></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-5 col-xl-4 pl-lg-3">
                                                <div class="d-flex mt-2">
                                                    My Tasks
                                                    <span class="d-inline-block ml-auto">130 / 500</span>
                                                </div>
                                                <div class="progress progress-sm mb-3">
                                                    <div class="progress-bar bg-fusion-400" role="progressbar" style="width: 30%;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <div class="d-flex">
                                                    Transfered
                                                    <span class="d-inline-block ml-auto">440 TB</span>
                                                </div>
                                                <div class="progress progress-sm mb-3">
                                                    <div class="progress-bar bg-success-500" role="progressbar" style="width: 34%;" aria-valuenow="34" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <div class="d-flex">
                                                    Bugs Squashed
                                                    <span class="d-inline-block ml-auto">77%</span>
                                                </div>
                                                <div class="progress progress-sm mb-3">
                                                    <div class="progress-bar bg-info-400" role="progressbar" style="width: 11%;" aria-valuenow="77" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <div class="d-flex">
                                                    User Testing
                                                    <span class="d-inline-block ml-auto">7 days</span>
                                                </div>
                                                <div class="progress progress-sm mb-g">
                                                    <div class="progress-bar bg-primary-300" role="progressbar" style="width: 84%;" aria-valuenow="84" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <div class="row no-gutters">
                                                    <div class="col-6 pr-1">
                                                        <a href="#" class="btn btn-default btn-block">Generate PDF</a>
                                                    </div>
                                                    <div class="col-6 pl-1">
                                                        <a href="#" class="btn btn-default btn-block">Report a Bug</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                @include('menu.color')
                @include('menu.footer')
            </div>
        </div>
    </div>

@endsection
