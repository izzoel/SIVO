<div class="mt-3 p-3 m-2">
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
        aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Setting</a></li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-auto">
            <div class="card">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <span>Satuan &nbsp;</span>
                    <a type="button" href="{{ route('setting', 'satuan') }}" class="btn btn-sm btn-primary">
                        <i class='bx bx-cog'></i> Setting
                    </a>
                </div>
            </div>
        </div>
        <div class="col-auto">
            <div class="card">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <span>Lokasi &nbsp;</span>
                    <a type="button" href="{{ route('setting', 'lokasi') }}" class="btn btn-sm btn-primary">
                        <i class='bx bx-cog'></i> Setting
                    </a>
                </div>
            </div>
        </div>
        <div class="col-auto">
            <div class="card">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <span>Laboratorium &nbsp;</span>
                    <a type="button" href="{{ route('setting', 'laboratorium') }}" class="btn btn-sm btn-primary">
                        <i class='bx bx-cog'></i> Setting
                    </a>
                </div>
            </div>
        </div>
    </div>

</div>
