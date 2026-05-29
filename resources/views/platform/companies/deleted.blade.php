@extends('layouts.default', ['CurrentPage' => 'platform-deleted-companies'])

@section('content')
		<div class="content-body">
			<div class="page-titles">
				<h5 class="dashboard_bar">Basic DataTable</h5>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{ route('platform.dashboard') }}">
							Home </a>
					</li>
					<li class="breadcrumb-item active"><a href="javascript:void(0)">Deleted Clients</a></li>
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
                <th>No# Locations</th>
                <th>Status</th>
                <th>Created Date</th>
                <th>Deleted Date</th>
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
                  <td>{{ $company->deleted_at->format('M d, Y')}}</td>
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
                        <a class="dropdown-item js-restore-company" data-id="{{ $company->id }}" href="#">Restore</a>
                        <a class="dropdown-item" href="#">View</a>
                        <a class="dropdown-item" href="#">Edit</a>
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
  const restoreCompanyUrl = "{{ route('platform.companies.restore', ':id') }}";
  $(document).on(
    'click',
    '.js-restore-company',
    function (e) {
        e.preventDefault();
        let id = $(this).data('id');
        let url = restoreCompanyUrl.replace(':id', id);
        if (!confirm('Restore company?')) {
            return;
        }
        $.ajax({
          url: url,
            type: 'PUT',
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