@extends('admin.layout')

@section('content')
<div class="container mx-auto px-4" x-data="faqModal()">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">FAQs</h1>
        <button @click="openModal('create')" 
                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Add New
        </button>
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        @foreach($faqs as $faq)
        <div class="border-t p-4">
            <div class="flex justify-between items-start">
                <div>
                    <h3 class="font-semibold">{{ $faq->question }}</h3>
                    <p class="text-gray-600 mt-1">{{ $faq->answer }}</p>
                </div>
                <div class="flex space-x-2">
                    <button @click="openModal('edit', {{ Js::from($faq->toArray()) }})" 
                            class="text-blue-500 hover:text-blue-600">
                        Edit
                    </button>
                    <form action="{{ route('admin.faqs.destroy', $faq) }}" method="POST">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-600" 
                                onclick="return confirm('Are you sure?')">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- FAQ Modal -->
    <div x-show="isOpen" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4" 
         x-transition.opacity>
        <div class="bg-white rounded-lg shadow-xl w-full max-w-2xl p-6" @click.stop>
            <h3 class="text-xl font-bold mb-4" x-text="modalTitle"></h3>
            <form :action="actionUrl" method="POST">
                @csrf
                <input type="hidden" name="_method" x-model="method">

                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Question</label>
                        <input type="text" name="question" x-model="formData.question" 
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Answer</label>
                        <textarea name="answer" x-model="formData.answer" 
                                  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm h-32" required></textarea>
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
    function faqModal() {
        return {
            isOpen: false,
            modalTitle: '',
            actionUrl: '',
            method: 'POST',
            formData: {
                question: '',
                answer: ''
            },
            openModal(action, faq = null) {
                this.resetForm();
                
                if (action === 'create') {
                    this.modalTitle = 'Create New FAQ';
                    this.actionUrl = '{{ route('admin.faqs.store') }}';
                    this.method = 'POST';
                } else if (action === 'edit' && faq) {
                    this.modalTitle = 'Edit FAQ';
                    this.actionUrl = `{{ route('admin.faqs.update', '') }}/${faq.id}`;
                    this.method = 'PUT';
                    this.formData = { ...faq };
                }
                this.isOpen = true;
            },
            closeModal() {
                this.isOpen = false;
                this.resetForm();
            },
            resetForm() {
                this.formData = {
                    question: '',
                    answer: ''
                };
            }
        }
    }
    </script>
</div>
@endsection