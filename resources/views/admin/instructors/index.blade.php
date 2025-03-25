@extends('admin.layout')

@section('content')
<div class="container mx-auto px-4" x-data="instructorModal()">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Instructors</h1>
        <button @click="openModal('create')" 
                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Add New
        </button>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach($instructors as $instructor)
        <div class="bg-white rounded-lg shadow p-4">
            <img src="{{ asset('storage/'.$instructor->profile_image) }}" alt="{{ $instructor->name }}" 
                 class="h-32 w-32 mx-auto rounded-full object-cover mb-2">
            <h3 class="text-lg font-semibold text-center">{{ $instructor->name }}</h3>
            <p class="text-gray-600 text-sm text-center">{{ $instructor->qualifications }}</p>
            <div class="mt-2 flex justify-center space-x-2">
                <button @click="openModal('edit', {{ Js::from($instructor->toArray()) }})" 
                        class="text-blue-500 hover:text-blue-600">
                    Edit
                </button>
                <form action="{{ route('admin.instructors.destroy', $instructor) }}" method="POST">
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

    <!-- Instructor Modal -->
    <div x-show="isOpen" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4" 
         x-transition.opacity>
        <div class="bg-white rounded-lg shadow-xl w-full max-w-xl p-6" @click.stop>
            <h3 class="text-xl font-bold mb-4" x-text="modalTitle"></h3>
            <form :action="actionUrl" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" x-model="method">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Profile Image</label>
                            <input type="file" name="profile_image" @change="handleImageUpload" 
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                                   :required="method === 'POST'">
                            <template x-if="formData.profile_image">
                                <img :src="formData.profile_image" 
                                     class="mt-2 h-32 w-32 rounded-full object-cover mx-auto">
                            </template>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Full Name</label>
                            <input type="text" name="name" x-model="formData.name" 
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Qualifications</label>
                            <input type="text" name="qualifications" x-model="formData.qualifications" 
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Experience (JSON)</label>
                            <textarea name="experience" x-model="formData.experience" 
                                      class="mt-1 block w-full rounded-md border-gray-300 shadow-sm h-24" required></textarea>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">LinkedIn URL</label>
                            <input type="url" name="linkedin" x-model="formData.linkedin" 
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                        </div>
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
    function instructorModal() {
        return {
            isOpen: false,
            modalTitle: '',
            actionUrl: '',
            method: 'POST',
            formData: {
                name: '',
                qualifications: '',
                experience: '',
                linkedin: '',
                profile_image: null
            },
            openModal(action, instructor = null) {
                this.resetForm();
                
                if (action === 'create') {
                    this.modalTitle = 'Add New Instructor';
                    this.actionUrl = '{{ route('admin.instructors.store') }}';
                    this.method = 'POST';
                } else if (action === 'edit' && instructor) {
                    this.modalTitle = 'Edit Instructor';
                    this.actionUrl = `{{ route('admin.instructors.update', '') }}/${instructor.id}`;
                    this.method = 'PUT';
                    this.formData = {
                        ...instructor,
                        profile_image: instructor.profile_image ? 
                            `{{ asset('storage/${instructor.profile_image}') }}` : null
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
                    qualifications: '',
                    experience: '',
                    linkedin: '',
                    profile_image: null
                };
                const fileInput = document.querySelector('input[type="file"]');
                if (fileInput) fileInput.value = '';
            },
            handleImageUpload(e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        this.formData.profile_image = e.target.result;
                    };
                    reader.readAsDataURL(file);
                }
            }
        }
    }
    </script>
</div>
@endsection