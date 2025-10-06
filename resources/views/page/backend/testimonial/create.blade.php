@extends('layout.backend.app')

@section('content')
<div class="content-wrapper d-flex align-items-center justify-content-center" style="min-height: 100vh;">
  <div class="col-md-8">
    <div class="card shadow-lg rounded-3">
      <div class="card-body">
        <h3 class="mb-4 fw-bold text-center">Create Testimonial</h3>

        <form action="{{ route('testimonial.store') }}" method="POST" enctype="multipart/form-data">
          @csrf

          {{-- Photo --}}
          <div class="mb-3 text-center">
            <label class="form-label fw-bold">Profile Photo</label>
            <input type="file" name="photo_profile" class="form-control" accept="image/*">
          </div>

          {{-- Name --}}
          <div class="mb-3">
            <label class="form-label fw-bold">Name</label>
            <input type="text" name="name" class="form-control" placeholder="Enter name" required>
          </div>

          {{-- Description --}}
          <div class="mb-3">
            <label class="form-label fw-bold">Description</label>
            <textarea name="description" class="form-control" rows="4" placeholder="Enter testimonial description" required></textarea>
          </div>

          {{-- Rating pakai klik bintang --}}
          <div class="mb-3">
            <label class="form-label fw-bold">Rating</label>
            <div id="rating" class="rating-stars">
              @for ($i = 1; $i <= 5; $i++)
                <i class="mdi mdi-star-outline text-secondary fs-3 star" data-value="{{ $i }}"></i>
              @endfor
            </div>
            <input type="hidden" name="rating" id="rating-value" value="">
          </div>

          {{-- Buttons --}}
          <div class="d-flex justify-content-between">
            <a href="{{ route('testimonial.index') }}" class="btn btn-secondary">Back</a>
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

{{-- Script untuk interaktif rating --}}
<script>
  document.addEventListener("DOMContentLoaded", function () {
    const stars = document.querySelectorAll("#rating .star");
    const ratingValue = document.getElementById("rating-value");

    stars.forEach(star => {
      star.addEventListener("click", function () {
        let value = this.getAttribute("data-value");
        ratingValue.value = value;

        stars.forEach((s, index) => {
          if (index < value) {
            s.classList.remove("mdi-star-outline", "text-secondary");
            s.classList.add("mdi-star", "text-warning");
          } else {
            s.classList.remove("mdi-star", "text-warning");
            s.classList.add("mdi-star-outline", "text-secondary");
          }
        });
      });
    });
  });
</script>
@endsection
