@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach ($post as $postItem)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <a href="">
                                <img src="{{ asset('uploads/post/'.$postItem->image)}}" alt="" class="img-fluid">
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="meta-info d-flex justify-content-between">
                                <p>
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M19.5 3.75H4.5C4.08579 3.75 3.75 4.08579 3.75 4.5V19.5C3.75 19.9142 4.08579 20.25 4.5 20.25H19.5C19.9142 20.25 20.25 19.9142 20.25 19.5V4.5C20.25 4.08579 19.9142 3.75 19.5 3.75Z" stroke="#1777E5" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M16.5 2.25V5.25" stroke="#1777E5" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M7.5 2.25V5.25" stroke="#1777E5" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M3.75 8.25H20.25" stroke="#1777E5" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                    <span>{{$postItem->created_at->format('d-m-y')}}
                                    </span>
                                </p>
                                <p>
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M19.5 3.75H4.5C4.08579 3.75 3.75 4.08579 3.75 4.5V19.5C3.75 19.9142 4.08579 20.25 4.5 20.25H19.5C19.9142 20.25 20.25 19.9142 20.25 19.5V4.5C20.25 4.08579 19.9142 3.75 19.5 3.75Z" stroke="#1777E5" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M16.5 2.25V5.25" stroke="#1777E5" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M7.5 2.25V5.25" stroke="#1777E5" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M3.75 8.25H20.25" stroke="#1777E5" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                    <span>{{$postItem->user->name}}</span>
                                </p>
                            </div>
                            <h2 class="blog-title">
                                <a href="/post/{{$postItem->slug}}}}" class="text-decoration-none">{{$postItem->name}}</a>
                            </h2>
                        </div>
                    </div>
                </div>
            @endforeach
            
        </div>
        <div>
            {{$post->links()}}
        </div>
    </div>
@endsection