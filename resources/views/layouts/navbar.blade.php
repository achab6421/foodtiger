<nav class="bg-white shadow-lg">
    <div class="max-w-6xl mx-auto px-4">
        <div class="flex justify-between">
            <div class="flex space-x-7">
                <a href="{{ route('home') }}" class="flex items-center py-4">
                    <span class="font-semibold text-gray-500 text-lg">FoodTiger</span>
                </a>
            </div>
            
            <div class="flex items-center space-x-3">
                @if (session()->has('user'))
                    <a href="{{ route('dashboard') }}" class="py-2 px-3 text-gray-700 hover:text-gray-900">儀表板</a>
                    <a href="{{ route('logout') }}" class="py-2 px-3 bg-red-500 text-white rounded hover:bg-red-600">登出</a>
                @else
                    <a href="{{ route('login') }}" class="py-2 px-3 bg-blue-500 text-white rounded hover:bg-blue-600">登入</a>
                @endif
            </div>
        </div>
    </div>
</nav>
