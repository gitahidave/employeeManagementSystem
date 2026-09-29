@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-info text-white d-flex justify-content-between align-items-center py-3">
                <h4 class="mb-0"><i class="bi bi-person-badge me-2"></i>Employee Details</h4>
                <div>
                    <a href="{{ route('employees.edit', $employee) }}" class="btn btn-light btn-sm text-dark me-1">Edit</a>
                    <a href="{{ route('employees.index') }}" class="btn btn-outline-light btn-sm">Back</a>
                </div>
            </div>
            <div class="card-body p-4">
                <div class="row g-3">
                    <div class="col-md-6">
                        <p class="text-muted mb-1">Full Name</p>
                        <h5 class="fw-bold">{{ $employee->full_name }}</h5>
                    </div>
                    <div class="col-md-6">
                        <p class="text-muted mb-1">Department</p>
                        <h5><span class="badge bg-primary">{{ $employee->department }}</span></h5>
                    </div>
                    <hr>
                    <div class="col-md-6">
                        <p class="text-muted mb-1">Email Address</p>
                        <p class="fw-semibold">{{ $employee->email }}</p>
                    </div>
                    <div class="col-md-6">
                        <p class="text-muted mb-1">Phone Number</p>
                        <p class="fw-semibold">{{ $employee->phone_number }}</p>
                    </div>
                    <div class="col-md-6">
                        <p class="text-muted mb-1">Gender</p>
                        <p class="fw-semibold">{{ $employee->gender }}</p>
                    </div>
                    <div class="col-md-6">
                        <p class="text-muted mb-1">Salary</p>
                        <p class="fw-semibold text-success fs-5">KES {{ number_format($employee->salary, 2) }}</p>
                    </div>
                    <hr>
                    <div class="col-md-6">
                        <p class="text-muted mb-1">Hire Date</p>
                        <p class="fw-semibold">{{ $employee->hire_date->format('F d, Y') }}</p>
                    </div>
                    <div class="col-md-6">
                        <p class="text-muted mb-1">Record Created Date</p>
                        <p class="fw-semibold">{{ $employee->created_at->format('F d, Y H:i A') }}</p>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-light py-3">
                <a href="{{ route('employees.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left me-1"></i>Back to Employee List
                </a>
            </div>
        </div>
    </div>
</div>
@endsection