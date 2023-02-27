@php
    use Illuminate\Support\Facades\Schema;

    $routes = config('app.nomic.tables') ??
    Schema::getConnection()->getDoctrineSchemaManager()->listTableNames();
@endphp

<div class="bg-[#021d26] rounded-br-xl rounded-bl-xl md:rounded-bl-none md:rounded-r-xl md:min-h-screen py-4 md:py-12">
    <div class="xl:w-10/12 w-11/12 mx-auto">
        <div class="flex flex-row justify-between md:flex-col items-center lg:items-start md:space-y-8">
            <a class="duration-300 hover:text-white text-lg font-semibold flex items-center
            {{ request()->routeIs('nomic.index') ? 'text-white' : 'text-gray-400'}}"
               href="/nomic">
                <p class="hidden lg:block">
                    Dashboard
                </p>
            </a>
            @foreach($routes as $route)
                <x-nomic::sidebar-link
                    :route="$route"
                ></x-nomic::sidebar-link>
            @endforeach
        </div>
    </div>
</div>
