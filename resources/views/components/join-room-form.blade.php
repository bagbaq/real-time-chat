<div class="p-5 bg-green-200 mt-5 rounded-xl shadow-lg" id="join-room-form">
    <p class="font-bold text-amber-600 mb-5 text-lg">Enter room number and chat with stranger people now!</p>
    <div class="flex-col space-y-4 md:flex-row md:space-x-4 md:space-y-0 flex justify-center">
        <input type="number" name="number" id="join-room-input" class="p-3 bg-gray-500 text-white font-semibold outline-none w-full md:w-52" min="0" max="200" placeholder="Room Number (0-200)">
        <button type="submit" id="join-room-button" class="p-3 text-white bg-green-800">Join</button>
    </div>
    @error('number')
        <div class="text-red-700 font-bold mt-5">{{ $message }}</div>
    @enderror
</div>
