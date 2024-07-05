<div class="text-center">
    <h1 class="text-4xl font-bold text-gray-800 dark:text-neutral-100 sm:text-4xl">
        نموذج الشكاوى والمقترحات
    </h1>

    <form wire:submit="create" class="@if ($submitted) hidden @else block @endif mt-7">
        {{ $this->form }}

        <button type="submit"
            class="mt-8 inline-flex items-center justify-center rounded-md border border-transparent bg-gray-900 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white transition duration-150 ease-in-out hover:bg-gray-700 focus:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 active:bg-gray-900">
            إرسال
        </button>
    </form>

    <x-filament-actions::modals />
    <div class="@if ($submitted) block @else hidden @endif flex justify-center">
        <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script>
        <dotlottie-player src="https://lottie.host/03038a00-3e15-40e6-b12d-c9e1ff597697/oklJkSXEY7.json"
            background="transparent" speed="1" style="width: 300px; height: 300px;" loop autoplay></dotlottie-player>
    </div>

</div>
