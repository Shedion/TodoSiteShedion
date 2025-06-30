{{-- filepath: resources/views/library.blade.php --}}
@include('templates.header')

@foreach ($list as $todoitem)
    <div class="book">
        <h2>{{ $todoitem->title }}</h2>
        <p>Id: {{ $todoitem->id }}</p>
        <p>Deadline: {{ $todoitem->due_date }}</p>
        <p>Description: {{ $todoitem->description }}</p>
    </div>
@endforeach

@include('templates.footer')
