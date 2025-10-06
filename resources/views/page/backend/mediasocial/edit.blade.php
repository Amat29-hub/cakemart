@extends('layout.backend.app')

@section('content')
<div class="content-wrapper d-flex align-items-center justify-content-center" style="min-height: 100vh;">
  <div class="col-md-8">
    <div class="card shadow-lg rounded-3">
      <div class="card-body">
        <h3 class="mb-4 fw-bold text-center">Edit Media Social</h3>

        <form action="{{ route('mediasocial.update', $mediasocial->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')

          {{-- Name Account --}}
          <div class="mb-3">
            <label class="form-label">Name Account</label>
            <input type="text" name="nameaccount" class="form-control" value="{{ $mediasocial->nameaccount }}" required>
          </div>

          {{-- Media Social Name --}}
          <div class="mb-3">
            <label class="form-label">Media Social</label>
            <input type="text" name="namemediasocial" class="form-control" value="{{ $mediasocial->namemediasocial }}" required>
          </div>

          {{-- Link --}}
          <div class="mb-3">
            <label class="form-label">Link</label>
            <input type="url" name="link" class="form-control" value="{{ $mediasocial->link }}" required>
          </div>

          {{-- Current Photo --}}
          <div class="mb-3">
            <label class="form-label">Current Photo</label><br>
            @if($mediasocial->photo)
              <img src="{{ asset('storage/'.$mediasocial->photo) }}" width="100" class="rounded mb-2">
            @else
              <span class="text-muted">No photo</span>
            @endif
          </div>

          {{-- Upload New Photo --}}
          <div class="mb-3">
            <label class="form-label">Change Photo (optional)</label>
            <input type="file" name="photo" class="form-control" accept="image/*">
          </div>

          <div class="d-flex justify-content-between">
            <a href="{{ route('mediasocial.index') }}" class="btn btn-secondary">Back</a>
            <button type="submit" class="btn btn-success">Update</button>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>
@endsection
