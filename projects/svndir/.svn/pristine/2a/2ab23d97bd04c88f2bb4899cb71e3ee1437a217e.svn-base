// keep is local, also self-calling
(function(){
    var moduleName = 'googleLoginModule';
    var module;
    try {
        // assume, module is already created before
        module = angular.module(moduleName);  
    } catch(err) {
        //first time create
        module = angular.module(moduleName,[]);  
    };
    // define the directive, with a named function
    module.directive('googleLogin', fnGoogleLogin);
    function fnGoogleLogin() {
        return {
            scope: {
                userData: '='  // = is 2-way binding, @ for 1-way, and &?
            },
            templateUrl: 'js/directives/googleLogin.html',
            // link is all the directive's functionality
            link: function (scope, elem, attr){
                var clientId='111104389688-1mjac6kckuhr9evc1l7igo0r3s95ab1o.apps.googleusercontent.com';
                var apiKey='AIzaSyCsn-I49N27DI8Z9xhLVeTbDnz2mW5sQlk';
                // google scopes for login, not angular scope
                var scopes='https://www.googleapis.com/auth/plus.me https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/plus.profile.emails.read';
                // details specific to this directive
              var data = localStorage.getItem('userData');
              if (data) {
                scope.userData = JSON.parse(data);  
              }

            scope.login = function(){
                if (!gapi.client) {
                  return false; 
                }
            handleClientLoad();
            handleAuthClick();
        };
             scope.logout = function(){
                 gapi.auth.signOut();
                 scope.userData=null;
                 localStorage.removeItem('userData');
        };
            function handleClientLoad() {
                // Step 2: Reference the API key
                gapi.client.setApiKey(apiKey);
                //window.setTimeout(checkAuth,1);
              }
              
              function checkAuth() {
                gapi.auth.authorize({client_id: clientId, scope: scopes, immediate: true}, handleAuthResult);
              }
              
              function handleAuthResult(authResult) {
                //var authorizeButton = document.getElementById('authorize-button');
                if (authResult && !authResult.error) {
                  //authorizeButton.style.visibility = 'hidden';
                  makeApiCall();
                } else {
                  //authorizeButton.style.visibility = '';
                  //authorizeButton.onclick = handleAuthClick;
                }
              }
              
              function handleAuthClick(event) {
                // Step 3: get authorization to use private data
                gapi.auth.authorize({client_id: clientId, scope: scopes, immediate: false}, handleAuthResult);
                return false;
              }
              
              // Load the API and make an API call.  Display the results on the screen.
              function makeApiCall() {
                // Step 4: Load the Google+ API
                gapi.client.load('plus', 'v1').then(function() {
                  // Step 5: Assemble the API request
                  var request = gapi.client.plus.people.get({
                    'userId': 'me'
                  });
                  // Step 6: Execute the API request
                  request.then(function(resp) {
                    console.log(resp);
                    scope.userData = {
                      id: resp.result.id,
                      email: resp.result.emails[0].value,
                      url: resp.result.url,
                      name: resp.result.displayName,
                      firstName: resp.result.name.givenName,
                      lastName: resp.result.name.familyName,
                      image: resp.result.image.url
                    };
                    console.log(scope.userData);
                    if(!scope.$$phase) scope.$apply();
                    localStorage.setItem('userData', JSON.stringify(scope.userData));
                  }, function(reason) {
                    console.log('Error: ' + reason.result.error.message);
                  });
                });
              }//end function 
            }
        
        };
    }
}());