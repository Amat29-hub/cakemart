@extends('layout.backend.app')

@section('content')
<div class="content-wrapper d-flex align-items-center justify-content-center" style="min-height: 100vh;">
  <div class="col-md-8">
    <div class="card shadow-lg rounded-3">
      <div class="card-body">
        <h3 class="mb-4 fw-bold text-center">Edit Partner</h3>

        <form action="{{ route('partners.update', $partner->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="mb-3">
            <label class="form-label fw-bold">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $partner->name }}" required>
          </div>
          <div class="mb-3">
            <label class="form-label fw-bold">Description</label>
            <textarea name="description" class="form-control" rows="4" required>{{ $partner->description }}</textarea>
          </div>
          <div class="mb-3">
            <label class="form-label fw-bold">Current Photo</label><br>
            @if($partner->photo && Storage::disk('public')->exists($partner->photo))
              <img src="{{ asset('storage/'.$partner->photo) }}" width="120" class="rounded mb-2" style="object-fit:cover;">
            @else
              <p class="text-muted">No photo available</p>
            @endif
          </div>
          <div class="mb-3">
            <label class="form-label fw-bold">Change Photo (optional)</label>
            <input type="file" name="photo" class="form-control" accept="image/*">
          </div>
          <div class="d-flex justify-content-between">
            <a href="{{ route('partners.index') }}" class="btn btn-secondary">Back</a>
            <button type="submit" class="btn btn-success">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
