<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="google-signin-scope" content="profile email">
        <meta name="google-signin-client_id" content="599007043954-tr127f89fd82i7rdrmje1ifaq6kfdeua.apps.googleusercontent.com">
        <title>Ezel</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="/css/material.css">

        <script src="https://apis.google.com/js/platform.js"></script>
        <script src="/js/libs.js"></script>
        <script>
            function onSignIn(googleUser) {
                // Useful data for your client-side scripts:
                var profile = googleUser.getBasicProfile();
                console.log("ID: " + profile.getId()); // Don't send this directly to your server!
                console.log('Full Name: ' + profile.getName());
                console.log('Given Name: ' + profile.getGivenName());
                console.log('Family Name: ' + profile.getFamilyName());
                console.log("Image URL: " + profile.getImageUrl());
                console.log("Email: " + profile.getEmail());

                // The ID token you need to pass to your backend:
                var id_token = googleUser.getAuthResponse().id_token;
                console.log("ID Token: " + id_token);
                $.post('/login', {
                    token: id_token,
                    _token: '{{csrf_token()}}'
                });
            };
            function logout(){
                var auth2 = gapi.auth2.getAuthInstance();
                auth2.signOut().then(function () {
                    console.log('User signed out.');
                });
            }
        </script>
        <style>
            body {
                display: flex;
                min-height: 100vh;
                flex-direction: column;
            }

            main {
                flex: 1 0 auto;
            }
        </style>
    <body>
        <header>
            <nav class="top-nav blue valign-wrapper" style="height: 200px;">
                <div class="container">
                    <div class="nav-wrapper"><h1 class="page-title valign thin">Ezel</h1></div>
                </div>
            </nav>
        </header>
        <main class="container">
            <div class="row section">
                <div class="col s6 flow-text">
                    <a onclick="logout();" class="btn btn-large">Sign Out</a>
                </div>
                <div class="col s6">
                    {{-- <div class="card-panel"> --}}
                        <div class="g-signin2" data-onsuccess="onSignIn" data-theme="light"></div>
                    {{-- </div> --}}
                </div>
                {{-- <div class="card-panel">
                    <p class="flow-text">One common flaw we've seen in many frameworks is a lack of support for truly responsive text. While elements on the page resize fluidly, text still resizes on a fixed basis. To ameliorate this problem, for text heavy pages, we've created a class that fluidly scales text size and line-height to optimize readability for the user. Line length stays between 45-80 characters and line height scales to be larger on smaller screens.</p>

                    <p class="flow-text">To see Flow Text in action, slowly resize your browser and watch the size of this text body change! Use the button above to toggle off/on flow-text to see the difference!</p>
                </div> --}}
            </div>
        </main>
        <footer class="page-footer black">
            <div class="container">
                <div class="row">
                    <div class="col l6 s12">
                        <h5 class="white-text">Footer Content</h5>
                        <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
                    </div>
                    <div class="col l4 offset-l2 s12">
                        <h5 class="white-text">Links</h5>
                        <ul>
                        <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
                        <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
                        <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
                        <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-copyright">
                <div class="container">
                    © 2014 Copyright Text
                    <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
                </div>
            </div>
        </footer>
    </body>
</html>
