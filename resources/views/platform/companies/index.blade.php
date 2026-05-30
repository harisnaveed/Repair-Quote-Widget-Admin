@extends('layouts.default', ['CurrentPage' => 'platform-companies'])

@section('content')
		<div class="content-body">
			<div class="page-titles">
				<h5 class="dashboard_bar">Basic DataTable</h5>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{ route('platform.dashboard') }}">
							Home </a>
					</li>
					<li class="breadcrumb-item active"><a href="javascript:void(0)">List Of Clients</a></li>
				</ul>
			</div>

      <div class="col-xl-6 mt-3">
        <div class="card">
          <div class="card-body card-info">
            <div class="card-data">
              <span>Clients deleted by administrators are stored here.</span>
              <h6><a>You can review and restore them when needed.</a></h6>
              <x-button-anchor
                  class="js-ajax-action"
                  data-url="{{ route('platform.companies.create', 1) }}"
                  data-method="GET"
                  data-modal="true"
                  data-modal-title="Company Details"
                  variant="primary"
              >
                  Add Client
              </x-button-anchor>
              <x-button-anchor
                  href="{{ route('platform.companies.deleted') }}"
                  variant="danger"
              >
                  View Deleted Clients
              </x-button-anchor>
            </div>
            <img src="{{ asset('images/pic1.png') }}" class="light-pic" alt="">
            <img src="{{ asset('images/pic2.png') }}" class="dark-pic" alt="">

          </div>
        </div>
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
                <th>No# Locations</th>
                <th>Status</th>
                <th>Date</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($companies as $company)
                <tr>
                  <td>
                    <div class="form-check custom-checkbox">
                      <input type="checkbox" class="form-check-input"
                        id="customCheckBox2" required="">
                      <label class="form-check-label"
                        for="customCheckBox2"></label>
                    </div>
                  </td>
                  <td>{{ $company->name }}</td>
                  <td>{{ $company->email }}</td>
                  <td>{{ $company->phone }}</td>
                  <td>{{ $company->no_of_locations }}</td>
                  <td>
                    @if($company->is_active)
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
                  <td>{{ $company->created_at->format('M d, Y')}}</td>
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
                        <a class="dropdown-item js-ajax-action"
                        data-url="{{ route('platform.companies.view', $company->id) }}"
                        data-method="GET"
                        data-modal="true"
                        data-modal-title="Company Details"
                        href="#">
                          View
                        </a>
                        <a class="dropdown-item js-ajax-action"
                        data-url="{{ route('platform.companies.edit', $company->id) }}"
                        data-method="GET"
                        data-modal="true"
                        data-modal-title="Company Details"
                        href="#">
                          Edit
                        </a>
                        <a class="dropdown-item js-ajax-action"
                          data-url="{{ route('platform.companies.destroy', $company->id) }}"
                          data-method="DELETE"
                          data-confirm-title="Delete Client"
                          data-confirm-message="Are you sure you want to delete {{$company->name}}?"
                          data-confirm-icon="warning"
                          data-reload="false"
                          href="#">
                          Delete
                        </a>
                        <a class="dropdown-item js-ajax-action"
                          data-url="{{ route('platform.companies.toggle-status', $company->id) }}"
                          data-method="PUT"
                          data-confirm-title="{{ $company->is_active ? 'Deactivate Company' : 'Activate Company' }}"
                          data-confirm-message="{{ $company->is_active
                          ? "Are you sure you want to deactivate {$company->name}?"
                          : "Are you sure you want to activate {$company->name}?" }}"
                          data-confirm-icon="warning"
                          data-reload="false"
                          href="#">
                          {{ $company->is_active ? 'Deactivate' : 'Activate' }}
                        </a>
                        <a class="dropdown-item" href="{{ route('platform.locations', $company->id) }}">View Locations</a>
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
