function insertDujourWidget(widgetID, darkBGColor) {
	var dujourDomain = "http://dujour.it";
	// var dujourDomain = "http://localhost:3000";
	var dujourDiv=document.getElementById('dujour_widget' + widgetID);
	var userName=dujourDiv.getAttribute("data-username")

	var iFrameWidth = dujourDiv.offsetWidth;

	var iFrameSrc = dujourDomain + "/user/" + userName + "/widget/v1/4/" + iFrameWidth + ".html"
	var iFrameDarkBGColor = (darkBGColor=="dark") ? "?bg=dark" : ''
	var iFrameCss = "width: " + iFrameWidth + "px; height: " + iFrameWidth + "px;"
	var iFrameId = "dujourWidgetIframe" + widgetID

	var divInnerHTML =
		'<iframe ' + 
			'id=' + iFrameId + ' ' +
			'src=' + iFrameSrc + iFrameDarkBGColor + ' ' +
			'frameborder="0"' + 
			'style="' + iFrameCss + '">' +
		'</iframe>'

	dujourDiv.innerHTML = divInnerHTML;

	// Setting default height
	dujourDiv.style.height = iFrameWidth + "px";

	var intervals;
	intervals = setInterval(function(){
		document.getElementById(iFrameId).contentWindow.postMessage('giveMeHeight',dujourDomain);
	},1000);

	// Create IE + others compatible event handler
	var eventMethod = window.addEventListener ? "addEventListener" : "attachEvent";
	var eventer = window[eventMethod];
	var messageEvent = eventMethod == "attachEvent" ? "onmessage" : "message";

	// Listen to message from child window
	eventer(messageEvent,function(e) {
		if(event.origin !== dujourDomain) return;
		dujourDiv.style.height = e.data + "px";
		document.getElementById(iFrameId).style.height = e.data + "px";

		// Stop listening
		clearInterval(intervals);
	},false);
}