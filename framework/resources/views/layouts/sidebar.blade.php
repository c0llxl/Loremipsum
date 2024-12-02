<!-- Sidebar -->
<div class="w-64 bg-white shadow-md flex flex-col h-screen justify-between">
    <!-- Header -->
    <div>
        <div class="p-6">
            <div class="flex items-center space-x-2">
                <span class="iconify text-blue-600 text-2xl" data-icon="hugeicons:corn"></span>
                <span class="text-xl font-bold text-gray-800">
                    Manager<span class="text-blue-500">Farm</span>
                </span>
            </div>
        </div>

        <!-- Navigation -->
        <nav class="mt-6">
            <!-- Dashboard -->
            <a class="flex items-center p-3 rounded-md 
               {{ request()->routeIs('dashboard') ? 'bg-blue-500 text-white' : 'text-gray-600 hover:bg-gray-100' }}" 
               href="{{ route('dashboard') }}">
                <i class="fas fa-chart-pie {{ request()->routeIs('dashboard') ? 'text-white' : 'text-blue-500' }}"></i>
                <span class="ml-3">Dashboard</span>
            </a>

            <!-- Stock -->
            @can('view-stocks')
            <a class="flex items-center p-3 mt-2 rounded-md 
               {{ request()->routeIs('stock.index') ? 'bg-blue-500 text-white' : 'text-gray-600 hover:bg-gray-100' }}" 
               href="{{ route('stock.index') }}">
                <i class="fas fa-warehouse {{ request()->routeIs('stock.index') ? 'text-white' : 'text-green-500' }}"></i>
                <span class="ml-3">Stock</span>
            </a>
            @endcan

            <!-- Products -->
            @can('view-products')
            <a class="flex items-center p-3 mt-2 rounded-md 
               {{ request()->routeIs('products.index') ? 'bg-blue-500 text-white' : 'text-gray-600 hover:bg-gray-100' }}" 
               href="{{ route('products.index') }}">
                <i class="fas fa-shopping-basket {{ request()->routeIs('products.index') ? 'text-white' : 'text-purple-500' }}"></i>
                <span class="ml-3">Products</span>
            </a>
            @endcan

            <!-- Users -->
            @can('view-users')
            <a class="flex items-center p-3 mt-2 rounded-md 
               {{ request()->routeIs('users.index') ? 'bg-blue-500 text-white' : 'text-gray-600 hover:bg-gray-100' }}" 
               href="{{ route('users.index') }}">
                <i class="fas fa-user-friends {{ request()->routeIs('users.index') ? 'text-white' : 'text-indigo-500' }}"></i>
                <span class="ml-3">Users</span>
            </a>
            @endcan

            <!-- Permissions -->
            @can('view-permissions')
            <a class="flex items-center p-3 mt-2 rounded-md 
               {{ request()->routeIs('permissions.index') ? 'bg-blue-500 text-white' : 'text-gray-600 hover:bg-gray-100' }}" 
               href="{{ route('permissions.index') }}">
                <i class="fas fa-key {{ request()->routeIs('permissions.index') ? 'text-white' : 'text-orange-500' }}"></i>
                <span class="ml-3">Permissions</span>
            </a>
            @endcan

            <!-- Roles -->
            @can('view-roles')
            <a class="flex items-center p-3 mt-2 rounded-md 
               {{ request()->routeIs('roles.index') ? 'bg-blue-500 text-white' : 'text-gray-600 hover:bg-gray-100' }}" 
               href="{{ route('roles.index') }}">
                <i class="fas fa-user-shield {{ request()->routeIs('roles.index') ? 'text-white' : 'text-red-500' }}"></i>
                <span class="ml-3">Roles</span>
            </a>
            @endcan

            <!-- Reports -->
            @can('view-reports')
            <a class="flex items-center p-3 mt-2 rounded-md 
               {{ request()->routeIs('reports.index') ? 'bg-blue-500 text-white' : 'text-gray-600 hover:bg-gray-100' }}" 
               href="{{ route('reports.index') }}">
                <i class="fas fa-chart-line {{ request()->routeIs('reports.index') ? 'text-white' : 'text-teal-500' }}"></i>
                <span class="ml-3">Reports</span>
            </a>
            @endcan
        </nav>
    </div>

    <!-- Logout -->
    <div class="p-6">
        <form method="POST" action="{{ route('logout') }}" class="inline-block w-full">
            @csrf
            <button type="submit" class="flex items-center p-3 rounded-md text-gray-600 hover:bg-gray-100 w-full text-left focus:outline-none">
                <i class="fas fa-sign-out-alt text-red-500"></i>
                <span class="ml-3">Logout</span>
            </button>
        </form>
    </div>
</div>
