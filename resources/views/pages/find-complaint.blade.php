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
    @livewire('find-complaint')
</x-new-guest-layout>
