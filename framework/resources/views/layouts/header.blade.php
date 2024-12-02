<div class="flex items-center justify-between">
    <div class="relative w-1/2">
        <input class="w-full p-2 pl-10 text-gray-600 bg-gray-200 rounded-md focus:outline-none" placeholder="Search" type="text" />
        <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
    </div>
    <div class="flex items-center space-x-4">
        <i class="fas fa-bell text-gray-600"></i>
        <i class="fas fa-cog text-gray-600"></i>
        <div class="flex items-center space-x-2">
            <img 
                alt="User profile picture" 
                class="w-10 h-10 rounded-full object-cover" 
                src="{{ Auth::user()->profile_image }}" 
            />
            <span class="text-gray-800 ">{{ Auth::user()->name }}</span>
        </div>
    </div>
</div>