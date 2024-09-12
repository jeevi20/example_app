{{auth()->user()->name}}

<br><br>

<form action="{{ route('post.store') }}" method="post">
            @csrf
            
            <label for="title">Title:</label>
            <input type="text" name="title">

            <br><br>

            <label >Content:</label>
            <textarea name="content">  </textarea>
            <br><br>

            <button type="submit"> Create Post</button>
</form>