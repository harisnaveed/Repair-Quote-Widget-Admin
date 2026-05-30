@extends('layouts.default', ['CurrentPage' => 'view-all-locations'])

@section('content')
		<div class="content-body">
			<div class="page-titles">
				<h5 class="dashboard_bar">{{ $company->name }}</h5>
				<ul class="breadcrumb">
					<li class="breadcrumb-item">
                        @if (auth('platform')->check())
                            <a href="{{ route('platform.companies') }}">Clients </a>
                        @elseif (auth()->check())
                            <a href="{{ route('dashboard') }}">Home </a>
                        @endif

					</li>
					<li class="breadcrumb-item active"><a href="javascript:void(0)">List Of locations</a></li>
				</ul>
			</div>


      <div class="card-body">
        <div class="table-responsive">
          <table id="example5" class="display table" style="min-width: 845px">
            <thead>
              <tr>
                <th>
                  <div
                    class="custom-control d-inline custom-checkbox">
                    <input type="checkbox" class="form-check-input"
                      id="checkAll" required="">
                    <label class="form-check-label"
                      for="checkAll"></label>
                  </div>
                </th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Notification<br>Email & Phone</th>
                <th>Status</th>
                <th>Date</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($locations as $location)
                <tr>
                  <td>
                    <div class="form-check custom-checkbox">
                      <input type="checkbox" class="form-check-input"
                        id="customCheckBox2" required="">
                      <label class="form-check-label"
                        for="customCheckBox2"></label>
                    </div>
                  </td>
                  <td>{{ $location->name }}</td>
                  <td>{{ $location->email }}</td>
                  <td>{{ $location->phone }}</td>
                  <td>{{ $location->address }}
                    <br>
                    <a class="text-primary" href="{{ $location->gmb_link}}" target="_blank">Map Link</a>
                    </td>
                  <td>{{ $location->notification_email }}<br>{{ $location->notification_phone}}</td>
                  <td>
                    @if($location->is_active)
                        <span class="badge light badge-success">
                          <i class="fa fa-circle text-success me-1"></i>
                          Active
                        </span>
                    @else
                    <span class="badge light badge-danger">
                      <i class="fa fa-circle text-danger me-1"></i>
                      InActive
                    </span>
                    @endif
                  </td>
                  <td>{{ $location->created_at->format('M d, Y')}}</td>
                  <td>
                    <div class="dropdown ms-auto text-end c-pointer">
                      <div class="btn-link" data-bs-toggle="dropdown">
                        <svg width="24px" height="24px"
                          viewBox="0 0 24 24" version="1.1">
                          <g stroke="none" stroke-width="1"
                            fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24"
                              height="24"></rect>
                            <circle fill="#000000" cx="5"
                              cy="12" r="2"></circle>
                            <circle fill="#000000" cx="12"
                              cy="12" r="2"></circle>
                            <circle fill="#000000" cx="19"
                              cy="12" r="2"></circle>
                          </g>
                        </svg>
                      </div>
                      <div class="dropdown-menu dropdown-menu-end">
                        @if (auth('platform')->check())
                            <a class="dropdown-item js-ajax-action"
                            data-url="{{ route('platform.location.view', $location->id) }}"
                            data-method="GET"
                            data-modal="true"
                            data-modal-title="Location Details"
                            href="#">
                            View
                            </a>
                        @endif
                        {{-- @if (auth('web')->check()) --}}
                        @if ('true')
                            <a class="dropdown-item js-ajax-action"
                            data-url="{{ route('location.view', $location->id) }}"
                            data-method="GET"
                            data-modal="true"
                            data-modal-title="Location Details"
                            href="#">
                                View
                            </a>
                            <a class="dropdown-item js-ajax-action"
                            data-url="{{ route('platform.companies.edit', $location->id) }}"
                            data-method="GET"
                            data-modal="true"
                            data-modal-title="Company Details"
                            href="#">
                            Edit
                            </a>
                            <a class="dropdown-item js-ajax-action"
                            data-url="{{ route('platform.companies.destroy', $location->id) }}"
                            data-method="DELETE"
                            data-confirm-title="Delete Client"
                            data-confirm-message="Are you sure you want to delete {{$location->name}}?"
                            data-confirm-icon="warning"
                            data-reload="false"
                            href="#">
                            Delete
                            </a>
                            <a class="dropdown-item js-ajax-action"
                            data-url="{{ route('location.toggle-status', $location->id) }}"
                            data-method="PUT"
                            data-confirm-title="{{ $location->is_active ? 'Deactivate Location' : 'Activate Location' }}"
                            data-confirm-message="{{ $location->is_active
                            ? "Are you sure you want to deactivate {$location->name}?"
                            : "Are you sure you want to activate {$location->name}?" }}"
                            data-confirm-icon="warning"
                            data-reload="false"
                            href="#">
                            {{ $location->is_active ? 'Deactivate' : 'Activate' }}
                            </a>
                        @endif
                      </div>
                    </div>
                  </td>
                </tr>
              @endforeach ()
            </tbody>
          </table>

        </div>
      </div>
@endsection

@section('local-js')
<script src="{{ asset('js/services/ajax-actions.js') }}"></script>
<script src="{{ asset('js/services/ajax-form.js') }}"></script>
@endsection
