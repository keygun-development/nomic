{!! \Keygun\Nomic\Creators\ViewCreator::layout(Str::plural($modelName)) !!}
{!! \Keygun\Nomic\Creators\ViewCreator::contentSection() !!}
    <div class="flex justify-between flex-wrap">
        <h1 class="text-4xl font-bold">
            {{ Str::plural($modelName) }}
        </h1>
        <a class="c-button c-button__blue">
            New
        </a>
    </div>
    <div class="mt-4 overflow-x-auto">
        <table class="w-full">
            <thead>
            {!! \Keygun\Nomic\Creators\ViewCreator::returnColumnLoop($columns) !!}
            </thead>
            <tbody>
            {!! \Keygun\Nomic\Creators\ViewCreator::returnModelLoop($columns) !!}
            </tbody>
        </table>
    </div>
{!! \Keygun\Nomic\Creators\ViewCreator::endSection() !!}
