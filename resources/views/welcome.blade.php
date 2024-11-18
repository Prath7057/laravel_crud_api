<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel Datatables</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/datatables.net-bs5@1.13.1/css/dataTables.bootstrap5.min.css"
        rel="stylesheet">
</head>

<body>
    <img src="{{ asset('add.png') }}" style="display: none;"
    onload="const message = sessionStorage.getItem('message');
        if (message) {
            document.getElementById('message').style.visibility = 'visible';
            document.getElementById('message').innerHTML = message;
            const messageType = sessionStorage.getItem('type');
            if (messageType) 
            document.getElementById('message').classList.add('alert', 'alert-'+ messageType );
            else 
             document.getElementById('message').classList.add('alert', 'alert-success' );
              setTimeout(function() {
                document.getElementById('message').style.visibility = 'hidden';
            }, 2000);
            sessionStorage.removeItem('message');
            sessionStorage.removeItem('type');
        }" />
    <div class="container">
        <h2 class="text-center mb-4">User List</h2>
        <div id="message" class=" h-50" role="alert" style="visibility: hidden;">
        </div>
        
        <a class="btn btn-sm btn-info text-blue" href="/create">Create</a>
        <table id="usersTable" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>City</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->user_name }}</td>
                        <td>{{ $user->user_email }}</td>
                        <td>{{ $user->user_mobile }}</td>
                        <td>{{ $user->user_city }}</td>
                        <td>
                            <a class="btn btn-sm btn-primary" href="/edit/{{ $user->user_id }}">Update</a>
                            <a class="btn btn-sm btn-danger" onclick="deleteData({{ $user->user_id }})">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/datatables.net@1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/datatables.net-bs5@1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#usersTable').DataTable({
                "paging": true,
                "ordering": true,
                "searching": true,
                "lengthMenu": [8, 16, 32],
                "info": true
            });
        });
        //
        function deleteData(id) {
            const data = {
                user_id: id
            };

            fetch('/api/delete', {
                method: 'DELETE',
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
                        sessionStorage.setItem('type', data.type);
                        window.location.href = data.redirect;
                    }
                })
                .catch(error => console.error('Error:', error));
        
        }
    </script>
</body>

</html>
