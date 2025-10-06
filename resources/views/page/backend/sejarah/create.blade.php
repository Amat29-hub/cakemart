@extends('layout.backend.app')

@section('content')
<div class="content-wrapper d-flex align-items-center justify-content-center" style="min-height: 100vh;">
  <div class="col-md-8">
    <div class="card shadow-lg rounded-3">
      <div class="card-body">
        <h3 class="mb-4 fw-bold text-center">Create Sejarah</h3>

        <form action="{{ route('sejarah.store') }}" method="POST" enctype="multipart/form-data">
          @csrf

          {{-- Title --}}
          <div class="mb-3">
            <label class="form-label fw-bold">Title</label>
            <input type="text" name="title" class="form-control" placeholder="Enter title" required>
          </div>

          {{-- Description --}}
          <div class="mb-3">
            <label class="form-label fw-bold">Description</label>
            <textarea name="description" class="form-control" rows="4" placeholder="Enter description" required></textarea>
          </div>

          {{-- Photo --}}
          <div class="mb-3">
            <label class="form-label fw-bold">Photo</label>
            <input type="file" name="photo" class="form-control" accept="image/*" required>
          </div>

          {{-- Buttons --}}
          <div class="d-flex justify-content-between">
            <a href="{{ route('sejarah.index') }}" class="btn btn-secondary">Back</a>
            <button type="submit" class="btn btn-primary">Save</button>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>
@endsection
