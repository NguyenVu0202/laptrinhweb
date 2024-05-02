@extends('dashboard')

@section('content')
<main class="login-form">
    <div class="container">
        <div class="row justify-content-center">

            <div class="card">
                <h3 class="card-header text-center">Màn hình chi tiết</h3>
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-3"><span>ID User_Profile:</span></div>
                            <div class="col-md-3">{{ $user_profile->user_profile_id }}</div>
                            <div class="col-md-3"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-3"><span>ID User:</span></div>
                            <div class="col-md-3">{{ $user_profile->user_id }}</div>
                            <div class="col-md-3"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-3"><span>Username:</span></div>
                            <div class="col-md-3">{{ $user_profile->first_name . ' ' . $user_profile->last_name }}</div>
                            <div class="col-md-3"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-3"><span>Email:</span></div>
                            <div class="col-md-3">{{ $user_profile->email}}</div>
                            <div class="col-md-3"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-3"><span>Sex:</span></div>
                            <div class="col-md-3">{!! $user_profile->sex !!}</div>
                            <div class="col-md-3"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-3"><span>Phone:</span></div>
                            <div class="col-md-3">{!! $user_profile->phone !!}</div>
                            <div class="col-md-3"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-3"><span>Address:</span></div>
                            <div class="col-md-3">{!! $user_profile->address !!}</div>
                            <div class="col-md-3"></div>
                        </div>
                        @foreach($posts as $post)
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-3"><span>Post Name:</span></div>
                            <div class="col-md-3">{!! $post->post_name !!}</div>
                            <div class="col-md-3"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-3"><span>Post Description:</span></div>
                            <div class="col-md-3">{!! $post->post_description !!}</div>
                            <div class="col-md-3"></div>
                        </div>
                        @endforeach
                        @foreach($favorities as $value)
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-3"><span>Favorite Name:</span></div>
                            <div class="col-md-3">{!! $value->favorite_name !!}</div>
                            <div class="col-md-3"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-3"><span>Favorite Description:</span></div>
                            <div class="col-md-3">{!! $value->favorite_description !!}</div>
                            <div class="col-md-3"></div>
                        </div>
                        @endforeach
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-3"><span>Image:</span></div>
                            <div class="col-md-3"><img style="height: 200px; margin-top: 20px;" src="{{ asset('uploads/userimage/' . $user_profile->image) }}" alt="Phone Image"></div>
                            <div class="col-md-3"></div>
                        </div>                      
                        <div class="row btn_edit">
                            <div class="col-md-8"></div>
                            <div class="col-md-2">
                                <div class="d-grid mx-auto">
                                    <a href="{{ route('user.UpdatetUser', ['id' => $user_profile->user_id]) }}" class="btn btn-primary btn-block">Chỉnh sửa</a>
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection