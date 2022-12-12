@extends ('templates.template')
@section('content')
    <h1 class="text-center">Crud</h1>
    <hr>
    <div class="text-center mt-3 mb-4">
        <a href="{{route("book.create")}}">
            <button class="btn btn-success">Cadastrar Livro</button>
        </a>
    </div>
    <div class="col-8 m-auto">
        @csrf
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Título</th>
                    <th scope="col">Autor</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Criado</th>
                    <th scope="col">Alterado</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                @php
                    $user= $book->find($book->id)->relUsers;
                @endphp
                    <tr>
                        <th scope="row">{{ $book->id }}</th>
                        <td>{{ $book->title }}</td>
                        <td>{{$user->name}}</td>
                        <td>{{ $book->price }}</td>
                        <td>{{ $book->created_at}}</td>
                        <td>{{ $book->updated_at}}</td>
                        <td>
                            <a href="{{route("book.show",["book"=>$book->id])}}" class="btn btn-dark">
                                Visualizar
                            </a>

                            <a href="{{route("book.edit",["book"=>$book->id])}}" class="btn btn-primary">Editar
                            </a>
                            <a href="{{url("book/$book->id")}}" class="js-del">
                                Apagar
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$books->links()}}
    </div>
@endsection
