<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    @auth
        <p>Congrats you are logged in.</p>
        <form action="/logout" method="POST">
            @csrf
            <button>Log out</button>
        </form>

        <div style="border: 3px solid black;">
            <h2>Create a new Task</h2>
            <form action="/create-task" method="POST">
                @csrf
                <input type="text" name="title" placeholder="title">
                <input type="text" name="desc" placeholder="description">
                <button>Save Post</button>
            </form>
        </div>

        <div style="border: 3px solid black;">
            <h2>All Tasks</h2>
            @foreach ($tasks as $task)
                <div style="background-color: gray; padding: 10px; margin:10px;">
                    <h3>{{ $task['title'] }} by {{ $task->user->name }}</h3>
                    {{ $task['desc'] }}
                    <p><a href="/edit-task/{{ $task->id }}">Edit</a></p>
                    <form action="/delete-task/{{ $task->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button>Delete</button>
                    </form>
                </div>
            @endforeach
        </div>
    @else
        <div style="border: 3px solid black;">
            <h2>Register</h2>
            <form action="/register" method="POST">
                @csrf
                <input type="text" placeholder="name" name="name">
                <input type="text" placeholder="email" name="email">
                <input type="password" placeholder="password" name="password">
                <button>Register</button>
            </form>
        </div>

        <div style="border: 3px solid black;">
            <h2>Login</h2>
            <form action="/login" method="POST">
                @csrf
                <input type="text" placeholder="name" name="loginname">
                <input type="password" placeholder="password" name="loginpassword">
                <button>Login</button>
            </form>
        </div>
    @endauth
</body>

</html>
