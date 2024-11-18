<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .input-group-text {
            width: 150px;
        }
    </style>
</head>
<body>
    <div class="container mt-5" style="width: 50%">
        <form>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">User Name </span>
                <input id="user_name" name="user_name" type="text" class="form-control" placeholder="User Name"
                    aria-label="Username" aria-describedby="basic-addon1" value="{{ isset($user) ? $user->user_name : '' }}">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">User Email</span>
                <input id="user_email" name="user_email" type="text" class="form-control" placeholder="User Email"
                    aria-label="User Email" aria-describedby="basic-addon1" value="{{ isset($user) ? $user->user_email : '' }}">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">User Mobile</span>
                <input id="user_mobile" name="user_mobile" type="text" class="form-control" placeholder="User Mobile"
                    aria-label="User Mobile" aria-describedby="basic-addon1" value="{{ isset($user) ? $user->user_mobile : '' }}">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">User City</span>
                <input id="user_city" name="user_city" type="text" class="form-control" placeholder="User City"
                    aria-label="User City" aria-describedby="basic-addon1" value="{{ isset($user) ? $user->user_city : '' }}">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">User Password</span>
                <input id="user_password" name="user_password" type="password" class="form-control"
                    placeholder="User Password" aria-label="User Password" aria-describedby="basic-addon1" value="{{ isset($user) ? $user->user_ipassword : '' }}">
            </div>
            <div class="d-flex justify-content-center">
                <input type="hidden" id="user_id" value="{{ isset($user) ? $user->user_id : '' }}" />
                @php
                    if (isset($user->user_id)) { @endphp
                        <button type="button" class="btn btn-primary" onclick="addData();">Update</button>
                        @php } else { @endphp
                            <button type="button" class="btn btn-primary" onclick="addData();">Submit</button>
                            @php  }
                @endphp
                
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function addData() {
            sessionStorage.removeItem('message');
            sessionStorage.removeItem('type');
            const data = {
                user_name: document.getElementById('user_name').value,
                user_id: document.getElementById('user_id').value,
                user_email: document.getElementById('user_email').value,
                user_mobile: document.getElementById('user_mobile').value,
                user_city: document.getElementById('user_city').value,
                user_password: document.getElementById('user_password').value,
            };

            fetch('/api/store', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                    },
                    body: JSON.stringify(data),
                })
                .then(response => response.json())
                .then(data => {
                    if (data.errors) {
                    } else {
                        sessionStorage.setItem('message', data.message);
                        window.location.href = data.redirect;
                    }
                })
                .catch(error => console.error('Error:', error));
        }
    </script>
</body>

</html>
