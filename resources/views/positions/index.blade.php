@extends('layouts.master')
@section('title', 'Positions List')
@section('content')
    <!-- Page-content -->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                    <h4 class="mb-sm-0">Positions List</h4>
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
                    <div class="card-header border-0">
                        <div class="d-flex align-items-center">
                            <h5 class="card-title mb-0 flex-grow-1">All Positions</h5>
                        </div>
                    </div>
                    <div class="card-body border-0">
                        <div class="table-responsive">
                            <table class="table datatable">
                                <thead class="table-light text-muted">
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Position Group</th>
                                        <th>Format</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($positions as $position)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $position['name'] }}</td>
                                            <td>
                                                @php
                                                    $group = $position->position_group;

                                                    $groupColour = $positionGroups[$group]
                                                @endphp
                                                <span class="badge bg-{{ $groupColour }} fs-12">
                                                    {{ $group }}
                                                </span>
                                            </td>
                                            <td>{{ $position['format'] }}</td>
                                            <td>
                                                <span class="badge {{ $position['is_displayed'] ? 'bg-success' : 'bg-danger' }} fs-12">
                                                    {{ $position['is_displayed'] ? 'Displayed' : 'Not Displayed' }}
                                                </span>
                                            </td>
                                            <td>
                                            <div class="d-flex gap-2">
                                                {{-- View --}}
                                                <a href="{{ route('position.show', $position) }}"
                                                class="btn btn-soft-primary"
                                                title="View">
                                                    <i class="ri-eye-line"></i>
                                                </a>

                                                {{-- Edit --}}
                                                <a href=""
                                                class="btn btn-soft-warning"
                                                title="Edit">
                                                    <i class="ri-edit-line"></i>
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
