var qs = (function(a) {
  if (a == "") return {};
  var b = {};
  for (var i = 0; i < a.length; ++i)
  {
    var p=a[i].split('=');
    if (p.length != 2) continue;
    b[p[0]] = decodeURIComponent(p[1].replace(/\*/g, " "));
  }
 return b;
})(window.location.search.substr(1).split('&'));

/*
Usage:
http://localhost/index.html?lat=18.23
qs["lat"] will give 18.23
*/

function getRequest(requestURL, successCallBack, failureCallBack) {
			     //console.log(requestURL);
				 
				 var request = $.ajax({
				   url: requestURL,
				   method: 'GET'
				 });
				 
				 request.done(successCallBack);
				 request.fail(failureCallBack);
				 
			   }


/*
1. post request
2. Place autocomplete request
3. Yelp Api
4. Bootstrap template Jquery
5. Usage of Jquery UI
6. Jquery stuff
*/