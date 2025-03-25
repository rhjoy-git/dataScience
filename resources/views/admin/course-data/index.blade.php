@extends('admin.layout')

@section('content')
<div class="container mx-auto px-4" x-data="courseDataModal()">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Course Data</h1>
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left">Title</th>
                    <th class="px-6 py-3 text-left">Description</th>
                    <th class="px-6 py-3 text-left">Enrollment Open</th>
                    <th class="px-6 py-3 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($courseData as $data)
                <tr class="border-t">
                    <td class="px-6 py-4">{{ $data->title }}</td>
                    <td class="px-6 py-4">{{ Str::limit($data->description, 50) }}</td>
                    <td class="px-6 py-4">
                        <button @click="openModal('edit', {{ Js::from($data->toArray()) }})"
                            class="text-blue-500 mr-2 hover:text-blue-600">
                            Edit
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Course Data Modal -->
    <div x-show="isOpen" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4"
        x-transition.opacity>
        <div class="bg-white rounded-lg shadow-xl w-full max-w-2xl p-6" @click.stop>
            <h3 class="text-xl font-bold mb-4" x-text="modalTitle"></h3>
            <form :action="actionUrl" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" x-model="method">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Left Column -->
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Title</label>
                            <input type="text" name="title" x-model="formData.title"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" >
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Enrollment URL</label>
                            <input type="url" name="enrollment_url" x-model="formData.enrollment_url"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" >
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Enrollment Text</label>
                            <input type="text" name="enrollment_text" x-model="formData.enrollment_text"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" >
                        </div>

                    </div>

                    <!-- Right Column -->
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Organization Name</label>
                            <input type="text" name="organization_name" x-model="formData.organization_name"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" >
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Organization URL</label>
                            <input type="url" name="organization_url" x-model="formData.organization_url"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" >
                        </div>

                    </div>
                </div>

                <div class="mt-4">
                    <label class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea name="description" x-model="formData.description"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm h-32" ></textarea>
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
        function courseDataModal() {
        return {
            isOpen: false,
            modalTitle: '',
            actionUrl: '',
            method: 'POST',
            formData: {
                title: '',
                description: '',
                enrollment_url: '',
                enrollment_text: '',
                organization_name: '',
                organization_url: '',
                organization_logo: null
            },
            openModal(action, courseData = null) {
                this.resetForm();

            if (action === 'edit' && courseData) {
                    this.modalTitle = 'Edit Course Data';
                    this.actionUrl = `{{ route('admin.course-datas.update', '') }}/${courseData.id}`;
                    this.method = 'PUT';
                    this.formData = {
                        ...courseData,
                        organization_logo: courseData.organization_logo ? 
                            `{{ asset('storage/${courseData.organization_logo}') }}` : null
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
                    description: '',
                    enrollment_url: '',
                    enrollment_text: '',
                    organization_name: '',
                    organization_url: '',
                    organization_logo: null
                };
                const fileInput = document.querySelector('input[type="file"]');
                if (fileInput) fileInput.value = '';
            },
            handleLogoUpload(e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        this.formData.organization_logo = e.target.result;
                    };
                    reader.readAsDataURL(file);
                }
            }
        }
    }
    </script>
</div>
@endsection