@extends('admin.layout')

@section('content')
<div class="container mx-auto px-4" x-data="toolModal()">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Tools</h1>
        <button @click="openModal('create')" 
                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Add New
        </button>
    </div>

    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        @foreach($tools as $tool)
       
        <div class="bg-white rounded-lg shadow p-4">
            <img src="{{ $tool->image }}" alt="{{ $tool->name }}" 
                 class="h-24 w-full object-contain mb-2">
            <h3 class="font-semibold text-center">{{ $tool->name }}</h3>
            <div class="mt-2 flex justify-center space-x-2">
                <button @click="openModal('edit', {{ Js::from($tool->toArray()) }})" 
                        class="text-blue-500 hover:text-blue-600">
                    Edit
                </button>
                <form action="{{ route('admin.tools.destroy', $tool) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500 hover:text-red-600" 
                            onclick="return confirm('Are you sure?')">
                        Delete
                    </button>
                </form>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Tool Modal -->
    <div x-show="isOpen" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4" 
         x-transition.opacity>
        <div class="bg-white rounded-lg shadow-xl w-full max-w-md p-6" @click.stop>
            <h3 class="text-xl font-bold mb-4" x-text="modalTitle"></h3>
            <form :action="actionUrl" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" x-model="method">

                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Tool Name</label>
                        <input type="text" name="name" x-model="formData.name" 
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Image</label>
                        <input type="file" name="image" @change="handleFileUpload" 
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                               :required="method === 'POST'">
                        <template x-if="formData.image">
                            <img :src="formData.image" class="mt-2 h-32 w-full object-contain">
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
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
    function toolModal() {
        return {
            isOpen: false,
            modalTitle: '',
            actionUrl: '',
            method: 'POST',
            formData: {
                name: '',
                image: null
            },
            openModal(action, tool = null) {
                this.resetForm();
                
                if (action === 'create') {
                    this.modalTitle = 'Add New Tool';
                    this.actionUrl = '{{ route('admin.tools.store') }}';
                    this.method = 'POST';
                } else if (action === 'edit' && tool) {
                    this.modalTitle = 'Edit Tool';
                    this.actionUrl = `{{ route('admin.tools.update', '') }}/${tool.id}`;
                    this.method = 'PUT';
                    this.formData = {
                        ...tool,
                        image: tool.image ? `{{ asset('storage') }}/${tool.image}` : null
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
                    name: '',
                    image: null
                };
                const fileInput = document.querySelector('input[type="file"]');
                if (fileInput) fileInput.value = '';
            },
            handleFileUpload(e) {
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