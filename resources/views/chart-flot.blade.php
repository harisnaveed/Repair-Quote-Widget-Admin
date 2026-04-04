@extends('layouts.default', ['CurrentPage' => $CurrentPage])

@section('content')
        <div class="content-body">
			<div class="page-titles">
				<h5 class="dashboard_bar">Flot Chart</h5>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{ url('index') }}">
						Home </a>
					</li>
					<li class="breadcrumb-item active"><a href="javascript:void(0)">Flot Chart</a></li>
				</ul>
			</div>
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-lg-6 col-sm-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Bar Chart</h4>
                                    </div>
                                    <div class="card-body">
                                        <div id="flotBar1" class="flot-chart"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Bar Chart</h4>
                                    </div>
                                    <div class="card-body">
                                        <div id="flotBar2" class="flot-chart"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Line Chart</h4>
                                    </div>
                                    <div class="card-body">
                                        <div id="flotLine1" class="flot-chart"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Line Chart</h4>
                                    </div>
                                    <div class="card-body">
                                        <div id="flotLine2" class="flot-chart"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Line Chart</h4>
                                    </div>
                                    <div class="card-body">
                                        <div id="flotLine3" class="flot-chart"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Area Chart</h4>
                                    </div>
                                    <div class="card-body">
                                        <div id="flotArea1" class="flot-chart"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Area Chart</h4>
                                    </div>
                                    <div class="card-body">
                                        <div id="flotArea2" class="flot-chart"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Realtime Chart</h4>
                                    </div>
                                    <div class="card-body">
                                        <div id="flotRealtime1" class="flot-chart"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Realtime Chart</h4>
                                    </div>
                                    <div class="card-body">
                                        <div id="flotRealtime2" class="flot-chart"></div>
                                    </div>
                                </div>
                            </div>
							<div class="col-lg-6 col-sm-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Stacking Chart</h4>
                                    </div>
                                    <div class="card-body">
                                        <div id="flotRealtime3" class="flot-chart"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection