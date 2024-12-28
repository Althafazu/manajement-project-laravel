<div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px">
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('') }}" class="nav-link">
                Detail Proyek (SPK)
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('') }}" class="nav-link">
                Actual Plan
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('') }}" class="nav-link">
                Gambar Teknik
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('') }}" class="nav-link">
                BOM & BOT
            </a>
        </li>
        <li>
            <a href="{{ route('') }}" class="nav-link">
                Quality Checksheet
            </a>
        </li>
        <li>
            <a href="{{ route('') }}" class="nav-link">
                Data Trial
            </a>
        </li>
        <li>
            <a href="{{ route('') }}" class="nav-link">
                PICA
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link">
                Logout
            </a>
        </li>
    </ul>
</div>
