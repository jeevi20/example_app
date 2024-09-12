{{auth()->user()->name}}

<br><br>

<form method="post" action="{{ route('comment.update',$comment->id) }}" >
            @csrf
            @method('PUT')
            <!-- <input type="hidden" name="_method" value="post"> -->

            <label >Comment:</label>
            <textarea name="comment"> {{$comment->comment}} </textarea>
            <br><br>

            <button type="submit"> Edit Comment</button>
</form>