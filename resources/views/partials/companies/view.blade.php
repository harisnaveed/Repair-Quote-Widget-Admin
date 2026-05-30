<div class="row g-3">

  <div class="col-md-6">
      <label class="form-label fw-bold">
          Name
      </label>
      <div>
          {{ $company->name }}
      </div>
  </div>

  <div class="col-md-6">
      <label class="form-label fw-bold">
          Email
      </label>
      <div>
          {{ $company->email ?? '-' }}
      </div>
  </div>

  <div class="col-md-6">
      <label class="form-label fw-bold">
          Phone
      </label>
      <div>
          {{ $company->phone ?? '-' }}
      </div>
  </div>

  <div class="col-md-6">
      <label class="form-label fw-bold">
          Status
      </label>
      <div>
          @if($company->is_active)
              <span class="badge bg-success">
                  Active
              </span>
          @else
              <span class="badge bg-danger">
                  Inactive
              </span>
          @endif
      </div>
  </div>

  <div class="col-md-6">
      <label class="form-label fw-bold">
          No Of Locations
      </label>
      <div>
          {{ $company->no_of_locations ?? '-' }}
      </div>
  </div>

  <div class="col-md-6">
      <label class="form-label fw-bold">
          Created At
      </label>
      <div>
          {{ $company->created_at?->format('d M Y h:i A') }}
      </div>
  </div>


  @if($company->delete_at)
  <div class="col-md-6">
      <label class="form-label fw-bold">
          Deleted At
      </label>
      <div>
          {{ $company->deleted_at?->format('d M Y h:i A') ?? '-' }}
      </div>
  </div>
  @endif
</div>