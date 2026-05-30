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

    public function createCompany()
    {
        return response()->json([
            'success' => true,
            'html' => view(
                'platform.companies.create',
            )->render(),
        ]);
    }

    public function storeCompany(StoreCompanyRequest $request)
    {
        $this->companyService->store(
            $request->validated()
        );

        return response()->json([
            'success' => true,
            'message' => 'Company created successfully.',
        ]);
    }

    public function editCompany(int $id)
    {
        $company = $this->companyService->getCompany($id);

        if (! $company) {
            return response()->json([
                'success' => false,
                'message' => 'Company not found.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'html' => view(
                'platform.companies.edit',
                compact('company')
            )->render(),
        ]);
    }

    public function updateCompany(
        UpdateCompanyRequest $request,
        Company $company
    ) {
        $this->companyService->update(
            company: $company,
            data: $request->validated()
        );

        return response()->json([
            'success' => true,
            'message' => "{$company->name} has been updated successfully.",
            'company' => $company,
        ]);
    }

    public function destroy(Company $company)
    {
        $name = $company->name;
        if (! $this->companyService->delete($company)) {

            return response()->json([
                'success' => false,
                'message' => "Unable to delete {$name}. Try again later.",
            ], 500);
        }

        return response()->json([
            'success' => true,
            'message' => "{$name} has been deleted successfully.",
        ]);
    }

    public function restoreCompany(int $id)
    {
        $name = $this->companyService->getCompany($id)->name;
        if (! $this->companyService->restore($id)) {
            return response()->json([
                'success' => false,
                'message' => "Unable to restore {$name}. Try again later.",
            ], 500);
        }

        return response()->json([
            'success' => true,
            'message' => "{$name} has been restored successfully.",
        ]);
    }

    public function toggleStatus(int $id)
    {
        $name = $this->companyService->getCompany($id)->name;
        $company = $this->companyService->toggleStatus($id);

        return response()->json([
            'success' => true,
            'status' => $company->is_active,
            'message' => $company->is_active
            ? "{$name} has been activated successfully."
            : "{$name} has been deactivated successfully.",
        ]);
    }

    public function deletedCompanies()
    {
        $companies = $this->companyService->getDeletedCompanies();

        return view('platform.companies.deleted', compact('companies'));
    }

    public function viewCompany(int $id)
    {
        $company = $this->companyService->getCompany($id);
        $name = $company->name;

        if (! $company) {
            return response()->json([
                'success' => false,
                'message' => 'Company not found.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'html' => view(
                'partials.companies.view',
                compact('company')
            )->render(),
        ]);
    }
}
