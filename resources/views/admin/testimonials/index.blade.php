@extends('admin.layout')

@section('content')
<div class="container mx-auto px-4" x-data="testimonialModal()">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Testimonials</h1>
        <button @click="openModal('create')" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Add New
        </button>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        @foreach($testimonials as $testimonial)
        <div class="bg-white rounded-lg shadow p-4">
            <div class="flex items-start mb-4">
                <img src="{{ asset('storage/'.$testimonial->image) }}" alt="{{ $testimonial->name }}"
                    class="w-16 h-16 rounded-full object-cover mr-4">
                <div>
                    <h3 class="font-semibold">{{ $testimonial->name }}</h3>
                    <h3 class="font-semibold mt-2">{{ $testimonial->title }}</h3>
                    <p class="text-gray-600 mt-2">{{ $testimonial->description }}</p>
                </div>
            </div>
            <div class="flex space-x-2">
                <button @click="openModal('edit', {{ Js::from($testimonial->toArray()) }})"
                    class="text-blue-500 hover:text-blue-600">
                    Edit
                </button>
                <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST">
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

    <!-- Testimonial Modal -->
    <div x-show="isOpen" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4"
        x-transition.opacity>
        <div class="bg-white rounded-lg shadow-xl w-full max-w-md p-6" @click.stop>
            <h3 class="text-xl font-bold mb-4" x-text="modalTitle"></h3>
            <form :action="actionUrl" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" x-model="method">

                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Name</label>
                        <input type="text" name="name" x-model="formData.name"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Title</label>
                        <input type="text" name="title" x-model="formData.title"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Testimonial Text</label>
                        <textarea name="description" x-model="formData.description"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm h-32" required></textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Profile Image</label>
                        <input type="file" name="image" @change="handleImageUpload"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                            :required="method === 'POST'">
                        <template x-if="formData.image">
                            <img :src="formData.image" class="mt-2 w-16 h-16 rounded-full object-cover">
                        </template>
                    </div>
                </div>

                <div class="mt-6 flex justify-end space-x-3">
                    <button type="button" @click="closeModal" class="px-4 py-2 text-gray-600 hover:text-gray-800">
                        Cancel
                    </button>
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function testimonialModal() {
        return {
            isOpen: false,
            modalTitle: '',
            actionUrl: '',
            method: 'POST',
            formData: {
                name: '',
                text: '',
                image: null
            },
            openModal(action, testimonial = null) {
                this.resetForm();
                
                if (action === 'create') {
                    this.modalTitle = 'Add New Testimonial';
                    this.actionUrl = '{{ route('admin.testimonials.store') }}';
                    this.method = 'POST';
                } else if (action === 'edit' && testimonial) {
                    this.modalTitle = 'Edit Testimonial';
                    this.actionUrl = `{{ route('admin.testimonials.update', '') }}/${testimonial.id}`;
                    this.method = 'PUT';
                    this.formData = {
                        ...testimonial,
                        title: testimonial.title,
                        image: testimonial.image ? 
                            `{{ asset('storage/${testimonial.image}') }}` : null
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
                    title: '',
                    description: '',
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