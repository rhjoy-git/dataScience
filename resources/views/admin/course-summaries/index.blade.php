@extends('admin.layout')

@section('content')
<div class="container mx-auto px-4" x-data="summaryModal()">
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left">Section Title</th>
                    <th class="px-6 py-3 text-left">Stats Count</th>
                    <th class="px-6 py-3 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($summaries as $summary)
                <tr class="border-t">
                    <td class="px-6 py-4">{{ $summary->section_title }}</td>
                    <td class="px-6 py-4">{{ count(json_decode($summary->stats)) }}</td>
                    <td class="px-6 py-4">
                        <button @click="openModal('edit', {{ Js::from($summary->toArray()) }})"
                            class="text-blue-500 mr-2 hover:text-blue-600">
                            Edit
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Summary Modal -->
    <div x-show="isOpen"
        class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 overflow-y-scroll"
        x-transition.opacity>
        <div class="bg-white rounded-lg shadow-xl w-full max-w-4xl p-6 top-7 absolute" @click.stop>
            <h3 class="text-xl font-bold mb-4" x-text="modalTitle"></h3>
            <form :action="actionUrl" method="POST">
                @csrf
                <input type="hidden" name="_method" x-model="method">

                <div class="space-y-8">
                    <!-- Section Title -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Section Title</label>
                        <input type="text" name="section_title" x-model="formData.section_title"
                            class="w-full rounded-lg border border-gray-300 p-3 focus:ring-2 focus:ring-blue-500"
                            required>
                    </div>

                    <!-- Stats Section -->
                    <div class="bg-gray-50 p-6 rounded-xl">
                        <div class="flex justify-between items-center mb-4">
                            <h4 class="text-lg font-semibold">Statistics</h4>
                            <button type="button" @click="addStat"
                                class="text-blue-600 hover:text-blue-800 flex items-center gap-1">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                                Add Stat
                            </button>
                        </div>

                        <template x-for="(stat, index) in formData.stats" :key="index">
                            <div class="bg-white p-4 rounded-lg shadow-sm mb-4">
                                <div class="flex gap-4 mb-3">
                                    <div class="flex-1">
                                        <label class="text-sm text-gray-600 mb-1 block">Value</label>
                                        <input type="text" x-model="stat.value" :name="`stats[${index}][value]`"
                                            class="w-full rounded border border-gray-300 p-2">
                                    </div>
                                    <div class="flex-1">
                                        <label class="text-sm text-gray-600 mb-1 block">Label</label>
                                        <input type="text" x-model="stat.label" :name="`stats[${index}][label]`"
                                            class="w-full rounded border border-gray-300 p-2" required>
                                    </div>
                                </div>
                                <button type="button" @click="removeStat(index)"
                                    class="text-red-500 hover:text-red-700 text-sm flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                    Remove Stat
                                </button>
                            </div>
                        </template>
                    </div>

                    <!-- Schedule Section -->
                    <div class="bg-gray-50 p-6 rounded-xl">
                        <div class="flex justify-between items-center mb-4">
                            <h4 class="text-lg font-semibold">Schedule Items</h4>
                            <button type="button" @click="addScheduleItem"
                                class="text-blue-600 hover:text-blue-800 flex items-center gap-1">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                                Add Schedule Item
                            </button>
                        </div>

                        <template x-for="(item, index) in formData.schedule" :key="index">
                            <div class="bg-white p-4 rounded-lg shadow-sm mb-4">
                                <div class="flex gap-4 mb-3">
                                    <div class="w-1/4">
                                        <label class="text-sm text-gray-600 mb-1 block">Icon</label>
                                        <select x-model="item.icon" :name="`schedule[${index}][icon]`"
                                            class="w-full rounded border border-gray-300 p-2" required>
                                            <option value="calendar">Calendar</option>
                                            <option value="clock">Clock</option>
                                        </select>
                                    </div>
                                    <div class="flex-1">
                                        <label class="text-sm text-gray-600 mb-1 block">Title</label>
                                        <input type="text" x-model="item.title" :name="`schedule[${index}][title]`"
                                            class="w-full rounded border border-gray-300 p-2" required>
                                    </div>
                                    <div class="flex-1">
                                        <label class="text-sm text-gray-600 mb-1 block">Detail</label>
                                        <input type="text" x-model="item.detail" :name="`schedule[${index}][detail]`"
                                            class="w-full rounded border border-gray-300 p-2" required>
                                    </div>
                                </div>
                                <button type="button" @click="removeScheduleItem(index)"
                                    class="text-red-500 hover:text-red-700 text-sm flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                    Remove Item
                                </button>
                            </div>
                        </template>
                    </div>

                    <!-- Form Actions -->
                    <div class="mt-6 flex justify-end space-x-3">
                        <button type="button" @click="closeModal"
                            class="px-6 py-2 text-gray-600 hover:text-gray-800 rounded-lg border border-gray-300">
                            Cancel
                        </button>
                        <button type="submit"
                            class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                            Save Changes
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        function summaryModal() {
            return {
                isOpen: false,
                modalTitle: '',
                actionUrl: '',
                method: 'POST',
                formData: {
                    section_title: '',
                    stats: [],
                    schedule: []
                },
        
                openModal(action, summary = null) {
                    this.resetForm();
                    
                    if (action === 'edit' && summary) {
                        this.modalTitle = 'Edit Course Summary';
                        this.actionUrl = `{{ route('admin.course-summary.update', '') }}/${summary.id}`;
                        this.method = 'PUT';
                        this.formData = {
                            section_title: summary.section_title,
                            stats: summary.stats ? JSON.parse(summary.stats) : [],
                            schedule: summary.schedule ? JSON.parse(summary.schedule) : []
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
                        section_title: '',
                        stats: [],
                        schedule: []
                    };
                },
        
                addStat() {
                    this.formData.stats.push({ value: '', label: '' });
                },
        
                removeStat(index) {
                    this.formData.stats.splice(index, 1);
                },
        
                addScheduleItem() {
                    this.formData.schedule.push({ 
                        icon: 'calendar', 
                        title: '', 
                        detail: '' 
                    });
                },
        
                removeScheduleItem(index) {
                    this.formData.schedule.splice(index, 1);
                }
            }
        }
    </script>
</div>
@endsection