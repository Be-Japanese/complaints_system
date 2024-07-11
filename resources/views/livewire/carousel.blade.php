<div>
    @if (!empty($advertisements))
        <div class="carousel relative mx-auto w-full max-w-full" x-data="carouselData(@js($advertisements))">
            <div class="relative h-[50vh] overflow-hidden">
                <template x-for="(advertisement, adIndex) in advertisements" :key="adIndex">
                    <div class="absolute inset-0 transform transition-all duration-700" x-show="currentAd === adIndex"
                        :style="{ transform: `translateX(${(adIndex - currentAd) * 100}%)` }">
                        <template x-for="(image, imgIndex) in advertisement.images" :key="imgIndex">
                            <img :src="image" class="h-full w-full object-cover">
                        </template>
                        <div id="kkkk"
                            class="absolute bottom-56 left-auto right-40 z-50 bg-gray-900 bg-opacity-50 p-4 text-white">
                            <h3 x-text="advertisement.title" class="text-2xl font-bold"></h3>
                            <p x-text="advertisement.description" class="text-sm"></p>
                        </div>
                    </div>
                </template>
            </div>
            <div class="absolute inset-0 flex justify-between">
                <button @click="prevAd"
                    class="m-4 rounded-full bg-gray-800/50 p-2 text-white shadow-lg hover:bg-gray-700 focus:outline-none">❮</button>
                <button @click="nextAd"
                    class="m-4 rounded-full bg-gray-800/50 p-2 text-white shadow-lg hover:bg-gray-700 focus:outline-none">❯</button>
            </div>
            <div class="absolute bottom-0 flex w-full justify-center pb-4">
                <template x-for="(advertisement, index) in advertisements" :key="index">
                    <div @click="currentAd = index"
                        :class="{ 'bg-blue-600': currentAd === index, 'bg-gray-400': currentAd !== index }"
                        class="mx-2 h-3 w-3 transform cursor-pointer rounded-full transition-all duration-500 hover:scale-125">
                    </div>
                </template>
            </div>
        </div>
    @else
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
    @endif
</div>

<script>
    function carouselData(advertisements) {
        return {
            advertisements,
            currentAd: 0,
            prevAd() {
                this.currentAd = (this.currentAd === 0) ? this.advertisements.length - 1 : this.currentAd - 1;
            },
            nextAd() {
                this.currentAd = (this.currentAd === this.advertisements.length - 1) ? 0 : this.currentAd + 1;
            }
        }
    }
</script>
