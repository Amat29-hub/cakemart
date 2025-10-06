@extends('layout.backend.app')

@section('content')
<div class="content-wrapper d-flex align-items-center justify-content-center" style="min-height: 100vh;">
  <div class="col-md-8">
    <div class="card shadow-lg rounded-3">
      <div class="card-body">
        <h3 class="mb-4 fw-bold text-center">Edit About Us</h3>

        {{-- Form Update --}}
<form action="{{ route('aboutus.update', $aboutu->id) }}" method="POST" enctype="multipart/form-data">
  @csrf
  @method('PUT')

  {{-- Description --}}
  <div class="mb-3">
    <label class="form-label">Description</label>
    <textarea name="description" class="form-control" rows="5" required>{{ $aboutu->description }}</textarea>
  </div>

  {{-- Current Photo Preview --}}
  <div class="mb-3">
    <label class="form-label">Current Photo</label><br>
    <img src="{{ asset('storage/'.$aboutu->photo) }}" width="100" class="rounded mb-2">
  </div>


          {{-- Upload New Photo --}}
          <div class="mb-3">
            <label class="form-label">Change Photo (optional)</label>
            <input type="file" name="photo" class="form-control" accept="image/*">
          </div>

          {{-- Buttons --}}
          <div class="d-flex justify-content-between">
            <a href="{{ route('aboutus.index') }}" class="btn btn-secondary">Back</a>
            <button type="submit" class="btn btn-success">Update</button>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>
@endsection
