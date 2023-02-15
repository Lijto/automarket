<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.3/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.0/min/dropzone.min.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>

<form
    action="{{route('user-announcements.store')}}"
    method="post"
    enctype="multipart/form-data"
    class="card"
>

    @csrf

    <div class="card-body">
        <select id="mySelect2" class="js-example-basic-single" name="state">
            <option value="AL">Alabama</option>
            <option value="WY">Wyoming</option>
        </select>
{{--        <label class="col-12 d-block">--}}
{{--            {{__('Марка автомобиля')}}--}}
{{--            <x-select2--}}
{{--                required--}}
{{--                multiple--}}
{{--                :route="route('vehicle.names')"--}}
{{--                text-field="author"--}}
{{--                name="authors_ids[]"--}}
{{--            ></x-select2>--}}

{{--            --}}{{--            <x-error name="authors_ids"></x-error>--}}
{{--        </label>--}}

        {{--        <label class="col-12 d-block">--}}
        {{--            {{__('Модель автомобиля')}}--}}
        {{--            <x-select2--}}
        {{--                required--}}
        {{--                multiple--}}
        {{--                :route="route('vehicle.names')"--}}
        {{--                text-field="author"--}}
        {{--                name="authors_ids[]"--}}
        {{--            ></x-select2>--}}

        {{--            --}}{{--            <x-error name="authors_ids"></x-error>--}}
        {{--        </label>--}}

        {{--        <label class="col-12 d-block">--}}
        {{--            {{__('Марка автомобиля')}}--}}
        {{--            <x-select2--}}
        {{--                required--}}
        {{--                multiple--}}
        {{--                :route="route('vehicle.names')"--}}
        {{--                text-field="author"--}}
        {{--                name="authors_ids[]"--}}
        {{--            ></x-select2>--}}

        {{--            --}}{{--            <x-error name="authors_ids"></x-error>--}}
        {{--        </label>--}}

        {{--        <label class="col-12 d-block">--}}
        {{--            {{__('Марка автомобиля')}}--}}
        {{--            <x-select2--}}
        {{--                required--}}
        {{--                multiple--}}
        {{--                :route="route('vehicle.names')"--}}
        {{--                text-field="author"--}}
        {{--                name="authors_ids[]"--}}
        {{--            ></x-select2>--}}

        {{--            --}}{{--            <x-error name="authors_ids"></x-error>--}}
        {{--        </label>--}}

        {{--        <label class="col-12 d-block">--}}
        {{--            {{__('Марка автомобиля')}}--}}
        {{--            <x-select2--}}
        {{--                required--}}
        {{--                multiple--}}
        {{--                :route="route('vehicle.names')"--}}
        {{--                text-field="author"--}}
        {{--                name="authors_ids[]"--}}
        {{--            ></x-select2>--}}

        {{--            --}}{{--            <x-error name="authors_ids"></x-error>--}}
        {{--        </label>--}}

        {{--        <label class="col-12 d-block">--}}
        {{--            {{__('Марка автомобиля')}}--}}
        {{--            <x-select2--}}
        {{--                required--}}
        {{--                multiple--}}
        {{--                :route="route('vehicle.names')"--}}
        {{--                text-field="author"--}}
        {{--                name="authors_ids[]"--}}
        {{--            ></x-select2>--}}

        {{--            --}}{{--            <x-error name="authors_ids"></x-error>--}}
        {{--        </label>--}}

        {{--       <label class="col-12 d-block">--}}
        {{--           {{__('Текст объявления')}}--}}
        {{--            <textarea--}}
        {{--                rows="5"--}}
        {{--                name="text"--}}
        {{--                        @class(['form-control', 'is-invalid' => $errors->has('text')])--}}
        {{--                    >{{old('text')}}</textarea>--}}

        {{--            <x-error name="text"></x-error>--}}
        {{--        </label>--}}

        <label class="col-12 d-block">
            {{__('Загрузка фотографий')}}
            <div
                class="dropzone"
                id="images"
            ></div>
            {{--            <x-error name="file"></x-error>--}}
        </label>
        <button type="submit" class="btn btn-success">{{__('Создать')}}</button>
    </div>
</form>

<script>
    Dropzone.autoDiscover = false;
    let myDropzone = new Dropzone("#images", {

        acceptedFiles: "image/*",
        addRemoveLinks: true,
        dictRemoveFileConfirmation: "Удалить?",
        createImageThumbnails: true,

        url: "{{route('vehicle.photos')}}",
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.0/dropzone.js"></script>
<script src="{{ asset('/js/select2.js') }} "></script>
