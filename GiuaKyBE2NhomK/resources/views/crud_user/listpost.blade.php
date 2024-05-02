@extends('dashboard')

@section('content')
<main class="login-form">
    <div class="container">
        <div class="row justify-content-center">
            <table>
                <thead>
                    <tr>
                        <th>ID Post</th>
                        <th>ID User</th>
                        <th>Post Name</th>
                        <th>Post Description</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                    <tr>
                        <th>{{ $post->post_id }}</th>
                        <th>{{ $post->user_id }}</th>
                        <th>{{ $post->post_name }}</th>
                        <th>{{ $post->post_description }}</th>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="col-md-5"></div>
            <div class="col-md-2">{{ $posts->links() }}</div>
            <div class="col-md-5"></div>
        </div>

    </div>
</main>
@endsection