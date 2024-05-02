@extends('dashboard')

@section('content')
<main class="login-form">
    <div class="container">
        <div class="row justify-content-center">
            <table>
                <thead>
                    <tr>
                        <th>ID Favorite</th>
                        <th>Favorite Name</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($favorites as $favorite)
                    <tr>
                        <th>{{ $favorite->favorite_id }}</th>
                        <th>{{ $favorite->favorite_name }}</th>
                        <th>{{ $favorite->favorite_description }}</th>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="col-md-5"></div>
            <div class="col-md-2">{{ $favorites->links() }}</div>
            <div class="col-md-5"></div>
        </div>

    </div>
</main>
@endsection