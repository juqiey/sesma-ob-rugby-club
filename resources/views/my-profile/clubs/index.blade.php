@extends('layouts.master')
@section('title', 'Clubs Representation: '. $player->player_code)
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
                    <h4 class="mb-sm-0">Clubs Representation</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Players</a></li>
                            <li class="breadcrumb-item active">Clubs Representation</li>
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

                        <div class="border rounded p-4 mb-4">
                            <div class="d-flex align-items-center">
                                <!-- Player Information -->
                                <div class="flex-grow-1">
                                    <h5 class="mb-1">{{ $player->name }} </h5>

                                    <div class="text-muted">
                                        <span class="me-3">
                                            <i class="ri-user-line me-1"></i>
                                            Player Code: {{ $player->player_code }}
                                        </span>

                                        <span class="me-3">
                                            <i class="ri-calendar-line me-1"></i>
                                            Batch: {{ $player->batch }}
                                        </span>

                                        <span>
                                            <i class="ri-shield-user-line me-1"></i>
                                            Positions:
                                            @foreach($player->playerPosition as $position)
                                                <span class="badge bg-primary-subtle text-primary me-1">
                                                    {{ $position->positions->name }}
                                                </span>
                                            @endforeach
                                        </span>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- Club Representation -->
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div>
                                <h4 class="mb-1">Club Representation</h4>
                                <p class="text-muted mb-0">
                                    Your rugby representation history
                                </p>
                            </div>

                            <a href="{{ route('my-career.clubs.create') }}" class="btn btn-primary">
                                <i class="ri-add-line me-1"></i>
                                Add Representation
                            </a>
                        </div>

                        {{-- Summary --}}
                        <div class="row g-3 mb-4">

                            <div class="col-md-4">
                                <div class="border rounded p-3 h-100">
                                    <p class="text-muted mb-1">Total Clubs Represented</p>
                                    <h3 class="mb-0">5</h3>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="border rounded p-3 h-100">
                                    <p class="text-muted mb-1">Levels Represented</p>
                                    <h3 class="mb-0">3</h3>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="border rounded p-3 h-100">
                                    <p class="text-muted mb-1">Current Representations</p>
                                    <h3 class="mb-0">2</h3>
                                </div>
                            </div>

                        </div>

                        {{-- Current Representations --}}
                        <div class="mb-4">

                            <h5 class="mb-3">Current Representations</h5>

                            <div class="row g-3">

                                <div class="col-lg-6">
                                    <div class="border rounded p-4 h-100">

                                        <div class="d-flex justify-content-between align-items-start mb-3">
                                            <div>
                                                <h5 class="mb-1">SESMA Old Boys RFC</h5>
                                                <p class="text-muted mb-0">
                                                    Club · Terengganu
                                                </p>
                                            </div>

                                            <span class="badge bg-success-subtle text-success">
                                                Current
                                            </span>
                                        </div>

                                        <div class="mb-3">
                                            <p class="text-muted mb-1">Representation Period</p>
                                            <h6 class="mb-0">2025 – Present</h6>
                                        </div>

                                        <div class="mb-3">
                                            <p class="text-muted mb-2">Positions</p>

                                            <span class="badge bg-primary-subtle text-primary me-1">
                                                Prop
                                            </span>

                                            <span class="badge bg-primary-subtle text-primary">
                                                Lock
                                            </span>
                                        </div>

                                        <hr>

                                        <div class="row text-center">
                                            <div class="col-4">
                                                <h5 class="mb-1">18</h5>
                                                <p class="text-muted mb-0">Matches</p>
                                            </div>

                                            <div class="col-4">
                                                <h5 class="mb-1">3</h5>
                                                <p class="text-muted mb-0">Tournaments</p>
                                            </div>

                                            <div class="col-4">
                                                <h5 class="mb-1">7</h5>
                                                <p class="text-muted mb-0">Tries</p>
                                            </div>
                                        </div>

                                        <div class="text-end mt-4">
                                            <a href="#" class="btn btn-light">
                                                View Details
                                                <i class="ri-arrow-right-line ms-1"></i>
                                            </a>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="border rounded p-4 h-100">

                                        <div class="d-flex justify-content-between align-items-start mb-3">
                                            <div>
                                                <h5 class="mb-1">Terengganu State Rugby</h5>
                                                <p class="text-muted mb-0">
                                                    State Team · Terengganu
                                                </p>
                                            </div>

                                            <span class="badge bg-success-subtle text-success">
                                                Current
                                            </span>
                                        </div>

                                        <div class="mb-3">
                                            <p class="text-muted mb-1">Representation Period</p>
                                            <h6 class="mb-0">2025 – Present</h6>
                                        </div>

                                        <div class="mb-3">
                                            <p class="text-muted mb-2">Positions</p>

                                            <span class="badge bg-primary-subtle text-primary me-1">
                                                Lock
                                            </span>

                                            <span class="badge bg-primary-subtle text-primary">
                                                Flanker
                                            </span>
                                        </div>

                                        <hr>

                                        <div class="row text-center">
                                            <div class="col-4">
                                                <h5 class="mb-1">8</h5>
                                                <p class="text-muted mb-0">Matches</p>
                                            </div>

                                            <div class="col-4">
                                                <h5 class="mb-1">2</h5>
                                                <p class="text-muted mb-0">Tournaments</p>
                                            </div>

                                            <div class="col-4">
                                                <h5 class="mb-1">2</h5>
                                                <p class="text-muted mb-0">Tries</p>
                                            </div>
                                        </div>

                                        <div class="text-end mt-4">
                                            <a href="#" class="btn btn-light">
                                                View Details
                                                <i class="ri-arrow-right-line ms-1"></i>
                                            </a>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>

                        {{-- Previous Representations --}}
                        <div>

                            <h5 class="mb-3">Previous Representations</h5>

                            <div class="row g-3">

                                <div class="col-lg-6">
                                    <div class="border rounded p-4 h-100">

                                        <div class="d-flex justify-content-between align-items-start mb-3">
                                            <div>
                                                <h5 class="mb-1">UiTM Rugby</h5>
                                                <p class="text-muted mb-0">
                                                    University · Terengganu
                                                </p>
                                            </div>

                                            <span class="badge bg-secondary-subtle text-secondary">
                                                Ended
                                            </span>
                                        </div>

                                        <div class="mb-3">
                                            <p class="text-muted mb-1">Representation Period</p>
                                            <h6 class="mb-0">2023 – 2025</h6>
                                        </div>

                                        <div>
                                            <p class="text-muted mb-2">Positions</p>

                                            <span class="badge bg-light text-dark me-1">
                                                Lock
                                            </span>

                                            <span class="badge bg-light text-dark">
                                                Flanker
                                            </span>
                                        </div>

                                        <div class="text-end mt-4">
                                            <a href="#" class="btn btn-light">
                                                View Details
                                            </a>
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
