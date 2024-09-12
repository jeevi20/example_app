{{auth()->user()->name}}

<br><br>

<form action="{{ route('comment.store') }}" method="post">
            @csrf

            <label >Comment:</label>
            <textarea name="comment">  </textarea>
            <br><br>

            <button type="submit"> Create Comment</button>
</form>