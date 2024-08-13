<!DOCTYPE html>
<html lang="en">

@include('scripts.script_header')

@include('layouts.header')

<body>
    <main id="main">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="ms-2 collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('menu-cair') }}">
                            <span class="p-2 pr-4 pl-4 rounded"
                                style="{{ $title == 'cair' ? 'background-color:#0d6efd;color:#FFFFFF;' : 'color: #0d6efd !important;' }}"
                                onmouseover="this.style.backgroundColor='#0d6efd';this.style.color='#FFFFFF';"
                                onmouseout="{{ $title == 'cair' ? 'this.style.backgroundColor="#0d6efd";this.style.color="#FFFFFF";' : 'this.style.backgroundColor="transparent";this.style.color="#0d6efd"; this.style.border="none";' }}">
                                Bahan Cair
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('menu-padat') }}">
                            <span class="p-2 pr-4 pl-4 rounded"
                                style="{{ $title == 'padat' ? 'background-color:#0d6efd;color:#FFFFFF;' : 'color: #0d6efd !important;' }}"
                                onmouseover="this.style.backgroundColor='#0d6efd';this.style.color='#FFFFFF';"
                                onmouseout="{{ $title == 'padat' ? 'this.style.backgroundColor="#0d6efd";this.style.color="#FFFFFF";' : 'this.style.backgroundColor="transparent";this.style.color="#0d6efd"; this.style.border="none";' }}">
                                Bahan Padat
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('menu-alat') }}">
                            <span class="p-2 pr-4 pl-4 rounded"
                                style="{{ $title == 'alat' ? 'background-color:#0d6efd;color:#FFFFFF;' : 'color: #0d6efd !important;' }}"
                                onmouseover="this.style.backgroundColor='#0d6efd';this.style.color='#FFFFFF';"
                                onmouseout="{{ $title == 'alat' ? 'this.style.backgroundColor="#0d6efd";this.style.color="#FFFFFF";' : 'this.style.backgroundColor="transparent";this.style.color="#0d6efd"; this.style.border="none";' }}">
                                Alat
                            </span>
                        </a>
                    </li>
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('menu-kerusakan') }}">
                                <span class="p-2 pr-4 pl-4 rounded"
                                    style="{{ $title == 'kerusakan' ? 'background-color:#0d6efd;color:#FFFFFF;' : 'color: #0d6efd !important;' }}"
                                    onmouseover="this.style.backgroundColor='#0d6efd';this.style.color='#FFFFFF';"
                                    onmouseout="{{ $title == 'kerusakan' ? 'this.style.backgroundColor="#0d6efd";this.style.color="#FFFFFF";' : 'this.style.backgroundColor="transparent";this.style.color="#0d6efd"; this.style.border="none";' }}">
                                    Kerusakan Alat
                                </span>
                            </a>
                        </li>
                    @endauth
                </ul>
            </div>
            <span class="navbar-text me-3">
                <a type="button" href="{{ route('show-setting') }}" class="btn m-0 p-0"
                    style="font-size: 1.8rem;color:#0d6efd;" onmouseover="this.style.color='#232425';"
                    onmouseout="this.style.color='#0d6efd';">
                    <i class='bx bx-cog'></i>
                </a>
            </span>
        </nav>

        @if ($title == 'cair')
            @include('contents.menus.cair')
        @elseif($title == 'padat')
            @include('contents.menus.padat')
        @elseif($title == 'alat')
            @include('contents.menus.alat')
        @elseif($title == 'kerusakan')
            @include('contents.menus.kerusakan')
        @elseif($title == 'setting')
            @include('contents.settings.setting')
        @elseif($title == 'satuan')
            @include('contents.settings.satuan')
        @elseif($title == 'lokasi')
            @include('contents.settings.lokasi')
        @elseif($title == 'laboratorium')
            @include('contents.settings.laboratorium')
        @endif

        {{-- <a name="swal" id="swal" class="btn btn-primary" href="#" role="button">swal</a> --}}
    </main>
    @include('contents.modals.modal_history')
    @auth
        @include('contents.modals.modal_rekap')
        @include('contents.modals.modal_bahan')
        @include('contents.modals.modal_kerusakan')
        @include('contents.modals.modal_satuan')
        @include('contents.modals.modal_lokasi')
        @include('contents.modals.modal_laboratorium')
    @endauth

    <a href="/" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up"></i></a>

    @include('layouts.footer')

    @include('scripts.script_footer')
    @include('scripts.script_datatable')
    @include('scripts.script_menu')

    @foreach ($satuans as $satuan)
        @include('scripts.script_satuan')
    @endforeach

    @foreach ($lokasis as $lokasi)
        @include('scripts.script_lokasi')
    @endforeach

    @foreach ($laboratoriums as $laboratorium)
        @include('scripts.script_laboratorium')
    @endforeach


</body>

</html>
