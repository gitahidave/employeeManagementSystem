@extends('layouts.app')

@section('content')
<div class="row mb-4">
    <div class="col-md-12">
        <h2 class="fw-bold text-secondary mb-3">Dashboard Overview</h2>
    </div>

    <!-- Dashboard Statistics (Bonus Feature) -->
    <div class="col-md-3">
        <div class="card text-white bg-primary shadow-sm mb-3">
            <div class="card-body">
                <h6 class="card-title text-uppercase fs-7">Total Employees</h6>
                <h3 class="fw-bold mb-0">{{ $stats['total_employees'] }}</h3>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-success shadow-sm mb-3">
            <div class="card-body">
                <h6 class="card-title text-uppercase fs-7">Average Salary</h6>
                <h3 class="fw-bold mb-0">${{ number_format($stats['avg_salary'], 2) }}</h3>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-info shadow-sm mb-3">
            <div class="card-body">
                <h6 class="card-title text-uppercase fs-7">Highest Salary</h6>
                <h3 class="fw-bold mb-0">${{ number_format($stats['max_salary'], 2) }}</h3>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-warning shadow-sm mb-3">
            <div class="card-body">
                <h6 class="card-title text-uppercase fs-7">Lowest Salary</h6>
                <h3 class="fw-bold mb-0">${{ number_format($stats['min_salary'], 2) }}</h3>
            </div>
        </div>
    </div>
</div>

<div class="card shadow-sm border-0">
    <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
        <h4 class="mb-0 fw-bold text-primary">Employee Records</h4>
        <a href="{{ route('employees.create') }}" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-lg me-1"></i>Add New Employee
        </a>
    </div>

    <div class="card-body">
        <!-- Search and Sorting Controls (Bonus Features) -->
        <form method="GET" action="{{ route('employees.index') }}" class="row g-2 mb-4">
            <div class="col-md-5">
                <input type="text" name="search" class="form-control" placeholder="Search by name, email, or department..." value="{{ request('search') }}">
            </div>
            <div class="col-md-3">
                <select name="sort_by" class="form-select">
                    <option value="">Sort By...</option>
                    <option value="first_name" {{ request('sort_by') == 'first_name' ? 'selected' : '' }}>First Name</option>
                    <option value="department" {{ request('sort_by') == 'department' ? 'selected' : '' }}>Department</option>
                    <option value="salary" {{ request('sort_by') == 'salary' ? 'selected' : '' }}>Salary</option>
                    <option value="hire_date" {{ request('sort_by') == 'hire_date' ? 'selected' : '' }}>Hire Date</option>
                </select>
            </div>
            <div class="col-md-2">
                <select name="sort_order" class="form-select">
                    <option value="asc" {{ request('sort_order') == 'asc' ? 'selected' : '' }}>Ascending</option>
                    <option value="desc" {{ request('sort_order') == 'desc' ? 'selected' : '' }}>Descending</option>
                </select>
            </div>
            <div class="col-md-2 d-flex gap-1">
                <button type="submit" class="btn btn-secondary w-100">Filter</button>
                <a href="{{ route('employees.index') }}" class="btn btn-outline-secondary">Reset</a>
            </div>
        </form>

        <!-- Employee Table -->
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Department</th>
                        <th>Salary</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($employees as $employee)
                        <tr>
                            <td>{{ $employee->first_name }}</td>
                            <td>{{ $employee->last_name }}</td>
                            <td>{{ $employee->email }}</td>
                            <td>{{ $employee->phone_number }}</td>
                            <td><span class="badge bg-secondary">{{ $employee->department }}</span></td>
                            <td>${{ number_format($employee->salary, 2) }}</td>
                            <td class="text-center">
                                <div class="btn-group" role="group">
                                    <a href="{{ route('employees.show', $employee) }}" class="btn btn-info btn-sm text-white" title="View">
                                        <i class="bi bi-eye-fill"></i>
                                    </a>
                                    <a href="{{ route('employees.edit', $employee) }}" class="btn btn-warning btn-sm text-white" title="Edit">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <!-- Delete Confirmation Form -->
                                    <form action="{{ route('employees.destroy', $employee) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete {{ $employee->full_name }}?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete">
                                            <i class="bi bi-trash-fill"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-4 text-muted">No employees found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination (Bonus Feature) -->
        <div class="d-flex justify-content-end mt-3">
            {{ $employees->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>
@endsection