<?php

namespace App\Http\Controllers;

use App\Facades\CompanyServiceFacade;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Models\Company;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CompanyController extends Controller
{

    public function index(): View
    {
        $companies = Company::with(['employees'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('companies.index', compact('companies'));
    }


    public function create(): View
    {
        return view('companies.create');
    }


    public function store(StoreCompanyRequest $request): RedirectResponse
    {
        $data = $request->validated();

        try {
            CompanyServiceFacade::create($data);

            return redirect()->route('companies.index')->with('success', 'The company has been successfully created!');
        } catch (Exception $e) {
            return redirect()->route('companies.index')->with('error', 'An error occurred while creating the company. Please try again.');
        }
    }


    public function show(Company $company): View
    {
        $company->loadCount('employees');
        return view('companies.show', compact('company'));
    }


    public function edit(Company $company): View
    {
        return view('companies.edit', compact('company'));
    }

    public function update(UpdateCompanyRequest $request, Company $company): RedirectResponse
    {
        $data = $request->validated();

        try {
            CompanyServiceFacade::update($company, $data);

            return redirect()->route('companies.index')->with('success', 'The company has been successfully updated!');
        } catch (Exception $e) {
            return redirect()->route('companies.index')->with('error', 'An error occurred while updating the company. Please try again.');
        }

    }


    public function destroy(Company $company): RedirectResponse
    {
        try {
            CompanyServiceFacade::delete($company);
            return redirect()->route('companies.index')->with('success', 'The company has been deleted updated!');

        } catch (Exception $e) {
            return redirect()->route('companies.index')->with('error', 'An error occurred while updating the company. Please try again.');
        }

    }
}
