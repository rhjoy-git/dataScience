@extends('admin.layout')

@section('content')
<div class="container mx-auto px-4" x-data="courseDetailModal()">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Course Details</h1>
        <button @click="openModal('create')" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Add New
        </button>
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left">Title</th>
                    <th class="px-6 py-3 text-left">Description</th>
                    <th class="px-6 py-3 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($courseDetails as $detail)
                <tr class="border-t">
                    <td class="px-6 py-4">{{ $detail->title }}</td>
                    <td class="px-6 py-4">{{ Str::limit($detail->description, 50) }}</td>
                    <td class="px-6 py-4">
                        <button @click="openModal('edit', {{ Js::from($detail->toArray()) }})"
                            class="text-blue-500 mr-2 hover:text-blue-600">
                            Edit
                        </button>
                        <form action="{{ route('admin.coursedetails.destroy', $detail) }}" method="POST" class="inline">
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

    <!-- Course Detail Modal -->
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
                            <label class="block text-sm font-medium text-gray-700">Section Title</label>
                            <input type="text" name="section_title" x-model="formData.section_title"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Title</label>
                            <input type="text" name="title" x-model="formData.title"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Icon</label>
                            <input type="file" name="icon" @change="handleFileUpload"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            <template x-if="formData.icon">
                                <img :src="formData.icon" class="mt-2 h-20 w-20 object-contain">
                            </template>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea name="description" x-model="formData.description"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm h-32" required></textarea>
                        </div>
                    </div>
                </div>

                <!-- Array Fields -->
                <div class="mt-4 space-y-4">
                    <div class="array-field">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Details</label>
                        <template x-for="(item, index) in formData.details" :key="index">
                            <div class="flex gap-2 mb-2">
                                <input type="text" x-model="formData.details[index]" name="details[]"
                                    class="flex-1 rounded-md border-gray-300 shadow-sm">
                                <button type="button" @click="removeDetail(index)"
                                    class="text-red-500 hover:text-red-700">
                                    ✕
                                </button>
                            </div>
                        </template>
                        <button type="button" @click="addDetail" class="text-sm text-blue-500 hover:text-blue-700">
                            + Add Detail
                        </button>
                    </div>

                    <div class="array-field">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Parts</label>
                        <template x-for="(part, index) in formData.parts" :key="index">
                            <div class="flex gap-2 mb-2">
                                <input type="text" x-model="formData.parts[index]" name="parts[]"
                                    class="flex-1 rounded-md border-gray-300 shadow-sm">
                                <button type="button" @click="removePart(index)"
                                    class="text-red-500 hover:text-red-700">
                                    ✕
                                </button>
                            </div>
                        </template>
                        <button type="button" @click="addPart" class="text-sm text-blue-500 hover:text-blue-700">
                            + Add Part
                        </button>
                    </div>

                    <div class="array-field">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Footer Items</label>
                        <template x-for="(item, index) in formData.footer" :key="index">
                            <div class="flex gap-2 mb-2">
                                <input type="text" x-model="formData.footer[index]" name="footer[]"
                                    class="flex-1 rounded-md border-gray-300 shadow-sm">
                                <button type="button" @click="removeFooterItem(index)"
                                    class="text-red-500 hover:text-red-700">
                                    ✕
                                </button>
                            </div>
                        </template>
                        <button type="button" @click="addFooterItem" class="text-sm text-blue-500 hover:text-blue-700">
                            + Add Footer Item
                        </button>
                    </div>
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
        function courseDetailModal() {
            return {
                isOpen: false,
                modalTitle: '',
                actionUrl: '',
                method: 'POST',
                formData: {
                    section_title: '',
                    icon: null,
                    title: '',
                    description: '',
                    details: [''],
                    parts: [''],
                    footer: ['']
                },
                openModal(action, courseDetail = null) {
                    // Always reset form first
                    this.resetForm();
                    
                    if (action === 'create') {
                        this.modalTitle = 'Create New Course Detail';
                        this.actionUrl = '{{ route('admin.coursedetails.store') }}';
                        this.method = 'POST';
                    } else if (action === 'edit' && courseDetail) {
                        this.modalTitle = 'Edit Course Detail';
                        this.actionUrl = `{{ route('admin.coursedetails.update', '') }}/${courseDetail.id}`;
                        this.method = 'PUT';
                        
                        const parseField = (field) => {
                            try {
                                return typeof field === 'string' ? JSON.parse(field) : field;
                            } catch (e) {
                                return [];
                            }
                        };
        
                        this.formData = {
                            ...courseDetail,
                            icon: courseDetail.icon ? 
                                `{{ asset('storage') }}/${courseDetail.icon}` : null,
                            details: parseField(courseDetail.details),
                            parts: parseField(courseDetail.parts),
                            footer: parseField(courseDetail.footer)
                        };
                    }
                    this.isOpen = true;
                },
                closeModal() {
                    this.isOpen = false;
                    this.resetForm(); // Immediate reset
                },
                resetForm() {
                    // Create fresh arrays to avoid reference issues
                    this.formData = {
                        section_title: '',
                        icon: null,
                        title: '',
                        description: '',
                        details: [''],
                        parts: [''],
                        footer: ['']
                    };
                    // Clear file input
                    const fileInput = document.querySelector('input[type="file"]');
                    if (fileInput) fileInput.value = '';
                },
            handleFileUpload(e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        this.formData.icon = e.target.result;
                    };
                    reader.readAsDataURL(file);
                }
            },
            addDetail() { this.formData.details.push(''); },
            removeDetail(index) { this.formData.details.splice(index, 1); },
            addPart() { this.formData.parts.push(''); },
            removePart(index) { this.formData.parts.splice(index, 1); },
            addFooterItem() { this.formData.footer.push(''); },
            removeFooterItem(index) { this.formData.footer.splice(index, 1); }
        }
    }
    </script>
</div>
@endsection