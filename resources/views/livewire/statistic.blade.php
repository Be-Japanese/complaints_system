<dl class="grid grid-cols-1 gap-x-8 gap-y-16 text-center lg:grid-cols-3">

    @foreach ($statistics as $statistic)
        <div class="mx-auto flex max-w-xs flex-col gap-y-4">
            <dt class="text-base leading-7 text-gray-600 dark:text-gray-500">{{ $statistic->description }}</dt>
            <dd class="order-first text-3xl font-semibold tracking-tight text-gray-900 dark:text-gray-200 sm:text-5xl">
                {{ $statistic->title }}
            </dd>
        </div>
    @endforeach
</dl>
