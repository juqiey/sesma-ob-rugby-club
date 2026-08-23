@extends('layouts.master')
@section('title', 'Positions List')
@section('content')
    <!-- Page-content -->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                    <h4 class="mb-sm-0">{{ $position->name }}</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Positions</a></li>
                            <li class="breadcrumb-item active">List</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h5 class="card-title mb-0 flex-grow-1">Position Information</h5>
                        </div>
                    </div>
                    <div class="card-body">

                        {{-- Position Information --}}
                        <div class="row mb-4">

                            <div class="col-md-3">
                                <small class="text-muted d-block">Name</small>
                                <h5 class="mb-0">{{ $position['name'] ?? '-' }}</h5>
                            </div>

                            <div class="col-md-3">
                                <small class="text-muted d-block">Format</small>
                                <span class="badge bg-info fs-12">
                                    {{ $position['format'] ?? '-' }}
                                </span>
                            </div>

                            <div class="col-md-3">
                                <small class="text-muted d-block">Position Group</small>
                                <span class="badge bg-secondary fs-12">
                                    {{ $position['position_group'] ?? '-' }}
                                </span>
                            </div>

                            <div class="col-md-3">
                                <small class="text-muted d-block">Display Status</small>

                                @if ($position['is_displayed'] == 1)
                                    <span class="badge bg-success fs-12">
                                        Displayed
                                    </span>
                                @else
                                    <span class="badge bg-danger fs-12">
                                        Not Displayed
                                    </span>
                                @endif
                            </div>

                        </div>

                        <hr>

                        {{-- Players --}}
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="mb-0">
                                Players in this Position
                            </h5>

                            <span class="badge bg-primary fs-12">
                                {{ $position->playerPosition->count() ?? '0' }} Players
                            </span>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-hover align-middle datatable">
                                <thead class="table-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Code</th>
                                        <th>Name</th>
                                        <th>Age</th>
                                        <th>Batch</th>
                                        <th class="text-end">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($position->playerPosition as $player)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $player->players->player_code }}</td>
                                            <td>{{ $player->players->name }}</td>
                                            <td>{{ $player->players->age }}</td>
                                            <td>{{ $player->players->batch }}</td>
                                            <td>
                                                {{-- View --}}
                                                <button type="button"
                                                        class="btn btn-soft-primary"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#playerModal{{ $player->players->id }}"
                                                        title="View">
                                                    <i class="ri-eye-line"></i> View
                                                </button>
                                            </td>
                                        </tr>


                                    @endforeach
                                </tbody>
                            </table>

                            <div class="modal fade"
                                id="playerModal{{ $player->players->id }}"
                                tabindex="-1"
                                aria-labelledby="playerModalLabel{{ $player->players->id }}"
                                aria-hidden="true">

                                <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                                    <div class="modal-content">

                                        {{-- Header --}}
                                        <div class="modal-header">
                                            <div>
                                                <h5 class="modal-title" id="playerModalLabel{{ $player->players->id }}">
                                                    {{ $player->players->name }}
                                                </h5>

                                                <small class="text-muted">
                                                    {{ $player->players->player_code }}
                                                </small>
                                            </div>

                                            <button type="button"
                                                    class="btn-close"
                                                    data-bs-dismiss="modal"
                                                    aria-label="Close">
                                            </button>
                                        </div>

                                        {{-- Body --}}
                                        <div class="modal-body">

                                            {{-- ========================= --}}
                                            {{-- Personal Information --}}
                                            {{-- ========================= --}}

                                            <h5 class="mb-3">
                                                Personal Information
                                            </h5>

                                            <div class="card border shadow-none mb-0">
                                                <div class="card-body">

                                                    <div class="row align-items-center">

                                                        {{-- Profile Picture --}}
                                                        <div class="col-md-3 text-center">

                                                            <div class="mb-3">

                                                                @if ($player->players->profile_picture)
                                                                    <img src="{{ asset('storage/' . $player->players->profile_picture) }}"
                                                                        alt="{{ $player->players->name }}"
                                                                        class="rounded-circle img-thumbnail"
                                                                        style="width: 160px; height: 160px; object-fit: cover;">
                                                                @else
                                                                    <div class="rounded-circle bg-light d-flex align-items-center justify-content-center mx-auto"
                                                                        style="width: 160px; height: 160px;">

                                                                        <i class="ri-user-line text-muted"
                                                                        style="font-size: 70px;">
                                                                        </i>

                                                                    </div>
                                                                @endif

                                                            </div>

                                                            <h5 class="mb-1">
                                                                {{ $player->players->name }}
                                                            </h5>

                                                            <span class="badge bg-primary">
                                                                {{ $player->players->player_code }}
                                                            </span>

                                                        </div>


                                                        {{-- Personal Information --}}
                                                        <div class="col-md-9">

                                                            <div class="row g-4">

                                                                <div class="col-md-6">
                                                                    <label class="text-muted small">
                                                                        Full Name
                                                                    </label>

                                                                    <div class="fw-semibold">
                                                                        {{ $player->players->name ?? '-' }}
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <label class="text-muted small">
                                                                        Age
                                                                    </label>

                                                                    <div class="fw-semibold">
                                                                        {{ $player->players->age ?? '-' }}
                                                                    </div>
                                                                </div>


                                                                <div class="col-md-6">
                                                                    <label class="text-muted small">
                                                                        IC / Identification No.
                                                                    </label>

                                                                    <div class="fw-semibold">
                                                                        {{ $player->players->ic_number ?? '-' }}
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <label class="text-muted small">
                                                                        Batch
                                                                    </label>

                                                                    <div class="fw-semibold">
                                                                        {{ $player->players->batch ?? '-' }}
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <label class="text-muted small">
                                                                        Email
                                                                    </label>

                                                                    <div class="fw-semibold">
                                                                        {{ $player->players->email ?? '-' }}
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <label class="text-muted small">
                                                                        Phone Number
                                                                    </label>

                                                                    <div class="fw-semibold">
                                                                        {{ $player->players->phone_number ?? '-' }}
                                                                    </div>
                                                                </div>

                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>
                                            </div>

                                            <hr class="my-4">

                                            {{-- ========================= --}}
                                            {{-- Clubs Played --}}
                                            {{-- ========================= --}}

                                            <div class="d-flex align-items-center mb-3">
                                                <div>
                                                    <h5 class="mb-0">
                                                        Clubs Played
                                                    </h5>

                                                    <small class="text-muted">
                                                        Player's club history
                                                    </small>
                                                </div>
                                            </div>

                                            <div class="table-responsive">

                                                <table class="table table-hover align-middle datatable">

                                                    <thead class="table-light">
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Club</th>
                                                            <th>Type</th>
                                                            <th>Location</th>
                                                            <th>From</th>
                                                            <th>To</th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>

                                                        @foreach($player->players->playerRepresentation as $club)
                                                            <tr>

                                                                <td>
                                                                    {{ $loop->iteration }}
                                                                </td>

                                                                <td>
                                                                    <span class="fw-semibold">
                                                                        {{ $club->clubs->name }}
                                                                    </span>
                                                                </td>

                                                                <td>
                                                                    {{ $club->clubs->type ?? '-' }}
                                                                </td>

                                                                <td>
                                                                    {{ $club->clubs->location ?? '-' }}
                                                                </td>

                                                                <td>
                                                                    {{ optional($club->start_date)->format('d/m/Y') ?? '-' }}
                                                                </td>

                                                                <td>
                                                                    {{ optional($club->end_date)->format('d/m/Y') ?? '-' }}
                                                                </td>

                                                                <td>
                                                                    <span class="badge bg-success fs-12">
                                                                        {{ $club->status }}
                                                                    </span>
                                                                    <br>
                                                                    <small>Remark: {{ $club->remark }}</small>
                                                                </td>

                                                            </tr>
                                                        @endforeach

                                                    </tbody>

                                                </table>

                                            </div>

                                        </div>

                                        {{-- Footer --}}
                                        <div class="modal-footer">
                                            <button type="button"
                                                    class="btn btn-light"
                                                    data-bs-dismiss="modal">
                                                Close
                                            </button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
