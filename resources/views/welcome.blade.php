<x-layout>
    <div class="p-5 text-center">
        <h1 class="text-4xl font-bold">Welcome to <span class="text-green-800 drop-shadow-2xl">{{ env('APP_NAME') }}</span></h1>

        <img src="{{ asset('media/bg.jpg') }}" alt="Background" class="w-full h-96 my-5 rounded-xl shadow-2xl object-cover object-top">

        <x-join-room-form></x-join-room-form>
    </div>
</x-layout>
