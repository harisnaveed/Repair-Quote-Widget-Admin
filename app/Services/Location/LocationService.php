<?php

namespace App\Services\Location;

use App\Models\Company;
use App\Models\Location;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class LocationService
{
    public function getAll(int $companyId, bool $paginate = true, int $perPage = 15)
    {
        $query = Location::query()
            ->where('company_id', $companyId)
            ->latest();

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

    public function toggleStatus(int $id): Location
    {
        $location = Location::findOrFail($id);

        return DB::transaction(function () use ($location) {
            $location->update([
                'is_active' => ! $location->is_active,
            ]);

            return $location->refresh();
        });
    }

    public function getLocation(int $id): ?Location
    {
        return Location::withTrashed()->find($id);
    }
}
