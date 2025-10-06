@extends('layout.backend.app')

@section('content')
<div class="content-wrapper d-flex align-items-center justify-content-center" style="min-height: 100vh;">
  <div class="col-md-8">
    <div class="card shadow-lg rounded-3">
      <div class="card-body">
        <h3 class="mb-4 fw-bold text-center">Edit Sejarah</h3>

        <form action="{{ route('sejarah.update', $sejarah->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')

          {{-- Title --}}
          <div class="mb-3">
            <label class="form-label fw-bold">Title</label>
            <input type="text" name="title" class="form-control" value="{{ $sejarah->title }}" required>
          </div>

          {{-- Description --}}
          <div class="mb-3">
            <label class="form-label fw-bold">Description</label>
            <textarea name="description" class="form-control" rows="4" required>{{ $sejarah->description }}</textarea>
          </div>

          {{-- Current Photo Preview --}}
          <div class="mb-3">
            <label class="form-label fw-bold">Current Photo</label><br>
            @if($sejarah->photo && \Illuminate\Support\Facades\Storage::disk('public')->exists($sejarah->photo))
              <img src="{{ asset('storage/'.$sejarah->photo) }}" width="120" class="rounded mb-2" style="object-fit:cover; border:1px solid #ddd;">
            @else
              <p class="text-muted">No photo available</p>
            @endif
          </div>

          {{-- Upload New Photo --}}
          <div class="mb-3">
            <label class="form-label fw-bold">Change Photo (optional)</label>
            <input type="file" name="photo" class="form-control" accept="image/*">
          </div>

          {{-- Buttons --}}
          <div class="d-flex justify-content-between">
            <a href="{{ route('sejarah.index') }}" class="btn btn-secondary">Back</a>
            <button type="submit" class="btn btn-success">Update</button>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>
@endsection
