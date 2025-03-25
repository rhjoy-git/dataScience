@extends('admin.layout')

@section('content')
<div class="bg-white rounded-lg shadow p-6" x-data="navLinkModal()">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Nav Links</h2>
        <button @click="openModal('create')" 
                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Add New
        </button>
    </div>

    <table class="w-full">
        <thead>
            <tr class="bg-gray-50">
                <th class="px-4 py-2 text-left">Route</th>
                <th class="px-4 py-2 text-left">Text</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($navlinks as $navlink)
            <tr class="border-t">
                <td class="px-4 py-2">{{ $navlink->route }}</td>
                <td class="px-4 py-2">{{ $navlink->text }}</td>
                <td class="px-4 py-2 text-center">
                    <button @click="openModal('edit', {{ $navlink }})" 
                            class="text-blue-500 hover:text-blue-600 mr-2">Edit</button>
                    <form action="{{ route('admin.navlinks.destroy', $navlink) }}" 
                          method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="text-red-500 hover:text-red-600"
                                onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Modal -->
    <div x-show="isOpen" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4" 
         x-transition:enter="ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6" @click.stop>
            <h3 class="text-lg font-bold mb-4" x-text="modalTitle"></h3>
            <form :action="actionUrl" method="POST">
                @csrf
                <template x-if="method !== 'POST'">
                    @method('PUT')
                </template>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Route</label>
                    <input type="text" name="route" x-model="formData.route" 
                           class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Text</label>
                    <input type="text" name="text" x-model="formData.text" 
                           class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="flex justify-end space-x-3">
                    <button type="button" @click="closeModal" 
                            class="px-4 py-2 text-gray-600 hover:text-gray-800 transition-colors">
                        Cancel
                    </button>
                    <button type="submit" 
                            class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition-colors">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener('alpine:init', () => {
    Alpine.data('navLinkModal', () => ({
        isOpen: false,
        modalTitle: '',
        actionUrl: '',
        method: 'POST',
        formData: { route: '', text: '' },

        openModal(action, navLink = null) {
            if (action === 'create') {
                this.modalTitle = 'Create New Navigation Link';
                this.actionUrl = '{{ route('admin.navlinks.store') }}';
                this.method = 'POST';
                this.formData = { route: '', text: '' };
            } else if (action === 'edit' && navLink) {
                this.modalTitle = 'Edit Navigation Link';
                this.actionUrl = `{{ route('admin.navlinks.update', '') }}/${navLink.id}`;
                this.method = 'PUT';
                this.formData = { 
                    route: navLink.route, 
                    text: navLink.text 
                };
            }
            this.isOpen = true;
        },

        closeModal() {
            this.isOpen = false;
            setTimeout(() => {
                this.formData = { route: '', text: '' };
            }, 300);
        }
    }));
});
</script>
@endsection