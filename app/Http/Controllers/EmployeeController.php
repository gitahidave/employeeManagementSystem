<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EmployeeController extends Controller
{
    /**
     * Display listing, search, sort, and dashboard stats.
     */
    public function index(Request $request)
    {
        $query = Employee::query();

        // Bonus Feature 1: Search Employees (First Name, Last Name, Email, Department)
        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('first_name', 'like', "%{$search}%")
                  ->orWhere('last_name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('department', 'like', "%{$search}%");
            });
        }

        // Bonus Feature 2: Sort Employees
        $sortBy = $request->input('sort_by', 'created_at');
        $sortOrder = $request->input('sort_order', 'desc');
        $allowedSorts = ['first_name', 'department', 'salary', 'hire_date'];

        if (in_array($sortBy, $allowedSorts)) {
            $query->orderBy($sortBy, $sortOrder === 'asc' ? 'asc' : 'desc');
        } else {
            $query->latest();
        }

        // Bonus Feature 3: Pagination (10 per page)
        $employees = $query->paginate(10)->withQueryString();

        // Bonus Feature 4: Dashboard Statistics
        $stats = [
            'total_employees' => Employee::count(),
            'avg_salary'       => Employee::avg('salary') ?? 0,
            'max_salary'       => Employee::max('salary') ?? 0,
            'min_salary'       => Employee::min('salary') ?? 0,
        ];

        return view('employees.index', compact('employees', 'stats'));
    }

    /**
     * Show form for creating a new employee.
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store newly created employee in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name'   => 'required|min:3',
            'last_name'    => 'required|min:3',
            'email'        => 'required|email|unique:employees,email',
            'phone_number' => 'required|unique:employees,phone_number',
            'gender'       => 'required|in:Male,Female,Other',
            'hire_date'    => 'required|date',
            'department'   => 'required|string',
            'salary'       => 'required|numeric|gt:0',
        ]);

        Employee::create($validated);

        return redirect()->route('employees.index')
            ->with('success', 'Employee added successfully!');
    }

    /**
     * Display full employee details.
     */
    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }

    /**
     * Show form for editing employee.
     */
    public function edit(Employee $employee)
    {
        return view('employees.edit', compact('employee'));
    }

    /**
     * Update employee in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        $validated = $request->validate([
            'first_name'   => 'required|min:3',
            'last_name'    => 'required|min:3',
            'email'        => ['required', 'email', Rule::unique('employees')->ignore($employee->id)],
            'phone_number' => ['required', Rule::unique('employees')->ignore($employee->id)],
            'gender'       => 'required|in:Male,Female,Other',
            'hire_date'    => 'required|date',
            'department'   => 'required|string',
            'salary'       => 'required|numeric|gt:0',
        ]);

        $employee->update($validated);

        return redirect()->route('employees.index')
            ->with('success', 'Employee updated successfully!');
    }

    /**
     * Remove employee from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('employees.index')
            ->with('success', 'Employee deleted successfully!');
    }
}