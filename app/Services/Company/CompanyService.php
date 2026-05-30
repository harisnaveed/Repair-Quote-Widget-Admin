<?php

namespace App\Services\Company;

use App\Models\Company;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CompanyService
{
    public function getAll(bool $paginate = true, int $perPage = 15)
    {
        $query = Company::query()->latest();

        return $paginate
            ? $query->paginate($perPage)
            : $query->get();
    }

    public function store(array $data): Company
    {
        return DB::transaction(function () use ($data) {
            $data['slug'] = Str::slug($data['name']);

            return Company::create($data);
        }, 5);
    }

    public function update(Company $company, array $data): Company
    {
        $data['slug'] = Str::slug($data['name']);

        return DB::transaction(function () use ($company, $data) {
            $company->update($data);

            return $company->fresh();
        });
    }

    public function delete(Company $company): bool
    {
        return DB::transaction(function () use ($company) {
            $company->update([
                'is_active' => false,
            ]);

            return $company->delete();
        });
    }

    public function restore(int $id): bool
    {
        $company = Company::onlyTrashed()->findOrFail($id);

        return DB::transaction(function () use ($company) {
            $company->update([
                'is_active' => true,
            ]);

            return $company->restore();
        });
    }

    public function forceDelete(Company $company): bool
    {
        return $company->forceDelete();
    }

    public function getDeletedCompanies(): Collection
    {
        return Company::onlyTrashed()->latest('deleted_at')->get();
    }

    public function getAllCompanies(): Collection
    {
        return Company::withTrashed()->latest()->get();
    }

    public function toggleStatus(int $id): Company
    {
        $company = Company::findOrFail($id);

        return DB::transaction(function () use ($company) {
            $company->update([
                'is_active' => ! $company->is_active,
            ]);

            return $company->refresh();
        });
    }

    public function getCompany(int $id): ?Company
    {
        return Company::withTrashed()->find($id);
    }
}
