import './bootstrap';

var joinRoomButton = document.getElementById("join-room-button");

if (joinRoomButton) {
    joinRoomButton.addEventListener("click", function () {
        var roomId = document.getElementById("join-room-input").value;

        if (roomId > 0 && roomId < 201) {
            window.location.href = "/r/" + roomId;
        }
        else {
            if (document.getElementById("join-room-error") != null) {
                document.getElementById("join-room-error").remove();
            }
            document.getElementById("join-room-form").insertAdjacentHTML("beforeend","<div id='join-room-error' class=\"text-red-700 font-bold mt-5\">Enter a number in range of 0-200</div>");
        }
    });
}
