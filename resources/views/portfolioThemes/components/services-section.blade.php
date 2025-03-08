{{-- {{$services}} --}}
<section class="ftco-services">
    <div class="container">
        <div class="row justify-content-start mt-5 py-5">
            <div class="col-md-4 heading-section ftco-animate">
                <h2 class="mb-4">Our Services</h2>
                <p>Even the all-powerful Pointing has no control about the blind texts it is an almost
                    unorthographic.</p>
            </div>
            <div class="col-md-8 ftco-animate">
                <div class="row d-flex">
                    @foreach ($services as $service)
                    <div class="col-md-6 d-flex align-items-stretch">
                        <div class="media block-6 services services-2 d-block bg-light p-4 mb-4">
                            <div class="icon d-flex justify-content-center align-items-center">
                                <img class="w-px-50" src="{{$service->image}} " alt="">
                            </div>
                            <div class="media-body p-2 mt-3">
                                <h3 class="heading">{{ $service->name }}</h3>
                                <p>{{ $service->desc}}.</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>