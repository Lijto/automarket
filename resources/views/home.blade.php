@extends('main');

@section('content')
    @foreach($announcements as $announcement)
        <div class="card mt-3">
            <div class="card-header">
                {{__('Дата публикации')}}: {{$announcement->created_at->format('Y')}}
                {{__('Город')}}: {{$announcement->town->town}}
                {{__('Марка')}}: {{$announcement->vehicleName->name}}
                {{__('Модель')}}: {{$announcement->vehicleModel->model}}
                {{__('Год выпуска')}}: {{$announcement->year->year}}
                {{__('Пробег')}}: {{$announcement->car_kilometres}}
                {{__('Стоимость')}}: {{$announcement->price}}
            </div>
            <div class="card-body" style="height: 300px">
                <div class="d-flex col-12">
                    <div class="text-center col-6">
                        <div id="carouselExampleIndicators" class="carousel slide" style="height: 290px">
                            <div class="carousel-indicators">
                                @foreach($announcement->photos as $photo)
                                    @if($loop->first)
                                        <button type="button" data-bs-target="#carouselExampleIndicators"
                                                data-bs-slide-to="{{$loop->index}}"
                                                class="active" aria-current="true"
                                                aria-label="Slide {{$loop->index}}"></button>
                                    @else
                                        <button type="button" data-bs-target="#carouselExampleIndicators"
                                                data-bs-slide-to="{{$loop->index}}"
                                                aria-label="Slide {{($loop->index)}}"></button>
                                    @endif

                                @endforeach
                            </div>
                            <div class="carousel-inner" style="height: 250px">
                                @foreach($announcement->photos as $photo)
                                    @if ($loop->first)
                                        <div class="carousel-item active">
                                            <a href="{{Storage::url($photo->link)}}" target="_blank">
                                                <img src="{{Storage::url($photo->link)}}"
                                                     class="img-fluid img-thumbnail"
                                                     alt="...">
                                            </a>
                                        </div>
                                    @else
                                        <div class="carousel-item">
                                            <a href="{{Storage::url($photo->link)}}" target="_blank">
                                                <img src="{{Storage::url($photo->link)}}"
                                                     class="img-fluid img-thumbnail"
                                                     alt="...">
                                            </a>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                    <div class="text-center col-6">
                        {{$announcement->text}}
                    </div>
                </div>
            </div>
            <div class="card-footer">
                @guest()
                    <h6>
                        {{__('Для просмотра контактов продавца необходимо')}}
                        <a href="{{route('login')}}">{{__('авторизоваться')}}</a>
                    </h6>
                @endguest
                @auth()
                {{__('Продавец')}}: {{$announcement->user->name}}
                {{__('Электронная почта')}}: {{$announcement->user->email}}
                @endauth
            </div>
        </div>
    @endforeach

@endsection
