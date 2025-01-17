{{-- navbar --}}
<nav class="navbar bg-body-tertiary shadow-sm">
    <div class="container-fluid justify-content-between">
        {{-- branding almighty ASTRATECH, oh god i love ASTRATECH real not fake 😍😍😍😍😍 --}}
        <img src="{{ asset('assets/images/logo.png') }}" alt="logo-polman-astra" class="mt-2 navbar-brand" style="{{  "height: 70px;" }}">
        <span class="navbar-text mt-2">Sistem Manajemen Proyek</span>
        
        {{-- Sidebar Button --}}
        <button class="btn btn-outline-secondary" id="sidebarToggle"> ☰ </button>
        
        {{-- user info --}}
        <div class="d-flex justify-content-end">
            <div class="text-end">
                @if (auth()->check())
                <p class="fw-bold mx-0 my-0">
                    {{-- {{ auth()->user()->username }} ({{ auth()->user()->role->roleName }}) --}}
                </p>
                @endif
            </div>
        </div>
    </div>
</nav>


    