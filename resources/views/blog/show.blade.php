<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>{{ $post->title }} — হাসানের রাখাল</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script>
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
</head>

<body class="bg-[#f5f5f4] dark:bg-[#242525] text-stone-900 dark:text-white antialiased transition-colors duration-200">
    <div class="max-w-4xl mx-auto px-4 py-10 sm:py-14">
        
        <div class="mb-6 flex justify-between items-center">
            <a href="/" class="text-sm font-semibold text-emerald-600 dark:text-emerald-400 hover:underline">
                &larr; প্রধান পাতা
            </a>
            <x-theme-toggle />
        </div>

        <article class="bg-white dark:bg-[#242525] border border-stone-200 dark:border-[#434546] p-6 sm:p-12 shadow-sm">
            <h1 class="text-3xl sm:text-4xl font-bold mb-4 text-stone-900 dark:text-[#D4CFC5] leading-tight">
                {{ $post->title }}
            </h1>

            <div class="flex flex-wrap items-center gap-2 text-xs sm:text-sm text-stone-500 dark:text-[#B8B1A5] pb-5 border-b border-stone-200 dark:border-[#434546] mb-6">
                <span>{{ $post->published_at ? $post->published_at->format('d F, Y') : $post->created_at->format('d F, Y') }}</span>
                <span>/</span>
                <span>{{ $post->user->name ?? 'Hasan Abdullah' }}</span>
            </div>

            @if($post->featured_image)
                <div class="mb-8">
                    <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}" class="w-full h-auto">
                </div>
            @endif

            <div class="prose dark:prose-invert max-w-none text-stone-700 dark:text-[#D4CFC5] leading-relaxed text-base sm:text-lg whitespace-pre-line">
                {!! nl2br(e($post->body)) !!}
            </div>
        </article>
    </div>
</body>
</html>