@extends('layouts.checkout')

@section('title', 'Checkout Travel')

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
                            <li class="breadcrumb-item ">Details</li>
                            <li class="breadcrumb-item active">Chekout</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="card card-detail">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <h3>Who is Going?</h3>
                        <p>Trip to {{ $item->travel_package->title }}, {{ $item->travel_package->location }}</p>
                        <div class="attendee">
                            <table class="table table-responsive-sm text-center table-borderless">
                                <thead>
                                    <tr>
                                        <th>Picture</th>
                                        <th>Name</th>
                                        <th>Nationality</th>
                                        <th>Visa</th>
                                        <th>Passport</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($item->details as $detail)
                                    <tr>
                                        <td>
                                            <img src="https://ui-avatars.com/api/?name={{ $detail->username }}" class="rounded-circle" height="60">
                                        </td>
                                        <td class="align-middle">{{ $detail->username }}</td>
                                        <td class="align-middle">{{ $detail->nationality }}</td>
                                        <td class="align-middle">{{ $detail->is_visa ? '30 Days' : 'N/A' }}</td>
                                        <td class="align-middle">{{ \Carbon\Carbon::createFromDate($detail->doe_passport) > \Carbon\Carbon::now() ? 'Active' : 'Inactive' }}</td>
                                        <td class="align-middle">
                                            <a href="{{ route('checkout-remove', $detail->id) }}">
                                                <img src="{{ url('frontend/img/ic_remove.png') }}" alt="">
                                            </a>
                                        </td>
                                    </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">
                                                No Visitor
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="member">
                            <h2>Add Member</h2>
                            <form class="form-inline" method="POST" action="{{ route('checkout-create', $item->id) }}">
                                @csrf
                                <label class="sr-only" for="username">Name</label>
                                <input type="text" class="form-control mr-sm-2" required name="username" id="username" placeholder="Username">
                                <label class="sr-only" for="nationality">Nationality</label>
                                <input type="text" class="form-control mr-sm-2" style="width: 50px" required name="nationality" id="nationality" placeholder="Nationality">
                                <label class="sr-only" for="is_visa">Visa</label>
                                    <select class="custom-select my-1 mr-sm-2" name="is_visa" required id="is_visa">
                                        <option value="" selected>VISA</option>
                                        <option value="1">30 Days</option>
                                        <option value="0">N/A</option>
                                    </select>
                                <label class="sr-only" for="doe_passport">DOE Passport</label>
                                <div class="input-group mr-sm-2">
                                    <input type="text" class="form-control datepicker" style="width: 150px" name="doe_passport" id="doePassport" placeholder="DOE Passport">
                                </div>
                                <button type="submit" class="btn btn-add-now px-4 my-1">Add Now</button>
                            </form>
                            <h3 class="mt-2 mb-0">Note</h3>
                            <p class="disclaimer mb-0">
                                You are only able to invite member that has registered in Nomads.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card card-detail card-right">
                        <h4>Checkour Information</h4>
                        <table>
                            <tr>
                                <th>Members</th>
                                <td class="text-right">{{ $item->details->count() }}</td>
                            </tr>
                            <tr>
                                <th>Additional VISA</th>
                                <td class="text-right">$ {{ $item->additional_visa }}</td>
                            </tr>
                            <tr>
                                <th>Trip Price</th>
                                <td class="text-right">$ {{ $item->travel_package->price }},00 / person</td>
                            </tr>
                            <tr>
                                <th>Sub Total</th>
                                <td class="text-right">$ {{ $item->transaction_total }},00</td>
                            </tr>
                            <tr>
                                <th>Total (+Unique Code)</th>
                                <td class="text-right text-total">
                                    <span class="text-blue">$ {{ $item->transaction_total }},</span>
                                    <span class="text-orange">{{ mt_rand(0,99) }}</span>
                                </td>
                            </tr>
                        </table>
                        <hr>
                        <h4>Payment Instructions</h4>
                        <p class="payment-instruction">Please complete your payment before to continue the wonderful trip</p>
                        <div class="bank">
                            <div class="bank-item pb-3">
                                <img src="{{ url('frontend/img/ic_bank.png') }}" alt="" class="bank-image">
                                <div class="description">
                                    <h3>PT Nomads ID</h3>
                                    <p>
                                        0881 8829 8800
                                        <br> Bank Central Asia
                                    </p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="bank-item pb-3">
                                <img src="{{ url('frontend/img/ic_bank.png') }}" alt="" class="bank-image">
                                <div class="description">
                                    <h3>PT Nomads ID</h3>
                                    <p>
                                        0899 8501 7888
                                        <br> Bank HSBC
                                    </p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="join-container">
                        <a href="{{ route('checkout-success', $item->id) }}" class="btn btn-block btn-join-now py-2 text-white">
                        I Have Made Payment
                    </a>
                    </div>
                    <div class="text-center mt-4">
                        <a href="{{ route('detail', $item->travel_package->slug) }}" class="text-muted">Cancel Booking</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection

@push('prepend-style')
<link rel="stylesheet" href="{{ url('frontend/css/gijgo.css') }}">
@endpush

@push('addon-script')
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{ url('frontend/js/gijgo.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            uiLibrary: 'bootstrap4',
            icons: {
                rightIcon: '<img src="{{ url('frontend/img/ic_doe.png') }}">'
            }
        })
    });
</script>
@endpush