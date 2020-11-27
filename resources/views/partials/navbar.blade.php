<nav class="bg-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex items-center justify-between h-16">
        <div class="flex items-center">
            <div class="flex-shrink-0">
                <img class="h-8 w-8" src="https://tailwindui.com/img/logos/workflow-mark-indigo-500.svg" alt="Workflow">
            </div>
            <div class="hidden md:block">
                <div class="ml-10 flex items-baseline space-x-4">
                <a href="{{ route('dashboard') }}" class="px-3 py-2 rounded-md text-sm font-medium 
                text-white bg-gray-900">Dashboard</a>
    
                <a href="{{ route('forms') }}" class="px-3 py-2 rounded-md text-sm font-medium text-gray-300 
                hover:text-white hover:bg-gray-700">Forms</a>
                </div>
            </div>
        </div>
        <div class="hidden md:block">
            <div class="ml-4 flex items-center md:ml-6">
                @auth
                <button class="bg-gray-800 p-1 rounded-full text-gray-400 hover:text-white focus:outline-none 
                focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
                    <span class="sr-only">View notifications</span>
                    <!-- Heroicon name: bell -->
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" 
                    stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 
                    6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                </button>
              
                <!-- Profile dropdown -->
                <div class="ml-3 relative">
                    <div>
                        <button class="max-w-xs bg-gray-800 rounded-full flex items-center text-sm focus:outline-none
                        focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" id="user-menu" aria-haspopup="true">
                            <span class="sr-only">Open user menu</span>
                            <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                        </button>
                    </div>
                
                    <div class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white
                    ring-1 ring-black ring-opacity-5" role="menu" aria-orientation="vertical" aria-labelledby="user-menu">
                                        
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                        role="menuitem">{{ auth()->user()->name }} </a>
        
                        <form action="{{ route('logout') }}" method="post" class="inline">
                            @csrf
                            <button class="block px-4 py-2 text-sm text-gray-700 text-left hover:bg-gray-100 w-full"
                            role="menuitem">Logout</button>
                        </form>
                    </div>
                </div>
                @endauth
              
                @guest
                <a href="{{ route('login') }}" class="px-3 py-2 rounded-md text-sm font-medium text-gray-300 
                hover:text-white hover:bg-gray-700">Login</a>

                <a href="{{ route('register') }}" class="px-3 py-2 rounded-md text-sm font-medium text-gray-300 
                hover:text-white hover:bg-gray-700">Register</a>
                @endguest
            </div>
        </div>
      </div>
    </div>
</nav>