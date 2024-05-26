<header>
   <style>
    .client-creator-form{
        width: fit-content;
        max-width: 50%;
        padding: 1em;
        border: 1px solid #000;
    }
.form-group{
    padding: 0.5em;
    display:flex;
    justify-content: space-around;
    gap: 0.4em
}

.client-creator-btn{
    padding: 1em;
    width:100%
}

tr>*{
    padding: 1em;
    margin-left: 2px;
}
tr::{color:lightblue}
   </style>
</header>
<form class="client-creator-form" action="/client" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
    </div>
    <div class="form-group">
        <label for="phone">Phone:</label>
        <input type="tel" id="phone" name="phone" required>
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
    </div>
    <button class="client-creator-btn" type="submit">Create Client</button>
</form>

<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($clients as $client)
            <tr>
                <td>{{ $client->name }}</td>
                <td>{{ $client->phone }}</td>
                <td>{{ $client->email }}</td>
                <td>
                    <a href="/client/{{ $client->id }}/edit">Edit</a>
                    <form action="/client/{{ $client->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>