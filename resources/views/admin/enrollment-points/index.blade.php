@extends('admin.layout')

@section('content')
<div class="container mx-auto px-4" x-data="enrollmentPointModal()">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Enrollment Points</h1>
        <button @click="openModal('create')" 
                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Add New
        </button>
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left">Point</th>
                    <th class="px-6 py-3 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($points as $point)
                <tr class="border-t">
                    <td class="px-6 py-4">{{ $point->point }}</td>
                    <td class="px-6 py-4">
                        <button @click="openModal('edit', {{ Js::from($point->toArray()) }})" 
                                class="text-blue-500 mr-2 hover:text-blue-600">
                            Edit
                        </button>
                        <form action="{{ route('admin.enrollmentpoints.destroy', $point) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
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

    <!-- Enrollment Point Modal -->
    <div x-show="isOpen" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4" 
         x-transition.opacity>
        <div class="bg-white rounded-lg shadow-xl w-full max-w-md p-6" @click.stop>
            <h3 class="text-xl font-bold mb-4" x-text="modalTitle"></h3>
            <form :action="actionUrl" method="POST">
                @csrf
                <input type="hidden" name="_method" x-model="method">

                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Point</label>
                        <input type="text" name="point" x-model="formData.point" 
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
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
    function enrollmentPointModal() {
        return {
            isOpen: false,
            modalTitle: '',
            actionUrl: '',
            method: 'POST',
            formData: {
                point: ''
            },
            openModal(action, point = null) {
                this.resetForm();
                
                if (action === 'create') {
                    this.modalTitle = 'Create Enrollment Point';
                    this.actionUrl = '{{ route('admin.enrollmentpoints.store') }}';
                    this.method = 'POST';
                } else if (action === 'edit' && point) {
                    this.modalTitle = 'Edit Enrollment Point';
                    this.actionUrl = `{{ route('admin.enrollmentpoints.update', '') }}/${point.id}`;
                    this.method = 'PUT';
                    this.formData = { ...point };
                }
                this.isOpen = true;
            },
            closeModal() {
                this.isOpen = false;
                this.resetForm();
            },
            resetForm() {
                this.formData = {
                    point: ''
                };
            }
        }
    }
    </script>
</div>
@endsection