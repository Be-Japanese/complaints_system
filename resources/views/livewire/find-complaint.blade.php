<section class="relative -mt-[212px] min-w-fit px-6 pb-16 md:pb-24">
    <div class="z-1">
        <div class="d-flex" id="reserve-form">
            <div class="mx-auto md:w-5/6">
                <div class="lg:col-span-10">
                    <div class="rounded-md border-0 bg-white p-3 shadow dark:bg-gray-800">
                        <div class="relative overflow-hidden">
                            <div class="mx-auto max-w-[85rem] px-4 py-10 sm:px-6 sm:py-24 lg:px-8">
                                <div class="text-center">
                                    <h1 class="text-4xl font-bold text-gray-800 dark:text-neutral-100 sm:text-6xl">
                                        شفافية في متابعة الشكاوى والمقترحات
                                    </h1>
                                    <p class="mt-6 text-gray-600 dark:text-neutral-400">
                                        قسم الشكاوى والإقتراحات
                                    </p>
                                    <div class="relative mx-auto mt-7 max-w-xl sm:mt-12">
                                        <form wire:submit.prevent="find" dir="ltr">
                                            <div
                                                class="relative z-10 flex space-x-3 rounded-lg border bg-white p-3 shadow-lg shadow-gray-100 dark:border-neutral-700 dark:bg-gray-700 dark:shadow-gray-900/20">
                                                <div class="me-3 flex-[1_0_0%]">
                                                    <label for="hs-search-article-1"
                                                        class="block text-sm font-medium text-gray-700 dark:text-white"><span
                                                            class="sr-only">
                                                            مقترح أوشكوى
                                                        </span>
                                                    </label>
                                                    <input wire:model="phone" type="text" name="hs-search-article-1"
                                                        id="hs-search-article-1"
                                                        class="block w-full rounded-lg border-transparent px-4 py-2.5 focus:border-blue-500 focus:ring-blue-500 dark:border-transparent dark:bg-gray-700 dark:text-neutral-100 dark:placeholder-neutral-200 dark:focus:ring-neutral-600"
                                                        placeholder="البحث باستخدام رقم الهاتف">
                                                </div>
                                                <div class="flex-[0_0_auto]">
                                                    <button type="submit"
                                                        class="inline-flex size-[46px] items-center justify-center gap-x-2 rounded-lg border border-transparent bg-blue-600 text-sm font-semibold text-white hover:bg-blue-700 disabled:pointer-events-none disabled:opacity-50">
                                                        @svg('heroicon-o-magnifying-glass', 'size-5 flex-shrink-0')
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                        @error('phone')
                                            <p class="text-danger-500">
                                                {{ __($message) }}
                                            </p>
                                        @enderror
                                        <div
                                            class="absolute end-0 top-0 hidden -translate-y-10 translate-x-[861%] md:block">
                                            <svg class="h-auto w-16 text-orange-500" width="121" height="135"
                                                viewBox="0 0 121 135" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5 16.4754C11.7688 27.4499 21.2452 57.3224 5 89.0164"
                                                    stroke="currentColor" stroke-width="10" stroke-linecap="round" />
                                                <path d="M33.6761 112.104C44.6984 98.1239 74.2618 57.6776 83.4821 5"
                                                    stroke="currentColor" stroke-width="10" stroke-linecap="round" />
                                                <path d="M50.5525 130C68.2064 127.495 110.731 117.541 116 78.0874"
                                                    stroke="currentColor" stroke-width="10" stroke-linecap="round" />
                                            </svg>
                                        </div>
                                        <div
                                            class="absolute bottom-0 start-0 hidden -translate-x-[305%] translate-y-12 md:block">
                                            <svg class="h-auto w-40 text-cyan-500" width="347" height="188"
                                                viewBox="0 0 347 188" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M4 82.4591C54.7956 92.8751 30.9771 162.782 68.2065 181.385C112.642 203.59 127.943 78.57 122.161 25.5053C120.504 2.2376 93.4028 -8.11128 89.7468 25.5053C85.8633 61.2125 130.186 199.678 180.982 146.248L214.898 107.02C224.322 95.4118 242.9 79.2851 258.6 107.02C274.299 134.754 299.315 125.589 309.861 117.539L343 93.4426"
                                                    stroke="currentColor" stroke-width="7" stroke-linecap="round" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-10">

        <div role="status" class="flex justify-center" wire:loading wire:target="find">
            <svg aria-hidden="true" class="h-8 w-8 animate-spin fill-blue-600 text-gray-200 dark:text-gray-600"
                viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                    fill="currentColor" />
                <path
                    d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                    fill="currentFill" />
            </svg>
            <span class="sr-only">Loading...</span>
        </div>

        <div class="grid grid-cols-1 gap-[30px] md:grid-cols-2 lg:grid-cols-2">
            @foreach ($complaints as $complaint)
                <div
                    class="group flex h-full flex-col rounded-lg bg-white shadow transition-all duration-500 hover:shadow-lg dark:bg-gray-800 dark:shadow-gray-700">
                    <div class="flex items-center justify-between p-6">
                        <div class="flex items-center">
                            <div class="ms-3">
                                <div
                                    class="block text-[16px] font-semibold transition-all duration-500 dark:text-gray-100">
                                    {{ $complaint->category->name }}
                                </div>
                                <span class="block text-sm text-slate-400">
                                    {{ $complaint->created_at->diffForHumans() }}
                                </span>
                            </div>
                        </div>
                        <div
                            class="btn btn-icon btn-lg rounded-xl border border-slate-100 bg-emerald-600/5 p-2 text-emerald-600 dark:border-slate-800">
                            {{ __($complaint->status) }}
                        </div>
                    </div>

                    <div
                        class="flex-grow items-center justify-between border-t border-gray-100 p-6 dark:border-gray-800 lg:flex">
                        <div>
                            <div class="text-lg font-semibold dark:text-gray-200">
                                {{ $complaint->title }}
                            </div>
                            <p class="mt-1 text-slate-400">
                                {{ $complaint->description }}
                            </p>
                        </div>
                    </div>

                    <div class="flex items-center justify-between rounded-b-lg bg-slate-50 px-6 py-2 dark:bg-gray-700">
                        <div>
                            <span class="inline-block font-semibold dark:text-gray-200">
                                {{ $complaint->name }}
                            </span>
                        </div>
                        <span class="me-1 inline-block text-slate-400">
                            {{ $complaint->address }}
                        </span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
