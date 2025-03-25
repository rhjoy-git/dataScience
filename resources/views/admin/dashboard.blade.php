@extends('admin.layout', ['models' => $models])

@section('content')

<div class="container">
    <div class="bg-white rounded-lg shadow p-6">
        <h1 class="text-2xl font-bold mb-4">Admin Dashboard</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($models as $model)
            <div class="bg-gray-50 p-4 rounded-lg">
                <h3 class="text-lg font-semibold mb-2">{{ Str::plural($model) }}</h3>
                <a href="{{ route('admin.'.strtolower($model).'.index') }}"
                    class="text-blue-500 hover:text-blue-600">
                    Manage {{ $model }}
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection