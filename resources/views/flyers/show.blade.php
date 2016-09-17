@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-4">
        <h1>{{ $flyer->street }}</h1>
        <h1>{!! $flyer->price !!}</h1>
        <div class='description'>{!! nl2br($flyer->description) !!}</div>

    </div>
    <div class="col-md-8 gallery">

        @foreach($flyer->photos->chunk(4) as $photoSet)
        <div class="row">
            @foreach($photoSet as $photo)
            <div class="col-md-3 gallery_item">
                @if($user && $user->owns($flyer))
                <form method="POST" action='{{ url("photos/$photo->id") }}'>
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit">Delete</button>
                </form>
                @endif
                <a href="{!! url($photo->path) !!}"  data-lity>
                <img src="{!! url($photo->thumbnail_path) !!}" alt="">
                </a>
            </div>
            @endforeach
        </div>
        @endforeach

        @if($user && $user->owns($flyer))
        <hr>
            <form id="addPhotosForm" method='post'  action="{{ route('store_photo_path', [$flyer->zip_code,$flyer->street]) }}" class="dropzone">
                {{ csrf_field()}}
            </form>
        @endif
    </div>
</div>
<hr>


@stop

@section('footer')
<script src="{{asset('front/dropzone.min.js')}}"></script>
<script>
    Dropzone.options.addPhotosForm = {
        paramName: 'photo',
        maxFileSize: 3,
        acceptedFiles: '.png, .jpg, .jpeg, .bmp'
    };
</script>
@stop
