@extends('layouts.admin')

@section('content')
<div class="container my-4">

  <section class="d-flex justify-content-between align-items-center">
    <h1 class="d-inline">Lista dei Post</h1>
    <a class="btn btn-success" href="{{ route('admin.posts.create') }}">CREA</a>
  </section>

  @if(session('post_deleted'))
      <div class=" my-2 alert alert-success" role="alert">
        {{ session('post_deleted') }}
      </div>
  @endif
  
  <table class="table my-5">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Titolo</th>
        <th scope="col">Modifiche</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($posts as $post )

      <tr>
        <td>{{ $post->id }}</td>
        <td>{{ $post->title }}</td>
        <td>
          <a class="btn btn-primary" href=" {{ route('admin.posts.show', $post)  }}">MOSTRA</a>
          <a class="btn btn-secondary" href="{{ route('admin.posts.edit', $post)  }}">MODIFICA</a>

          <form class= "d-inline"
                onsubmit= "return confirm('Vuoi eliminare definitivamente il post ## {{ $post->title }} ## ?')"
                action= "{{ route('admin.posts.destroy', $post) }}" method= "POST">
            @csrf
            @method ('DELETE')
            <button class="btn btn-danger">ELIMINA</button>
          </form>

        </td>
      </tr>
        
      @endforeach
      
    </tbody>
  </table>

  {{ $posts->links() }}

</div>
@endsection
