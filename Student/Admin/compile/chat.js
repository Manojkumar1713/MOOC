$(document).ready(function() {
    var $userName = $("#userName");
    var $chatOutput = $("#chatOutput");
    var $chatInput = $("#chatInput");
    var $chatSend = $("#chatSend");
});
$(document).ready(function() {
    var chatInterval = 250; //refresh interval in ms
    var $userName = $("#userName");
    var $title = $("#title");
    var $chatOutput = $("#chatOutput");
    var $chatInput = $("#chatInput");
    var $chatSend = $("#chatSend");

    function sendMessage() {
        var userNameString = $userName.val();
        var chatInputString = $chatInput.val();
        var titleString =$title.val();
        console.log(titleString);

        $.get("write.php", {
            username: userNameString,
            text: chatInputString,
            title: titleString
        });

      //  $userName.val("");
        retrieveMessages();
    }

    function retrieveMessages() {
        var titleString =$title.val();
        $.get("read.php", {title: titleString}, function(data) {
            $chatOutput.html(data); //Paste content into chat output
        });
    }

    $chatSend.click(function() {
        sendMessage();
    });

    setInterval(function() {
        retrieveMessages();
    }, chatInterval);
});
