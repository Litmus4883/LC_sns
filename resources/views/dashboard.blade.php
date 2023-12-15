<x-app-layout>
    <x-slot name="header">
        <h2>{{ __('Dashboard') }}</h2>
    </x-slot>
    
    <!-- ダッシュボードの下の余白-->
    <div class="border-solid border-t-8 border-black bg-white py-5">
        <!-- -->
        <div class=" relative max-w-4xl mx-auto " style="content-center padding-bottom: 100%; width: 100%;">
            <!-- 絶対値の完全な円形-->
            <div style="border-width: 15px;" class="border-dashed border-black h-screen absolute inset-0 overflow-hidden rounded-full flex items-center justify-center bg-white ">
                <!-- You're logged in!-->
                <div class=" text-center text-5xl font-black font-mono text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
