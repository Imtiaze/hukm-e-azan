<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>হাসানের রাখাল — Blog</title>

    <!-- 1. Anti-flicker Dark/Light Theme Script (Runs immediately before CSS loads) -->
    <script>
        (function() {
            const savedTheme = localStorage.getItem('color-theme');
            const systemPrefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            if (savedTheme === 'dark' || (!savedTheme && systemPrefersDark)) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        })();
    </script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Livewire Styles (For Alpine compatibility) -->
    @livewireStyles

    <style>
        [x-cloak] { display: none !important; }
        ::-webkit-scrollbar { width: 10px; height: 10px; }
        ::-webkit-scrollbar-track { background: #1a1b1b; }
        ::-webkit-scrollbar-thumb { background: #2a3140; border-radius: 8px; }
        ::-webkit-scrollbar-thumb:hover { background: #5F6364; }
        :focus-visible { outline: 2px dashed #22c55e; outline-offset: 3px; }
    </style>
</head>

<body class="bg-[#f5f5f4] dark:bg-[#242525] text-stone-900 dark:text-white antialiased">

    <!-- ===== HEADER START ===== -->
    <header class="w-full">
        <!-- Top Bar: Social Icons & Theme Switcher -->
        <div class="w-full bg-white dark:bg-[#1f2020] border-b border-stone-200 dark:border-[#434546]">
            <div class="mx-auto max-w-6xl h-14 sm:h-16 flex items-center justify-between px-4 sm:px-6">
                
                <!-- Social Links -->
                <div class="flex flex-wrap items-center gap-3 sm:gap-4">
                    <!-- GitHub -->
                    <a href="#" aria-label="GitHub" class="p-2 rounded-full hover:bg-stone-100 dark:hover:bg-white/10 transition">
                        <svg viewBox="0 0 24 24" class="w-4 h-4 fill-stone-700 dark:fill-white/80">
                            <path d="M12 .5a12 12 0 0 0-3.79 23.4c.6.11.82-.26.82-.57v-2.02c-3.34.73-4.04-1.61-4.04-1.61-.55-1.41-1.35-1.79-1.35-1.79-1.1-.75.08-.74.08-.74 1.22.09 1.86 1.25 1.86 1.25 1.08 1.85 2.83 1.32 3.52 1.01.11-.78.42-1.32.77-1.63-2.66-.3-5.46-1.34-5.46-5.96 0-1.32.47-2.4 1.24-3.25-.12-.3-.54-1.52.12-3.16 0 0 1.01-.32 3.3 1.24a11.5 11.5 0 0 1 6 0c2.29-1.56 3.3-1.24 3.3-1.24.66 1.64.24 2.86.12 3.16.77.85 1.24 1.93 1.24 3.25 0 4.64-2.8 5.66-5.47 5.96.43.37.82 1.1.82 2.22v3.29c0 .31.21.68.83.57A12 12 0 0 0 12 .5Z"/>
                        </svg>
                    </a>

                    <!-- StackOverflow -->
                    <a href="#" aria-label="StackOverflow" class="p-2 rounded-full hover:bg-stone-100 dark:hover:bg-white/10 transition">
                        <svg viewBox="0 0 24 24" class="w-4 h-4 fill-stone-700 dark:fill-white/80">
                            <path d="M17 20v-5h2v7H5v-7h2v5h10ZM7 17h10v2H7v-2Zm.76-3.64 10.04 2.21.43-1.95-10.04-2.2-.43 1.94Zm1.6-4.63 9.1 4.69.88-1.8-9.1-4.69-.88 1.8Zm3.25-4.52 7.6 6.96 1.35-1.48-7.6-6.96-1.35 1.48Z"/>
                        </svg>
                    </a>

                    <!-- LinkedIn -->
                    <a href="#" aria-label="LinkedIn" class="p-2 rounded-full hover:bg-stone-100 dark:hover:bg-white/10 transition">
                        <svg viewBox="0 0 24 24" class="w-4 h-4 fill-stone-700 dark:fill-white/80">
                            <path d="M4.98 3.5a2.5 2.5 0 1 0 0 5.001 2.5 2.5 0 0 0 0-5ZM3.5 9h3v12h-3V9Zm6 0h2.88v1.64h.04c.4-.76 1.38-1.56 2.84-1.56 3.04 0 3.6 2 3.6 4.6V21h-3v-5.3c0-1.26-.02-2.88-1.76-2.88-1.76 0-2.03 1.38-2.03 2.8V21h-3V9Z"/>
                        </svg>
                    </a>

                    <!-- Facebook -->
                    <a href="#" aria-label="Facebook" class="p-2 rounded-full hover:bg-stone-100 dark:hover:bg-white/10 transition">
                        <svg viewBox="0 0 24 24" class="w-4 h-4 fill-stone-700 dark:fill-white/80">
                            <path d="M13 22v-8h3l1-3h-4V8.5c0-.87.28-1.5 1.7-1.5H17V4.2c-.3-.04-1.33-.13-2.53-.13C11.46 4.07 10 5.39 10 8v3H7v3h3v8h3Z"/>
                        </svg>
                    </a>
                </div>

                <!-- Theme Toggle Button & Dashboard Link -->
                <div class="flex items-center gap-3">
                    <x-theme-toggle />
                    @auth
                        <a href="{{ route('dashboard') }}" class="text-xs font-semibold px-3 py-1.5 rounded bg-emerald-600 hover:bg-emerald-700 text-white transition">Admin Panel</a>
                    @else
                        <a href="{{ route('login') }}" class="text-xs font-medium text-stone-600 dark:text-stone-300 hover:text-emerald-500 transition">Log in</a>
                    @endauth
                </div>
            </div>
        </div>

        <!-- Big Site Logo Banner -->
        <div class="w-full bg-[#fafaf9] dark:bg-[#1a1b1b] border-b border-stone-200 dark:border-[#434546]">
            <div class="mx-auto max-w-6xl px-4 py-6 md:py-8 flex justify-center text-center">
                <a href="/" class="text-3xl sm:text-4xl font-extrabold tracking-tight text-stone-900 dark:text-white hover:text-emerald-500 transition">
                    হাসানের রাখাল
                </a>
            </div>
        </div>

        <!-- Main Navigation Strip -->
        <nav class="w-full bg-white dark:bg-[#171a21] border-b border-stone-200 dark:border-[#434546]">
            <div class="mx-auto max-w-6xl px-4">
                <ul class="flex justify-center divide-x divide-stone-200 dark:divide-[#434546]">
                    <li>
                        <a class="block px-6 py-3.5 text-xs sm:text-sm font-semibold tracking-wider text-stone-700 dark:text-white/90 hover:text-emerald-500 dark:hover:text-white transition" href="/">
                            HOME
                        </a>
                    </li>
                    <li>
                        <a class="block px-6 py-3.5 text-xs sm:text-sm font-semibold tracking-wider text-stone-700 dark:text-white/90 hover:text-emerald-500 dark:hover:text-white transition" href="#">
                            ABOUT ME
                        </a>
                    </li>
                    <li>
                        <a class="block px-6 py-3.5 text-xs sm:text-sm font-semibold tracking-wider text-stone-700 dark:text-white/90 hover:text-emerald-500 dark:hover:text-white transition" href="#">
                            CONTACT
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- ===== HEADER END ===== -->

    <!-- ===== MAIN CONTENT CONTAINER ===== -->
    <main class="mx-auto max-w-6xl px-4 py-8 md:py-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">

            <!-- Left Primary Articles Column (8 Cols) -->
            <div class="lg:col-span-8 space-y-8">
                @forelse($posts as $post)
                    <div>
                        <h3 class="text-xs sm:text-sm text-stone-500 dark:text-[#B8B1A5] mb-2">
                            পোস্টটি পড়া হয়েছে 65,176 বার
                        </h3>
                        <article class="bg-white dark:bg-[#242525] border border-stone-200 dark:border-[#434546] shadow-sm transition hover:border-emerald-500/50">
                            @if($post->featured_image)
                                <a href="{{ route('blog.show', $post->slug) }}" class="block overflow-hidden max-h-[380px]">
                                    <img src="{{ asset('storage/' . $post->featured_image) }}" 
                                         alt="{{ $post->title }}" 
                                         class="w-full h-auto object-cover hover:scale-105 transition duration-300 ease-out" 
                                         loading="lazy">
                                </a>
                            @endif

                            <div class="p-6 sm:p-10">
                                <h2 class="text-2xl sm:text-3xl font-semibold mb-3 text-stone-900 dark:text-[#D4CFC5] hover:text-emerald-500 transition leading-snug">
                                    <a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a>
                                </h2>

                                <div class="mb-5 text-sm sm:text-base text-stone-500 dark:text-[#B8B1A5] flex flex-wrap items-center gap-2">
                                    <span>{{ $post->published_at ? $post->published_at->format('d F, Y') : $post->created_at->format('d F, Y') }}</span>
                                    <span>/</span>
                                    <span>{{ $post->user->name ?? 'Hasan Abdullah' }}</span>
                                    <span>/</span>
                                    <span class="text-emerald-600 dark:text-emerald-400">ইসলাম ও সমাজ</span>
                                </div>
                                
                                <p class="text-base text-stone-600 dark:text-[#B8B1A5] leading-relaxed">
                                    {{ $post->excerpt ?? Str::limit(strip_tags($post->body), 180) }}
                                </p>
                            </div>
                        </article>
                    </div>
                @empty
                    <div class="bg-white dark:bg-[#242525] border border-stone-200 dark:border-[#434546] p-10 text-center">
                        <p class="text-stone-500 dark:text-[#B8B1A5] text-lg">কোনো পোস্ট পাওয়া যায়নি।</p>
                    </div>
                @endforelse

                <!-- Pagination Links -->
                <div class="pt-4">
                    {{ $posts->links() }}
                </div>
            </div>

            <!-- Right Sidebar Column (4 Cols) -->
            <aside class="lg:col-span-4 space-y-8">
                
                <!-- Search Box -->
                <div class="bg-white dark:bg-[#242525] border border-stone-200 dark:border-[#434546] p-6 shadow-sm">
                    <form action="{{ route('blog.index') }}" method="GET" class="flex gap-2">
                        <input type="text" 
                               name="q"
                               value="{{ request('q') }}"
                               placeholder="Search …" 
                               class="w-full px-4 py-3 bg-stone-100 dark:bg-[#3a3a3a] text-stone-900 dark:text-[#cfcfcf] placeholder-stone-400 dark:placeholder-[#B2AA9E] border border-stone-300 dark:border-transparent rounded focus:outline-none focus:ring-2 focus:ring-emerald-500 text-sm font-semibold" />
                        <button type="submit" class="px-4 py-3 bg-emerald-600 text-white rounded text-sm font-medium hover:bg-emerald-700 transition">
                            খুঁজুন
                        </button>
                    </form>
                </div>

                <!-- Ad / App Banner -->
                <div class="bg-white dark:bg-[#242525] border border-stone-200 dark:border-[#434546] p-6 sm:p-7 shadow-sm">
                    <h3 class="text-sm font-bold uppercase tracking-wider text-stone-500 dark:text-[#B8B1A5] mb-4 pb-3 border-b border-stone-200 dark:border-[#434546]">
                        Ad: নামাজ ও রোজার চিরস্থায়ী সময়সূচীর অ্যাপ
                    </h3>
                    <div class="flex justify-center items-center py-2">
                        <div class="w-48 h-48 rounded bg-stone-100 dark:bg-stone-800 flex items-center justify-center border border-dashed border-stone-300 dark:border-stone-700 text-center p-3 text-xs text-stone-500 dark:text-stone-400">
                            Android App Banner
                        </div>
                    </div>
                    <p class="text-sm font-semibold text-[#EC572E] mt-4 text-center">
                        সাহরি-ইফতার ও সারা বছরের নামাজের সময়সূচী জানার জন্য ব্যবহার করুন আমাদের ডেভেলপ করা Android App!
                    </p>
                </div>

                <!-- Categories -->
                <div class="bg-white dark:bg-[#242525] border border-stone-200 dark:border-[#434546] p-6 sm:p-7 shadow-sm">
                    <h3 class="text-sm font-bold uppercase tracking-wider text-stone-500 dark:text-[#B8B1A5] mb-4 pb-3 border-b border-stone-200 dark:border-[#434546]">
                        Post Categories
                    </h3>
                    <ul class="space-y-3 text-sm text-stone-600 dark:text-[#B8B1A5]">
                        <li>
                            <div class="flex items-center justify-between">
                                <a href="#" class="flex items-center gap-2 hover:text-emerald-500 transition">
                                    <svg class="w-4 h-4 text-stone-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.75 9.776c.112-.017.227-.026.344-.026h15.812c.117 0 .232.009.344.026m-16.5 0a2.25 2.25 0 0 0-1.883 2.542l.857 6a2.25 2.25 0 0 0 2.227 1.932H19.05a2.25 2.25 0 0 0 2.227-1.932l.857-6a2.25 2.25 0 0 0-1.883-2.542m-16.5 0V6A2.25 2.25 0 0 1 6 3.75h3.879a1.5 1.5 0 0 1 1.06.44l2.122 2.12a1.5 1.5 0 0 0 1.06.44H18A2.25 2.25 0 0 1 20.25 9v.776" /></svg>
                                    প্যারেন্টিং
                                </a>
                                <span>(2)</span>
                            </div>
                        </li>
                        <li>
                            <div class="flex items-center justify-between">
                                <a href="#" class="flex items-center gap-2 hover:text-emerald-500 transition">
                                    <svg class="w-4 h-4 text-stone-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.75 9.776c.112-.017.227-.026.344-.026h15.812c.117 0 .232.009.344.026m-16.5 0a2.25 2.25 0 0 0-1.883 2.542l.857 6a2.25 2.25 0 0 0 2.227 1.932H19.05a2.25 2.25 0 0 0 2.227-1.932l.857-6a2.25 2.25 0 0 0-1.883-2.542m-16.5 0V6A2.25 2.25 0 0 1 6 3.75h3.879a1.5 1.5 0 0 1 1.06.44l2.122 2.12a1.5 1.5 0 0 0 1.06.44H18A2.25 2.25 0 0 1 20.25 9v.776" /></svg>
                                    ইসলাম
                                </a>
                                <span>(26)</span>
                            </div>
                            <!-- Nested items -->
                            <ul class="my-2 ml-6 space-y-2 text-xs">
                                <li>
                                    <a href="#" class="flex items-center justify-between hover:text-emerald-500 transition">
                                        <span>প্রচলিত ভুল ও কুসংস্কার</span>
                                        <span>(2)</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <div class="flex items-center justify-between">
                                <a href="#" class="flex items-center gap-2 hover:text-emerald-500 transition">
                                    <svg class="w-4 h-4 text-stone-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.75 9.776c.112-.017.227-.026.344-.026h15.812c.117 0 .232.009.344.026m-16.5 0a2.25 2.25 0 0 0-1.883 2.542l.857 6a2.25 2.25 0 0 0 2.227 1.932H19.05a2.25 2.25 0 0 0 2.227-1.932l.857-6a2.25 2.25 0 0 0-1.883-2.542m-16.5 0V6A2.25 2.25 0 0 1 6 3.75h3.879a1.5 1.5 0 0 1 1.06.44l2.122 2.12a1.5 1.5 0 0 0 1.06.44H18A2.25 2.25 0 0 1 20.25 9v.776" /></svg>
                                    ডেটা স্ট্রাকচার
                                </a>
                                <span>(21)</span>
                            </div>
                        </li>
                    </ul>
                </div>

            </aside>
        </div>
    </main>

    <!-- ===== FOOTER ===== -->
    <footer class="border-t border-stone-200 dark:border-[#434546] bg-white dark:bg-[#1a1b1b] mt-16">
        <div class="mx-auto max-w-6xl px-4 py-8 text-center sm:text-left flex flex-col sm:flex-row justify-between items-center gap-4 text-xs sm:text-sm text-stone-500 dark:text-[#B8B1A5]">
            <p>© <span id="year"></span> Hasan Abdullah. All rights reserved.</p>
            <p>Crafted with Laravel & Tailwind CSS</p>
        </div>
    </footer>

    <!-- Livewire Scripts -->
    @livewireScripts

    <script>
        document.getElementById('year').textContent = new Date().getFullYear();
    </script>
</body>
</html>