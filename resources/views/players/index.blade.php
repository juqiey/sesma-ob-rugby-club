@extends('layouts.master')
@section('title', 'Players List')
@section('content')
    <!-- Page-content -->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                    <h4 class="mb-sm-0">Players List</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Players</a></li>
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
                    <div class="card-header border-0">
                        <div class="d-flex align-items-center">
                            <h5 class="card-title mb-0 flex-grow-1">Forward</h5>
                        </div>
                    </div>
                    <div class="card-body border-0">
                        <div class="table-responsive">
                            <table class="table datatable">
                                <thead class="table-light text-muted">
                                    <tr>
                                        <th>#</th>
                                        <th>Player Code</th>
                                        <th>Name</th>
                                        <th>Age</th>
                                        <th>Phone Number</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($players as $player)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $player->player_code }}</td>
                                            <td>{{ $player->name }}</td>
                                            <td>{{ $player->age }}</td>
                                            <td>{{ $player->phone_number }}</td>
                                            <td>
                                                @php
                                                    $status = $player->status;

                                                    $statusColour = $playerStatus[$status];
                                                @endphp
                                                <span class="badge bg-{{ $statusColour }} fs-12">
                                                    {{ $status }}
                                                </span>
                                            </td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    {{-- View --}}
                                                    <a href="{{ route('players.show', $player) }}"
                                                    class="btn btn-soft-primary"
                                                    title="View">
                                                        <i class="ri-eye-line"></i>
                                                    </a>

                                                    {{-- Trigger Display --}}
                                                    <button type="button"
                                                            class="btn btn-soft-success"
                                                            title="Trigger Display"
                                                            onclick="triggerDisplay()">
                                                        <i class="ri-tv-line"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
