@extends('layouts.app')

@section('title')
    NOMADS
@endsection

@section('content')
<!-- Header -->
<header class="text-center text-white">
    <h1>
        Explore The Beautiful World
        <br> As Easy One Click
    </h1>
    <p class="mt-3">
        You will see beautiful
        <br> moment you never see before
    </p>
    <a href="#popular" class="btn btn-get-started px-4 mt-4 text-white">
        Get Started
    </a>
</header>

<!-- Main Content -->
<main>
    <div class="container">
        <section class="section-stats row justify-content-center">
            <div class="col-3 col-md-2 stats-detail bg-white">
                <h2>20K</h2>
                <p>Members</p>
            </div>
            <div class="col-3 col-md-2 stats-detail bg-white">
                <h2>12</h2>
                <p>Countries</p>
            </div>
            <div class="col-3 col-md-2 stats-detail bg-white">
                <h2>3K</h2>
                <p>Hotels</p>
            </div>
            <div class="col-3 col-md-2 stats-detail bg-white">
                <h2>72</h2>
                <p>Partners</p>
            </div>
        </section>
    </div>

    <section class="section-popular">
        <div class="container">
            <div class="row">
                <div class="col text-center popular-heading text-white">
                    <h2>Wisata Popular</h2>
                    <p>Something that you never try
                        <br> before in this world
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="section-popular-content">
        <div class="container">
            <div class="row section-popular-travel justify-content-center">
                @foreach ($items as $item)
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="card-travel text-center d-flex flex-column text-white" 
                            style="background-image: url('{{ $item->galleries->count() ? Storage::url($item->galleries->first()->image) : '' }}');">
                            <div class="travel-country">{{ $item->location }}</div>
                            <div class="travel-location">{{ $item->title }}</div>
                            <div class="travel-button mt-auto">
                                <a href="{{ route('detail', $item->slug) }}" class="btn btn-travel-detail text-white px-4">View Details</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section-networks">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h2>Our Networks</h2>
                    <p>Companies are trusted us
                        <br>more than just a trip</p>
                </div>
                <div class="col-md-8 text-center">
                    <img src="frontend/img/logos_partner.png" alt="" class="img-networks">
                </div>
            </div>
        </div>
    </section>

    <section class="section-testimonial-heading">
        <div class="container">
            <div class="row">
                <div class="col text-center mb-5">
                    <h2>They Are Loving Us</h2>
                    <p>Moments were giving them
                        <br> the best experience</p>
                </div>
            </div>
        </div>
    </section>

    <section class="section-testimonial">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="card testimonial-content text-center mb-3">
                        <div class="img mb-3">
                            <img src="frontend/img/testimonial/1.jpg" alt="">
                        </div>
                        <div class="nama mb-3">
                            Angga Risky
                        </div>
                        <div class="testimonial">
                            “ It was glorious and I could not stop to say wohooo for every single moment Dankeeeeee “
                        </div>
                        <div class="travel-content mt-auto">
                            <hr>
                            <p>Trip to Ubud</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card testimonial-content text-center mb-3">
                        <div class="img mb-3">
                            <img src="frontend/img/testimonial/2.jpg" alt="">
                        </div>
                        <div class="nama mb-3">
                            Shayna
                        </div>
                        <div class="testimonial">
                            “ The trip was amazing and I saw something beautiful in that Island that makes me want to learn more “
                        </div>
                        <div class="travel-content mt-auto">
                            <hr>
                            <p>Trip to Ubud</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card testimonial-content text-center mb-3">
                        <div class="img mb-3">
                            <img src="frontend/img/testimonial/3.jpg" alt="">
                        </div>
                        <div class="nama mb-3">
                            Shabrina
                        </div>
                        <div class="testimonial">
                            “ I loved it when the waves was shaking harder — I was scared too “
                        </div>
                        <div class="travel-content mt-auto">
                            <hr>
                            <p>Trip to Ubud</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <a href="" class="btn btn-need-help px-4 mx-1 mt-4">
                        I Need Help
                    </a>
                    <a href="{{ route('register') }}" class="btn btn-get-started px-4 mx-1 mt-4 text-white">
                        Get Started
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection