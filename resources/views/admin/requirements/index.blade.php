@extends('admin.layout')

@section('content')
<div class="container mx-auto px-4" x-data="requirementModal()">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">requirements</h1>
        <button @click="openModal('create')" 
                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Add New
        </button>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach($requirements as $requirement)
        <div class="bg-white rounded-lg shadow p-4">
            <img src="{{ asset('storage/'.$requirement->image) }}" alt="{{ $requirement->title }}" 
                 class="h-24 w-full object-contain mb-2">
            <h3 class="text-lg font-semibold text-center">{{ $requirement->title }}</h3>
            <div class="mt-2 flex justify-center space-x-2">
                <button @click="openModal('edit', {{ Js::from($requirement->toArray()) }})" 
                        class="text-blue-500 hover:text-blue-600">
                    Edit
                </button>
                <form action="{{ route('admin.requirement.destroy', $requirement) }}" method="POST">
                    @csrf @method('DELETE')
                    <button type="submit" class="text-red-500 hover:text-red-600" 
                            onclick="return confirm('Are you sure?')">
                        Delete
                    </button>
                </form>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Requirement Modal -->
    <div x-show="isOpen" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4" 
         x-transition.opacity>
        <div class="bg-white rounded-lg shadow-xl w-full max-w-md p-6" @click.stop>
            <h3 class="text-xl font-bold mb-4" x-text="modalTitle"></h3>
            <form :action="actionUrl" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" x-model="method">

                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Title</label>
                        <input type="text" name="title" x-model="formData.title" 
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Image</label>
                        <input type="file" name="image" @change="handleImageUpload" 
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                               :required="method === 'POST'">
                        <template x-if="formData.image">
                            <img :src="formData.image" class="mt-2 h-24 w-full object-contain">
                        </template>
                    </div>
                </div>

                <div class="mt-6 flex justify-end space-x-3">
                    <button type="button" @click="closeModal" 
                            class="px-4 py-2 text-gray-600 hover:text-gray-800">
                        Cancel
                    </button>
                    <button type="submit" 
                            class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
    function requirementModal() {
        return {
            isOpen: false,
            modalTitle: '',
            actionUrl: '',
            method: 'POST',
            formData: {
                title: '',
                image: null
            },
            openModal(action, requirement = null) {
                this.resetForm();
                
                if (action === 'create') {
                    this.modalTitle = 'Create Requirement';
                    this.actionUrl = '{{ route('admin.requirement.store') }}';
                    this.method = 'POST';
                } else if (action === 'edit' && requirement) {
                    this.modalTitle = 'Edit Requirement';
                    this.actionUrl = `{{ route('admin.requirement.update', '') }}/${requirement.id}`;
                    this.method = 'PUT';
                    this.formData = {
                        ...requirement,
                        image: requirement.image ? 
                            `{{ asset('storage/${requirement.image}') }}` : null
                    };
                }
                this.isOpen = true;
            },
            closeModal() {
                this.isOpen = false;
                this.resetForm();
            },
            resetForm() {
                this.formData = {
                    title: '',
                    image: null
                };
                const fileInput = document.querySelector('input[type="file"]');
                if (fileInput) fileInput.value = '';
            },
            handleImageUpload(e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        this.formData.image = e.target.result;
                    };
                    reader.readAsDataURL(file);
                }
            }
        }
    }
    </script>
</div>
@endsection