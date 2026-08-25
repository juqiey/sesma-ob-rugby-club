@extends('layouts.master')
@section('title', 'Player Details: '.$player->player_code)
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
                    <h4 class="mb-sm-0">Player Details</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Players</a></li>
                            <li class="breadcrumb-item active">Details</li>
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
                <div class="card-body">
                    <div class="row align-items-center">

                        {{-- Profile Picture --}}
                        <div class="col-md-auto text-center mb-3 mb-md-0">
                            <img src="https://ui-avatars.com/api/?name=Ahmad+Ali&size=140&background=198754&color=fff"
                                class="rounded-circle"
                                width="140"
                                height="140"
                                alt="Player Profile">
                        </div>

                        {{-- Player Information --}}
                        <div class="col-md">
                            <div class="d-flex align-items-center gap-2 mb-2">
                                <h3 class="mb-0">{{ $player->name }}</h3>
                                @php
                                    $status = $player->status;

                                    $statusColour = $playerStatus[$status];
                                @endphp
                                <span class="badge bg-{{ $statusColour }} fs-12">{{ $status }}</span>
                            </div>

                            <p class="text-muted mb-3">
                                {{ $player->player_code }}
                            </p>

                            <div class="row">
                                <div class="col-sm-6 col-lg-3 mb-2">
                                    <small class="text-muted d-block">Batch</small>
                                    <strong>{{ $player->batch }}</strong>
                                </div>

                                <div class="col-sm-6 col-lg-3 mb-2">
                                    <small class="text-muted d-block">Date Of Birth</small>
                                    <strong>{{ $player->date_of_birth->format('d M Y') }}</strong>
                                </div>

                                <div class="col-sm-6 col-lg-3 mb-2">
                                    <small class="text-muted d-block">Age</small>
                                    <strong>{{ $player->age }}</strong>
                                </div>

                                <div class="col-sm-6 col-lg-3 mb-2">
                                    <small class="text-muted d-block">Registered at:</small>
                                    <strong>{{ $player->created_at ? $player->created_at->format('d M Y') : '-' }}</strong>
                                </div>
                            </div>
                        </div>

                        {{-- Actions --}}
                        <div class="col-md-auto mt-3 mt-md-0">
                            <div class="d-flex gap-2">
                                <button class="btn btn-outline-primary">
                                    <i class="ri-edit-line me-1"></i>
                                    Edit
                                </button>

                                <button class="btn btn-outline-secondary">
                                    <i class="ri-printer-line me-1"></i>
                                    Print
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>


            {{-- Player Summary --}}
            <div class="row">

                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="avatar-sm bg-primary-subtle rounded">
                                    <div class="avatar-title text-white fs-4">
                                        <i class="ri-dashboard-2-line"></i>
                                    </div>
                                </div>

                                <div class="ms-3">
                                    <p class="text-muted mb-1">Matches</p>
                                    <h4 class="mb-0">{{ $player->playerMatchStats->count() }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="avatar-sm bg-success-subtle rounded">
                                    <div class="avatar-title text-success fs-4">
                                        <i class="ri-trophy-line"></i>
                                    </div>
                                </div>

                                <div class="ms-3">
                                    <p class="text-muted mb-1">Tournaments</p>
                                    <h4 class="mb-0">8</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="avatar-sm bg-info-subtle rounded">
                                    <div class="avatar-title text-info fs-4">
                                        <i class="ri-shield-user-line"></i>
                                    </div>
                                </div>

                                <div class="ms-3">
                                    <p class="text-muted mb-1">Clubs</p>
                                    <h4 class="mb-0">{{ $player->playerRepresentation->count() }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="avatar-sm bg-warning-subtle rounded">
                                    <div class="avatar-title text-warning fs-4">
                                        <i class="ri-map-pin-user-line"></i>
                                    </div>
                                </div>

                                <div class="ms-3">
                                    <p class="text-muted mb-1">Positions Played</p>
                                    <h4 class="mb-0">{{ $player->playerPosition->count() }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


            {{-- Navigation Tabs --}}
            <div class="card">

                <div class="card-body">

                    <ul class="nav nav-tabs nav-tabs-custom nav-justified mb-4" role="tablist">

                        <li class="nav-item">
                            <a class="nav-link active"
                            data-bs-toggle="tab"
                            href="#overview"
                            role="tab">
                                <i class="ri-dashboard-line me-1"></i>
                                Overview
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link"
                            data-bs-toggle="tab"
                            href="#personal"
                            role="tab">
                                <i class="ri-user-line me-1"></i>
                                Personal
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link"
                            data-bs-toggle="tab"
                            href="#positions"
                            role="tab">
                                <i class="ri-football-line me-1"></i>
                                Positions
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link"
                            data-bs-toggle="tab"
                            href="#matches"
                            role="tab">
                                <i class="ri-calendar-event-line me-1"></i>
                                Matches
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link"
                            data-bs-toggle="tab"
                            href="#tournaments"
                            role="tab">
                                <i class="ri-trophy-line me-1"></i>
                                Tournaments
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link"
                            data-bs-toggle="tab"
                            href="#clubs"
                            role="tab">
                                <i class="ri-team-line me-1"></i>
                                Club History
                            </a>
                        </li>

                    </ul>


                    <div class="tab-content">

                        {{-- ================================================= --}}
                        {{-- OVERVIEW --}}
                        {{-- ================================================= --}}
                        <div class="tab-pane fade show active" id="overview" role="tabpanel">

                            <div class="row">

                                {{-- Current Club --}}
                                <div class="col-lg-6">
                                    <div class="card border shadow-none h-100">
                                        <div class="card-header bg-transparent">
                                            <h5 class="card-title mb-0">
                                                Current Club
                                            </h5>
                                        </div>

                                        <div class="card-body">

                                            <div class="d-flex align-items-center">
                                                <div class="avatar-md bg-primary-subtle rounded">
                                                    <div class="avatar-title text-white fs-3">
                                                        <i class="ri-shield-user-line"></i>
                                                    </div>
                                                </div>

                                                <div class="ms-3">
                                                    <h5 class="mb-1">
                                                        Kuala Lumpur Rugby Club
                                                    </h5>

                                                    <p class="text-muted mb-1">
                                                        Senior Men's Team
                                                    </p>

                                                    <span class="badge bg-success">
                                                        Active
                                                    </span>
                                                </div>
                                            </div>

                                            <hr>

                                            <div class="row">

                                                <div class="col-6">
                                                    <small class="text-muted d-block">
                                                        Joined
                                                    </small>
                                                    <strong>12 Jan 2025</strong>
                                                </div>

                                                <div class="col-6">
                                                    <small class="text-muted d-block">
                                                        Position
                                                    </small>
                                                    <strong>Prop</strong>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>


                                {{-- Physical Information --}}
                                <div class="col-lg-6">
                                    <div class="card border shadow-none h-100">
                                        <div class="card-header bg-transparent">
                                            <h5 class="card-title mb-0">
                                                Physical Information
                                            </h5>
                                        </div>

                                        <div class="card-body">

                                            <div class="row">

                                                <div class="col-6 mb-4">
                                                    <small class="text-muted d-block">
                                                        Height
                                                    </small>
                                                    <h5 class="mb-0">180 cm</h5>
                                                </div>

                                                <div class="col-6 mb-4">
                                                    <small class="text-muted d-block">
                                                        Weight
                                                    </small>
                                                    <h5 class="mb-0">115 kg</h5>
                                                </div>

                                                <div class="col-6">
                                                    <small class="text-muted d-block">
                                                        Age
                                                    </small>
                                                    <h5 class="mb-0">24 Years</h5>
                                                </div>

                                                <div class="col-6">
                                                    <small class="text-muted d-block">
                                                        Preferred Position
                                                    </small>
                                                    <h5 class="mb-0">Prop</h5>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>


                                {{-- Recent Matches --}}
                                <div class="col-lg-8 mt-4">
                                    <div class="card border shadow-none">

                                        <div class="card-header bg-transparent">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <h5 class="card-title mb-0">
                                                    Recent Matches
                                                </h5>

                                                <a href="#" class="text-primary">
                                                    View All
                                                </a>
                                            </div>
                                        </div>

                                        <div class="card-body">

                                            <div class="table-responsive">
                                                <table class="table table-hover align-middle mb-0">

                                                    <thead class="table-light">
                                                        <tr>
                                                            <th>Date</th>
                                                            <th>Tournament</th>
                                                            <th>Opponent</th>
                                                            <th>Position</th>
                                                            <th>Result</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>

                                                        <tr>
                                                            <td>21 Aug 2026</td>
                                                            <td>Malaysia Rugby League</td>
                                                            <td>Selangor RC</td>
                                                            <td>Prop</td>
                                                            <td>
                                                                <span class="badge bg-success">
                                                                    W
                                                                </span>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>14 Aug 2026</td>
                                                            <td>Malaysia Rugby League</td>
                                                            <td>Johor RC</td>
                                                            <td>Prop</td>
                                                            <td>
                                                                <span class="badge bg-danger">
                                                                    L
                                                                </span>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>02 Aug 2026</td>
                                                            <td>National Rugby Cup</td>
                                                            <td>Perak RC</td>
                                                            <td>Lock</td>
                                                            <td>
                                                                <span class="badge bg-success">
                                                                    W
                                                                </span>
                                                            </td>
                                                        </tr>

                                                    </tbody>

                                                </table>
                                            </div>

                                        </div>
                                    </div>
                                </div>


                                {{-- Position Summary --}}
                                <div class="col-lg-4 mt-4">
                                    <div class="card border shadow-none">

                                        <div class="card-header bg-transparent">
                                            <h5 class="card-title mb-0">
                                                Positions Played
                                            </h5>
                                        </div>

                                        <div class="card-body">

                                            <div class="d-flex justify-content-between mb-3">
                                                <span>Prop</span>
                                                <strong>34 Matches</strong>
                                            </div>

                                            <div class="progress mb-4" style="height: 6px;">
                                                <div class="progress-bar"
                                                    role="progressbar"
                                                    style="width: 81%;">
                                                </div>
                                            </div>

                                            <div class="d-flex justify-content-between mb-3">
                                                <span>Lock</span>
                                                <strong>6 Matches</strong>
                                            </div>

                                            <div class="progress mb-4" style="height: 6px;">
                                                <div class="progress-bar bg-info"
                                                    role="progressbar"
                                                    style="width: 14%;">
                                                </div>
                                            </div>

                                            <div class="d-flex justify-content-between mb-3">
                                                <span>Hooker</span>
                                                <strong>2 Matches</strong>
                                            </div>

                                            <div class="progress" style="height: 6px;">
                                                <div class="progress-bar bg-warning"
                                                    role="progressbar"
                                                    style="width: 5%;">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>


                                {{-- Career Timeline --}}
                                <div class="col-lg-12 mt-4">

                                    <div class="card border shadow-none">

                                        <div class="card-header bg-transparent">
                                            <h5 class="card-title mb-0">
                                                Club Participation History
                                            </h5>
                                        </div>

                                        <div class="card-body">

                                            <div class="timeline">

                                                <div class="timeline-item">
                                                    <div class="timeline-icon bg-success">
                                                        <i class="ri-shield-line"></i>
                                                    </div>

                                                    <div class="timeline-content">
                                                        <div class="d-flex justify-content-between">
                                                            <div>
                                                                <h6 class="mb-1">
                                                                    Kuala Lumpur Rugby Club
                                                                </h6>

                                                                <p class="text-muted mb-1">
                                                                    Senior Men's Team
                                                                </p>
                                                            </div>

                                                            <span class="badge bg-success-subtle text-success">
                                                                Current
                                                            </span>
                                                        </div>

                                                        <small class="text-muted">
                                                            2025 - Present
                                                        </small>

                                                        <div class="mt-2">
                                                            <span class="badge bg-light text-body me-1">
                                                                Prop
                                                            </span>

                                                            <span class="badge bg-light text-body">
                                                                24 Matches
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="timeline-item">
                                                    <div class="timeline-icon bg-primary">
                                                        <i class="ri-shield-line"></i>
                                                    </div>

                                                    <div class="timeline-content">
                                                        <h6 class="mb-1">
                                                            SESMA Old Boys Rugby Club
                                                        </h6>

                                                        <p class="text-muted mb-1">
                                                            Senior Men's Team
                                                        </p>

                                                        <small class="text-muted">
                                                            2024 - 2025
                                                        </small>

                                                        <div class="mt-2">
                                                            <span class="badge bg-light text-body me-1">
                                                                Prop
                                                            </span>

                                                            <span class="badge bg-light text-body me-1">
                                                                Lock
                                                            </span>

                                                            <span class="badge bg-light text-body">
                                                                12 Matches
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="timeline-item">
                                                    <div class="timeline-icon bg-secondary">
                                                        <i class="ri-shield-line"></i>
                                                    </div>

                                                    <div class="timeline-content">
                                                        <h6 class="mb-1">
                                                            UiTM Rugby Club
                                                        </h6>

                                                        <p class="text-muted mb-1">
                                                            University Team
                                                        </p>

                                                        <small class="text-muted">
                                                            2022 - 2024
                                                        </small>

                                                        <div class="mt-2">
                                                            <span class="badge bg-light text-body me-1">
                                                                Prop
                                                            </span>

                                                            <span class="badge bg-light text-body">
                                                                18 Matches
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>


                        {{-- ================================================= --}}
                        {{-- PERSONAL --}}
                        {{-- ================================================= --}}
                        <div class="tab-pane fade" id="personal" role="tabpanel">

                            <div class="row">

                                <div class="col-lg-6">
                                    <div class="card border shadow-none">
                                        <div class="card-header bg-transparent">
                                            <h5 class="card-title mb-0">
                                                Personal Information
                                            </h5>
                                        </div>

                                        <div class="card-body">

                                            <div class="table-responsive">
                                                <table class="table table-borderless mb-0">

                                                    <tr>
                                                        <th width="40%">Full Name</th>
                                                        <td>Ahmad Ali</td>
                                                    </tr>

                                                    <tr>
                                                        <th>Date of Birth</th>
                                                        <td>12 March 2002</td>
                                                    </tr>

                                                    <tr>
                                                        <th>Gender</th>
                                                        <td>Male</td>
                                                    </tr>

                                                    <tr>
                                                        <th>Nationality</th>
                                                        <td>Malaysian</td>
                                                    </tr>

                                                    <tr>
                                                        <th>IC / Passport</th>
                                                        <td>XXXXXX-XX-XXXX</td>
                                                    </tr>

                                                </table>
                                            </div>

                                        </div>
                                    </div>
                                </div>


                                <div class="col-lg-6">
                                    <div class="card border shadow-none">
                                        <div class="card-header bg-transparent">
                                            <h5 class="card-title mb-0">
                                                Contact Information
                                            </h5>
                                        </div>

                                        <div class="card-body">

                                            <div class="table-responsive">
                                                <table class="table table-borderless mb-0">

                                                    <tr>
                                                        <th width="40%">Email</th>
                                                        <td>ahmad@example.com</td>
                                                    </tr>

                                                    <tr>
                                                        <th>Phone</th>
                                                        <td>+60 12-345 6789</td>
                                                    </tr>

                                                    <tr>
                                                        <th>Emergency Contact</th>
                                                        <td>Ali Ahmad</td>
                                                    </tr>

                                                    <tr>
                                                        <th>Emergency Phone</th>
                                                        <td>+60 13-987 6543</td>
                                                    </tr>

                                                </table>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>


                        {{-- ================================================= --}}
                        {{-- POSITIONS --}}
                        {{-- ================================================= --}}
                        <div class="tab-pane fade" id="positions" role="tabpanel">

                            <div class="table-responsive">
                                <table class="table table-hover align-middle">

                                    <thead class="table-light">
                                        <tr>
                                            <th>Position</th>
                                            <th>Position Group</th>
                                            <th>Matches</th>
                                            <th>Starts</th>
                                            <th>Last Played</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <tr>
                                            <td>
                                                <strong>Prop</strong>
                                            </td>
                                            <td>Forward</td>
                                            <td>34</td>
                                            <td>28</td>
                                            <td>21 Aug 2026</td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <strong>Lock</strong>
                                            </td>
                                            <td>Forward</td>
                                            <td>6</td>
                                            <td>3</td>
                                            <td>02 Aug 2026</td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <strong>Hooker</strong>
                                            </td>
                                            <td>Forward</td>
                                            <td>2</td>
                                            <td>0</td>
                                            <td>18 Jul 2025</td>
                                        </tr>

                                    </tbody>

                                </table>
                            </div>

                        </div>


                        {{-- ================================================= --}}
                        {{-- MATCHES --}}
                        {{-- ================================================= --}}
                        <div class="tab-pane fade" id="matches" role="tabpanel">

                            <div class="d-flex justify-content-between mb-3">

                                <h5 class="mb-0">
                                    Match History
                                </h5>

                                <button class="btn btn-sm btn-outline-primary">
                                    <i class="ri-filter-line me-1"></i>
                                    Filter
                                </button>

                            </div>

                            <div class="table-responsive">

                                <table class="table table-hover align-middle">

                                    <thead class="table-light">
                                        <tr>
                                            <th>Date</th>
                                            <th>Tournament</th>
                                            <th>Opponent</th>
                                            <th>Position</th>
                                            <th>Started</th>
                                            <th>Result</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <tr>
                                            <td>21 Aug 2026</td>
                                            <td>Malaysia Rugby League</td>
                                            <td>Selangor RC</td>
                                            <td>Prop</td>
                                            <td>
                                                <span class="badge bg-success-subtle text-success">
                                                    Yes
                                                </span>
                                            </td>
                                            <td>
                                                <span class="badge bg-success">
                                                    W
                                                </span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>14 Aug 2026</td>
                                            <td>Malaysia Rugby League</td>
                                            <td>Johor RC</td>
                                            <td>Prop</td>
                                            <td>
                                                <span class="badge bg-success-subtle text-success">
                                                    Yes
                                                </span>
                                            </td>
                                            <td>
                                                <span class="badge bg-danger">
                                                    L
                                                </span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>02 Aug 2026</td>
                                            <td>National Rugby Cup</td>
                                            <td>Perak RC</td>
                                            <td>Lock</td>
                                            <td>
                                                <span class="badge bg-warning-subtle text-warning">
                                                    No
                                                </span>
                                            </td>
                                            <td>
                                                <span class="badge bg-success">
                                                    W
                                                </span>
                                            </td>
                                        </tr>

                                    </tbody>

                                </table>

                            </div>

                        </div>


                        {{-- ================================================= --}}
                        {{-- TOURNAMENTS --}}
                        {{-- ================================================= --}}
                        <div class="tab-pane fade" id="tournaments" role="tabpanel">

                            <div class="row">

                                <div class="col-lg-6">
                                    <div class="card border shadow-none">

                                        <div class="card-body">

                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <h5 class="mb-1">
                                                        Malaysia Rugby League 2026
                                                    </h5>

                                                    <p class="text-muted mb-0">
                                                        Kuala Lumpur Rugby Club
                                                    </p>
                                                </div>

                                                <span class="badge bg-success">
                                                    Completed
                                                </span>
                                            </div>

                                            <hr>

                                            <div class="row">

                                                <div class="col-4">
                                                    <small class="text-muted d-block">
                                                        Matches
                                                    </small>
                                                    <strong>8</strong>
                                                </div>

                                                <div class="col-4">
                                                    <small class="text-muted d-block">
                                                        Starts
                                                    </small>
                                                    <strong>6</strong>
                                                </div>

                                                <div class="col-4">
                                                    <small class="text-muted d-block">
                                                        Position
                                                    </small>
                                                    <strong>Prop</strong>
                                                </div>

                                            </div>

                                        </div>

                                    </div>
                                </div>


                                <div class="col-lg-6">
                                    <div class="card border shadow-none">

                                        <div class="card-body">

                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <h5 class="mb-1">
                                                        National Rugby Cup 2025
                                                    </h5>

                                                    <p class="text-muted mb-0">
                                                        SESMA Old Boys
                                                    </p>
                                                </div>

                                                <span class="badge bg-success">
                                                    Champions
                                                </span>
                                            </div>

                                            <hr>

                                            <div class="row">

                                                <div class="col-4">
                                                    <small class="text-muted d-block">
                                                        Matches
                                                    </small>
                                                    <strong>6</strong>
                                                </div>

                                                <div class="col-4">
                                                    <small class="text-muted d-block">
                                                        Starts
                                                    </small>
                                                    <strong>5</strong>
                                                </div>

                                                <div class="col-4">
                                                    <small class="text-muted d-block">
                                                        Position
                                                    </small>
                                                    <strong>Prop</strong>
                                                </div>

                                            </div>

                                        </div>

                                    </div>
                                </div>

                            </div>

                        </div>


                        {{-- ================================================= --}}
                        {{-- CLUB HISTORY --}}
                        {{-- ================================================= --}}
                        <div class="tab-pane fade" id="clubs" role="tabpanel">

                            <div class="table-responsive">

                                <table class="table table-hover align-middle">

                                    <thead class="table-light">
                                        <tr>
                                            <th>Club</th>
                                            <th>Period</th>
                                            <th>Position</th>
                                            <th>Matches</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <tr>
                                            <td>
                                                <strong>Kuala Lumpur Rugby Club</strong>
                                            </td>
                                            <td>2025 - Present</td>
                                            <td>Prop</td>
                                            <td>24</td>
                                            <td>
                                                <span class="badge bg-success">
                                                    Current
                                                </span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <strong>SESMA Old Boys</strong>
                                            </td>
                                            <td>2024 - 2025</td>
                                            <td>Prop / Lock</td>
                                            <td>12</td>
                                            <td>
                                                <span class="badge bg-secondary">
                                                    Previous
                                                </span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <strong>UiTM Rugby Club</strong>
                                            </td>
                                            <td>2022 - 2024</td>
                                            <td>Prop</td>
                                            <td>18</td>
                                            <td>
                                                <span class="badge bg-secondary">
                                                    Previous
                                                </span>
                                            </td>
                                        </tr>

                                    </tbody>

                                </table>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>
        </div>
    </div>
@endsection
