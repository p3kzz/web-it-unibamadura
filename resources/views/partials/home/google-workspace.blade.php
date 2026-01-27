<section class="py-20 bg-gradient-to-br from-blue-50 via-white to-purple-50 border-y relative overflow-hidden">
    {{-- Background decoration --}}
    <div class="absolute top-0 right-0 w-96 h-96 bg-blue-100 rounded-full filter blur-3xl opacity-20 animate-pulse-slow"></div>
    <div class="absolute bottom-0 left-0 w-96 h-96 bg-purple-100 rounded-full filter blur-3xl opacity-20 animate-pulse-slow" style="animation-delay: 1s;"></div>

    <div class="container mx-auto px-4 relative z-10">
        <div class="flex flex-col lg:flex-row items-center gap-12">
            {{-- Logo Section --}}
            @include('partials.home.workspace-logo')
            
            {{-- Content Section --}}
            @include('partials.home.workspace-content')
        </div>
    </div>
</section>
