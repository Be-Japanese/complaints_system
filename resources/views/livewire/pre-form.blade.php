<div class="text-center">
    <h1 class="text-4xl font-bold text-gray-800 dark:text-neutral-100 sm:text-6xl">
        نحافظ على بيئتنا، لنعيش في صحة ونقاء
    </h1>

    <p class="mt-6 text-gray-600 dark:text-neutral-400">
        قسم الشكاوى والإقتراحات
    </p>

    <div class="relative mx-auto mt-7 max-w-xl sm:mt-12">
        <!-- Form -->
        <form wire:submit.prevent="save">
            <div
                class="relative z-10 flex space-x-3 rounded-lg border bg-white p-3 shadow-lg shadow-gray-100 dark:border-neutral-700 dark:bg-gray-700 dark:shadow-gray-900/20">
                <div class="me-3 flex-[1_0_0%]">
                    <label for="hs-search-article-1" class="block text-sm font-medium text-gray-700 dark:text-white"><span
                            class="sr-only">
                            مقترح أوشكوى
                        </span>
                    </label>
                    <input wire:model="title" type="text" name="hs-search-article-1" id="hs-search-article-1"
                        class="block w-full rounded-lg border-transparent px-4 py-2.5 focus:border-blue-500 focus:ring-blue-500 dark:border-transparent dark:bg-gray-700 dark:text-neutral-100 dark:placeholder-neutral-200 dark:focus:ring-neutral-600"
                        placeholder="مقترح أوشكوى">
                </div>
                <div class="flex-[0_0_auto]">
                    <button type="submit"
                        class="inline-flex size-[46px] items-center justify-center gap-x-2 rounded-lg border border-transparent bg-blue-600 text-sm font-semibold text-white hover:bg-blue-700 disabled:pointer-events-none disabled:opacity-50">
                        @svg('heroicon-o-plus', 'size-5 flex-shrink-0')
                    </button>
                </div>
            </div>
        </form>
        @error('title')
            <p class="text-danger-500">
                {{ __($message) }}
            </p>
        @enderror
        <!-- End Form -->

        <!-- SVG Element -->
        <div class="absolute end-0 top-0 hidden -translate-y-10 translate-x-[861%] md:block">
            <svg class="h-auto w-16 text-orange-500" width="121" height="135" viewBox="0 0 121 135" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path d="M5 16.4754C11.7688 27.4499 21.2452 57.3224 5 89.0164" stroke="currentColor" stroke-width="10"
                    stroke-linecap="round" />
                <path d="M33.6761 112.104C44.6984 98.1239 74.2618 57.6776 83.4821 5" stroke="currentColor"
                    stroke-width="10" stroke-linecap="round" />
                <path d="M50.5525 130C68.2064 127.495 110.731 117.541 116 78.0874" stroke="currentColor"
                    stroke-width="10" stroke-linecap="round" />
            </svg>
        </div>
        <!-- End SVG Element -->

        <!-- SVG Element -->
        <div class="absolute bottom-0 start-0 hidden -translate-x-[305%] translate-y-12 md:block">
            <svg class="h-auto w-40 text-cyan-500" width="347" height="188" viewBox="0 0 347 188" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M4 82.4591C54.7956 92.8751 30.9771 162.782 68.2065 181.385C112.642 203.59 127.943 78.57 122.161 25.5053C120.504 2.2376 93.4028 -8.11128 89.7468 25.5053C85.8633 61.2125 130.186 199.678 180.982 146.248L214.898 107.02C224.322 95.4118 242.9 79.2851 258.6 107.02C274.299 134.754 299.315 125.589 309.861 117.539L343 93.4426"
                    stroke="currentColor" stroke-width="7" stroke-linecap="round" />
            </svg>
        </div>
        <!-- End SVG Element -->
    </div>

    <div class="mt-10 sm:mt-20">
        @foreach ($categorise as $category)
            <label for="option-{{ $loop->index }}"
                class="@if ($categorise_form == $category->id) bg-orange-300 text-orange-900 dark:bg-orange-200 @else bg-white dark:bg-gray-900 dark:border-gray-700 dark:text-gray-200 @endif m-1 inline-flex cursor-pointer items-center gap-x-2 rounded-lg border border-gray-200 px-4 py-3 text-sm font-medium shadow-sm hover:bg-gray-50 disabled:pointer-events-none disabled:opacity-50 dark:hover:bg-neutral-800">
                <input wire:model.live="categorise_form" type="radio" name="option" value="{{ $category->id }}"
                    id="option-{{ $loop->index }}" class="peer hidden">
                @svg($category->icon, 'size-4 flex-shrink-0')
                {{ $category->name }}
            </label>
        @endforeach
    </div>
</div>
