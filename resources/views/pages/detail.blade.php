@extends('layouts.app')

@section('title', 'Detail Travel')

@section('content')
    <!-- Detail -->
    <main>
        <section class="section-detail-header"></section>
        <section class="section-detail-content">
            <div class="container">
                <div class="row">
                    <div class="col p-0">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">Paket Travel</li>
                                <li class="breadcrumb-item active" aria-current="page">Details</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card card-detail">
                            <h3>{{ $item->title }}</h3>
                            <p>{{ $item->location }}</p>
                            @if ($item->galleries->count())
                            <div class="gallery">
                                <div class="xzoom-container">
                                    <img src="{{ Storage::url($item->galleries->first()->image) }}" class="xzoom" id="xzoom-default" xoriginal="{{ Storage::url($item->galleries->first()->image) }}">
                                </div>
                                <div class="xzoom-thumbs">
                                    @foreach ($item->galleries as $gallery)
                                        <a href="{{ Storage::url($gallery->image) }}">
                                            <img src="{{ Storage::url($gallery->image) }}" class="xzoom-gallery" width="124" xpreview="{{ Storage::url($gallery->image) }}">
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                            @endif
                            <h4>Tentang Wisata</h4>
                            <p>
                                {!! $item->about !!}
                            </p>
                            <div class="row features">
                                <div class="col-md-4">
                                    <div class="event-img">
                                        <img src="{{ url('frontend/img/ic_event.png') }}" alt="">
                                    </div>
                                    <div class="description">
                                        <h5>Featured Event</h5>
                                        <p>{{ $item->featured_event }}</p>
                                    </div>
                                </div>
                                <div class="col-md-4 border-left">
                                    <div class="event-img">
                                        <img src="{{ url('frontend/img/ic_language.png') }}" alt="">
                                    </div>
                                    <div class="description">
                                        <h5>Language</h5>
                                        <p>{{ $item->language }}</p>
                                    </div>
                                </div>
                                <div class="col-md-4 border-left">
                                    <div class="event-img">
                                        <img src="{{ url('frontend/img/ic_foods.png') }}" alt="">
                                    </div>
                                    <div class="description">
                                        <h5>Foods</h5>
                                        <p>{{ $item->foods }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card card-detail card-right">
                            <h4>Member are going</h4>
                            <div class="user-img my-2">
                                <img src="frontend/img/member/1.jpg" class="mr-1" alt="">
                                <img src="frontend/img/member/2.jpg" class="mr-1" alt="">
                                <img src="frontend/img/member/3.jpg" class="mr-1" alt="">
                                <img src="frontend/img/member/4.jpg" class="mr-1" alt="">
                                <img src="frontend/img/member/5.jpg" class="mr-1" alt="">
                            </div>
                            <hr>
                            <h4>Trip Information</h4>
                            <table>
                                <tr>
                                    <th>Date of Departure</th>
                                    <td class="text-right">{{ \Carbon\Carbon::create($item->date_of_departure)->format('F n, Y') }}</td>
                                </tr>
                                <tr>
                                    <th>Duration</th>
                                    <td class="text-right">{{ $item->duration }}</td>
                                </tr>
                                <tr>
                                    <th>Type</th>
                                    <td class="text-right">{{ $item->type }}</td>
                                </tr>
                                <tr>
                                    <th>Price</th>
                                    <td class="text-right">${{ $item->price }},00 / person</td>
                                </tr>
                            </table>
                        </div>
                        <div class="join-container">
                            @auth
                                <form action="{{ route('checkout_process', $item->id) }}" method="POST">
                                    @csrf
                                    <button class="btn btn-block btn-join-now py-2 text-white" type="submit">
                                        Join Now
                                    </button>
                                </form>
                            @endauth
                            @guest
                                <a href="{{ route('login') }}" class="btn btn-block btn-join-now py-2 text-white">
                                Login or Register to Join
                                </a>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@push('prepend-style')
    <link rel="stylesheet" href="{{ url('frontend/css/xzoom.css') }}">
@endpush

@push('addon-script')
    <script src="{{ url('frontend/js/xzoom.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.xzoom, .xzoom-gallery').xzoom({
                zoomWidth: 500,
                tittle: false,
                tint: '#333',
                Xoffset: 15
            });
        });
    </script>
@endpush