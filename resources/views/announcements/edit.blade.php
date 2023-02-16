<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.3/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
<link
    rel="stylesheet"
    href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css"
    type="text/css"
/>
<a href="{{route('user-announcements.index')}}" class="btn btn-primary">{{__('Назад')}}</a>
<form
    action="{{route('user-announcements.update', $userAnnouncement)}}"
    method="post"
    enctype="multipart/form-data"
    class="card"
>

    @csrf
    @method('put')

    <input type="hidden" name="id" value="{{$userAnnouncement->id}}">

    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <label class="col-12 d-block mb-1">
                    {{__('Область: ')}}
                    <select class="select2-here" name="state">
                        <option selected
                                value="{{$userAnnouncement->state->id}}">{{$userAnnouncement->state->state}}</option>
                        <option value="1">Alabama</option>
                        <option value="2">Wyoming</option>
                    </select>
                </label>
                <label class="col-12 d-block mb-1">
                    {{__('Город: ')}}
                    <select class="select2-here" name="town">
                        <option selected
                                value="{{$userAnnouncement->town->id}}">{{$userAnnouncement->town->town}}</option>
                        <option value="1">Alabama</option>
                        <option value="2">Wyoming</option>
                    </select>
                </label>
                <label class="col-12 d-block mb-1">
                    {{__('Тип авто: ')}}
                    <select class="select2-here" name="vehicle_type">
                        <option selected
                                value="{{$userAnnouncement->vehicleType->id}}">{{$userAnnouncement->vehicleType->type}}</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="5">3-5</option>
                        <option value="6">6 +</option>
                    </select>
                </label>
                <label class="col-12 d-block mb-1">
                    {{__('Марка: ')}}
                    <select class="select2-here" name="vehicle_name">
                        <option selected
                                value="{{$userAnnouncement->vehicleName->id}}">{{$userAnnouncement->vehicleName->name}}</option>
                        <option value="1">Alabama</option>
                        <option value="1">Wyoming</option>
                    </select>
                </label>
                <label class="col-12 d-block mb-1">
                    {{__('Модель: ')}}
                    <select class="select2-here" name="vehicle_model">
                        <option selected
                                value="{{$userAnnouncement->vehicleModel->id}}">{{$userAnnouncement->vehicleModel->model}}</option>
                        <option value="1">Alabama</option>
                        <option value="2">Wyoming</option>
                    </select>
                </label>
                <label class="col-12 d-block mb-1">
                    {{__('Объем двигателя: ')}}
                    <select class="select2-here" name="volume_of_engine">
                        <option selected
                                value="{{$userAnnouncement->volumeOfEngine->id}}">{{$userAnnouncement->volumeOfEngine->volume}}</option>
                        <option value="1">1.6</option>
                        <option value="2">2.2</option>
                    </select>
                </label>
                <label class="col-12 d-block mb-1">
                    {{__('Тип топлива: ')}}
                    <select class="select2-here" name="fuel_type">
                        <option selected
                                value="{{$userAnnouncement->fuelType->id}}">{{$userAnnouncement->fuelType->fuel}}</option>
                        <option value="1">{{__('Бензин')}}</option>
                        <option value="2">{{__('Дизель')}}</option>
                        <option value="3">{{__('Газ')}}</option>
                    </select>
                </label>
                <label class="col-12 d-block mb-1">
                    {{__('Трансмиссия: ')}}
                    <select class="select2-here" name="transmission">
                        <option selected
                                value="{{$userAnnouncement->transmission->id}}">{{$userAnnouncement->transmission->transmission}}</option>
                        <option value="1">{{__('Автомат')}}</option>
                        <option value="2">{{__('Механика')}}</option>
                    </select>
                </label>
                <label class="col-12 d-block mb-1">
                    {{__('Цвет')}}
                    <select class="select2-here" name="vehicle_color">
                        <option selected
                                value="{{$userAnnouncement->color->id}}">{{$userAnnouncement->color->color}}</option>
                        <option value="1">{{__('Белый')}}</option>
                        <option value="2">{{__('Желтый')}}</option>
                        <option value="5">{{__('Красный')}}</option>
                    </select>
                </label>
                <label class="col-12 d-block mb-1">
                    {{__('Год')}}
                    <select class="select2-here" name="year">
                        <option value="1">2000</option>
                        <option value="2">2002</option>
                        <option value="3">2003</option>
                        <option value="4">2004</option>
                    </select>
                </label>
            </div>
        </div>
        <div class="col-6 mt-3 mb-3">
            <label class="col-12 mb-3">
                {{__('Кол-во владельцев')}}
                <input required type="number" name="owners" value="{{$userAnnouncement->owners_count}}"
                       placeholder="{{__('Кол-во владельцев')}}"
                >
            </label>
            <label class="col-12">
                {{__('Пробег в км')}}
                <input required type="number" name="kilometres" value="{{$userAnnouncement->car_kilometres}}">
            </label>
            <label class="col-12 mt-3">
                {{__('Цена в грн')}}
                <input required type="number" name="price" value="{{$userAnnouncement->price}}">
            </label>
        </div>
        <label class="col-12 d-block">
            {{__('Текст объявления')}}
            <textarea
                cols="200"
                rows="5"
                name="text"
            >{{$userAnnouncement->text}}</textarea>
        </label>
        <div class="row">
            @foreach($userAnnouncement->photos as $photo)
                <div class="col-md-1">
                    <a href="{{Storage::url($photo->link)}}" target="_blank">
                        <img src="{{Storage::url($photo->link)}}" alt="vehicle photo" class="img-thumbnail"
                             style="max-height: 300px">
                        <a href="{{route('vehicle.photos.destroy', ['id' => $photo->id])}}" class="text-center">
                            <p>{{__('Удалить')}}</p>
                        </a>
                    </a>
                </div>
            @endforeach
        </div>
        <label class="col-12 d-block">
            {{__('Загрузка фотографий')}}
            <div
                class="dropzone"
                id="photos"
            ></div>
        </label>
        <button type="submit" class="btn btn-success">{{__('Редактировать')}}</button>
    </div>
</form>
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<script>
    Dropzone.autoDiscover = false;
    let myDropzone = new Dropzone("#photos", {

        acceptedFiles: "image/*",
        addRemoveLinks: true,
        dictRemoveFileConfirmation: "Удалить?",
        // createImageThumbnails: true,

        url: "{{route('vehicle.photos.dropzone.store')}}",
        headers: {
            'X-CSRF-TOKEN': "{{@csrf_token()}}"
        },
        success: function (file, response) {
            //Here you can get your response.
            console.log(file);
            console.log(response);
            console.log(response.succes);
            $("form").append('<input type="hidden" name=photos[]" value="' + response + '" >');
        },
        removedfile: function (file) {
            var fileName = file.name;

            $.ajax({
                type: 'POST',
                url: '{{route('vehicle.photos.dropzone.destroy')}}',
                headers: {
                    'X-CSRF-TOKEN': "{{@csrf_token()}}"
                },
                data: {name: fileName},
            });

            var _ref;
            return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
        }
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.3/js/bootstrap.min.js"
        crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{ asset('/js/select2.js') }} "></script>
