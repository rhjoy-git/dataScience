<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{
    User,
    NavLink,
    Curriculum,
    CourseDetail,
    Tool,
    CourseData,
    CourseSummary,
    CourseOffering,
    EnrollmentPoint,
    Instructor,
    Requirement,
    Faq,
    Testimonial,
    Graduate,
    FooterData
};

class DatabaseSeeder extends Seeder
{
    public function run()
    {

        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'status' => 1
        ]);

        $navLinks = [
            ['route' => 'home', 'text' => 'Home'],
            ['route' => 'courses', 'text' => 'Courses'],
            ['route' => 'online-courses', 'text' => 'Online Courses'],
            ['route' => 'workshop', 'text' => 'Workshop'],
            ['route' => 'free-class', 'text' => 'Free Class'],
            ['route' => 'events', 'text' => 'Events'],
            ['route' => 'contact', 'text' => 'Contact'],
            ['route' => 'back-to-skills', 'text' => 'Back To Skills'],
        ];
        NavLink::insert($navLinks);

        // 5. Course Data NOt Working
        $courseData = [
            'title' => 'Data Science and Machine Learning Zero to Mastery (25th Batch)',
            'description' => 'দেশের সবচেয়ে বড় ডাটা সায়েন্স ও মেশিন লার্নিং কোর্সটি এখন Skill Jobs-এ, যা একদম বিগিনারদের জন্য সাজানো হয়েছে। এখানে আপনি জয়েন করতে পারবেন কোনো কোডিং নলেজ ছাড়াই!',
            'enrollment_open' => true,
            'enrollment_url' => 'https://forms.gle/YEYxLYr1fdtznTrs9',
            'enrollment_text' => '২৪তম ব্যাচ এ Enroll করুন',
            'organization_name' => 'A Concern Of Daffodil Family',
            'organization_url' => route('home'),
            'organization_logo' => 'images/daffodilgrouppng.png',
        ];
        CourseData::create($courseData);

        // 6. Course Summary
        $courseSummary = [
            'section_title' => 'Course Summary',
            'stats' => [
                ['value' => '৭ টি', 'label' => 'লাইভ ক্লাস'],
                ['value' => '১৫ টি', 'label' => 'ঘন্টা লার্নিং সেশন '],
                ['value' => '৪ টি', 'label' => 'হ্যান্ডস-অন প্রজেক্ট'],
                ['value' => '', 'label' => 'লাইফটাইম ক্লাস রেকর্ডিং অ্যাক্সেস'],
                ['value' => '', 'label' => 'ইন্ডাস্ট্রি-রিলেভেন্ট টুলস'],
                ['value' => '', 'label' => 'সম্পূর্ণ কারিকুলাম'],
                ['value' => '', 'label' => 'এক্সট্রা সাপোর্ট ক্লাস '],
                ['value' => '', 'label' => 'এক্সপেরিয়েন্স মেন্টর'],
            ],
            'schedule' => [
                [
                    'icon' => 'calendar',
                    'title' => 'কোর্সটি শুরু:',
                    'detail' => '২৫ ফেব্রুয়ারী, ২০২৫ ইং'
                ],
                [
                    'icon' => 'clock',
                    'title' => 'লাইভ ক্লাস',
                    'detail' => 'রাত ৯:০০ – ১১:০০'
                ],
                [
                    'icon' => 'calendar',
                    'title' => 'কোর্স শেষ:',
                    'detail' => '২৫ এপ্রিল, ২০২৫ ইং'
                ]
            ],
        ];

        CourseSummary::create([
            'section_title' => $courseSummary['section_title'],
            'stats' => json_encode($courseSummary['stats']),
            'schedule' => json_encode($courseSummary['schedule']),
        ]);


        // 2. Curriculum
        $curriculumData = [
            [
                'section_title' => 'কারিকুলাম',
                'week' => 'সপ্তাহ ১',
                'title' => 'Power BI Desktop এবং Service সেটআপ',
                'instructor' => 'Shahriar Jahan Rafi',
                'profile_image' => 'images/profile.png',
                'lessons' => json_encode([
                    'পরিচিতি',
                    'Power BI Desktop ইনস্টলেশন',
                    'অ্যাকাউন্ট তৈরি এবং ফ্রি ট্রায়াল গ্রহণ',
                    'Power BI Service ইন্টারফেস পরিচিতি',
                    'আপনার প্রথম ওয়ার্কস্পেস তৈরি',
                    'ডোমেইন যুক্ত করার পদ্ধতি',
                    'লাইসেন্স এবং তুলনা',
                    'Power BI Service সেটিংস',
                    'Power BI Desktop ইন্টারফেস',
                    'Desktop অপশন এবং সেটিংস',
                    'প্রাথমিক ভিজুয়ালাইজেশন এবং ডেটা ইন্টারঅ্যাকটিভ রিপোর্ট ডেমো',
                ]),
            ],
            [
                'section_title' => 'কারিকুলাম',
                'week' => 'সপ্তাহ ২',
                'title' => 'বিভিন্ন ডেটা সোর্স থেকে ডেটা সংযুক্ত করা',
                'instructor' => 'Shahriar Jahan Rafi',
                'profile_image' => 'images/profile.png',
                'lessons' => json_encode([
                    'Power BI Desktop: পরিচিতি',
                    'ডেটা সংযোগ স্থাপন',
                    'ডেটা এবং কোয়েরি এডিটর সংযোগ',
                    'প্রাথমিক ভিজুয়ালাইজেশন এবং ইন্টারঅ্যাকটিভ রিপোর্ট ডেমো',
                    'স্টোরেজ মোডস',
                    'ডেটা সোর্স সেটিংস',
                    'গেটওয়ে টাইপ এবং সেটআপ',
                    'Power BI Service: পরিচিতি',
                    'Dataflow এবং Datamart-এ ডেটা সংযোগ',
                    'পাইপলাইন',
                    'স্টোরেজ মোডস',
                    'ডেটা সোর্স সেটিংস',
                    'গেটওয়ে এবং সংযোগ সেটআপ',
                ]),
            ],
            [
                'section_title' => 'কারিকুলাম',
                'week' => 'সপ্তাহ ৩',
                'title' => 'Power Query এবং ডেটা প্রোফাইলিং',
                'instructor' => 'Shahriar Jahan Rafi',
                'profile_image' => 'images/profile.png',
                'lessons' => json_encode([
                    'ডেটা প্রোফাইলিং: পরিচিতি',
                    'ভিউ মেনু',
                    'কলাম কোয়ালিটি',
                    'কলাম ডিস্ট্রিবিউশন',
                    'কলাম প্রোফাইল',
                    'প্রোফাইলিং',
                    'ডেটা ক্লিনিং, ট্রান্সফর্মিং এবং লোডিং:',
                    'টেবিল ট্রান্সফরমেশন',
                    'ইনডেক্স কলাম',
                    'কন্ডিশনাল কলাম',
                    'কাস্টম কলাম',
                    'উদাহরণ থেকে কলাম তৈরি',
                    'গ্রুপিং এবং এগ্রিগেশন',
                    'পিভটিং এবং আনপিভটিং',
                    'কোয়েরি মার্জিং',
                    'কোয়েরি অ্যাপেন্ডিং',
                    'কোয়েরি মডিফাই',
                    'M কোডের ভূমিকা এবং এডিটিং',
                    'অ্যাডভান্সড এডিটর',
                    'IF ফাংশন এবং সাধারণ M ফাংশন',
                ]),
            ],
            [
                'section_title' => 'কারিকুলাম',
                'week' => 'সপ্তাহ ৪',
                'title' => 'ডেটা মডেলিং এবং DAX-এর ভূমিকা',
                'instructor' => 'Shahriar Jahan Rafi',
                'profile_image' => 'images/profile.png',
                'lessons' => json_encode([
                    'পরিচিতি',
                    'ডেটা মডেল কি?',
                    'টেবিল রিলেশনশিপ তৈরি',
                    'অ্যাক্টিভ এবং ইনঅ্যাক্টিভ রিলেশনশিপ',
                    'অটোমেটিক ডেট টেবিল',
                    'ডেট টেবিলের প্রয়োজনীয়তা',
                    'টেবিল প্রপার্টিজ এবং প্রাইমারি কি',
                    'DAX-এর ভূমিকা',
                    'ক্যালকুলেটেড কলাম এবং মেজার',
                    'কুইক মেজার',
                    'DAX এবং মেজারের মধ্যে পার্থক্য',
                    'সাধারণ DAX ফাংশন',
                ]),
            ],
            [
                'section_title' => 'কারিকুলাম',
                'week' => 'সপ্তাহ ৫',
                'title' => 'ডেটা মডেলিং – DAX (Data Analysis Expression)',
                'instructor' => 'Shahriar Jahan Rafi',
                'profile_image' => 'images/profile.png',
                'lessons' => json_encode([
                    'CALCULATE এবং ফিল্টার',
                    'LOOKUP',
                    'GENERATE_SERIES',
                    'Earlier',
                    'RANKX',
                    'ভ্যারিয়েবল ডিক্লেয়ার',
                    'অ্যাডভান্স এবং বেসিক ফিল্টার',
                    'মেজার ফোল্ডার এবং টেবিল',
                    'DAX টেবিল',
                ]),
            ],
            [
                'section_title' => 'কারিকুলাম',
                'week' => 'সপ্তাহ ৬',
                'title' => 'ডেটা ভিজুয়ালাইজেশন – রিপোর্ট, ড্যাশবোর্ড এবং ডিপ্লয়মেন্ট',
                'instructor' => 'Shahriar Jahan Rafi',
                'profile_image' => 'images/profile.png',
                'lessons' => json_encode([
                    'Power BI Report View',
                    'অবজেক্ট এবং বেসিক চার্ট',
                    'রিপোর্ট ইন্টারঅ্যাকশন এডিটিং',
                    'ড্রিল-থ্রু ফিল্টার',
                    'সিলেকশন এবং বুকমার্ক',
                    'কাস্টম ভিজুয়াল ইমপোর্ট',
                    'Power BI Service-এ রিপোর্ট পাবলিশ',
                    'Power BI Service-এ ড্যাশবোর্ড তৈরি',
                    'ওয়েব এবং মোবাইল লেআউট',
                ]),
            ],
            [
                'section_title' => 'কারিকুলাম',
                'week' => 'সপ্তাহ ৭',
                'title' => 'রিপোর্ট উন্নতকরণ এবং শেয়ারিং',
                'instructor' => 'Shahriar Jahan Rafi',
                'profile_image' => 'images/profile.png',
                'lessons' => json_encode([
                    'চার্ট টাইপ এবং অ্যানালিটিক অপশন',
                    'AI ভিজুয়াল এবং Q&A',
                    'স্লাইসার এবং ফিল্টারিং অপশন',
                    'রিপোর্ট পাবলিশ এবং শেয়ারিং',
                    'ইমেল সাবস্ক্রিপশন এবং অ্যাটাচমেন্ট শিডিউল',
                    'রিপোর্ট এক্সপোর্ট এবং এম্বেড',
                    'PowerPoint-এ রিপোর্ট এম্বেড',
                    'ডেটাসেট রিফ্রেশ এবং RLS (Row-Level Security)',
                    'RLS প্রয়োগ এবং ইউজার রোল সেটআপ',
                    'Power BI Service-এ অ্যাপ প্রকাশ এবং ডেটা লিনিয়েজ',
                ]),
            ],
        ];

        foreach ($curriculumData as $item) {
            Curriculum::create($item);
        }

        // 3. Course Details
        $coursesDetails = [
            [
                'section_title' => 'কোর্সের বর্ণনা',
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chart-no-axes-column-increasing w-8 h-8 text-green-500 mr-3"><line x1="12" x2="12" y1="20" y2="10"></line><line x1="18" x2="18" y1="20" y2="4"></line><line x1="6" x2="6" y1="20" y2="16"></line></svg>',
                'title' => 'Power BI কোর্স সামারি',
                'description' => 'Power BI কোর্সটি একটি পূর্ণাঙ্গ প্রশিক্ষণ, যা বিজনেস ইন্টেলিজেন্স এবং ডেটা ভিজুয়ালাইজেশন এর প্রাথমিক ধারণা থেকে শুরু করে Microsoft-এর শক্তিশালী বিশ্লেষণাত্মক টুল Power BI ব্যবহারের দক্ষতা শেখায়। এটি বিশেষভাবে প্রাথমিক এবং মাঝারি স্তরের ব্যবহারকারীদের জন্য ডিজাইন করা হয়েছে, যা অংশগ্রহণকারীদের ইন্টারঅ্যাকটিভ ড্যাশবোর্ড এবং রিপোর্ট তৈরি করতে সক্ষম করে, যাতে তথ্যভিত্তিক সিদ্ধান্ত গ্রহণ সহজ হয়।',
                'parts' => [
                    [
                        'title' => 'মূল বৈশিষ্ট্যসমূহ:',
                        'content' => [
                            'ডেটা কানেকশন এবং ইন্টিগ্রেশন: বিভিন্ন ডেটা সোর্সের সাথে কানেক্ট করার পদ্ধতি এবং Power BI-তে ডেটা ইন্টিগ্রেশন শিখুন।',
                            'ডেটা মডেলিং: ডেটা আকার দেয়া, পরিষ্কার করা, এবং বিশ্লেষণের জন্য প্রস্তুত করার মৌলিক কৌশল।',
                            'ইন্টারঅ্যাকটিভ ভিজুয়ালাইজেশন: চার্ট, ম্যাপ, এবং অন্যান্য ভিজুয়াল উপাদানের মাধ্যমে ডেটা উপস্থাপন করে ডায়নামিক ড্যাশবোর্ড তৈরি।',
                            'DAX (Data Analysis Expressions): ক্যালকুলেটেড কলাম ও মেজার তৈরি করে উন্নত বিশ্লেষণের জন্য DAX ব্যবহার শিখুন।',
                            'ডেটা নিরাপত্তা: ডেটা সুরক্ষিত করার পদ্ধতি এবং রোল-বেজড অ্যাক্সেস কন্ট্রোলের প্রয়োগ।',
                            'পাবলিশিং এবং শেয়ারিং: Power BI Service ব্যবহার করে ড্যাশবোর্ড ও রিপোর্ট শেয়ার এবং টিমের সঙ্গে সহযোগিতা।'
                        ],
                    ],
                    [
                        'title' => 'প্রশিক্ষণের ফলাফল:',
                        'content' => [
                            'শক্তিশালী ডেটা ভিজুয়ালাইজেশন তৈরি ও শেয়ার করার দক্ষতা।',
                            'বিভিন্ন ডেটা সোর্স থেকে ডেটা খুঁজে বের করা এবং একত্রিত করা।',
                            'Power BI-এর বিভিন্ন ফিচার এবং ক্যালকুলেশন ব্যবহার করে ডেটা তৈরি করা।',
                            'ডেটা সংগ্রহ, মডেলিং এবং নিরাপত্তার কৌশল অন্বেষণ।',
                            'DAX (Data Analysis Expressions) ব্যবসায়িক লজিক এবং ক্যালকুলেশন সম্পর্কে পর্যালোচনা।',
                            'সোর্স ডেটা রিফ্রেশ করার পদ্ধতি এবং ডেটা ও রিপোর্ট সুরক্ষিত করার কৌশল।
'
                        ],

                    ],
                ],
            ],
        ];

        foreach ($coursesDetails as $detail) {
            CourseDetail::create([
                'section_title' => $detail['section_title'],
                'icon' => $detail['icon'],
                'title' => $detail['title'],
                'description' => $detail['description'],
                'parts' => json_encode($detail['parts'])
            ]);
        }

        // 4. Tools
        $tools = [
            ['name' => 'Python', 'image' => 'images/111.png'],
            ['name' => 'NumPy', 'image' => 'images/222.png'],
            ['name' => 'Pandas', 'image' => 'images/333.png'],
            ['name' => 'Matplotlib', 'image' => 'images/444.png'],
            ['name' => 'Scikit-Learn', 'image' => 'images/555.png'],
            ['name' => 'TensorFlow', 'image' => 'images/666.png'],
            ['name' => 'TensorFlow', 'image' => 'images/777.png'],
            ['name' => 'TensorFlow', 'image' => 'images/888.png'],
            ['name' => 'TensorFlow', 'image' => 'images/999.png'],
            ['name' => 'TensorFlow', 'image' => 'images/keras-logo.png'],
        ];
        Tool::insert($tools);



        // 7. Course Offerings
        $courseOfferingData = [
            'section_title' => 'কোর্সে আপনি পাচ্ছেন',
            [
                'icon' => 'images/৪ মাসের স্টাডিপ্ল্যান.png',
                'title' => '৬০ দিনের স্টাডি প্ল্যান',
                'description' => 'আপডেটেড কারিকুলাম',
            ],
            [
                'icon' => 'images/৪ মাসের স্টাডিপ্ল্যান.png',
                'title' => '৭ টি লাইভ ক্লাস',
                'description' => 'ইন্ডাস্ট্রি এক্সপার্টদের কাছে শিখুন লাইভে',
            ],
            [
                'icon' => 'images/৪ মাসের স্টাডিপ্ল্যান.png',
                'title' => '৪ টি রিয়েল লাইফ প্রজেক্ট',
                'description' => 'ইন্ডাস্ট্রি স্ট্যান্ডার্ড প্রজেক্ট এড করুন পিডিএফ, এক্সেল সবার চেয়ে এগিয়ে',
            ],
            [
                'icon' => 'images/৪ মাসের স্টাডিপ্ল্যান.png',
                'title' => 'প্রোগ্রেস ট্র্যাকিং',
                'description' => 'নিজের ড্যাশবোর্ড দেখুন এবং অগ্রগতির মূল্যায়ন করুন।',
            ],
            [
                'icon' => 'images/৪ মাসের স্টাডিপ্ল্যান.png',
                'title' => '২৪/৭ সাপোর্ট',
                'description' => 'প্র্যাক্টিস করতে গিয়ে পাবেন লাইভ সাপোর্ট',
            ],
            [
                'icon' => 'images/৪ মাসের স্টাডিপ্ল্যান.png',
                'title' => 'কমিউনিটি সাপোর্ট',
                'description' => 'থাকুন কর্পোরেট প্রফেশনাল কমিউনিটির সাথে অলটাইমস',
            ],
            [
                'icon' => 'images/35 টি লাইভ ক্লাস.png',
                'title' => 'লাইফটাইম এক্সেস',
                'description' => 'রিসোর্স এবং লাইভ ক্লাসের রেকর্ড লাইফটাইম অ্যাক্সেসযোগ্য থাকবে।',
            ],
            [
                'icon' => 'images/কমিউনিটি সাপোর্ট.png',
                'title' => 'সার্টিফিকেট',
                'description' => 'কোর্স শেষ করে পাবেন সেয়ারেবল প্রফেশনাল কোর্স কমপ্লিশন সার্টিফিকেট',
            ],
        ];
        $sectionTitle = $courseOfferingData['section_title'];
        foreach (array_filter($courseOfferingData, fn($key) => $key !== 'section_title', ARRAY_FILTER_USE_KEY) as $offering) {
            CourseOffering::create([
                'section_title' => $sectionTitle,
                'icon' => $offering['icon'],
                'title' => $offering['title'],
                'description' => $offering['description'],
            ]);
        }

        // 8. Enrollment Points
        $enrollmentPoints = [
            'section_title' => 'কোর্সটি আপনারই জন্য',
            'points' => [
                '💼 যারা কোনো কোডিং নলেজ ছাড়াই ডাটা বিশ্লেষণের মাধ্যমে সিদ্ধান্ত নিতে চান।',
                '📊 বিজনেস এবং ডাটা এনালিটিক্সে ক্যারিয়ার গড়তে ইচ্ছুক শিক্ষার্থীরা।',
                '🎓 যেকোনো ব্যাকগ্রাউন্ডের শিক্ষার্থী, যারা ডাটা সায়েন্স এবং বিশ্লেষণে দক্ষতা অর্জন করতে চান।',
                '🔄 পেশাজীবীরা, যারা ক্যারিয়ার সুইচ করে ডাটা অ্যানালিটিক্স সেক্টরে প্রবেশ করতে চান।',
                '🔄 পেশাজীবীরা, যারা ক্যারিয়ার সুইচ করে ডাটা অ্যানালিটিক্স সেক্টরে প্রবেশ করতে চান।',
                '🌍 ফ্রিল্যান্সারদের জন্য যারা গ্লোবাল মার্কেটে ড্যাশবোর্ড এবং ডাটা অ্যানালাইসিস পরিষেবা দিতে চান।',
            ]
        ];
        foreach ($enrollmentPoints['points'] as $point) {
            EnrollmentPoint::create(['point' => $point]);
        }

        // 9. Instructor
        $instructor = [
            'name' => 'Md.Mahabub Alam',
            'qualifications' => 'বিজনেস ডেটা এনালিস্ট, Dependable Solutions Inc., CA, USA',
            'experience' => json_encode(['Taught over 250+ students', '7 years of industry experience']),
            'profile_image' => 'images/profile.png',
            'linkedin' => 'https://bd.linkedin.com/in/shahriarjrafi',
        ];
        Instructor::create($instructor);

        // 10. Requirements
        $requirements = [
            ['image' => 'images/ল্যাপটপ_ডেস্কটপ.png', 'title' => 'একটি ল্যাপটপ বা পিসি'],
            ['image' => 'images/ভালো ইন্টারনেট কানেকশন.png', 'title' => 'ভালো ইন্টারনেট কানেকশন'],
            ['image' => 'images/প্রোগ্রামিং ফান্ডামেন্টালস জানা থাকলে ভালো.png', 'title' => 'ক্যারিয়ার ফোকাসড'],
            ['image' => 'images/স্নাতক অধ্যয়নরত.png', 'title' => 'স্নাতক অধ্যয়নরত বা স্নাতক পাশ'],
            ['image' => 'images/ক্যারিয়ার ফোকাসড.png', 'title' => 'লেগে থাকার মানসিকতা'],
            ['image' => 'images/প্রোগ্রেস ট্র্যাকিং.png', 'title' => 'ডাটা বিশ্লেষণের আগ্রহ'],
        ];
        Requirement::insert($requirements);

        // 11. FAQs
        $faqs = [
            ['question' => 'প্রশ্ন ১: Power BI কী?', 'answer' => 'Power BI একটি বিজনেস অ্যানালিটিক্স টুল, যা আপনাকে ডাটা ভিজ্যুয়ালাইজেশন তৈরি করতে এবং বিভিন্ন উৎস থেকে ডাটা সংগ্রহ ও বিশ্লেষণ করে অর্থবহ ইনসাইট বের করতে সাহায্য করে।'],
            ['question' => 'প্রশ্ন ২: এই কোর্সে কী কী শিখানো হবে?', 'answer' => 'Power BI এর বেসিক থেকে অ্যাডভান্সড লেভেল
        ডাটা মডেলিং, ড্যাশবোর্ড এবং রিপোর্ট তৈরি
        DAX (Data Analysis Expressions) ব্যবহার করে ডাটা অ্যানালাইসিস
        বিভিন্ন API এবং ডাটা সোর্সের সাথে কাজ করা'],
            ['question' => 'প্রশ্ন ৩: Power BI শেখার জন্য কি কোডিং জানতে হবে?', 'answer' => 'না, Power BI শেখার জন্য কোডিং জানতে হবে না। এটি ব্যবহারকারী-বান্ধব একটি টুল যা নন-টেকনিক্যাল ব্যক্তিদের জন্যও উপযোগী।'],
            ['question' => 'প্রশ্ন ৪: কে এই কোর্সটি করতে পারবেন?', 'answer' => 'যেকোনো শিক্ষার্থী বা পেশাজীবী
        বিজনেস অ্যানালিটিক্স এবং ডাটা সায়েন্সে আগ্রহী ব্যক্তিরা
        যারা ক্যারিয়ার সুইচ করতে চান
        ফ্রিল্যান্সাররা যারা ডাটা অ্যানালাইসিস এবং ড্যাশবোর্ড তৈরি করতে চান'],
            ['question' => 'প্রশ্ন ৫: এই কোর্স করার জন্য পূর্ব অভিজ্ঞতা কি প্রয়োজন?', 'answer' => 'না, এই কোর্সটি বিগিনার থেকে অ্যাডভান্সড সকল লেভেলের শিক্ষার্থীদের জন্য ডিজাইন করা হয়েছে।'],
            ['question' => 'প্রশ্ন ৬: Power BI কোথায় ব্যবহৃত হয়?', 'answer' => 'বিজনেস অ্যানালিটিক্স
        মার্কেট রিসার্চ
        সেলস এবং ফিনান্স রিপোর্টিং
        প্রোজেক্ট ম্যানেজমেন্ট
        বিভিন্ন ইন্ডাস্ট্রিতে ডাটা-চালিত সিদ্ধান্ত গ্রহণ'],
            ['question' => 'প্রশ্ন ৭: Power BI দিয়ে কী ধরনের কাজ করা যায়?', 'answer' => 'ডাটা ভিজ্যুয়ালাইজেশন এবং রিপোর্ট তৈরি
        রিয়েল-টাইম ড্যাশবোর্ড তৈরি
        ডাটা মডেলিং এবং বিশ্লেষণ
        বিভিন্ন ডাটা সোর্স সংযোগ এবং ডাটা ক্লিনিং'],
            ['question' => 'প্রশ্ন ৮: কোর্স শেষে কী সুবিধা পাওয়া যাবে?', 'answer' => 'Power BI এর উপর প্রফেশনাল সার্টিফিকেট
        রিয়েল-ওয়ার্ল্ড প্রজেক্টে কাজ করার অভিজ্ঞতা
        ফ্রিল্যান্সিং বা কর্পোরেট সেক্টরে কাজের সুযোগ'],
            ['question' => 'প্রশ্ন ৯: কোর্স শেষে কি চাকরির সুযোগ থাকবে?', 'answer' => 'হ্যাঁ, স্কিল জবসের অংশীদার প্রতিষ্ঠানের মাধ্যমে চাকরি সংক্রান্ত সহায়তা প্রদান করা হবে।'],
            ['question' => 'প্রশ্ন ১০: আমি কীভাবে রেজিস্ট্রেশন করব?', 'answer' => 'রেজিস্ট্রেশন করতে ভিজিট করুন: https://powerbi.skill.jobs/ অথবা কল করুন +880 184-733-4766।'],
            ['question' => 'প্রশ্ন ১১: Power BI কীভাবে ডাউনলোড করব?', 'answer' => 'Power BI Desktop বিনামূল্যে ডাউনলোড করা যায়। মাইক্রোসফটের অফিসিয়াল ওয়েবসাইট থেকে এটি ডাউনলোড করতে পারেন।'],
            ['question' => 'প্রশ্ন ১২: এই কোর্সের সময়কাল কত?', 'answer' => 'কোর্সটি সাধারণত ৩০ ঘণ্টার লাইভ সেশন এবং বাস্তব প্রজেক্ট ভিত্তিক কাজের জন্য ৩-৪ সপ্তাহ সময় নেয়।'],
            ['question' => 'প্রশ্ন ১৩: Power BI শেখার মাধ্যমে আমি কী ধরনের চাকরির সুযোগ পেতে পারি?', 'answer' => 'Data Analyst
        Business Intelligence Analyst
        Reporting Analyst
        Power BI Developer
        Dashboard Designer'],
            ['question' => 'প্রশ্ন ১৪: এই কোর্সে কী ধরনের প্রজেক্টে কাজ করার সুযোগ থাকবে?', 'answer' => 'সেলস এবং মার্কেটিং রিপোর্টিং
        ফিনান্স এবং বাজেট অ্যানালাইসিস
        ক্লায়েন্ট ম্যানেজমেন্ট ড্যাশবোর্ড
        রিয়েল-টাইম ডাটা ট্র্যাকিং প্রজেক্ট'],
            ['question' => 'প্রশ্ন ১৫: DAX (Data Analysis Expressions) কি, এবং এটি কেন গুরুত্বপূর্ণ?', 'answer' => 'DAX হল একটি ফর্মুলা ল্যাঙ্গুয়েজ যা Power BI-তে ডাটা অ্যানালাইসিস এবং জটিল গণনার জন্য ব্যবহৃত হয়। এটি আপনার ড্যাশবোর্ড এবং রিপোর্টিং-কে আরও কার্যকর করে তোলে।'],
            ['question' => 'প্রশ্ন ১৬: Power BI ব্যবহার করে কি ফ্রিল্যান্সিং করা যায়?', 'answer' => 'অবশ্যই! Power BI শেখার পর ফ্রিল্যান্স প্ল্যাটফর্ম যেমন Upwork, Fiverr, এবং Freelancer-এ কাজ করতে পারবেন। ড্যাশবোর্ড ডিজাইন এবং ডাটা অ্যানালাইসিসের জন্য অনেক চাহিদা রয়েছে।'],
            ['question' => 'প্রশ্ন ১৭: কোর্স শেষে সার্টিফিকেট কীভাবে পাব?', 'answer' => 'কোর্সের সমস্ত মডিউল এবং ফাইনাল প্রজেক্ট সফলভাবে সম্পন্ন করার পর, স্কিল জবস থেকে একটি প্রফেশনাল সার্টিফিকেট প্রদান করা হবে।'],
            ['question' => 'প্রশ্ন ১৮: কি ধরনের ডাটা সোর্স Power BI-তে সাপোর্ট করে?', 'answer' => 'Power BI বিভিন্ন ডাটা সোর্স যেমন Excel, SQL Server, Google Sheets, Azure, এবং APIs থেকে ডাটা ইন্টিগ্রেট করতে পারে।'],
            ['question' => 'প্রশ্ন ১৯: Power BI কি একাডেমিক ব্যাকগ্রাউন্ডে প্রভাব ফেলে?', 'answer' => 'হ্যাঁ, একাডেমিক গবেষণা, রিপোর্টিং এবং উপস্থাপনা তৈরির ক্ষেত্রে Power BI খুবই কার্যকর।'],
            ['question' => 'প্রশ্ন ২০: Power BI কি সেলস এবং মার্কেটিং টিমের জন্য উপযোগী?', 'answer' => 'হ্যাঁ, Power BI সেলস এবং মার্কেটিং টিমকে তাদের পারফরম্যান্স ট্র্যাক, টার্গেট নির্ধারণ এবং মার্কেট ট্রেন্ড বিশ্লেষণ করতে সহায়তা করে।']
        ];

        Faq::insert($faqs);

        // 12. Testimonials
        $testimonials = [
            [
                'name' => 'Sukanta Shuvo',
                'image' => 'images/Sukanta.jpg',
                'title' => 'আমি স্কিল জবস থেকে Power BI কোর্সটি সম্পন্ন করেছি এবং এটি একটি দুর্দান্ত অভিজ্ঞতা ছিল।',
                'description' => 'কোর্সের কনটেন্ট খুব ভালোভাবে সাজানো এবং প্রজেক্টভিত্তিক শিক্ষার মাধ্যমে আমি ড্যাশবোর্ড তৈরি ও ডেটা বিশ্লেষণের দক্ষতা অর্জন করেছি। দক্ষ মেন্টরদের সহায়তায় এই কোর্সটি আমাকে আত্মবিশ্বাস দিয়েছে। যারা ডেটা অ্যানালাইসিস শিখতে চান, তাদের জন্য আমি এই কোর্সটি সুপারিশ করছি।',
            ],
            [
                'name' => 'MD. MOHIUDDIN HASAN',
                'image' => 'images/MOHIUDDIN.jpg',
                'title' => 'Power BI কোর্সটি আমার জন্য ক্যারিয়ার পরিবর্তনের একটি বড় সুযোগ তৈরি করেছে।',
                'description' => 'স্কিল জবসের এই কোর্সের মাধ্যমে আমি ডেটা ভিজ্যুয়ালাইজেশন এবং ইন্টারঅ্যাকটিভ ড্যাশবোর্ড তৈরির দক্ষতা অর্জন করেছি। মেন্টরদের গাইডেন্স এবং বাস্তব জীবনের প্রজেক্টে কাজ করার অভিজ্ঞতা আমাকে অনেক সাহায্য করেছে। যারা ডেটা অ্যানালাইসিসে ক্যারিয়ার শুরু করতে চান, তাদের জন্য এটি আদর্শ।',
            ],
            [
                'name' => 'Md. Mahabub Hossain',
                'image' => 'images/Mahabub.jpg',
                'title' => 'স্কিল জবসের Power BI কোর্স আমাকে নতুন দৃষ্টিভঙ্গি শিখিয়েছে।',
                'description' => 'কোর্সটি এমনভাবে ডিজাইন করা হয়েছে, যা কোডিং না জানলেও ডেটা বিশ্লেষণ শিখতে সহায়ক। কেস স্টাডি এবং লাইভ ক্লাস আমাকে বাস্তব কাজের জন্য প্রস্তুত করেছে। এটি ডেটা অ্যানালাইসিস এবং ড্যাশবোর্ড তৈরিতে আমার দক্ষতা বাড়িয়েছে।',
            ],
            [
                'name' => 'Donald Jerry Corraya',
                'image' => 'images/Donald.jpg',
                'title' => 'Power BI কোর্সটি আমাকে ডেটা-চালিত সিদ্ধান্ত গ্রহণের জন্য দক্ষ করেছে।',
                'description' => 'স্কিল জবসের মাধ্যমে আমি শিখেছি কীভাবে বিভিন্ন ডাটা সোর্সের সাথে কাজ করতে হয় এবং তা থেকে গুরুত্বপূর্ণ ইনসাইট তৈরি করতে হয়। এই কোর্সটি খুবই ইফেক্টিভ ছিল এবং মেন্টরদের সহায়তায় আমি অনেক আত্মবিশ্বাস পেয়েছি।',
            ],
            [
                'name' => 'Sirazam Manira',
                'image' => 'images/Sirazam.jpg',
                'title' => 'Power BI কোর্সটি আমার ফ্রিল্যান্সিং ক্যারিয়ারে নতুন সুযোগ তৈরি করেছে।',
                'description' => 'এই কোর্সের মাধ্যমে আমি ড্যাশবোর্ড তৈরি ও ডেটা বিশ্লেষণে দক্ষতা অর্জন করেছি। এখন আমি আন্তর্জাতিক ক্লায়েন্টদের জন্য কাজ করতে পারছি। বাস্তব জীবনের উদাহরণ এবং মেন্টরশিপ আমাকে দক্ষ হতে সাহায্য করেছে। আমি এই কোর্সটি সবার জন্য সুপারিশ করছি।',
            ],

        ];
        Testimonial::insert($testimonials);

        // 13. Graduates
        $graduates = [
            ['image' => 'images/1.jpg'],
            ['image' => 'images/2.jpg'],
            ['image' => 'images/3.jpg'],
            ['image' => 'images/4.jpg'],
            ['image' => 'images/5.jpg'],
            ['image' => 'images/5.jpg'],
            ['image' => 'images/7.jpg'],
            ['image' => 'images/8.jpg'],
            ['image' => 'images/9.jpg'],
            ['image' => 'images/10.jpg'],
            ['image' => 'images/11.jpg'],
            ['image' => 'images/12.jpg'],
        ];
        Graduate::insert($graduates);

        // 14. Footer Data
        $footerData = [
            'courses' => [
                ['name' => 'Full Stack Web Development', 'url' => '#'],
                ['name' => 'Microsoft Power BI', 'url' => '#'],
                ['name' => 'Video Editing', 'url' => '#'],
            ],
            'resources' => [
                ['name' => 'About Us', 'url' => '#'],
                ['name' => 'Blog', 'url' => '#'],
                ['name' => 'Contact Us', 'url' => '#'],
            ],
            'legal' => [
                ['name' => 'Terms & Conditions', 'url' => '#'],
                ['name' => 'Privacy Policy', 'url' => '#'],
                ['name' => 'Refund Policy', 'url' => '#'],
            ],
            'contact' => [
                'address' => 'DT4, 102/1 Shukrabad, Mirpur Road, Dhanmondi, Dhaka-1207',
                'phone' => ['+880 184-733-4766', '+880 184-702-7537'],
                'email' => 'info@skill.jobs',
            ],
        ];
        FooterData::create([
            'courses' => json_encode($footerData['courses']),
            'resources' => json_encode($footerData['resources']),
            'legal' => json_encode($footerData['legal']),
            'contact' => json_encode($footerData['contact']),
        ]);
    }
}
