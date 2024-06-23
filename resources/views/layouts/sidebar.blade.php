<aside class="main-sidebar sidebar-dark-orange elevation-4">
    <a href="/" class="brand-link">
        <img src="{{ asset('images/logo.jpeg') }}" alt="Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
    </a>
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-
                accordion="false">
                <x-nav-item title="Home" icon="fas fa-home" :routes="['home']" />


                @can('admin')
                    <x-nav-item title="Manajemen Mobil" icon="fas fa-car" :routes="['mobil.index', 'mobil.create', 'mobil.edit']" />
                    <x-nav-item title="Peminjaman Mobil" icon="fas fa-car-side" :routes="['pinjam.index', 'pinjam.create']" />
                    <x-nav-item title="Pengembalian Mobil" icon="fas fa-book-reader" :routes="['pengembalianmobil.index', 'pengembalianmobil.create', 'pengembalianmobil.edit']" />
                    <x-nav-item title="User" icon="fas fa-user-tie" :routes="['user.index', 'user.create', 'user.edit']" />
                @endcan
            </ul>
        </nav>
    </div>
</aside>
