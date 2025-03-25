@extends('admin.layout')

@section('content')
<div class="container mx-auto px-4" x-data="footerDataModal()">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Footer Data</h1>
        <a href="{{ route('admin.footer-data.edit', $footerData) }}" 
           class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Edit
        </a>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <!-- Courses Column -->
            <div>
                <h3 class="font-semibold mb-2">Courses</h3>
                <ul class="space-y-1">
                    @foreach($footerData->courses ?? [] as $course)
                    <li>
                        <a href="{{ $course['url'] }}" class="text-blue-500 hover:underline">
                            {{ $course['name'] }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>

            <!-- Resources Column -->
            <div>
                <h3 class="font-semibold mb-2">Resources</h3>
                <ul class="space-y-1">
                    @foreach($footerData->resources ?? [] as $resource)
                    <li>
                        <a href="{{ $resource['url'] }}" class="text-blue-500 hover:underline">
                            {{ $resource['name'] }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>

            <!-- Legal Column -->
            <div>
                <h3 class="font-semibold mb-2">Legal</h3>
                <ul class="space-y-1">
                    @foreach($footerData->legal ?? [] as $legal)
                    <li>
                        <a href="{{ $legal['url'] }}" class="text-blue-500 hover:underline">
                            {{ $legal['name'] }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>

            <!-- Contact Column -->
            <div>
                <h3 class="font-semibold mb-2">Contact</h3>
                <p class="text-gray-600">{{ $footerData->contact['address'] ?? '' }}</p>
                <div class="mt-2">
                    @foreach($footerData->contact['phone'] ?? [] as $phone)
                    <p class="text-gray-600">{{ $phone }}</p>
                    @endforeach
                </div>
                <p class="mt-2 text-gray-600">{{ $footerData->contact['email'] ?? '' }}</p>
            </div>
        </div>
    </div>
</div>
@endsection