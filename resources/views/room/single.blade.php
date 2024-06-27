<x-layout title="Room {{ $room }}">
    @push('styles')
        <style>
            body {
                background-color: cadetblue;
            }
        </style>
    @endpush

    <div class="text-center p-5 max-w-3xl m-auto rounded-lg shadow-2xl mt-10 bg-gray-500">
        <h1 class="text-green-500 text-4xl font-semibold">Welcome to room <b>{{ $room }}</b></h1>

        <div class="shadow-2xl bg-gray-400 mt-5 p-3 w-full h-96 max-h-96 overflow-auto" id="messages">
            <div class="message-box">
                <p class="message-author">Admin:</p>
                <p class="message-content">Chat with random people and have fun!</p>
            </div>
        </div>
        <div class="bg-gray-400 p-3 w-full border-t-2 shadow-2xl">
            <input id="message-box" type="text" class="w-full px-3 py-1 outline-none" placeholder="Say hello...">
            <button id="send-btn" class="p-2 bg-green-700 hover:bg-green-600 transition text-white mt-2 w-full">Send</button>
        </div>
    </div>

    @push('scripts')
        <script>
            var username = "0.0.0.0";
            fetch('https://api.ipify.org?format=json')
                .then(response => response.json())
                .then(data => {
                    username = data.ip;
                });

            const room = "{{ $room }}";
            const csrf_token = document.querySelector("meta[name='csrf-token']").content;

            document.addEventListener("keypress", function (event) {
                if (event.keyCode == 13) {
                    var buttonElement = document.getElementById("send-btn");
                    buttonElement.dispatchEvent(new Event("click"));
                }
            })

            document.getElementById("send-btn").addEventListener("click", function () {
                var messagebox = document.getElementById("message-box").value;

                if (messagebox) {
                    fetch("/r/" + room + "/message/", {
                        method: "POST",
                        body: new URLSearchParams({
                            message: messagebox,
                            username: username
                        }),
                        headers: {
                            'X-CSRF-TOKEN': csrf_token,
                            'content-type': 'application/x-www-form-urlencoded'
                        }
                    })

                    document.getElementById("message-box").value = "";
                }
            });

            setTimeout(function () {
                window.Echo
                    .channel("room-" + room)
                    .listen('messageEvent', (e) => {
                        var messageContainer = document.getElementById("messages");

                        messageContainer.innerHTML += '<div class="message-box"> <p class="message-author">' + e.username + ':</p> <p class="message-content">' + e.message + '</p> </div>'
                        messageContainer.scrollTop = messageContainer.scrollHeight;
                    })
            }, 200);
        </script>
    @endpush
</x-layout>
