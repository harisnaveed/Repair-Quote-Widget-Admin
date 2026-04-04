@extends('layouts.default', ['CurrentPage' => $CurrentPage])

@section('content')
        <div class="content-body">
			<div class="page-titles">
				<h5 class="dashboard_bar">CkEditor</h5>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{ url('index') }}">
						Home </a>
					</li>
					<li class="breadcrumb-item active"><a href="javascript:void(0)">CkEditor</a></li>
				</ul>
			</div>
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-xl-12 col-xxl-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Form CkEditor</h4>
                            </div>
                            <div class="card-body custom-ekeditor">
								<div id="ckeditor"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection