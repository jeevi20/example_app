<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Comment') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Share your Mind!") }}
                </div>
            </div>
       <a class="btn btn-warning" href="{{route('post.add')}}" role="button">Add Post</a>

            <table>
                <thead>
                    <th>Id</th>
                    <th>Comment</th>
                    <th>Created By</th>
                    <th>Post_Id</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </thead>

                <tbody>
                    @foreach($comments as $comment)
                    <tr>
                    <td>{{$comment->id}}</td>
                    <td>{{$comment->comment}}</td>
                    <td>{{$comment->user->name}}</td>
                    <td>{{$comment->post_id}}</td>

                    <td><a href="{{route('comment.edit',$comment->id)}}">Edit</a></td>
                    <td><a href="{{route('comment.delete',$comment->id)}}">Delete</a></td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>