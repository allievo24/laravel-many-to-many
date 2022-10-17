    @extends('layouts.app')

    @section('content')
        <div class="container">
            <div>
                <h1>{{ $category->name }}</h1>
            </div>
            <div>
                <h2>{{ $category->slug }}</h2>
            </div>

            @if (count($category->posts))
                <table class="table table-striped table-dark">
                    <thead>
                        <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Slug</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($category->posts as $post)
                            <tr>
                                <th scope="row">{{ $category->id }}</th>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->slug }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            @endif


            <a href="{{ route('admin.categories.index') }}" class="btn btn-primary">Back</a>

        </div>

    @endsection
