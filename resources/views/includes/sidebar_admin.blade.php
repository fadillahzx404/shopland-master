<ul class="min-h-full space-y-2">
    <li><a href="{{ route('dashboard-admin') }}"
            class=" hover:bg-green-200 transition duration-300 hover:scale-90 mx-2 {{ request()->is('admin') ? 'bg-accent text-white  font-semibold' : 'text-gray-400' }}"><i
                class="fa-solid fa-house"></i>Dashboard</a>
    </li>
    <li><a href="{{ route('banners.index') }}"
            class=" hover:bg-green-200 transition duration-300 hover:scale-90 mx-2 {{ request()->is('admin/banners*') ? 'bg-accent text-white  font-semibold' : 'text-gray-400' }}"><i
                class="fa-solid fa-images"></i>Banners</a>
    </li>
    <li><a href="{{ route('products.index') }}"
            class="hover:font-semibold hover:bg-green-200 transition duration-300 hover:scale-90 mx-2 {{ request()->is('admin/products*') ? 'bg-accent text-white  font-semibold' : 'text-gray-400' }}"><i
                class="fa-solid fa-store"></i>Products</a>
    </li>
    <li><a href="{{ route('category.index') }}"
            class="hover:font-semibold hover:bg-green-200 transition duration-300 hover:scale-90 mx-2 {{ request()->is('admin/category*') ? 'bg-accent text-white  font-semibold' : 'text-gray-400' }}"><i
                class="fa-solid fa-list-ol"></i>Categories Product</a>
    </li>
    <li><a href="{{ route('code-vouchers.index') }}"
            class="hover:font-semibold hover:bg-green-200 transition duration-300 hover:scale-90 mx-2 {{ request()->is('admin/code-vouchers*') ? 'bg-accent text-white  font-semibold' : 'text-gray-400' }}"><i class="fa-solid fa-tags"></i>Code Voucher</a>
    </li>
    <li><a href=""
            class="hover:font-semibold hover:bg-green-200 transition duration-300 hover:scale-90 mx-2 {{ request()->is('') ? 'bg-accent text-white  font-semibold' : 'text-gray-400' }}"><i
                class="fa-solid fa-money-bill-wave fa-sm"></i>Payment Customer</a>
    </li>
    <li><a href=""
            class="hover:font-semibold hover:bg-green-200 transition duration-300 hover:scale-90 mx-2 {{ request()->is('') ? 'bg-accent text-white  font-semibold' : 'text-gray-400' }}"><i
                class="fa-solid fa-file-invoice"></i>Report</a>
    </li>
</ul>
