<head>
    <style type="text/css">
        h1 {
            text-align: center;
            font-family: Arial, sans-serif;
            font-size: 1.5em;
            font-weight: bold;
            margin: 20px 0;
        }
    </style>
</head>
<h1 style="text-align: center; font-family: Arial, sans-serif; font-size: 1.5em; font-weight: bold; margin: 20px 0;">Clients</h1>
    @if (session('success'))
        <div class="alert alert-success" style="padding: 10px; border-radius: 5px; background-color: #dff0d8; color: #3c763d; border: 1px solid #d6e9c6;">
            {{ session('success') }}
        </div>
    @endif

    <table style="width: 100%; border-collapse: collapse; margin: 0 auto; font-family: Arial, sans-serif;">
        <thead>
        <tr style="background-color: #f5f5f5; color: #333; text-align: left; padding: 10px;">
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($clients as $client)
            <tr>
                <td>{{ $client->id }}</td>
                <td>{{ $client->name }}</td>
                <td>{{ $client->email }}</td>
                <td>{{ $client->phone }}</td>
                <td>
                    <!--<a href="" class="btn btn-primary">Edit</a>-->
                    <form action="" method="POST" style="display: inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

<!--<a href="" class="btn btn-success">Create New Client</a>
-->
