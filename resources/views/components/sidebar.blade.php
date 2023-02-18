<div class="bg-[#021d26] rounded-b-xl md:rounded-bl-none md:rounded-r-xl md:min-h-screen py-4 md:py-12">
    <div class="xl:w-10/12 w-11/12 mx-auto">
        <div class="flex flex-row justify-between md:flex-col items-center lg:items-start md:space-y-8">
            <a class="duration-300 hover:text-white text-lg font-semibold flex items-center
            {{ request()->routeIs('dashboard') ? 'text-white' : 'text-gray-400'}}"
               href="/dashboard">
                <i class="fa-solid fa-house mr-2"></i>
                <p class="hidden lg:block">
                    Dashboard
                </p>
            </a>
            <a class="duration-300 hover:text-white text-lg font-semibold flex items-center
            {{ request()->routeIs('dashboard.news') ? 'text-white' : 'text-gray-400'}}"
               href="/dashboard/nieuws">
                <i class="fa-solid fa-newspaper mr-2"></i>
                <p class="hidden lg:block">
                    Nieuws
                </p>
            </a>
            <a class="duration-300 hover:text-white text-lg font-semibold flex items-center
            {{ request()->routeIs('dashboard.prices') ? 'text-white' : 'text-gray-400'}}"
               href="/dashboard/tarieven">
                <i class="fa-solid fa-tag mr-2"></i>
                <p class="hidden lg:block">
                    Tarieven
                </p>
            </a>
            <a class="duration-300 hover:text-white text-lg font-semibold flex items-center
            {{ request()->routeIs('dashboard.reservations') ? 'text-white' : 'text-gray-400'}}"
               href="/dashboard/reserveringen">
                <i class="fa-solid fa-bars mr-2"></i>
                <p class="hidden lg:block">
                    Reserveringen
                </p>
            </a>
            <a class="duration-300 hover:text-white text-lg font-semibold flex items-center
            {{ request()->routeIs('dashboard.regulations') ? 'text-white' : 'text-gray-400'}}"
               href="/dashboard/reglementen">
                <i class="fa-solid fa-list mr-2"></i>
                <p class="hidden lg:block">
                    Reglementen
                </p>
            </a>
            <a class="duration-300 hover:text-white text-lg font-semibold flex items-center
            {{ request()->routeIs('dashboard.impressions') ? 'text-white' : 'text-gray-400'}}"
               href="/dashboard/impressies">
                <i class="fa-solid fa-image mr-2"></i>
                <p class="hidden lg:block">
                    Impressies
                </p>
            </a>
            <a class="duration-300 hover:text-white text-lg font-semibold flex items-center
            {{ request()->routeIs('dashboard.users') ? 'text-white' : 'text-gray-400'}}"
               href="/dashboard/gebruikers">
                <i class="fa-solid fa-user mr-2"></i>
                <p class="hidden lg:block">
                    Gebruikers
                </p>
            </a>
        </div>
    </div>
</div>
