<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GrandShipper Test</title>
    <style>
        form {
            margin: 5%;
        }
    </style>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <h1>Displays Data Retrieved from the API</h1>
    <hr />
    <pre id="data"></pre>

    <h1>Centralized Auth Service</h1>
    <p>Choose email in API and password is Pa$$w0rd!</p>
    <hr/>

    <form id="loginForm">
        <input type="email" id="email" value="villanuevajoshua27@gmail.com"/>
        <input type="password" id="password" value="Pa$$w0rd!"/>
        <button type="submit">Login</button>
    </form>

    <pre class="response"></pre>

    <!-- Axios CDN -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        axios.defaults.withCredentials = true;
        axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        const baseURL = "{{ rtrim(env('APP_URL'), '/') }}/";

        // Fetch data from the API
        axios.get(baseURL + 'api/users')
            .then(function (response) {
                const dataDiv = document.getElementById('data');
                dataDiv.textContent = JSON.stringify(response.data, null, 2);
            })
            .catch(function (error) {
                console.error('Error fetching data:', error);
            });

        // Handle form submission
        document.getElementById('loginForm').addEventListener('submit', function(event) {
            event.preventDefault();

            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const responseDiv = document.querySelector('.response');

            axios.post(baseURL + 'api/login', {
                email: email,
                password: password
            })
            .then(function(response) {
                responseDiv.textContent = JSON.stringify(response.data, null, 2);
            })
            .catch(function(error) {
                responseDiv.textContent = error.response ? JSON.stringify(error.response.data.message, null, 2) : 'Error logging in';
            });
        });
    </script>
</body>
</html>
