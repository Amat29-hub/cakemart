@extends('layout.backend.app')

@section('content')
<div class="content-wrapper d-flex align-items-center justify-content-center" style="min-height: 100vh;">
  <div class="col-md-8">
    <div class="card shadow-lg rounded-3">
      <div class="card-body">
        <h3 class="mb-4 fw-bold text-center">Edit Service</h3>

        <form action="{{ route('services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')

          {{-- Title --}}
          <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" value="{{ $service->title }}" required>
          </div>

          {{-- Description --}}
          <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="4" required>{{ $service->description }}</textarea>
          </div>

          {{-- Current Photo --}}
          <div class="mb-3">
            <label class="form-label">Current Photo</label><br>
            <img src="{{ asset('storage/'.$service->photo) }}" width="120" class="rounded mb-2">
          </div>

          {{-- Change Photo --}}
          <div class="mb-3">
            <label class="form-label">Change Photo (optional)</label>
            <input type="file" name="photo" class="form-control" accept="image/*">
          </div>

          {{-- Buttons --}}
          <div class="d-flex justify-content-between">
            <a href="{{ route('services.index') }}" class="btn btn-secondary">Back</a>
            <button type="submit" class="btn btn-success">Update</button>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>
@endsection
