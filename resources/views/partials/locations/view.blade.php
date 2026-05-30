<div class="row g-3">

  <div class="col-md-6">
      <label class="form-label fw-bold">
          Name
      </label>
      <div>
          {{ $location->name }}
      </div>
  </div>

  <div class="col-md-6">
      <label class="form-label fw-bold">
          Email
      </label>
      <div>
          {{ $location->email ?? '-' }}
      </div>
  </div>

  <div class="col-md-6">
      <label class="form-label fw-bold">
          Phone
      </label>
      <div>
          {{ $location->phone ?? '-' }}
      </div>
  </div>

  <div class="col-md-6">
      <label class="form-label fw-bold">
          Status
      </label>
      <div>
          @if($location->is_active)
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
          Address
      </label>
      <div>
          {{ $location->address ?? '-' }}
      </div>
  </div>

  <div class="col-md-6">
      <label class="form-label fw-bold">
          Map
      </label>
      <div>
        <x-button-anchor
        href="{{ $location->gmb_link ?? '-' }}"
        variant="primary"
        class="px-2 py-1"
        target="_blank"
        >
            Goto Map
        </x-button-anchor>
      </div>
  </div>

  <hr>

  <div class="col-md-6">
      <label class="form-label fw-bold">
          Notification Email
      </label>
      <div>
          {{ $location->notification_email ?? '-' }}
      </div>
  </div>

  <div class="col-md-6">
      <label class="form-label fw-bold">
          Notification Phone
      </label>
      <div>
          {{ $location->notification_phone ?? '-' }}
      </div>
  </div>

  <hr>

  <div class="col-md-6">
      <label class="form-label fw-bold">
          Created At
      </label>
      <div>
          {{ $location->created_at?->format('d M Y h:i A') }}
      </div>
  </div>


  @if($location->delete_at)
  <div class="col-md-6">
      <label class="form-label fw-bold">
          Deleted At
      </label>
      <div>
          {{ $location->deleted_at?->format('d M Y h:i A') ?? '-' }}
      </div>
  </div>
  @endif
</div>
