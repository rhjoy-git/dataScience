@isset($models)
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-64 h-fit bg-gray-800 text-white p-4">
            <div class="text-xl font-bold mb-6">Admin Dashboard</div>
            <nav>
                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 hover:bg-gray-700 rounded">
                            Dashboard
                        </a>
                    </li>
                    @foreach($models as $model)
                    <li>
                        <a href="{{ route('admin.'.strtolower($model).'.index') }}"
                            class="block px-4 py-2 hover:bg-gray-700 rounded">
                            {{ $model }}
                        </a>
                    </li>
                    @endforeach
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 hover:bg-red-700 bg-red-500 rounded">
                                Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-8 overflow-auto">
            @yield('content')
        </main>
    </div>

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>

</html>
@else
@php abort(403, 'Unauthorized access'); @endphp
@endisset