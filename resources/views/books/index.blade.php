@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="mb-4">Book List</h1>

            <!-- Success and Error Messages -->
            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <!-- Book Table -->
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Publisher</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $key => $book)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $book->name }}</td>
                        <td>{{ $book->publisher }}</td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="{{ route('book.edit', $book->id) }}">Edit</a>
                            <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete({{ $book->id }})">Delete</button>
                            <form id="delete-form-{{ $book->id }}" action="{{ route('book.destroy', $book->id) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Create Button -->
            <div class="text-center">
                <a class="btn btn-success" href="{{ route('book.create') }}">Create Book</a>
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteConfirmationModalLabel">Delete Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this book?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Delete</button>
            </div>
        </div>
    </div>
</div>

<script>
    function confirmDelete(bookId) {
        $('#deleteConfirmationModal').modal('show');

        $('#confirmDeleteBtn').click(function() {
            $('#delete-form-' + bookId).submit();
        });
    }
</script>

@endsection
