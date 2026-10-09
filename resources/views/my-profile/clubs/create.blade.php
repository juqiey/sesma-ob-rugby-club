@extends('layouts.master')
@section('title', 'Add Club Representation')
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/player/player-profile.css') }}">
@endpush
@section('content')
    <!-- Page-content -->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                    <h4 class="mb-sm-0">Add Club Representation</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Players</a></li>
                            <li class="breadcrumb-item active">Add Club Representation</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-4">
    <div class="card-body">

        {{-- ========================================================= --}}
        {{-- HEADER --}}
        {{-- ========================================================= --}}

        <div class="d-flex align-items-center mb-4">

            <div class="avatar-sm me-3">
                <div class="avatar-title bg-primary-subtle text-primary rounded">
                    <i class="ri-shield-user-line fs-4"></i>
                </div>
            </div>

            <div>
                <h5 class="card-title mb-1">
                    Add Club Representation
                </h5>

                <p class="text-muted mb-0">
                    Add an organization that you have represented.
                </p>
            </div>

        </div>


        {{-- ========================================================= --}}
        {{-- FORM --}}
        {{-- ========================================================= --}}

        <form
            action=""
            method="POST"
            id="clubRepresentationForm"
        >

            @csrf


            {{-- ===================================================== --}}
            {{-- STEP 1: SELECT CLUB --}}
            {{-- ===================================================== --}}

            <div class="mb-4">

                <h6 class="mb-3">
                    <span class="badge bg-primary me-2">1</span>
                    Select Club
                </h6>


                {{-- Search Club --}}
                <div class="mb-3">

                    <label
                        for="club_search"
                        class="form-label"
                    >
                        Search Club
                        <span class="text-danger">*</span>
                    </label>

                    <div class="input-group">

                        <span class="input-group-text">
                            <i class="ri-search-line"></i>
                        </span>

                        <input
                            type="text"
                            class="form-control"
                            id="club_search"
                            placeholder="Search for a club..."
                            autocomplete="off"
                        >

                    </div>

                    <div class="form-text">
                        Search by club name, location, or club type.
                    </div>

                    @error('club_id')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror

                </div>


                {{-- Hidden Club ID --}}
                <input
                    type="hidden"
                    name="club_id"
                    id="club_id"
                    value="{{ old('club_id') }}"
                >


                {{-- Search URL for External JS --}}
                <input
                    type="hidden"
                    id="club_search_url"
                    value="{{ route('my-career.clubs.search') }}"
                >


                {{-- Search Results --}}
                <div
                    id="club_search_results"
                    class="border rounded d-none"
                ></div>


                {{-- Selected Club --}}
                <div
                    id="selected_club"
                    class="card border border-primary mt-3 d-none"
                >

                    <div class="card-body py-3">

                        <div class="d-flex align-items-center">

                            <div class="avatar-sm me-3">

                                <div class="avatar-title bg-primary-subtle text-primary rounded">
                                    <i class="ri-shield-line fs-4"></i>
                                </div>

                            </div>


                            <div class="flex-grow-1">

                                <h6
                                    class="mb-1"
                                    id="selected_club_name"
                                ></h6>

                                <p
                                    class="text-muted mb-0"
                                    id="selected_club_location"
                                ></p>

                            </div>


                            <div class="flex-shrink-0">

                                <button
                                    type="button"
                                    class="btn btn-sm btn-light"
                                    id="change_club"
                                >
                                    <i class="ri-edit-line me-1"></i>
                                    Change
                                </button>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- Register New Club --}}
                <div class="text-center mt-3">

                    <span class="text-muted">
                        Can't find your club?
                    </span>

                    <button
                        type="button"
                        class="btn btn-link p-0 ms-1"
                        data-bs-toggle="modal"
                        data-bs-target="#registerClubModal"
                    >
                        Register a New Club
                    </button>

                </div>

            </div>


            {{-- ===================================================== --}}
            {{-- STEP 2: REPRESENTATION DETAILS --}}
            {{-- ===================================================== --}}

            <div class="mb-4">

                <h6 class="mb-3">
                    <span class="badge bg-primary me-2">2</span>
                    Representation Details
                </h6>


                <div class="row">

                    {{-- Start Date --}}
                    <div class="col-md-6 mb-3">

                        <label
                            for="start_date"
                            class="form-label"
                        >
                            Start Date
                            <span class="text-danger">*</span>
                        </label>

                        <input
                            type="date"
                            class="form-control"
                            id="start_date"
                            name="start_date"
                            value="{{ old('start_date') }}"
                            required
                        >

                        @error('start_date')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror

                    </div>


                    {{-- End Date --}}
                    <div class="col-md-6 mb-3">

                        <label
                            for="end_date"
                            class="form-label"
                        >
                            End Date
                        </label>

                        <input
                            type="date"
                            class="form-control"
                            id="end_date"
                            name="end_date"
                            value="{{ old('end_date') }}"
                        >

                        <div class="form-text">
                            Leave empty if you are still representing this club.
                        </div>

                        @error('end_date')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror

                    </div>

                </div>


                {{-- Currently Representing --}}
                <div class="mb-3">

                    <div class="form-check">

                        <input
                            class="form-check-input"
                            type="checkbox"
                            name="currently_representing"
                            value="1"
                            id="currently_representing"
                            {{ old('currently_representing') ? 'checked' : '' }}
                        >

                        <label
                            class="form-check-label"
                            for="currently_representing"
                        >
                            I am currently representing this club
                        </label>

                    </div>

                </div>


                {{-- Level --}}
                <div class="mb-3">

                    <label
                        for="level"
                        class="form-label"
                    >
                        Level
                        <span class="text-danger">*</span>
                    </label>

                    <select
                        class="form-select"
                        id="level"
                        name="level"
                        required
                    >

                        <option value="">
                            Select representation level
                        </option>

                        <option
                            value="School"
                            {{ old('level') == 'School' ? 'selected' : '' }}
                        >
                            School
                        </option>

                        <option
                            value="University"
                            {{ old('level') == 'University' ? 'selected' : '' }}
                        >
                            University
                        </option>

                        <option
                            value="Club"
                            {{ old('level') == 'Club' ? 'selected' : '' }}
                        >
                            Club
                        </option>

                        <option
                            value="District"
                            {{ old('level') == 'District' ? 'selected' : '' }}
                        >
                            District
                        </option>

                        <option
                            value="State"
                            {{ old('level') == 'State' ? 'selected' : '' }}
                        >
                            State
                        </option>

                        <option
                            value="National"
                            {{ old('level') == 'National' ? 'selected' : '' }}
                        >
                            National
                        </option>

                        <option
                            value="International"
                            {{ old('level') == 'International' ? 'selected' : '' }}
                        >
                            International
                        </option>

                        <option
                            value="Other"
                            {{ old('level') == 'Other' ? 'selected' : '' }}
                        >
                            Other
                        </option>

                    </select>

                    @error('level')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror

                </div>

            </div>


            {{-- ===================================================== --}}
            {{-- STEP 3: POSITIONS --}}
            {{-- ===================================================== --}}

            <div class="mb-4">

                <h6 class="mb-3">
                    <span class="badge bg-primary me-2">3</span>
                    Positions Represented
                </h6>

                <p class="text-muted mb-3">
                    Select the rugby positions you played while representing
                    this club.
                </p>


                <div class="row">

                    @foreach ($positions as $position)

                        <div class="col-md-4 col-sm-6 mb-3">

                            <div class="form-check">

                                <input
                                    class="form-check-input"
                                    type="checkbox"
                                    name="position_ids[]"
                                    value="{{ $position->id }}"
                                    id="position_{{ $position->id }}"
                                    {{ in_array(
                                        $position->id,
                                        old('position_ids', [])
                                    ) ? 'checked' : '' }}
                                >

                                <label
                                    class="form-check-label"
                                    for="position_{{ $position->id }}"
                                >
                                    {{ $position->name }}
                                </label>

                            </div>

                        </div>

                    @endforeach

                </div>

                @error('position_ids')
                    <small class="text-danger d-block">
                        {{ $message }}
                    </small>
                @enderror

                @error('position_ids.*')
                    <small class="text-danger d-block">
                        {{ $message }}
                    </small>
                @enderror

            </div>


            {{-- ===================================================== --}}
            {{-- STEP 4: ADDITIONAL INFORMATION --}}
            {{-- ===================================================== --}}

            <div class="mb-4">

                <h6 class="mb-3">
                    <span class="badge bg-primary me-2">4</span>
                    Additional Information
                </h6>


                <div class="mb-3">

                    <label
                        for="remark"
                        class="form-label"
                    >
                        Remarks
                        <span class="text-muted">(Optional)</span>
                    </label>

                    <textarea
                        class="form-control"
                        id="remark"
                        name="remark"
                        rows="4"
                        maxlength="2000"
                        placeholder="Add any additional information about your representation..."
                    >{{ old('remark') }}</textarea>

                </div>

            </div>


            {{-- ===================================================== --}}
            {{-- VERIFICATION NOTICE --}}
            {{-- ===================================================== --}}

            <div class="alert alert-warning">

                <div class="d-flex align-items-start">

                    <i class="ri-information-line fs-5 me-2"></i>

                    <div>

                        <strong>
                            Verification Required
                        </strong>

                        <p class="mb-0 mt-1">
                            Your representation record will be submitted for
                            verification before it becomes part of your
                            official career record.
                        </p>

                    </div>

                </div>

            </div>


            {{-- ===================================================== --}}
            {{-- FORM ACTIONS --}}
            {{-- ===================================================== --}}

            <div class="d-flex justify-content-end gap-2">

                <a
                    href="{{ route('my-career.clubs') }}"
                    class="btn btn-light"
                >
                    Cancel
                </a>

                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    <i class="ri-save-line me-1"></i>
                    Submit Representation
                </button>

            </div>

        </form>

    </div>
</div>


{{-- ============================================================= --}}
{{-- REGISTER NEW CLUB MODAL --}}
{{-- ============================================================= --}}

<div
    class="modal fade"
    id="registerClubModal"
    tabindex="-1"
    aria-labelledby="registerClubModalLabel"
    aria-hidden="true"
>

    <div class="modal-dialog modal-lg modal-dialog-centered">

        <div class="modal-content">


            {{-- Modal Header --}}
            <div class="modal-header">

                <div>

                    <h5
                        class="modal-title"
                        id="registerClubModalLabel"
                    >
                        Register a New Club
                    </h5>

                    <p class="text-muted mb-0 mt-1">
                        Submit the club details for verification.
                    </p>

                </div>

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>

            </div>


            {{-- Modal Form --}}
            <form
                id="registerClubForm"
                action=""
                method="POST"
            >

                @csrf

                <div class="modal-body">


                    {{-- Information --}}
                    <div class="alert alert-info d-flex align-items-start mb-4">

                        <i class="ri-information-line fs-5 me-2"></i>

                        <div>

                            <strong>
                                Before submitting
                            </strong>

                            <p class="mb-0 mt-1">
                                Please provide the club's basic information.
                                Your submission will be reviewed before the
                                club is added to the system.
                            </p>

                        </div>

                    </div>


                    {{-- Club Name --}}
                    <div class="mb-3">

                        <label
                            for="registration_club_name"
                            class="form-label"
                        >
                            Club Name
                            <span class="text-danger">*</span>
                        </label>

                        <input
                            type="text"
                            class="form-control"
                            id="registration_club_name"
                            name="name"
                            placeholder="Enter the club name"
                            maxlength="255"
                            required
                        >

                    </div>


                    {{-- Club Type --}}
                    <div class="mb-3">

                        <label
                            for="registration_club_type"
                            class="form-label"
                        >
                            Club Type
                            <span class="text-danger">*</span>
                        </label>

                        <select
                            class="form-select"
                            id="registration_club_type"
                            name="type"
                            required
                        >

                            <option value="">
                                Select club type
                            </option>

                            <option value="School">
                                School
                            </option>

                            <option value="University">
                                University
                            </option>

                            <option value="Rugby Club">
                                Rugby Club
                            </option>

                            <option value="District">
                                District
                            </option>

                            <option value="State">
                                State
                            </option>

                            <option value="National">
                                National
                            </option>

                            <option value="Other">
                                Other
                            </option>

                        </select>

                    </div>


                    <div class="row">


                        {{-- Country --}}
                        <div class="col-md-6 mb-3">

                            <label
                                for="registration_country"
                                class="form-label"
                            >
                                Country
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                id="registration_country"
                                name="country"
                                placeholder="e.g. Malaysia"
                                maxlength="100"
                            >

                        </div>


                        {{-- State --}}
                        <div class="col-md-6 mb-3">

                            <label
                                for="registration_state"
                                class="form-label"
                            >
                                State
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                id="registration_state"
                                name="state"
                                placeholder="e.g. Terengganu"
                                maxlength="100"
                            >

                        </div>

                    </div>


                    {{-- Location --}}
                    <div class="mb-3">

                        <label
                            for="registration_location"
                            class="form-label"
                        >
                            City / Location
                        </label>

                        <input
                            type="text"
                            class="form-control"
                            id="registration_location"
                            name="location"
                            placeholder="e.g. Kuala Terengganu"
                            maxlength="255"
                        >

                    </div>


                    {{-- Website --}}
                    <div class="mb-3">

                        <label
                            for="registration_website"
                            class="form-label"
                        >
                            Website
                            <span class="text-muted">
                                (Optional)
                            </span>
                        </label>

                        <input
                            type="url"
                            class="form-control"
                            id="registration_website"
                            name="website"
                            placeholder="https://example.com"
                            maxlength="255"
                        >

                    </div>


                    {{-- Additional Information --}}
                    <div class="mb-3">

                        <label
                            for="registration_remark"
                            class="form-label"
                        >
                            Additional Information
                            <span class="text-muted">
                                (Optional)
                            </span>
                        </label>

                        <textarea
                            class="form-control"
                            id="registration_remark"
                            name="remark"
                            rows="3"
                            maxlength="1000"
                            placeholder="Provide any additional information that may help verify this club..."
                        ></textarea>

                    </div>


                    {{-- Verification --}}
                    <div class="alert alert-warning mb-0">

                        <div class="d-flex align-items-start">

                            <i class="ri-shield-check-line fs-5 me-2"></i>

                            <div>

                                <strong>
                                    Verification Required
                                </strong>

                                <p class="mb-0 mt-1">
                                    This request will be reviewed by an
                                    administrator before the club is added
                                    to the system.
                                </p>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- Modal Footer --}}
                <div class="modal-footer">

                    <button
                        type="button"
                        class="btn btn-light"
                        data-bs-dismiss="modal"
                    >
                        Cancel
                    </button>

                    <button
                        type="submit"
                        class="btn btn-primary"
                        id="submitClubRegistration"
                    >
                        <i class="ri-send-plane-line me-1"></i>
                        Submit Registration
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/js/my-career/club-search.js') }}"></script>
@endsection
