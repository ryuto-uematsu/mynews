@extends('layouts.front')

@section('content')
    <div class="container">
        <hr color="#c0c0c0">
        @if (!is_null($headline))
            <div class="row">
                <div class="headline col-md-10 mx-auto">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="caption mx-auto">
                                <div class="title p-2">
                                    <h1>{{ Str::limit($headline->name, 15) }}</h1>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="col-md-6">
                                <p class="body mx-auto">{{ Str::limit($headline->gender, 15) }}</p>
                            </div>
                            <div class="col-md-6">
                                <p class="body mx-auto">趣味:{{ Str::limit($headline->hobby, 20) }}</p>
                            </div>
                            <div class="col-md-6">
                                <p class="body mx-auto">自己紹介:{{ Str::limit($headline->introduction, 50) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <hr color="#c0c0c0">
        <div class="row">
            <div class="posts col-md-8 mx-auto mt-3">
                @foreach($posts as $post)
                    <div class="post">
                        <div class="row">
                            <div class="text col-md-6">
                                <div class="date">
                                    {{ $post->updated_at->format('Y年m月d日') }}
                                </div>
                                <div class="name">
                                    {{ Str::limit($post->name, 15) }}
                                </div>
                                <div class="body mt-3">
                                    {{ Str::limit($post->gender, 15) }}
                                </div>
                                <div class="body mt-3">
                                    趣味:{{ Str::limit($headline->hobby, 20) }}
                                </div>
                                <div class="body mt-3">
                                   自己紹介:{{ Str::limit($headline->introduction, 50) }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr color="#c0c0c0">
                @endforeach
            </div>
        </div>
    </div>
    </div>
@endsection