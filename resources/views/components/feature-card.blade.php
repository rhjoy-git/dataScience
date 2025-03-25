@props(['count', 'title'])

<div class="bg-white rounded-2xl border border-blue-600 p-px text-center transition-all hover:shadow-xl hover:-translate-y-2">
    <div class="text-3xl font-bold bg-gradient-to-r from-blue-600 to-blue-800 bg-clip-text text-transparent">
        {{ $count }}
    </div>
    <div class="text-gray-600 text-lg">
        {{ $title }}
    </div>
</div>