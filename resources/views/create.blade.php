@extends ('templates.template')
@section('content')
    <h1 class="text-center">
        @if (isset($book))
            Editar
        @else
            Cadastrar
        @endif
    </h1>
    <hr>
    <div class="col-8 m-auto">

        @if (isset($errors) && count($errors)>0)
            <div class="text-center mt-4 mb-4 p-2 alert-danger">
                @foreach ($errors->all() as $erro)
                    {{ $erro }}<br>
                @endforeach
            </div>
        @endif


        @if (isset($book))
            <form name="formEdit" id="formEdit" method="post" action="{{ route('book.update',["book"=>$book->id]) }}">
                @method('PUT')
            @else
                <form name="formCad" id="formCad" method="post" action="{{ route('book.store') }}">
        @endif

        @csrf
        <input class="form-control" type="text" name="title" id="title" placeholder="Título: " value="{{$book->title ?? ''}}" required>
        <select class="form-control" name="id_user" id="id_user" required>
            <option value="{{$book->relUsers->id ?? ''}}">{{$book->relUsers->name ?? 'Autor'}}</option>
            @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select><br>
        <input class="form-control" type="text" name="pages" id="pages" placeholder="Páginas: " value="{{$book->pages ?? ''}}" required>
        <input class="form-control" type="text" name="price" id="price" placeholder="Preço: " value="{{$book->price ?? ''}}" required>
        <input class="btn btn-primary" type="submit"
            value=@if (isset($book)) Editar
        @else
            Cadastrar @endif>
        </form>
    </div>
@endsection
