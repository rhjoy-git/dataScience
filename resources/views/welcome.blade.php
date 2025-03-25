<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Analyzing Data with Microsoft Power BI</title>
    <link rel="icon" type="image/png" href="{{ asset('images/Skill.jobs_.png') }}">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <script src="//unpkg.com/alpinejs" defer></script>
    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body class="bg-[#FDFDFC] text-[#1b1b18] flex flex-col items-center justify-center min-h-screen">
    {{-- Navbar DONE --}}
    <header class="w-full lg:max-w-4xl max-w-[335px] text-sm mb-6">
        <nav class="sticky md:fixed top-0 left-0 z-50 w-full bg-white shadow-md" x-data="{ isOpen: false }">
            <div class="max-w-7xl mx-auto px-4">
                <div class="flex items-center justify-between h-16">
                    <!-- Logo -->
                    <div class="flex items-center">
                        <a class="flex-shrink-0" href="">
                            <img alt="Daffodil Group" width="150" height="100" class="rounded-lg"
                                src="{{ asset('images/Skill.jobs_.png') }}" />
                        </a>
                    </div>

                    <!-- Desktop Menu -->
                    <div class="hidden md:block">
                        <div class="ml-5 flex items-baseline space-x-4">
                            @foreach($navLinks as $link)
                            <a class="text-blue-600 hover:text-blue-800 px-2 py-2 hover:bg-gray-200 duration-300 rounded-md text-sm font-medium"
                                href="{{ $link['route'] }}">
                                {{ $link['text'] }}
                            </a>
                            @endforeach
                        </div>
                    </div>

                    <!-- Mobile Menu Button -->
                    <div class="md:hidden">
                        <button @click="isOpen = !isOpen"
                            class="p-2 text-blue-600 hover:text-blue-800 focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="h-10 w-10" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div class="fixed inset-0 z-50" x-show="isOpen" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 -translate-x-full"
                x-transition:enter-end="opacity-100 translate-x-0" x-transition:leave="transition ease-in duration-300"
                x-transition:leave-start="opacity-100 translate-x-0"
                x-transition:leave-end="opacity-0 -translate-x-full" style="display: none">
                <div class="absolute inset-0 bg-black/25" @click="isOpen = false"></div>
                <div class="relative w-64 h-full bg-white shadow-lg">
                    <div class="p-4">
                        <div class="flex justify-between items-center mb-8">
                            <a href="">
                                <img alt="Daffodil Group" width="130" height="100" class="rounded-lg"
                                    src="{{ asset('images/Skill.jobs_.png') }}" />
                            </a>
                            <button @click="isOpen = false" class="p-2 text-blue-600 hover:text-blue-800">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="h-10 w-10"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                        <div class="space-y-4">
                            @foreach($navLinks as $link)
                            <a class="block text-blue-600 hover:text-blue-800 px-3 py-2 rounded-md text-base font-medium"
                                href="" @click="isOpen = false">
                                {{ $link['text'] }}
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    {{-- Hero Banner --}}
    <section class="w-full">
        <img class="w-full h-[550px] md:h-[650px] lg:h-[750px] object-cover object-center" alt="main banner"
            loading="lazy" decoding="async" src="{{ asset('images/banner5.jpg') }}" />
    </section>

    <!-- Hero Section DONE -->
    <section
        class="relative w-full bg-[url('https://assets-global.website-files.com/5baa44fa6bf0bedd67643641/61e07b0bb85d3c05c4bb5bd2_hero-bg.jpg')] bg-cover bg-center">
        <div class="container mx-auto px-4 py-24 md:py-32">
            <div class="max-w-5xl mx-auto text-center space-y-6">
                <h1 class="text-4xl sm:text-5xl md:text-6xl font-bold text-gray-900 leading-tight">
                    {{ $courseData->title }}
                </h1>

                <p class="text-lg md:text-xl text-gray-600 max-w-3xl mx-auto">
                    {{ $courseData->description }}
                </p>
                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    <a href="{{ $courseData->enrollment_url }}" target="_blank"
                        class="inline-flex items-center justify-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-4 px-8 rounded-lg transition-all duration-300">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <!-- Your SVG path here -->
                        </svg>
                        {{ $courseData->enrollment_text }}
                    </a>
                </div>
            </div>

            <!-- Company Logo Section -->
            <div class="mt-16 text-center flex flex-col items-center space-y-4">
                <p class="text-lg font-semibold text-blue-600">{{ $courseData->organization_name }}</p>
                <a href="{{ $courseData->organization_url }}" class="inline-block hover:scale-105 transition-transform">
                    <img alt="{{ $courseData->organization_name }}" loading="lazy" width="300" height="100"
                        class="rounded-lg" src="{{ asset($courseData->organization_logo) }}" />
                </a>
            </div>
        </div>
        <!-- Curved Bottom Section -->
        <div class="absolute bottom-0 left-0 right-0 h-16 bg-white" style="clip-path: ellipse(80% 100% at 50% 100%)">
        </div>
    </section>

    <!-- Course Highlights -->
    <section class="relative mt-16">
        <div class=" mx-auto px-16">
            <div class="bg-gradient-to-r from-blue-50 to-blue-100 rounded-3xl p-8 shadow-xl">
                <h2 class="text-4xl font-bold text-center mb-12">{{ $courseSummary->section_title }}</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach(json_decode($courseSummary->stats, true) as $stat)
                    <div
                        class="bg-white rounded-2xl border border-blue-600 p-4 text-center transition-all hover:shadow-lg">
                        <div
                            class="text-3xl font-bold bg-gradient-to-r from-blue-600 to-blue-800 bg-clip-text text-transparent">
                            {{ $stat['value'] }}
                        </div>
                        <div class="text-gray-600 text-lg mt-2">{{ $stat['label'] }}</div>
                    </div>
                    @endforeach
                </div>

                <!-- Schedule Section -->
                <div class="bg-white rounded-2xl p-8 shadow-lg mt-12">
                    <div class="flex flex-wrap items-center justify-between gap-4 p-4 bg-gray-50 rounded-xl">
                        @foreach(json_decode($courseSummary->schedule, true) as $item)
                        <div class="flex items-center gap-3">
                            @switch($item['icon'])
                            @case('calendar')
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            @break
                            @case('clock')
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            @break
                            @endswitch
                            <div>
                                <div class="text-blue-600 font-bold">{{ $item['title'] }}</div>
                                <div>{{ $item['detail'] }}</div>
                            </div>
                        </div>
                        @if (!$loop->last)
                        <div class="w-[2px] h-10 hidden lg:block bg-gray-200"></div>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Curriculum Section DONE -->
    <div class="my-4 pt-8" x-data="{ openModule: null }">
        <main class="relative">
            <h1 class="text-3xl font-semibold text-center mb-12 text-gray-800">কারিকুলাম</h1>
            <div class="w-full max-w-7xl mx-auto py-8 px-6 bg-[#F9F9FA] rounded-lg shadow-lg">
                <div class="grid md:grid-cols-2 gap-14">
                    @foreach($curriculums as $index => $module)
                    <div class="bg-white rounded-xl shadow-md overflow-hidden" x-data="{ isOpen: false }">
                        <div class="p-6 bg-gray-600 text-white">
                            <h2 class="text-2xl font-semibold text-center">{{ $module->title }}</h2>
                            <div class="flex items-center justify-center gap-3 text-sm mt-2">
                                <span>ক্লাস শিক্ষক</span>
                                <img alt="Instructor" loading="lazy" width="24" height="24"
                                    class="w-8 h-8 rounded-full border border-white"
                                    src="{{ asset($module->profile_image) }}" />
                                <span>{{ $module->instructor }}</span>
                            </div>
                        </div>
                        <div class="p-4">
                            <button
                                @click="isOpen = !isOpen; openModule === {{ $index }} ? openModule = null : openModule = {{ $index }}"
                                class="w-full flex items-center justify-between p-4 bg-gray-100 rounded-lg hover:bg-gray-200 transition-colors duration-300">
                                <div class="flex flex-col lg:flex-row">
                                    <p
                                        class="font-semibold h-max bg-[#FFA500] min-w-[110px] text-white px-3 py-1 rounded mr-2 text-xl">
                                        {{ $module->week }}
                                    </p>
                                    <p class="text-lg">{{ $module->title }}</p>
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    class="h-6 w-6 text-gray-400 bg-gray-200 rounded-full transition-transform duration-300"
                                    :class="{ 'rotate-180': isOpen }">
                                    <path d="m6 9 6 6 6-6" />
                                </svg>
                            </button>

                            <!-- Content Section -->
                            <div x-show="isOpen" x-collapse x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0 max-h-0"
                                x-transition:enter-end="opacity-100 max-h-screen"
                                x-transition:leave="transition ease-in duration-200"
                                x-transition:leave-start="opacity-100 max-h-screen"
                                x-transition:leave-end="opacity-0 max-h-0">
                                <div class="mt-2 space-y-2">
                                    @foreach(json_decode($module->lessons) as $lesson)
                                    <div class="border-t border-gray-200">
                                        <div
                                            class="flex items-center gap-4 p-4 hover:bg-gray-50 transition-all duration-200">
                                            <div
                                                class="bg-[#FFA500] text-white w-12 h-12 rounded-lg flex items-center justify-center font-bold">
                                                {{ $loop->iteration }}
                                            </div>
                                            <span class="flex-1">{{ $lesson }}</span>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </main>
    </div>


    <!-- Course Details Section -->
    <section class="py-16 w-full">
        <div class="w-full max-w-7xl mx-auto px-4 py-8 bg-gray-50">
            @if($courseDetails->isNotEmpty())
            <h2 class="text-3xl font-bold text-center mb-12">{{ $courseDetails->first()->section_title }}</h2>
            @endif

            <div class="grid md:grid-cols-1 gap-12">
                @foreach($courseDetails as $course)
                <div class="bg-white p-8 rounded-lg shadow-md">
                    <div class="flex items-center mb-6">
                        {!! $course->icon !!}
                        <h3 class="text-2xl font-semibold ml-3">{{ $course->title }}</h3>
                    </div>

                    <p class="text-gray-600 mb-6">{{ $course->description }}</p>

                    @if(!empty($course->parts))
                    <div class="space-y-6">
                        @foreach(json_decode($course->parts) as $part)
                        <div class="mb-6 border-l-4 border-blue-100 pl-4">
                            <h4 class="text-lg font-semibold mb-2">{{ $part->title }}</h4>

                            @if(isset($part->content))
                            <ul class="list-disc list-inside pl-4 text-gray-600 space-y-2">
                                @foreach($part->content as $item)
                                <li>{{ $item }}</li>
                                @endforeach
                            </ul>
                            @endif
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Tools Section DONE -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold text-center mb-12">টুলস এবং লাইব্রেরি</h2>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                @foreach($tools as $tool)
                <div
                    class="col-start-2 bg-gray-100 p-4 rounded-lg shadow hover:shadow-lg transition-shadow md:w-[13rem]">
                    <div class="flex flex-col items-center ">
                        <img src="{{ $tool['image'] }}" alt="{{ $tool['name'] }}" class="w-16 h-16 mb-4 object-contain">
                        <h3 class="font-semibold">{{ $tool['name'] }}</h3>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Course Benefits Section -->
    <section class="py-16 bg-gray-50 w-full">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-center mb-12 relative">
                {{ $courseOfferings->first()->section_title }}
                <span
                    class="absolute -bottom-4 left-1/2 transform -translate-x-1/2 w-32 h-1 bg-yellow-400 rounded"></span>
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($courseOfferings as $offering)
                <div class="bg-white rounded-lg border border-gray-200 p-6 hover:shadow-lg transition-shadow">
                    <div class="w-16 h-16 mx-auto mb-4">
                        <img src="{{ asset($offering->icon) }}" alt="{{ $offering->title }}"
                            class="w-full h-full object-contain">
                    </div>
                    <h3 class="text-xl font-semibold mb-2 text-center">{{ $offering->title }}</h3>
                    <p class="text-gray-600 text-sm text-center">{{ $offering->description }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Who Should Enroll Section -->
    <section class="py-16 bg-white w-full">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-center mb-12">
                @if (!$enrollmentPoints->first()->section_title)
                কোর্সটি আপনারই জন্য
                @endif
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($enrollmentPoints as $point)
                <div class="flex items-start p-4 bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow">
                    {{-- <svg class="flex-shrink-0 w-6 h-6 text-green-500 mt-1" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg> --}}
                    <p class="text-lg ml-3">{{ $point->point }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!--  Enroll now -->
    <div
        class="sticky w-full bottom-0 left-0 right-0 bg-gray-900 px-4 py-6 flex flex-col sm:flex-row items-center justify-center gap-4 md:gap-8">
        @foreach ($enrolls as $enroll)
        <h3 class="text-white text-xl font-semibold">{{ $enroll->section_title }}</h3>
        <a class="flex items-center justify-center gap-3 w-full sm:w-auto min-w-[150px] py-4 px-4 rounded bg-red-600 hover:bg-red-700 duration-300 text-white font-bold"
            target="_blank" href="{{$enroll->enroll_url}}">
            <svg width="16" height="16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#a)" stroke="#fff" stroke-linecap="round" stroke-linejoin="round">
                    <path
                        d="M3.553 11.899a6.363 6.363 0 0 1 7.424-10.24M1.321 11.853C.513 13.27.242 14.37.7 14.827c.693.692 2.862-.287 5.374-2.279M8.949 12.045 6.562 9.658l5.305-5.305a3.37 3.37 0 0 1 1.568-.886l1.365-.343a.562.562 0 0 1 .682.682l-.341 1.365a3.373 3.373 0 0 1-.888 1.568l-5.304 5.306Z">
                    </path>
                    <path
                        d="m6.562 9.658-1.955-.651a.281.281 0 0 1-.11-.467l.682-.681a2.255 2.255 0 0 1 2.308-.545l1.066.355-1.991 1.989ZM8.949 12.045 9.6 14a.282.282 0 0 0 .467.11l.681-.681a2.256 2.256 0 0 0 .545-2.308l-.355-1.067-1.99 1.99Z">
                    </path>
                </g>
                <defs>
                    <clipPath id="a">
                        <path fill="#fff" d="M0 0h16v16H0z"></path>
                    </clipPath>
                </defs>
            </svg>
            {{$enroll->title}}
        </a>
        @endforeach

    </div>

    <!-- Instructor Section -->
    <section class="py-16 w-full">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-4xl font-bold text-center mb-8">ইন্সট্রাক্টর</h2>
            <a href="{{ $instructor->linkedin }}" target="_blank" class="block group">
                <div
                    class="bg-white rounded-lg shadow-lg p-6 flex flex-col md:flex-row items-start gap-6 transition-transform hover:-translate-y-1">
                    <div class="flex-1 space-y-4">
                        <span
                            class="inline-block border border-purple-300 rounded-full px-4 py-1 text-purple-500 text-sm font-medium">
                            LEAD INSTRUCTOR
                        </span>
                        <h3 class="text-2xl font-bold">{{ $instructor->name }}</h3>
                        <p class="text-gray-600 font-semibold">{{ $instructor->designation }}</p>
                        <p class="text-gray-500">{{ $instructor->organization }}</p>

                        <!-- Experience -->
                        <div class="space-y-2">
                            <h4 class="text-lg font-semibold">অভিজ্ঞতা</h4>
                            @foreach(json_decode($instructor->experience, true) as $exp)
                            <div class="flex items-center gap-2 text-gray-700">
                                <span>✓ {{ $exp }}</span>
                            </div>
                            @endforeach
                        </div>

                        <!-- Education -->
                        <div class="space-y-2">
                            <h4 class="text-lg font-semibold">শিক্ষাগত যোগ্যতা</h4>
                            @foreach(json_decode($instructor->education, true) as $edu)
                            <div class="flex items-center gap-2 text-gray-700">
                                <span>🎓 {{ $edu }}</span>
                            </div>
                            @endforeach
                        </div>

                        <!-- Skills -->
                        <div class="space-y-2">
                            <h4 class="text-lg font-semibold">দক্ষতা</h4>
                            <div class="flex flex-wrap gap-2">
                                @foreach(json_decode($instructor->skills, true) as $skill)
                                <span class="bg-purple-100 text-purple-700 px-3 py-1 rounded-full text-sm font-medium">
                                    {{ $skill }}
                                </span>
                                @endforeach
                            </div>
                        </div>

                        <!-- Certifications -->
                        <div class="space-y-2">
                            <h4 class="text-lg font-semibold">সার্টিফিকেশন</h4>
                            @foreach(json_decode($instructor->certifications, true) as $cert)
                            <div class="flex items-center gap-2 text-gray-700">
                                <span>📜 {{ $cert }}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="w-48 h-48 rounded-lg overflow-hidden">
                        <img src="{{ asset($instructor->profile_image) }}" alt="Instructor"
                            class="w-full h-full object-cover">
                    </div>
                </div>
            </a>
        </div>
    </section>



    <!-- Requirements Section DONE -->
    <section class="py-12 bg-gray-50 w-full">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-4xl font-bold text-center mb-12">কী কী থাকবে</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($requirements as $requirement)
                <div class="bg-white p-6 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                    <div class="w-16 h-16 mx-auto mb-4">
                        <img src="{{ asset($requirement['image']) }}" alt="{{ $requirement['title'] }}"
                            class="w-full h-full object-contain">
                    </div>
                    <h3 class="text-lg font-medium text-gray-800 text-center">{{ $requirement['title'] }}</h3>
                </div>
                @endforeach
            </div>
        </div>
    </section>


    <!-- Certificate Section DONE -->
    <section class="py-12 bg-white w-full">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold mb-4">সার্টিফিকেট</h2>
                <p class="text-lg text-gray-600">কোর্স শেষে পেয়ে যান প্রফেশনাল কোর্স কমপ্লিশন সার্টিফিকেট</p>
            </div>
            <div class="flex justify-center">
                <img src="{{ asset('images/certificate.jpg') }}" alt="Course Certificate"
                    class="w-full max-w-4xl rounded-lg shadow-lg hover:scale-105 transition-transform duration-300">
            </div>
        </div>
    </section>


    <!-- FAQ Section DONE -->
    <section class="py-12 bg-gray-50 w-full">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-4xl font-bold text-center mb-12">সাধারণ প্রশ্নাবলী</h2>

            <div class="space-y-4">
                @foreach($faqs as $index => $faq)
                <div x-data="{ open: false }" class="bg-white rounded-lg shadow-sm border border-gray-200">
                    <button @click="open = !open" class="w-full flex justify-between items-center p-6">
                        <span class="text-xl font-bold text-left">{{ $index + 1 }}. {{ $faq['question'] }}</span>
                        <svg class="w-6 h-6 transform transition-transform duration-300" :class="{ 'rotate-180': open }"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="open" x-collapse class="px-6 pb-6 text-gray-600">
                        <p>{{ $faq['answer'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <div class="mb-4 w-full">
        <div class="w-full max-w-7xl mx-auto px-4 py-8">
            <!-- Section Heading -->
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-center">
                    আমাদের লার্নারদের কাছে শুনুন
                </h2>
            </div>

            <!-- Testimonials Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($testimonials as $testimonial)
                <div class="rounded-xl border p-6 bg-white shadow-sm h-full">
                    <div class="flex items-start gap-4 h-full">
                        <!-- Avatar -->
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 rounded-full bg-gray-100 flex items-center justify-center">
                                <img alt="{{ $testimonial->name }}" loading="lazy" width="100" height="100"
                                    class="rounded-full" src="{{ asset($testimonial->image) }}" />
                            </div>
                        </div>

                        <!-- Testimonial Content -->
                        <div class="flex-1">
                            <h3 class="font-medium text-gray-900 mb-1">{{ $testimonial->name }}</h3>
                            <!-- Add Title -->
                            @if($testimonial->title)
                            <p class="text-base font-medium text-gray-700 mb-2">{{ $testimonial->title }}</p>
                            @endif
                            <!-- Description -->
                            <p class="text-gray-600 text-sm leading-relaxed">
                                {{ $testimonial->description }}
                            </p>
                        </div>

                        <!-- Quote Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-quote w-6 h-6 text-blue-600 flex-shrink-0">
                            <path
                                d="M16 3a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2 1 1 0 0 1 1 1v1a2 2 0 0 1-2 2 1 1 0 0 0-1 1v2a1 1 0 0 0 1 1 6 6 0 0 0 6-6V5a2 2 0 0 0-2-2z">
                            </path>
                            <path
                                d="M5 3a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2 1 1 0 0 1 1 1v1a2 2 0 0 1-2 2 1 1 0 0 0-1 1v2a1 1 0 0 0 1 1 6 6 0 0 0 6-6V5a2 2 0 0 0-2-2z">
                            </path>
                        </svg>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Graduates Section -->
    <div class="mb-4 w-full">
        <div class="max-w-7xl mx-auto px-4 py-8">
            <!-- Section Heading -->
            <h1 class="text-4xl font-bold text-center mb-8">Graduated Students From Our Latest Batch</h1>

            <!-- Graduates Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach($graduates as $graduate)
                <div class="relative overflow-hidden rounded-lg shadow-lg cursor-pointer w-full h-60">
                    <img alt="Graduate" loading="lazy" class="w-full h-full object-cover" src="{{ asset($graduate->image) }}" />
                </div>                
                @endforeach
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="pt-12 bg-white w-full">
        <footer class="bg-gray-300 px-6 text-slate-800">
            <div class="container mx-auto px-4 py-8">
                <!-- Grid Layout for Footer Sections -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-8 mb-8">
                    <!-- Company Info -->
                    <div>
                        <h3 class="text-lg font-semibold mb-4 text-blue-600">A Concern Of Daffodil Family</h3>
                        <a href="{{ url('/') }}">
                            <img alt="Daffodil Group" loading="lazy" width="300" height="100" class="rounded-lg"
                                src="{{ asset('images/Skill.jobs_.png') }}" />
                        </a>
                        <p class="mt-4">SkillJobs Learning - a leading job application site and online career portal in
                            Bangladesh</p>
                    </div>

                    <!-- Our Courses -->
                    <div>
                        <h3 class="text-lg font-semibold mb-4 text-blue-600">Our Courses</h3>
                        <ul class="space-y-2">
                            @foreach(json_decode($footerData->courses, true) as $course)
                            <li>
                                <a class="hover:text-blue-600 transition-colors" href="{{ url($course['url']) }}">
                                    {{ $course['name'] }}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Resources -->
                    <div>
                        <h3 class="text-lg font-semibold mb-4 text-blue-600">Resources</h3>
                        <ul class="space-y-2">
                            @foreach(json_decode($footerData->resources, true) as $resource)
                            <li>
                                <a class="hover:text-blue-600 transition-colors" href="{{ $resource['url'] }}">
                                    {{ $resource['name'] }}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Legal -->
                    <div>
                        <h3 class="text-lg font-semibold mb-4 text-blue-600">Legal</h3>
                        <ul class="space-y-2">
                            @foreach(json_decode($footerData->legal, true) as $item)
                            <li>
                                <a class="hover:text-blue-600 transition-colors" href="{{ $item['url'] }}">
                                    {{ $item['name'] }}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Help Center -->
                    <div>
                        <h3 class="text-lg font-semibold mb-4 text-blue-600">Help Center</h3>
                        <div>
                            @php
                            $contact = json_decode($footerData->contact, true);
                            @endphp
                            <p class="mb-2">Address: {{ $contact['address'] }}</p>
                            <p class="mb-2">
                                @foreach($contact['phone'] as $phone)
                                {{ $phone }}<br />
                                @endforeach
                            </p>
                            <p>Email: <a href="mailto:{{ $contact['email'] }}" class="text-blue-600 hover:underline">{{
                                    $contact['email'] }}</a></p>
                        </div>
                    </div>
                </div>

                <!-- Footer Bottom -->
                <div class="border-t border-slate-800 pt-8 text-center">
                    <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                        <div class="text-sm w-full">© {{ date('Y') }} SkillJobs Learning. All rights reserved.</div>
                    </div>
                </div>
            </div>
        </footer>
    </div>


    <!-- Add Alpine.js -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
</body>

</html>