<x-new-guest-layout>
    <section class="relative table w-full bg-cover bg-top bg-no-repeat py-36"
        style="background-image: url('{{ asset('assets/images/new-cover.jpg') }}'); height: 40vh;">
        <div class="absolute inset-0 bg-amber-600/50"></div>
        <div class="container absolute flex max-w-full justify-center">
            <div class="mt-10 grid grid-cols-1 text-center">
                <h3 class="text-2xl font-medium leading-snug tracking-wide text-white md:text-3xl md:leading-snug">
                    الشركة العامة لخدمات النظافة مصراتة
                </h3>
            </div>
        </div>
    </section>
    <section class="relative -mt-[212px] min-w-fit px-6 pb-16 md:pb-24">
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
</x-new-guest-layout>
