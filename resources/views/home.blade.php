@if (auth()->user()->level == 'Admin')
    @include('auth.admin.admin-dashboard')
@elseif (auth()->user()->level == 'Employee')
    @include('auth.admin.admin-dashboard')
@else
    @include('auth.public.public-dashboard')
@endif