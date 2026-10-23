<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>মসজিদই টাউন হল — {{ config('app.name', 'হুকুম-এ-আযান') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Dark/Light Theme Script -->
    <script>
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
</head>

<body class="bg-stone-100 dark:bg-[#242525] text-stone-800 dark:text-stone-200 antialiased transition-colors duration-200">

    <!-- Top Navigation Header -->
    <header class="w-full bg-white dark:bg-[#1c1d1d] border-b border-stone-200 dark:border-[#383a3b] transition-colors">
        <div class="mx-auto max-w-5xl h-16 flex items-center justify-between px-4 sm:px-6">
            <a href="/" class="text-base sm:text-lg font-bold text-stone-900 dark:text-white hover:text-emerald-500 transition">
                &larr; প্রধান পাতা
            </a>
            <div class="flex items-center gap-3">
                <x-theme-toggle />
            </div>
        </div>
    </header>

    <!-- Main Article Body -->
    <main class="mx-auto max-w-4xl px-4 py-10 md:py-14">
        <article class="bg-white dark:bg-[#202121] border border-stone-200 dark:border-[#383a3b] rounded-xl shadow-sm p-6 sm:p-12 transition-colors">
            
            <!-- Category Tag & Read Count -->
            <div class="flex flex-wrap items-center justify-between gap-2 text-xs font-semibold uppercase tracking-wider text-emerald-600 dark:text-emerald-400 mb-4">
                <span>ইসলাম ও সমাজ ব্যবস্থা</span>
                <span class="text-stone-400 dark:text-[#B8B1A5] font-normal">পোস্টটি পঠিত হয়েছে</span>
            </div>

            <!-- Title -->
            <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-stone-900 dark:text-[#D4CFC5] leading-tight mb-6">
                মসজিদই টাউন হল (Masjid is the Town Hall)
            </h1>

            <!-- Meta Data -->
            <div class="flex flex-wrap items-center gap-3 text-xs sm:text-sm text-stone-500 dark:text-[#B8B1A5] pb-6 border-b border-stone-200 dark:border-[#383a3b] mb-8">
                <span>{{ now()->format('d F, Y') }}</span>
                <span>•</span>
                <span class="font-medium text-stone-700 dark:text-stone-300">হাসান আব্দুল্লাহ</span>
                <span>•</span>
                <span>মসজিদ ও সমাজচিন্তা</span>
            </div>

            <!-- Banner / Hero Section -->
            <div class="mb-8 rounded-lg overflow-hidden border border-stone-200 dark:border-[#383a3b] bg-stone-50 dark:bg-[#1a1b1b] p-6 text-center">
                <h3 class="text-xl sm:text-2xl font-bold text-stone-800 dark:text-stone-200">
                    "মসজিদ শুধুমাত্র আনুষ্ঠানিক প্রার্থনাস্থল নয়, বরং এটি একটি সমাজের সামাজিক, শিক্ষামূলক ও প্রশাসনিক কেন্দ্র।"
                </h3>
            </div>

            <!-- Content Typography (Prose) -->
            <div class="prose dark:prose-invert max-w-none text-stone-700 dark:text-[#D4CFC5] leading-relaxed text-base sm:text-lg space-y-6">
                <p>
                    ইসলামের সোনালী যুগে মসজিদ ছিল সমাজের প্রাণকেন্দ্র বা মূল **টাউন হল**। এটি ছিল একাধারে ইবাদতের স্থান, শিক্ষার কেন্দ্র, সালিশি দরবার এবং সামাজিক যোগাযোগের মূল ভিত্তি।
                </p>

                <h3 class="text-xl font-bold text-stone-900 dark:text-white mt-8">১. সামাজিক নেতৃত্ব ও পরামর্শের স্থান</h3>
                <p>
                    নবীজি (সা.) এর যুগে মসজিদ-ই নববী থেকেই রাষ্ট্রের গুরুত্বপূর্ণ সিদ্ধান্ত গ্রহণ, প্রতিনিধি দল গ্রহণ এবং সামাজিক সংকট নিরসনে পরামর্শ সভা অনুষ্ঠিত হতো। আধুনিক টাউন হলের মূল ধারণাটি মসজিদের এই ঐতিহ্য থেকেই প্রাপ্ত।
                </p>

                <h3 class="text-xl font-bold text-stone-900 dark:text-white mt-8">২. শিক্ষা ও গবেষণার কেন্দ্র</h3>
                <p>
                    আসহাবে সুফফার মতো মাদ্রাসা ব্যবস্থা মসজিদের আঙিনায়ই গড়ে উঠেছিল। জ্ঞানার্জন ও সমাজ সংস্কারের মূল পাঠশালা হিসেবে মসজিদের রূপরেখা পুনরুজ্জীবিত করা আমাদের সমসাময়িক দায়িত্ব।
                </p>

                <h3 class="text-xl font-bold text-stone-900 dark:text-white mt-8">৩. আর্তমানবতার সেবা ও সামাজিক সুরক্ষা</h3>
                <p>
                    বায়তুল মাল এবং দরিদ্র পুনর্বাসনের কাজ মসজিদভিত্তিক পরিচালিত হতো। মহল্লার যেকোনো মানুষের সুখ-দুঃখে প্রথম পাশে দাঁড়ানোর কেন্দ্রবিন্দু ছিল মসজিদ।
                </p>
            </div>

            <!-- Article Footer / Share -->
            <div class="mt-12 pt-6 border-t border-stone-200 dark:border-[#383a3b] flex flex-wrap items-center justify-between gap-4 text-sm text-stone-500 dark:text-[#B8B1A5]">
                <a href="/" class="text-emerald-600 dark:text-emerald-400 font-semibold hover:underline">
                    &larr; অন্যান্য লেখা পড়ুন
                </a>
                <span>হুকুম-এ-আযান প্রজেক্ট</span>
            </div>
        </article>
    </main>

    <!-- Footer -->
    <footer class="border-t border-stone-200 dark:border-[#383a3b] bg-white dark:bg-[#1c1d1d] mt-16 transition-colors">
        <div class="mx-auto max-w-4xl px-4 py-8 text-center text-xs sm:text-sm text-stone-500 dark:text-[#B8B1A5]">
            © {{ date('Y') }} হুকুম-এ-আযান। সর্বস্বত্ব সংরক্ষিত।
        </div>
    </footer>
</body>
</html>