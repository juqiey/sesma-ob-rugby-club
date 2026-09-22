@extends('layouts.master')
@section('title', 'New Player Form')
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/player/player-form.css') }}">
@endpush
@section('content')
    <!-- Page-content -->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                    <h4 class="mb-sm-0">New Player Form</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Players</a></li>
                            <li class="breadcrumb-item active">New Player</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">

            {{-- Player Header --}}
            <div class="card mb-4">
                {{-- Player Header --}}
                <div class="card-body mb-4">
                    <div class="card-header">
                        <h3 class="mb-0">Create New Player</h3>
                        <p class="text-sm mb-0 text-muted">
                            Add the player's basic identity and rugby profile information.
                        </p>
                    </div>

                    <div class="card-body">

                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf

                            {{-- =========================
                                Player Identity
                            ========================== --}}
                            <div class="mb-4">
                                <h6 class="text-uppercase text-secondary text-xs font-weight-bolder mb-1">
                                    Player Identity
                                </h6>

                                <p class="text-sm text-muted mb-4">
                                    Enter the player's basic personal information and profile details.
                                </p>

                                <div class="row">

                                    {{-- Profile Photo --}}
                                    <div class="col-lg-3 col-md-4 mb-4">
                                        <div class="text-center">

                                            <div class="mb-3">
                                                <div
                                                    class="border rounded-circle d-flex align-items-center justify-content-center mx-auto"
                                                    style="width: 140px; height: 140px; overflow: hidden; background-color: #f8f9fa;"
                                                    id="photo-preview-container"
                                                >
                                                    <i
                                                        class="fas fa-user text-secondary"
                                                        style="font-size: 60px;"
                                                        id="photo-placeholder"
                                                    ></i>

                                                    <img
                                                        id="photo-preview"
                                                        src=""
                                                        alt="Profile Preview"
                                                        style="width: 100%; height: 100%; object-fit: cover; display: none;"
                                                    >
                                                </div>
                                            </div>

                                            <label
                                                for="profile_photo"
                                                class="btn btn-sm btn-outline-primary mb-2"
                                            >
                                                <i class="fas fa-camera me-1"></i>
                                                Upload Photo
                                            </label>

                                            <input
                                                type="file"
                                                class="d-none"
                                                id="profile_photo"
                                                name="profile_photo"
                                                accept="image/*"
                                            >

                                            <p class="text-xs text-muted mb-0">
                                                JPG, PNG or WEBP<br>
                                                Recommended: square image
                                            </p>

                                            @error('profile_photo')
                                                <small class="text-danger d-block mt-2">
                                                    {{ $message }}
                                                </small>
                                            @enderror

                                        </div>
                                    </div>


                                    {{-- Basic Information --}}
                                    <div class="col-lg-9 col-md-8">

                                        <div class="row">


                                            {{-- First Name --}}
                                            <div class="col-md-6 mb-3">
                                                <label for="first_name" class="form-label">
                                                    First Name <span class="text-danger">*</span>
                                                </label>

                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    id="first_name"
                                                    name="first_name"
                                                    value="{{ old('first_name') }}"
                                                    placeholder="Enter first name"
                                                    required
                                                >

                                                @error('first_name')
                                                    <small class="text-danger">
                                                        {{ $message }}
                                                    </small>
                                                @enderror
                                            </div>


                                            {{-- Last Name --}}
                                            <div class="col-md-6 mb-3">
                                                <label for="last_name" class="form-label">
                                                    Last Name <span class="text-danger">*</span>
                                                </label>

                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    id="last_name"
                                                    name="last_name"
                                                    value="{{ old('last_name') }}"
                                                    placeholder="Enter last name"
                                                    required
                                                >

                                                @error('last_name')
                                                    <small class="text-danger">
                                                        {{ $message }}
                                                    </small>
                                                @enderror
                                            </div>


                                            {{-- Preferred Name --}}
                                            <div class="col-md-6 mb-3">
                                                <label for="preferred_name" class="form-label">
                                                    Preferred Name
                                                </label>

                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    id="preferred_name"
                                                    name="preferred_name"
                                                    value="{{ old('preferred_name') }}"
                                                    placeholder="e.g. Wan, Bob, Amir"
                                                >

                                                <small class="text-muted">
                                                    Name commonly used by teammates.
                                                </small>
                                            </div>


                                            {{-- Date of Birth --}}
                                            <div class="col-md-6 mb-3">
                                                <label for="date_of_birth" class="form-label">
                                                    Date of Birth <span class="text-danger">*</span>
                                                </label>

                                                <input
                                                    type="date"
                                                    class="form-control"
                                                    id="date_of_birth"
                                                    name="date_of_birth"
                                                    value="{{ old('date_of_birth') }}"
                                                    required
                                                >

                                                @error('date_of_birth')
                                                    <small class="text-danger">
                                                        {{ $message }}
                                                    </small>
                                                @enderror
                                            </div>

                                        </div>
                                    </div>

                                </div>


{{-- Personal Information --}}
<div class="mt-3 pt-4 border-top">

    <h6 class="text-sm font-weight-bold mb-3">
        Personal Information
    </h6>

    <div class="row">

        {{-- Gender --}}
        <div class="col-md-6 mb-3">

            <label for="gender" class="form-label">
                Gender <span class="text-danger">*</span>
            </label>

            <select
                class="form-select"
                id="gender"
                name="gender"
                required
            >
                <option value="">Select Gender</option>

                <option
                    value="male"
                    {{ old('gender') == 'male' ? 'selected' : '' }}
                >
                    Male
                </option>

                <option
                    value="female"
                    {{ old('gender') == 'female' ? 'selected' : '' }}
                >
                    Female
                </option>
            </select>

            @error('gender')
                <small class="text-danger">
                    {{ $message }}
                </small>
            @enderror

        </div>


        {{-- Nationality --}}
        <div class="col-md-6 mb-3">

            <label for="nationality" class="form-label">
                Nationality
            </label>

            <input
                type="text"
                class="form-control"
                id="nationality"
                name="nationality"
                value="{{ old('nationality', 'Malaysian') }}"
                placeholder="Enter nationality"
            >

            @error('nationality')
                <small class="text-danger">
                    {{ $message }}
                </small>
            @enderror

        </div>


        {{-- Batch --}}
        <div class="col-md-6 mb-3">

            <label for="batch" class="form-label">
                Alumni Batch
            </label>

            <input
                type="text"
                class="form-control"
                id="batch"
                name="batch"
                value="{{ old('batch') }}"
                placeholder="e.g. 2018, 2018/2019"
            >

            <small class="text-muted">
                Enter the player's school or alumni batch.
            </small>

            @error('batch')
                <small class="text-danger d-block">
                    {{ $message }}
                </small>
            @enderror

        </div>


        {{-- Age --}}
        <div class="col-md-6 mb-3">

            <label for="age" class="form-label">
                Age
            </label>

            <div class="input-group">

                <input
                    type="text"
                    class="form-control"
                    id="age"
                    value=""
                    placeholder="Calculated from date of birth"
                    readonly
                >

                <span class="input-group-text">
                    years
                </span>

            </div>

            <small class="text-muted">
                Automatically calculated from the date of birth.
            </small>

        </div>

    </div>

</div>


{{-- =========================
    Age Calculation
========================== --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {

        const dateOfBirth = document.getElementById('date_of_birth');
        const ageInput = document.getElementById('age');

        function calculateAge() {

            if (!dateOfBirth.value) {
                ageInput.value = '';
                return;
            }

            const birthDate = new Date(dateOfBirth.value);
            const today = new Date();

            let age = today.getFullYear() - birthDate.getFullYear();

            const monthDifference =
                today.getMonth() - birthDate.getMonth();

            if (
                monthDifference < 0 ||
                (
                    monthDifference === 0 &&
                    today.getDate() < birthDate.getDate()
                )
            ) {
                age--;
            }

            ageInput.value = age >= 0 ? age : '';

        }

        // Calculate when page loads
        calculateAge();

        // Recalculate whenever DOB changes
        dateOfBirth.addEventListener('change', calculateAge);

    });
</script>

                            </div>


                            <hr class="horizontal dark my-4">

                            {{-- =========================
                                Rugby Profile
                            ========================== --}}
                            <div class="mt-4 pt-4">

                                <h6 class="text-uppercase text-secondary text-xs font-weight-bolder mb-1">
                                    Rugby Profile
                                </h6>

                                <p class="text-sm text-muted mb-4">
                                    Select the positions and rugby formats that the player has experience playing.
                                </p>


                                {{-- =========================
                                    Playing Positions
                                ========================== --}}
                                <div class="mb-4">

                                    <label class="form-label mb-3">
                                        Playing Positions <span class="text-danger">*</span>
                                    </label>


                                    {{-- Forwards --}}
                                    @php
                                        $forwardPositions = $positions->where('position_group', 'Forward');
                                    @endphp

                                    @if ($forwardPositions->count())

                                        <div class="mb-3">

                                            <div class="d-flex align-items-center mb-2">
                                                <span class="text-sm font-weight-bold">
                                                    Forwards
                                                </span>

                                                <span class="text-xs text-muted ms-2">
                                                    Forward Positions
                                                </span>
                                            </div>

                                            <div class="row g-2">

                                                @foreach ($forwardPositions as $position)

                                                    <div class="col-6 col-md-3">

                                                        <label class="position-card w-100">

                                                            <input
                                                                type="checkbox"
                                                                name="position_ids[]"
                                                                value="{{ $position->id }}"
                                                                class="position-checkbox"
                                                                {{ in_array($position->id, old('position_ids', [])) ? 'checked' : '' }}
                                                            >

                                                            <div class="position-card-content">

                                                                <div class="position-icon">
                                                                    <i class="fas fa-shield-alt"></i>
                                                                </div>

                                                                <div class="flex-grow-1">
                                                                    <div class="position-name">
                                                                        {{ $position->name }}
                                                                    </div>
                                                                </div>

                                                                <div class="position-check">
                                                                    <i class="fas fa-check"></i>
                                                                </div>

                                                            </div>

                                                        </label>

                                                    </div>

                                                @endforeach

                                            </div>

                                        </div>

                                    @endif


                                    {{-- Backs --}}
                                    @php
                                        $backPositions = $positions->where('position_group', 'Backs');
                                    @endphp

                                    @if ($backPositions->count())

                                        <div>

                                            <div class="d-flex align-items-center mb-2">
                                                <span class="text-sm font-weight-bold">
                                                    Backs
                                                </span>

                                                <span class="text-xs text-muted ms-2">
                                                    Back Positions
                                                </span>
                                            </div>

                                            <div class="row g-2">

                                                @foreach ($backPositions as $position)

                                                    <div class="col-6 col-md-3">

                                                        <label class="position-card w-100">

                                                            <input
                                                                type="checkbox"
                                                                name="position_ids[]"
                                                                value="{{ $position->id }}"
                                                                class="position-checkbox"
                                                                {{ in_array($position->id, old('position_ids', [])) ? 'checked' : '' }}
                                                            >

                                                            <div class="position-card-content">

                                                                <div class="position-icon">
                                                                    <i class="fas fa-running"></i>
                                                                </div>

                                                                <div class="flex-grow-1">
                                                                    <div class="position-name">
                                                                        {{ $position->name }}
                                                                    </div>
                                                                </div>

                                                                <div class="position-check">
                                                                    <i class="fas fa-check"></i>
                                                                </div>

                                                            </div>

                                                        </label>

                                                    </div>

                                                @endforeach

                                            </div>

                                        </div>

                                    @endif


                                    <small class="text-muted d-block mt-2">
                                        Select all positions the player has played.
                                    </small>

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


                                {{-- =========================
                                    Rugby Formats
                                ========================== --}}
                                <div class="mb-4">

                                    <label class="form-label mb-3">
                                        Rugby Formats <span class="text-danger">*</span>
                                    </label>

                                    <div class="row g-2">

                                        @php
                                            $rugbyFormats = [
                                                'XV' => [
                                                    'title' => 'Rugby XV',
                                                    'description' => '15-a-side rugby',
                                                    'icon' => 'fa-users'
                                                ],
                                                '7s' => [
                                                    'title' => 'Rugby 7s',
                                                    'description' => '7-a-side rugby',
                                                    'icon' => 'fa-running'
                                                ],
                                                '10s' => [
                                                    'title' => 'Rugby 10s',
                                                    'description' => '10-a-side rugby',
                                                    'icon' => 'fa-users'
                                                ],
                                            ];
                                        @endphp

                                        @foreach ($rugbyFormats as $value => $format)

                                            <div class="col-md-4">

                                                <label class="format-card w-100">

                                                    <input
                                                        type="checkbox"
                                                        name="rugby_formats[]"
                                                        value="{{ $value }}"
                                                        class="format-checkbox"
                                                        {{ in_array($value, old('rugby_formats', [])) ? 'checked' : '' }}
                                                    >

                                                    <div class="format-card-content">

                                                        <div class="format-icon">
                                                            <i class="fas {{ $format['icon'] }}"></i>
                                                        </div>

                                                        <div class="flex-grow-1">

                                                            <div class="format-title">
                                                                {{ $format['title'] }}
                                                            </div>

                                                            <div class="format-description">
                                                                {{ $format['description'] }}
                                                            </div>

                                                        </div>

                                                        <div class="format-check">
                                                            <i class="fas fa-check"></i>
                                                        </div>

                                                    </div>

                                                </label>

                                            </div>

                                        @endforeach

                                    </div>

                                    <small class="text-muted d-block mt-2">
                                        Select all rugby formats the player has experience playing.
                                    </small>

                                    @error('rugby_formats')
                                        <small class="text-danger d-block">
                                            {{ $message }}
                                        </small>
                                    @enderror

                                    @error('rugby_formats.*')
                                        <small class="text-danger d-block">
                                            {{ $message }}
                                        </small>
                                    @enderror

                                </div>


                                {{-- =========================
                                    Playing Status
                                ========================== --}}
                                <div class="row">

                                    {{-- Playing Status --}}
                                    <div class="col-md-6 mb-3">
                                        <label for="playing_status" class="form-label">
                                            Playing Status <span class="text-danger">*</span>
                                        </label>

                                        <select
                                            class="form-select"
                                            id="playing_status"
                                            name="playing_status"
                                            required
                                        >
                                            <option value="">Select Playing Status</option>

                                            <option
                                                value="active"
                                                {{ old('playing_status') == 'active' ? 'selected' : '' }}
                                            >
                                                Active
                                            </option>

                                            <option
                                                value="retired"
                                                {{ old('playing_status') == 'retired' ? 'selected' : '' }}
                                            >
                                                Retired
                                            </option>
                                        </select>

                                        @error('playing_status')
                                            <small class="text-danger">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>

                                </div>

                            </div>






                            <hr class="horizontal dark my-4">

                            {{-- =========================
                                Alumni Information
                            ========================== --}}
                            <h6 class="text-uppercase text-secondary text-xs font-weight-bolder mb-3">
                                Alumni Information
                            </h6>

                            <div class="row">

                                {{-- School / Institution --}}
                                <div class="col-md-6 mb-3">
                                    <label for="school" class="form-label">
                                        School / Institution
                                    </label>

                                    <input
                                        type="text"
                                        class="form-control"
                                        id="school"
                                        name="school"
                                        value="{{ old('school') }}"
                                        placeholder="Enter school or institution"
                                    >
                                </div>

                                {{-- Graduation Year --}}
                                <div class="col-md-6 mb-3">
                                    <label for="graduation_year" class="form-label">
                                        Graduation Year
                                    </label>

                                    <input
                                        type="number"
                                        class="form-control"
                                        id="graduation_year"
                                        name="graduation_year"
                                        value="{{ old('graduation_year') }}"
                                        placeholder="e.g. 2020"
                                        min="1900"
                                        max="{{ date('Y') }}"
                                    >
                                </div>

                                {{-- Alumni Batch --}}
                                <div class="col-md-6 mb-3">
                                    <label for="school_batch" class="form-label">
                                        Alumni Batch
                                    </label>

                                    <input
                                        type="text"
                                        class="form-control"
                                        id="school_batch"
                                        name="school_batch"
                                        value="{{ old('school_batch') }}"
                                        placeholder="e.g. 2015/2016"
                                    >
                                </div>

                                {{-- Joined Club Date --}}
                                <div class="col-md-6 mb-3">
                                    <label for="joined_club_at" class="form-label">
                                        Joined Alumni Club
                                    </label>

                                    <input
                                        type="date"
                                        class="form-control"
                                        id="joined_club_at"
                                        name="joined_club_at"
                                        value="{{ old('joined_club_at') }}"
                                    >
                                </div>

                            </div>

                            <hr class="horizontal dark my-4">

                            {{-- =========================
                                Account Access
                            ========================== --}}
                            <h6 class="text-uppercase text-secondary text-xs font-weight-bolder mb-3">
                                Account Access
                            </h6>

                            <div class="form-check mb-3">
                                <input
                                    class="form-check-input"
                                    type="checkbox"
                                    id="create_account"
                                    name="create_account"
                                    value="1"
                                    {{ old('create_account') ? 'checked' : '' }}
                                >

                                <label class="form-check-label" for="create_account">
                                    Create login account for this player
                                </label>
                            </div>

                            <div class="row" id="account-fields">

                                {{-- Email --}}
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">
                                        Email
                                    </label>

                                    <input
                                        type="email"
                                        class="form-control"
                                        id="email"
                                        name="email"
                                        value="{{ old('email') }}"
                                        placeholder="player@example.com"
                                    >

                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                            </div>

                            {{-- Buttons --}}
                            <div class="d-flex justify-content-end gap-2 mt-4">

                                <a href=""
                                class="btn btn-light">
                                    Cancel
                                </a>

                                <button type="submit"
                                        class="btn bg-success text-white">
                                    <i class="fas fa-save me-1"></i>
                                    Create Player
                                </button>

                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // Profile Photo Preview
        const profilePhotoInput = document.getElementById('profile_photo');
        const photoPreviewContainer = document.getElementById('photo-preview-container');
        const photoPreview = document.getElementById('photo-preview');
        const photoPlaceholder = document.getElementById('photo-placeholder');

        profilePhotoInput.addEventListener('change', function() {
            const file = this.files[0];

            if (file) {
                const reader = new FileReader();

                reader.addEventListener('load', function() {
                    photoPreview.setAttribute('src', this.result);
                    photoPreview.style.display = 'block';
                    photoPlaceholder.style.display = 'none';
                });

                reader.readAsDataURL(file);
            } else {
                photoPreview.setAttribute('src', '');
                photoPreview.style.display = 'none';
                photoPlaceholder.style.display = 'block';
            }
        });

        // Toggle Account Fields
        const createAccountCheckbox = document.getElementById('create_account');
        const accountFields = document.getElementById('account-fields');

        function toggleAccountFields() {
            if (createAccountCheckbox.checked) {
                accountFields.style.display = 'flex';
            } else {
                accountFields.style.display = 'none';
            }
        }

        createAccountCheckbox.addEventListener('change', toggleAccountFields);

        // Initialize on page load
        toggleAccountFields();
    </script>
@endsection
