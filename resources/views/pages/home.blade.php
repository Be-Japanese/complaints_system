<x-new-guest-layout>
    <livewire:carousel />
    <section class="relative -mt-[113px] min-w-fit px-6 pb-16 md:pb-24">
        <div class="z-1">
            <div class="d-flex" id="reserve-form">
                <div class="mx-auto md:w-5/6">
                    <div class="lg:col-span-10">
                        <div class="rounded-md border-0 bg-white p-3 shadow dark:bg-gray-800">
                            <!-- Hero -->
                            <div class="relative overflow-hidden">
                                <div class="mx-auto max-w-[85rem] px-4 py-10 sm:px-6 sm:py-24 lg:px-8">
                                    @livewire('pre-form')
                                </div>
                            </div>
                            <!-- End Hero -->
                        </div>
                    </div><!--ed col-->
                </div>
            </div><!--end grid-->
        </div><!--end container-->
    </section>
    <div class="py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            @livewire('statistic-component')
        </div>
    </div>
</x-new-guest-layout>
