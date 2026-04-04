@extends('layouts.default', ['CurrentPage' => $CurrentPage])

@section('content')
        <div class="content-body">
			<div class="page-titles">
				<h5 class="dashboard_bar">Jqvmap</h5>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{ url('index') }}">
						Home </a>
					</li>
					<li class="breadcrumb-item active"><a href="javascript:void(0)">Jqvmap</a></li>
				</ul>
			</div>
            <div class="container">
                <!-- row -->

                <!-- Vectormap -->
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">World Map</h4>
                            </div>
                            <div class="card-body">
                                <div id="world-map"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">USA</h4>
                            </div>
                            <div class="card-body">
                                <div id="usa" style="height: 450px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection