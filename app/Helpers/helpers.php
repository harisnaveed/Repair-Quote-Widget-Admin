<?php

use Illuminate\Support\Facades\Auth;

if (! function_exists('companyId')) {

    function companyId(): ?int
    {
        return Auth::guard('web')->user()?->company_id;
    }
}

if (! function_exists('locationId')) {

    function locationId(): ?int
    {
        return session('location_id');
    }
}

if (! function_exists('authUser')) {

    function authUser()
    {
        return Auth::guard('web')->user();
    }
}

if (! function_exists('platformUser')) {

    function platformUser()
    {
        return Auth::guard('platform')->user();
    }
}

if (! function_exists('isPlatform')) {

    function isPlatform(): bool
    {
        return Auth::guard('platform')->check();
    }
}

if (! function_exists('isCompanyUser')) {

    function isCompanyUser(): bool
    {
        return Auth::guard('web')->check();
    }
}

if (! function_exists('currency')) {

    function currency($amount): string
    {
        return '$'.number_format($amount, 2);
    }
}

if (! function_exists('activeStatus')) {

    function activeStatus(bool $status): string
    {
        return $status ? 'Active' : 'Inactive';
    }
}
