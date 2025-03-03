@php
// Menyusun daftar menu utama
$menus = [
    (object)[
        "title" => "Dashboard",
        "path" => "/dashboard",
        "icon" => "fas fa-chart-line",
    ],
    // Tambahkan menu khusus untuk superadmin setelah menu Dashboard
    (object)[
        "title" => "Produk/Barang",
        "path" => "products",
        "icon" => "fas fa-cubes",
    ],
    (object)[
        "title" => "Kategori Produk",
        "path" => "categories",
        "icon" => "fas fa-th-large",
    ],
    (object)[
        "title" => "Supplier",
        "path" => "suppliers",
        "icon" => "fas fa-truck",
    ],
    (object)[
        "title" => "Barang Masuk",
        "path" => "barang_masuk",
        "icon" => "fas fa-arrow-down",
    ],
    (object)[
        "title" => "Barang Keluar",
        "path" => "barang_keluar",
        "icon" => "fas fa-arrow-up",
    ],
    // Menambahkan item logout
    (object)[
        "title" => "Logout",
        "path" => "logout",
        "icon" => "fas fa-sign-out-alt",
    ],
];

// Tambahkan menu khusus untuk superadmin setelah menu Dashboard
if (Auth::user()->role === 'superadmin') {
    array_splice($menus, 1, 0, [
        (object)[
            "title" => "Data Admin Gudang",
            "path" => "admingudang",
            "icon" => "fas fa-users-cog",
        ]
    ]);
}
@endphp

<aside style="width: 250px; background: #2C3E50; color: white; height: 100vh; position: fixed; top: 0; left: 0; padding: 15px; box-shadow: 3px 0 5px rgba(0,0,0,0.2); overflow-y: auto;">
    <!-- User Panel -->
    <div style="text-align: center; margin-bottom: 20px;">
        <img src="{{ asset('templates/dist/img/logo.png') }}" style="width: 80px; height: 80px; border-radius: 50%; box-shadow: 0px 4px 6px rgba(0,0,0,0.3);" alt="User Image">
    </div>

    <!-- Sidebar Menu -->
    <nav>
        <ul style="list-style: none; padding: 0; margin: 0;">
            @foreach($menus as $menu)
                <li style="margin-bottom: 10px;">
                    @if($menu->title == "Logout")
                        <!-- Logout form with POST method -->
                        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" style="display: flex; align-items: center; padding: 12px; text-decoration: none; color: white; background: transparent; border: none; width: 100%; text-align: left;">
                                <i class="{{ $menu->icon }}" style="margin-right: 10px;"></i>
                                <p style="margin: 0;">{{ $menu->title }}</p>
                            </button>
                        </form>
                    @else
                        <!-- Regular menu item -->
                        <a href="{{ !str_starts_with($menu->path, '/') ? '/' . $menu->path : $menu->path }}"
                            style="display: flex; align-items: center; padding: 12px; text-decoration: none; color: white; border-radius: 8px; background: {{ request()->is(trim($menu->path, '/')) ? '#1ABC9C' : 'transparent' }}; transition: 0.3s;">
                            <i class="{{ $menu->icon }}" style="margin-right: 10px;"></i>
                            <p style="margin: 0;">{{ $menu->title }}</p>
                        </a>
                    @endif
                </li>
            @endforeach
        </ul>
    </nav>
</aside>

<style>
    /* Hover effect on sidebar menu items */
    nav ul li a:hover,
    nav ul li button:hover {
        background-color: #16A085; /* A different color when hovered */
        transition: background-color 0.3s ease;
    }

    /* Styling the active link (highlighted when the page matches the link path) */
    nav ul li a,
    nav ul li button {
        transition: background-color 0.3s ease;
    }
</style>
