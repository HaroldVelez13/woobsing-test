<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Usuarios con Rol') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        @foreach ($users as $user)
            <div class="transform transition cursor-pointer hover:-translate-y-2 ml-10 relative flex items-center px-6 py-4 bg-green-600 text-white rounded mb-10 flex-col md:flex-row space-y-4 md:space-y-0">
            <!-- Dot Follwing the Left Vertical Line -->
            <div class="w-5 h-5 bg-green-600 absolute -left-10 transform -translate-x-2/4 rounded-full z-10 mt-2 md:mt-0"></div>

            <!-- Line that connecting the box with the vertical line -->
            <div class="w-10 h-1 bg-green-300 absolute -left-10 z-0"></div>

            <!-- Content that showing in the box -->
            <div class="flex-auto">
                <h1 class="text-lg">{{ $user->name }} {{ $user->last_name }}</h1>
                <h1 class="text-xl font-bold">{{ $user->roles->pluck('name')[0] ?? '' }}</h1>
            </div>
           
            </div>
            @endforeach
            </div>
    </div>
</x-app-layout>
