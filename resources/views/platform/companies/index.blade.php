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
              <a href="{{ route('platform.companies.deleted') }}">View deleted clients</a>
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
                        <a class="dropdown-item" href="#">View</a>
                        <a class="dropdown-item" href="#">Edit</a>
                        <a class="dropdown-item js-delete-company" data-id="{{ $company->id }}" href="#">Delete</a>
                        <a class="dropdown-item js-disable-company" data-id="{{ $company->id }}" href="#">Disable</a>
                        <a class="dropdown-item" href="#">View Locations</a>
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
<script>
  const deleteCompanyUrl = "{{ route('platform.companies.destroy', ':id') }}";
  $(document).on(
    'click',
    '.js-delete-company',
    function (e) {
        e.preventDefault();
        let id = $(this).data('id');
        let url = deleteCompanyUrl.replace(':id', id);
        if (!confirm('Delete company?')) {
            return;
        }
        $.ajax({
          url: url,
            type: 'DELETE',
            headers: {
                'X-CSRF-TOKEN':
                    $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
              showToast(
                  'success',
                  response.message,
                  'Success'
              );
                // location.reload();
            }
        });
    }
);
</script>
@endsection