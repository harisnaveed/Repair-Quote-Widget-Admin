<?php

namespace App\Http\Controllers\Platform\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\Platform\Company\StoreCompanyRequest;
use App\Http\Requests\Platform\Company\UpdateCompanyRequest;
use App\Models\Company;
use App\Services\Company\CompanyService;

class CompanyController extends Controller
{
    public function __construct(
        protected CompanyService $companyService
    ) {}

    public function index()
    {
        $companies = $this->companyService->getAll(paginate: false, perPage: 5);

        return view('platform.companies.index', compact('companies'));
    }

    public function create()
    {
        return view('platform.companies.create');
    }

    public function store(StoreCompanyRequest $request)
    {
        $this->companyService->store(
            $request->validated()
        );

        return redirect()
            ->route('platform.companies.index')
            ->with('success', 'Company created successfully.');
    }

    public function edit(Company $company)
    {
        return view('platform.companies.edit', compact('company'));
    }

    public function update(
        UpdateCompanyRequest $request,
        Company $company
    ) {
        $this->companyService->update(
            $company,
            $request->validated()
        );

        return redirect()
            ->route('platform.companies.index')
            ->with('success', 'Company updated successfully.');
    }

    public function destroy(Company $company)
    {
        if (! $this->companyService->delete($company)) {

            return response()->json([
                'success' => false,
                'message' => 'Unable to delete company. Try again later.',
            ], 500);
        }

        return response()->json([
            'success' => true,
            'message' => 'Company deleted successfully.',
        ]);
    }

    public function restoreCompany(int $id)
    {
        if (! $this->companyService->restore($id)) {
            return response()->json([
                'success' => false,
                'message' => 'Unable to restore company. Try again later.',
            ], 500);
        }

        return response()->json([
            'success' => true,
            'message' => 'Company restored successfully.',
        ]);
    }

    public function toggleStatus(Company $company)
    {
        $isActive = $this->companyService->toggleStatus($company);

        return response()->json([
            'success' => true,
            'is_active' => $isActive,
            'message' => $isActive ? 'Company enabled successfully.' : 'Company disabled successfully.',
        ]);
    }

    public function deletedCompanies()
    {
        $companies = $this->companyService->getDeletedCompanies();

        return view('platform.companies.deleted', compact('companies'));
    }
}
