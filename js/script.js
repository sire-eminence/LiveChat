"use strict";

//Logout script
let out = document.querySelector('.out');
out.addEventListener('click', ()=>{
    let ans = confirm("Are you sure you want to exit chat?");
    if(ans == true){
        window.location.assign("http://localhost/livechat/logout.php")
    }
});


//Submit message form
let chatForm = document.querySelector('.msgForm'),
url = "http://localhost/livechat/post.php";

if(chatForm){
	chatForm.addEventListener('submit', function(e){
		let formdata = new FormData(chatForm);
        
        fetch(url, {
            method: "POST",
            body: formdata,
        });

        chatForm.reset();

		e.preventDefault();
	});
}


//Loading new messages
let msgPane = document.querySelector('.msgPane'),
myHeaders = new Headers();

myHeaders.append('pragma', 'no-cache');
myHeaders.append('cache-control', 'no-cache');

const loadMsgLog = ()=>{
    fetch("http://localhost/livechat/log.txt", {
		method: "GET",
        headers: myHeaders,
	})
    .then((response) => {
		if(response.ok){
			return response.text();
		}
	})
    .then((result) => {
        msgPane.textContent = "";
        msgPane.insertAdjacentHTML('beforeend', result);
    });

    msgPane.scrollTop = "1000";
}

//Call the load messages function within 3 minutes interval
setInterval(loadMsgLog, 3000);