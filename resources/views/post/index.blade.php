@extends('layouts.app')


@section('content')
<div class="container">
    <div id="main-table" class="card">
        <div class="card-header row">
            <div class="col-6">
                My Todos
            </div>
            <div class="col-6 text-end">
                <button id="create-form-btn" class="btn btn-sm btn-primary">Add Todo</button>
            </div>
        </div><!-- /.card-header -->

        <div class="card-body" style="height: 400px; overflow-y: scroll">
            <table class="table text-center">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="todos-table-content"></tbody>
            </table>
        </div><!-- /.card-body -->
    </div><!-- /.card -->

    @include('post.incs._create')
</div><!-- /.container -->
@endsection

@push('custome-js')
<script>
$('document').ready(function () {
    let todos = [
        {id : 1, title : 'Todo 1', description : 'Todo 1 d'},
        {id : 2, title : 'Todo 2', description : 'Todo 2 d'},
        {id : 3, title : 'Todo 3', description : 'Todo 3 d'},
    ];

    function clearForm (is_edit = false) {
        $(`#${is_edit ? 'edit-' : ''}title`).val('');
        $(`#${is_edit ? 'edit-' : ''}description`).val('');   
    }

    function toggleForm (is_open = false) {
        if (is_open) {
            $('#main-table').slideDown(500);
            $('#create-todo-form').slideUp(500);
        } else {
            $('#main-table').slideUp(500);
            $('#create-todo-form').slideDown(500);
        }
    }

    function renderTodoTable (todos) {
        let todos_el = '';

        todos.forEach((todo, index) => {
            todos_el += `
                <tr>
                    <td>${index + 1}</td>    
                    <td>${todo.title}</td>    
                    <td>${todo.description}</td>    
                    <td>
                        <button class="btn btn-sm btn-danger"></button>    
                        <button class="btn btn-sm btn-warnign"></button>    
                    </td>    
                </tr>
            `;
        });

        $('#todos-table-content').html(todos_el);
    }

    async function fetchTodos () {
        let res = await axios.get('{{ route("post.index") }}', { params : { get_todos: true }});

        const { data, success } = res.data;
        
        if (success) {
            todos = [...data];
        } else {
            alert('Data fetch went wrong !')
        }
    }

    $('#create-form-btn').click(function () {
        toggleForm();
    });

    $('#close-create-form-btn').click(function () {
        toggleForm(true);
    });

    $('#store-todo').click(function () {
        // get data from the form
        // validate the data
        // send request
        // show success or failer from the response

        let data = {
            title : $('#title').val(),
            description : $('#description').val()
        } 

        axios.post(`{{ route('post.store') }}`, {
            _token : '{{ csrf_token() }}',
            ...data
        }).then(res => {
            const { data, success } = res.data;

            if (success) {
                clearForm();
                toggleForm(true);
                setTimeout(() => {
                    alert('New todo was created');
                }, 800);
            }
        })
    });

    (async () => {
        await fetchTodos();
        renderTodoTable(todos);
    })();


});
</script>
@endpush
