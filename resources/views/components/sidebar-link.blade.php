<a class="duration-300 hover:text-white text-lg font-semibold flex items-center
            {{ request()->routeIs('nomic.'.$route.'.index') ? 'text-white' : 'text-gray-400'}}"
   href="{{ '/nomic/'.$route }}">
    <p class="hidden lg:block">
        {{ ucfirst(Str::camel($route))  }}
    </p>
</a>
