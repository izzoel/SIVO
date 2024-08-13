<div class="mt-3 p-3 m-2">
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
        aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('show-setting') }}">Setting</a></li>
            <li class="breadcrumb-item active" aria-current="page">lokasi</li>
        </ol>
    </nav>


    <div class="card">
        <div class="card-body">
            <h5>Lokasi</h5>
            <table id="table_lokasi" class="table table-striped table-bordered" style="width:100%; text-align: center;">
                <thead>
                    <tr>
                        <th style="text-align: center;">Lokasi</th>
                        <th style="text-align: center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lokasis as $lokasi)
                        <tr>
                            <td style="text-align: left;">{{ $lokasi->lokasi }}</td>
                            <td>
                                <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#edit_lokasi{{ $lokasi->id }}">
                                    <i class="bx bx-pencil"></i>
                                </button>

                                <a class="btn btn-danger btn-sm" id="destroyLokasi{{ $lokasi->id }}"
                                    href="{{ route('destroy-lokasi', $lokasi->id) }}" role="button">
                                    <i class="bx bx-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


</div>