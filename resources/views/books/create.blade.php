@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Book</div>

                <div class="card-body">
                    <form action="{{ route('book.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Book Name</label>
                            <input name="name" type="text" class="form-control" id="name" placeholder="Enter book name" required>
                        </div>

                        <div class="mb-3">
                            <label for="publisher" class="form-label">Publisher</label>
                            <input name="publisher" type="text" class="form-control" id="publisher" placeholder="Enter publisher" required>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-success">Submit</button>
                            <a href="{{ route('book.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
