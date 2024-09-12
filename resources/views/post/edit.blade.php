{{auth()->user()->name}}

<br><br>

<form method="post" action="{{ route('post.update',$post->id) }}" >
            @csrf
            @method('PUT')
            <!-- <input type="hidden" name="_method" value="post"> -->
            <label for="title">Title:</label>
            <input type="text" name="title" value="{{$post->title}}">

            <br><br>

            <label >Content:</label>
            <textarea name="content"> {{$post->content}} </textarea>
            <br><br>

            <button type="submit"> Edit Post</button>
</form>
