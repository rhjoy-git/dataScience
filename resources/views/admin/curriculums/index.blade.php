@extends('admin.layout')

@section('content')
<div class="container mx-auto px-4" x-data="curriculumModal()">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Curriculums</h1>
        <button @click="openModal('create')" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Add New
        </button>
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left">Week</th>
                    <th class="px-6 py-3 text-left">Title</th>
                    <th class="px-6 py-3 text-left">Instructor</th>
                    <th class="px-6 py-3 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($curriculums as $curriculum)
                <tr class="border-t">
                    <td class="px-6 py-4">{{ $curriculum->week }}</td>
                    <td class="px-6 py-4">{{ $curriculum->title }}</td>
                    <td class="px-6 py-4">{{ $curriculum->instructor }}</td>
                    <td class="px-6 py-4">
                        <button @click="openModal('edit', {{ $curriculum->toJson() }})"
                            class="text-blue-500 mr-2 hover:text-blue-600">
                            Edit
                        </button>
                        <form action="{{ route('admin.Curriculum.destroy', $curriculum) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-600"
                                onclick="return confirm('Are you sure?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Curriculum Modal -->
    <div x-show="isOpen" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 overflow-y-scroll"
        x-transition.opacity>
        <div class="bg-white rounded-lg shadow-xl w-full max-w-2xl p-6 absolute top-7" @click.stop>
            <h3 class="text-xl font-bold mb-4" x-text="modalTitle"></h3>
            <form :action="actionUrl" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" x-model="method">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Left Column -->
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Section Title</label>
                            <input type="text" name="section_title" x-model="formData.section_title"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Week</label>
                            <input type="text" name="week" x-model="formData.week"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Title</label>
                            <input type="text" name="title" x-model="formData.title"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Instructor</label>
                            <input type="text" name="instructor" x-model="formData.instructor"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Profile Image</label>
                            <input type="file" name="profile_image" @change="handleFileUpload"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            <template x-if="formData.profile_image">
                                <img :src="formData.profile_image" class="mt-2 h-20 w-20 object-cover rounded">
                            </template>
                        </div>
                    </div>
                </div>

                <!-- Lessons Section -->
                <div class="mt-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Lessons</label>
                    <template x-for="(lesson, index) in formData.lessons" :key="index">
                        <div class="flex gap-2 mb-2">
                            <div class="flex-1 grid grid-cols-2 gap-2">
                                <input type="text" x-model="lesson.day" :name="`lessons[${index}][day]`"
                                    placeholder="Day" class="rounded-md border-gray-300 shadow-sm">
                                <input type="text" x-model="lesson.topic" :name="`lessons[${index}][topic]`"
                                    placeholder="Topic" class="rounded-md border-gray-300 shadow-sm">
                            </div>
                            <button type="button" @click="removeLesson(index)" class="text-red-500 hover:text-red-700">
                                ✕
                            </button>
                        </div>
                    </template>
                    <button type="button" @click="addLesson" class="text-sm text-blue-500 hover:text-blue-700">
                        + Add Lesson
                    </button>
                </div>

                <!-- Form Actions -->
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
        function curriculumModal() {
    return {
        isOpen: false,
        modalTitle: '',
        actionUrl: '',
        method: 'POST',
        formData: {
            section_title: '',
            week: '',
            title: '',
            instructor: '',
            profile_image: null,
            lessons: [{ day: '', topic: '' }]
        },
        openModal(action, curriculum = null) {
            this.resetForm();
            
            if (action === 'create') {
                this.modalTitle = 'Create New Curriculum';
                this.actionUrl = '{{ route('admin.Curriculum.store') }}';
                this.method = 'POST';
            } else if (action === 'edit' && curriculum) {
                this.modalTitle = 'Edit Curriculum';
                this.actionUrl = `{{ route('admin.Curriculum.update', '') }}/${curriculum.id}`;
                this.method = 'PUT';
                this.formData = {
                    ...curriculum,
                    profile_image: curriculum.profile_image ? 
                        `{{ asset('storage/${curriculum.profile_image}') }}` : null,
                    lessons: JSON.parse(curriculum.lessons)
                };
            }
            this.isOpen = true;
        },
        closeModal() {
            this.isOpen = false;
        },
        resetForm() {
            this.formData = {
                section_title: '',
                week: '',
                title: '',
                instructor: '',
                profile_image: null,
                lessons: [{ day: '', topic: '' }]
            };
            const fileInput = document.querySelector('input[type="file"]');
            if (fileInput) fileInput.value = '';
        },
        addLesson() {
            this.formData.lessons.push({ day: '', topic: '' });
        },
        removeLesson(index) {
            if (this.formData.lessons.length > 1) {
                this.formData.lessons.splice(index, 1);
            }
        },
        handleFileUpload(e) {
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