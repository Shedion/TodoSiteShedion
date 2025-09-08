@include('templates.header')

<div id="container-todotable">
    <div class="intro-section">
        <h1>Welcome to Just Do It</h1>
        <p>Here you can manage your todo's. You can add, edit, and remove tasks exactly as needed.</p>
        <p>To get started, you can add a new todo item using the button below.</p>
        <a href="{{ route('todo.create') }}" class="btn-add">Add Todo</a>
    </div>

    <h1>Your Todo's</h1>
    <table id="table-todo">
        <thead>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Done Percentage</th>
                <th>Deadline</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($list as $todoitem)
            <tr>
                <td>{{ $todoitem->id }}</td>
                <td>{{ $todoitem->title }}</td>
                <td>{{ $todoitem->completed }}</td>
                <td>{{ $todoitem->due_date }}</td>
                <td class="actions">
                    <a href="{{ route('todo.edit', $todoitem->id) }}" class="btn-edit">Edit</a>
                    <form action="{{ route('todo.destroy', $todoitem->id) }}" method="POST" style="display: contents;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-remove" onclick="return confirm('Are you sure?')">Remove</button>
                    </form>
                    <button type="button" class="btn-arrow" onclick="toggleDropdown('{{ $todoitem->id }}')">
                        <span class="material-symbols-outlined">keyboard_arrow_down</span>
                    </button>
                </td>
            </tr>
            <tr>
                <td colspan="5" style="padding:0; border:none;">
                    <div id="dropdown-{{ $todoitem->id }}" class="todo-dropdown">
                        <form action="{{ route('todo.progress', $todoitem->id) }}" method="POST" style="display: flex; align-items: center; gap: 20px;">
                            @csrf
                            <label>
                                Done Percentage:
                                <input type="range" name="completed" min="0" max="100" value="{{ $todoitem->completed }}" oninput="this.nextElementSibling.value = this.value">
                                <output>{{ $todoitem->completed }}</output>%
                            </label>
                            <button type="submit" class="btn-edit">Save</button>
                        </form>
                        <div>
                            <strong>Description:</strong>
                            <div class="description description-scrollbox">{{ $todoitem->description }}</div>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@include('templates.footer')

<script>
    function toggleDropdown(id) {
        const row = document.getElementById('dropdown-' + id);
        row.classList.toggle('open');
    }
</script>