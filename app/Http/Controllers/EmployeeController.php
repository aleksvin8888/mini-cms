<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Facades\EmployeeServiceFacade;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Company;
use App\Models\Employee;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class EmployeeController extends Controller
{
    public function index(): View
    {
        $employees = Employee::with(['company'])
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return view('employees.index', compact('employees'));
    }

    public function create(): View
    {
        $companies = Company::select(['id', 'name'])->get();

        return view('employees.create', compact('companies'));
    }

    public function store(StoreEmployeeRequest $request)
    {
        $data = $request->validated();

        try {
            EmployeeServiceFacade::create($data);

            return redirect()->route('employees.index')->with('success', 'The employee has been created!');

        } catch (Exception $e) {
            return redirect()->route('employees.index')->with('error', 'An error occurred while updating the company. Please try again.');
        }
    }

    public function show(Employee $employee): View
    {
        return view('employees.show', compact('employee'));
    }

    public function edit(Employee $employee): View
    {
        $companies = Company::select(['id', 'name'])->get();

        return view('employees.edit', compact('employee', 'companies'));
    }

    public function update(UpdateEmployeeRequest $request, Employee $employee): RedirectResponse
    {
        $data = $request->validated();

        try {
            EmployeeServiceFacade::update($employee, $data);

            return redirect()->route('employees.index')->with('success', 'The employee has been updated!');

        } catch (Exception $e) {
            return redirect()->route('employees.index')->with('error', 'An error occurred while updating the company. Please try again.');
        }
    }

    public function destroy(Employee $employee): RedirectResponse
    {
        try {
            EmployeeServiceFacade::delete($employee);

            return redirect()->route('employees.index')->with('success', 'The employee has been deleted deleted!');

        } catch (Exception $e) {
            return redirect()->route('employees.index')->with('error', 'An error occurred while updating the company. Please try again.');
        }
    }
}
