<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.3/css/bootstrap.min.css" rel="stylesheet">

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Кабинет пользователя') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @if(count($userAnnouncements) < 3)
                        <a href="{{route('user-announcements.create')}}"
                           class="btn btn-success">{{__('Добавить объявление')}}</a>
                    @else
                        <a href="{{route('user-announcements.create')}}"
                           class="btn btn-success disabled">{{__('Добавить объявление')}}</a>
                        <span style="color: red">{{__('Вы можете добавлять не более 3-х объявлений')}}</span>
                    @endif

                    @foreach($userAnnouncements as $announcement)
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
                                        <div id="carouselExampleIndicators" class="carousel slide"
                                             style="height: 290px">
                                            <div class="carousel-indicators">
                                                @foreach($announcement->photos as $photo)
                                                    @if($loop->first)
                                                        <button type="button"
                                                                data-bs-target="#carouselExampleIndicators"
                                                                data-bs-slide-to="{{$loop->index}}"
                                                                class="active" aria-current="true"
                                                                aria-label="Slide {{$loop->index}}"></button>
                                                    @else
                                                        <button type="button"
                                                                data-bs-target="#carouselExampleIndicators"
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
                                @if(!Route::is('user-announcements.index'))
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
                                @endif
                                <a class="btn btn-outline-warning"
                                   href="{{route('user-announcements.edit', $announcement)}}">{{__('Редактировать')}}</a>

                                <form action="{{route('user-announcements.destroy', $announcement)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-outline-danger"
                                            title="{{__('Удалить')}}">{{__('Удалить')}}</button>
                                </form>

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.3/js/bootstrap.min.js"
        crossorigin="anonymous">
</script>
