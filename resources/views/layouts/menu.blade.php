<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}"
        class="nav-link {{ (request()->is('home')) || (request()->is('home')) ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
</li>
@role('admin')
<li class="nav-header">MANAGE PENDAFTARAN</li>
<li
    class="nav-item {{ (request()->is('backend/admin/data-pendaftaran')) || (request()->is('users')) || (request()->is('roles')) || (request()->is('users/*')) || (request()->is('backend/data-siswa/*'))  || (request()->is('backend/data-siswa')) || (request()->is('backend/data-siswa/create')) || (request()->is('backend/data-siswa/{student}/edit')) ? 'active menu-open' : '' }}">
    <a href="#"
        class="nav-link {{ (request()->is('backend/admin/data-pendaftaran')) || (request()->is('users')) || (request()->is('roles')) || (request()->is('users/*')) || (request()->is('backend/data-siswa')) || (request()->is('backend/data-siswa/create')) || (request()->is('backend/data-siswa/{student}/edit'))  ? 'active' : '' }} ">
        <i class="fas fa-tasks"></i>
        <p>MENU ADMIN
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('datapendaftaran.index') }}"
                class="nav-link {{ (request()->is('backend/admin/data-pendaftaran')) || (request()->is('kepuasan/create')) || (request()->is('admin/data-pendaftaran/*'))  ? 'active menu-open' : '' }} ">
                <i class="fas fa-bars"></i>
                <p>Data Pendaftaran</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('users.index') }}"
                class="nav-link {{ (request()->is('users')) || (request()->is('users/*'))   ? 'active menu-open' : '' }} ">
                <i class="fas fa-bars"></i>
                <p>Data User</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('roles.index') }}"
                class="nav-link {{ (request()->is('roles')) || (request()->is('kepuasan/create')) || (request()->is('admin/data-pendaftaran/*')) || (request()->is('kepuasan-penilaian/*'))   ? 'active menu-open' : '' }} ">
                <i class="fas fa-bars"></i>
                <p>Data Role</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('datasiswa.index') }}"
                class="nav-link {{ (request()->is('backend/data-siswa')) || (request()->is('backend/data-siswa/*')) || (request()->is('backend/data-siswa/{student}/edit'))   ? 'active menu-open' : '' }}">
                <i class="fas fa-bars"></i>
                <p>Data Siswa</p>
            </a>
        </li>
    </ul>
</li>
<li class="nav-header">MANAGE MENU</li>
<li
    class="nav-item {{ (request()->is('backend/data-kejuaraan')) || (request()->is('backend/data-kejuaraan/create')) || (request()->is('backend/data-kejuaraan/*')) || (request()->is('backend/data-sabuk')) || (request()->is('backend/data-sabuk/*')) || (request()->is('backend/data-jadwal')) || (request()->is('backend/data-jadwal/*')) ||
    (request()->is('backend/data-jadwal/create')) || (request()->is('backend/data-absen')) || (request()->is('backend/history-level'))  ? 'active menu-open' : '' }}">
    <a href="#"
        class="nav-link {{ (request()->is('backend/data-kejuaraan')) || (request()->is('backend/data-kejuaraan/create')) || (request()->is('backend/data-kejuaraan/*')) || (request()->is('backend/data-sabuk')) || (request()->is('backend/data-sabuk/*')) || (request()->is('backend/data-jadwal')) || (request()->is('backend/data-jadwal/*')) ||
        (request()->is('backend/data-jadwal/create')) || (request()->is('backend/data-absen')) || (request()->is('backend/history-level'))  ? 'active' : '' }} ">
        <i class="fas fa-tasks"></i>
        <p>MENU
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('data-absen.index')}}"
                class="nav-link {{ (request()->is('backend/data-absen')) ? 'active' : '' }}">
                <i class="fas fa-bars"></i>
                <p>Data Absensi Siswa</p>
            </a>
        </li>
        <li
            class="nav-item {{ (request()->is('backend/data-sabuk')) || (request()->is('backend/data-sabuk/create')) || (request()->is('backend/data-sabuk/*')) || (request()->is('backend/history-level'))  ? 'active menu-open' : '' }}">
            <a href="#"
                class="nav-link {{ (request()->is('backend/data-sabuk')) || (request()->is('backend/data-sabuk/create')) || (request()->is('backend/data-sabuk/*')) || (request()->is('backend/history-level'))  ? 'active' : '' }}">
                <i class="fas fa-bars"></i>
                <p>
                    Data Sabuk
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('data-sabuk.index') }}"
                        class="nav-link {{ (request()->is('backend/data-sabuk')) || (request()->is('backend/data-sabuk/create')) || (request()->is('backend/data-sabuk/*'))  ? 'active' : '' }} ">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Master Sabuk</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('history-level.index') }}"
                        class="nav-link {{ (request()->is('backend/history-level')) || (request()->is('backend/history-level/create')) || (request()->is('backend/history-level/*'))  ? 'active' : '' }} ">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Input Sabuk Siswa</p>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a href="{{ route('data-kejuaraan.index') }}"
                class="nav-link  {{ (request()->is('backend/data-kejuaraan')) || (request()->is('backend/data-kejuaraan/*')) || (request()->is('backend/data-kejuaraan/create'))  ? 'active' : '' }} ">
                <i class="fas fa-bars"></i>
                <p>Data Kejuaraan Siswa</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('data-jadwal.index') }}"
                class="nav-link {{ (request()->is('backend/data-jadwal')) || (request()->is('backend/data-jadwal/*')) || (request()->is('backend/data-jadwal/create'))  ? 'active' : '' }} ">
                <i class="fas fa-bars"></i>
                <p>Data Jadwal Latihan</p>
            </a>
        </li>
    </ul>
</li>
<li class="nav-header">MANAGE CONTENT</li>
<li class="nav-item {{ (request()->is('backend/data-categori')) ? 'active menu-open' : '' }} ">
    <a href="#" class="nav-link {{ (request()->is('backend/data-categori'))  ? 'active' : '' }}">
        <i class="fas fa-tasks"></i>
        <p>MENU CONTENT
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="#" class="nav-link ">
                <i class="fas fa-bars"></i>
                <p>Menu Profile Dojo</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('data-categori.index') }}"
                class="nav-link {{ (request()->is('backend/data-categori')) ? 'active' : '' }} ">
                <i class="fas fa-bars"></i>
                <p>Menu Categori</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('data-galeri.index') }}" class="nav-link ">
                <i class="fas fa-bars"></i>
                <p>Menu Gallery</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link ">
                <i class="fas fa-bars"></i>
                <p>Menu Berita</p>
            </a>
        </li>
    </ul>
</li>
@endrole

<li class="nav-header">MANAGE SISWA</li>

<li
    class="nav-item {{ (request()->is('backend/profile/*')) || (request()->is('backend/data-siswa/mydata')) || (request()->is('backend/siswa-absen/absen')) || (request()->is('backend/data-siswa/*/profile')) || (request()->is('backend/siswa-absen/*/absen')) || (request()->is('backend/data-siswa/{student}/edit')) ? 'active menu-open' : '' }}">
    <a href="#"
        class="nav-link {{ (request()->is('backend/siswa-absen/absen')) || (request()->is('backend/siswa-absen/*/absen')) || (request()->is('backend/data-siswa/*/profile')) || (request()->is('backend/data-siswa/{student}/edit'))  ? 'active' : '' }} ">
        <i class="fas fa-tasks"></i>
        <p>MENU SISWA
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('mydata.index') }}"
                class="nav-link {{ (request()->is('backend/data-siswa/mydata')) || (request()->is('backend/siswa-absen/*/absen')) || (request()->is('backend/data-siswa/*/profile'))  ? 'active menu-open' : '' }} ">
                <i class="fas fa-bars"></i>
                <p>My Data</p>
            </a>
        </li>
    </ul>
</li>