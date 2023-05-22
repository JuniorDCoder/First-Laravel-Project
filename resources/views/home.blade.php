<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial scale=1.0">
    <title>Document</title>
</head>
<body>
    @auth
    <form action="/logout" method="post">
            @csrf
            <h2>Welcome User</h2>

            <button>Logout</button>
    </form>
    <div style="border: 3px solid black; margin-top: 20px;">
        <h2>Create a New Post</h2>
        <form action="/create_post" method="post">
            @csrf
            <input type="text" name="title" placeholder="Title">
            <textarea name="body" placeholder="Content..."></textarea>
            <button>Save Post</button>
        </form>
    </div>
    <div style="border: 3px solid black; margin-top: 20px;">
        <h2>All Posts</h2>
        @foreach ($posts as $post)
            <div style="background-color: gray; padding: 10px; margin: 20px;">
                <h3>{{$post['title']}} by {{$post->user->name}}</h3>
                {{$post['body']}}
                <p><a href="/edit-post/{{$post->id}}">Edit</a></p>
                <form action="/delete-post/{{$post->id}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button>Delete</button>
                </form>
            </div>
        @endforeach
    </div>
    @else
    <div style="border: 3px solid black;">
        <form action="/register" method="post">
            @csrf
            <h2>Register</h2>
            <input type="text" name="name" placeholder="Enter Your Name">
            <input type="text" name="email" placeholder="Enter Your Email">
            <input type="password" name="password" placeholder="Enter Your Password">
            <button>SignUp</button>
        </form>
    </div>
    <div style="border: 3px solid black; margin-top: 15px;">
        <form action="/login" method="post">
            @csrf
            <h2>Login</h2>
            <input type="text" name="name" placeholder="Enter Your name">
            <input type="password" name="password" placeholder="Enter Your Password">
            <button>Login</button>
        </form>
    </div>
    @endauth


</body>
</html>
