<form
    id="create-company-form"
    method="POST"
    class="js-ajax-form"
    action="{{ route('platform.companies.store') }}"
>
    @csrf
    @method('POST')

    <div class="row">

        <div class="col-md-6">

            <x-forms.floating-input
                id="name"
                field="name"
                type="text"
                name="name"
                value="{{ old('name') }}"
                label="Company Name *"
                placeholder="Company Name"
            />

        </div>

        <div class="col-md-6">

            <x-forms.floating-input
                id="email"
                field="email"
                type="email"
                name="email"
                :value="old('email')"
                label="Email Address *"
                placeholder="Email Address"
            />

        </div>

        <div class="col-md-6">

            <x-forms.floating-input
                id="phone"
                field="phone"
                type="text"
                name="phone"
                value="{{ old('phone') }}"
                label="Phone Number"
                placeholder="Phone Number"
            />

        </div>

        <div class="col-md-6">

            <x-forms.floating-input
                id="no_of_locations"
                field="no_of_locations"
                type="number"
                name="no_of_locations"
                value="{{ old('no_of_locations') }}"
                label="No Of Locations"
                placeholder="No Of Locations"
            />

        </div>

    </div>

    <div class="text-end mt-3">

        <x-button
            type="button"
            variant="secondary"
            data-bs-dismiss="modal"
        >
            Cancel
        </x-button>

        <x-button
            type="submit"
            variant="primary"
        >
            Update Company
        </x-button>

    </div>

</form>