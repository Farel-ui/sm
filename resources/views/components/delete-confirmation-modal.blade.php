<div x-data="{ open: false }" @open-delete-modal.window="open = true" @keydown.escape.window="open = false" x-show="open" style="display: none;" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
    <div @click.away="open = false" class="bg-white rounded-lg shadow-lg max-w-md w-full p-6">
        <div class="flex items-center space-x-4">
            <div class="text-red-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-7 7-7-7" />
                </svg>
            </div>
            <h2 class="text-lg font-semibold text-gray-900">Anda yakin ingin menghapus data tersebut?</h2>
        </div>
        <p class="mt-2 text-sm text-gray-600">Tindakan ini tidak dapat dibatalkan.</p>
        <form :action="formAction" method="POST" class="mt-6 flex justify-end space-x-3" @submit.prevent="submitForm">
            @csrf
            @method('DELETE')
            <button type="button" @click="open = false" class="px-4 py-2 rounded-md bg-gray-300 text-gray-700 hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500">
                BATAL
            </button>
            <button type="submit" class="px-4 py-2 rounded-md bg-red-600 text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500">
                HAPUS
            </button>
        </form>
    </div>
</div>

<script>
    function submitForm() {
        this.$el.querySelector('form').submit();
    }
</script>
