 var qs = (function(a) {
      if (a == "") return {};
      var b = {};
      for (var i = 0; i < a.length; ++i)
      {
        var p=a[i].split('=');
        if (p.length != 2) continue;
        b[p[0]] = decodeURIComponent(p[1].replace(/\+/g, " "));
      }
    return b;
    })(window.location.search.substr(1).split('&'));

/*
 Usage:
http://localhost/index.html?lat=18.23
qs[“lat”] will give 18.23
 */


//generic function to call ajax using get method
   function getRequest(requestURL, successCallBack, failureCallBack) {
      
        var request = $.ajax({
        url: requestURL,
        method: 'GET'
      });
      
      request.done(successCallBack);
      request.fail(failureCallBack);
    } 
    
   //generic function to call ajax using post method 
     function postRequest(requestURL, postData, successCallBack, failureCallBack) {
  var request = $.ajax({
    url: requestURL,
    method: 'POST',
    data: postData
  });
  request.done(successCallBack);
  request.fail(failureCallBack);
}//end postRequest()
    
/*  1. postRequest
2. Place autocomplete request: https://developers.google.com/maps/documentation/javascript/examples/places-autocomplete-addressform
3. Yelp Api
4. Bootstrap template with Jquery
5. Usage of Jquery UI
6. Jquery stuff   
*/