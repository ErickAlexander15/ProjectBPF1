<div class="card" style="width: 18rem;">
    <a href="{{url('detail/$field->id')}}">
        <img src="{{ asset($field->img) }}" class="card-img-top" alt="...">
    </a>
    <div class="card-body">
        <p class="card-text">{{$field->name}}</p>
        <div class="caption flex justify-between align-middle items-center">
            <p class="text-gray-600">
                <i class="fas fa-xs fa-money-bill-wave"></i>
                <small class="font-light">
                    Rp. {{number_format($field->price)}} / Jam
                </small>
            </p>
            <p class="text-gray-500">
                <i class="fas fa-xs fa-ruler-combined"></i>
                <small class="font-light">
                    {{$field->width}}m x {{$field->height}}m
                </small>
            </p>
        </div>
        <a href="{{url("detail/$field->id")}}" class="btn btn-primary">Booking</a>
    </div>
</div>
