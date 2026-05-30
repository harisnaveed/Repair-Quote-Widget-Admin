<?php

namespace App\Http\Controllers\Partials\Location;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Services\Location\LocationService;

class LocationController extends Controller
{
    public function __construct(
        protected LocationService $locationService
    ) {}

    public function index(Company $company)
    {
        $locations = $company->locations()
            ->latest()
            ->get();

        return view(
            'partials.locations.view-all-locations',
            compact('locations', 'company')
        );
    }

    public function viewLocation(int $id)
    {
        $location = $this->locationService->getLocation($id);
        $name = $location->name;

        if (! $location) {
            return response()->json([
                'success' => false,
                'message' => 'Location not found.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'html' => view(
                'partials.locations.view',
                compact('location')
            )->render(),
        ]);
    }

    public function toggleStatus(int $id)
    {
        $name = $this->locationService->getLocation($id)->name;
        $location = $this->locationService->toggleStatus($id);

        return response()->json([
            'success' => true,
            'status' => $location->is_active,
            'message' => $location->is_active
                ? "{$name} has been activated successfully."
                : "{$name} has been deactivated successfully.",
        ]);
    }

    public function myLocations()
    {
        $company = authUser()->company;
        $locations = authUser()
            ->company
            ->locations()
            ->latest()
            ->get();

        return view(
            'partials.locations.view-all-locations',
            compact('locations', 'company')
        );
    }
}
