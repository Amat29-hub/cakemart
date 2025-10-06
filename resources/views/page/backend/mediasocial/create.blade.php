@extends('layout.backend.app')

@section('content')
<div class="content-wrapper d-flex align-items-center justify-content-center" style="min-height: 100vh;">
  <div class="col-md-8">
    <div class="card shadow-lg rounded-3">
      <div class="card-body">
        <h3 class="mb-4 fw-bold text-center">Create Media Social</h3>

        <form action="{{ route('mediasocial.store') }}" method="POST" enctype="multipart/form-data">
          @csrf

          {{-- Name Account --}}
          <div class="mb-3">
            <label class="form-label">Name Account</label>
            <input type="text" name="nameaccount" class="form-control" placeholder="Enter account name" required>
          </div>

          {{-- Media Social Name --}}
          <div class="mb-3">
            <label class="form-label">Media Social</label>
            <input type="text" name="namemediasocial" class="form-control" placeholder="Instagram, Facebook, etc." required>
          </div>

          {{-- Link --}}
          <div class="mb-3">
            <label class="form-label">Link</label>
            <input type="url" name="link" class="form-control" placeholder="Enter profile link" required>
          </div>

          {{-- Photo --}}
          <div class="mb-3">
            <label class="form-label">Photo</label>
            <input type="file" name="photo" class="form-control" accept="image/*">
          </div>

          <div class="d-flex justify-content-between">
            <a href="{{ route('mediasocial.index') }}" class="btn btn-secondary">Back</a>
            <button type="submit" class="btn btn-primary">Save</button>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>
@endsection
