@extends('layout.backend.app')

@section('content')
<div class="content-wrapper d-flex align-items-center justify-content-center" style="min-height: 100vh;">
  <div class="col-md-8">
    <div class="card shadow-lg rounded-3">
      <div class="card-body">
        <h3 class="mb-4 fw-bold text-center">Edit Testimonial</h3>

        <form action="{{ route('testimonial.update', $testimonial->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')

          {{-- Photo --}}
          <div class="mb-3 text-center">
            <label class="form-label fw-bold">Profile Photo</label><br>
            @if($testimonial->photo)
              <img src="{{ asset('storage/'.$testimonial->photo) }}" alt="Profile"
                   style="width:100px;height:100px;border-radius:50%;object-fit:cover;margin-bottom:10px;">
            @endif
            <input type="file" name="photo_profile" class="form-control" accept="image/*">
          </div>

          {{-- Name --}}
          <div class="mb-3">
            <label class="form-label fw-bold">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $testimonial->name }}" required>
          </div>

          {{-- Description --}}
          <div class="mb-3">
            <label class="form-label fw-bold">Description</label>
            <textarea name="description" class="form-control" rows="4" required>{{ $testimonial->description }}</textarea>
          </div>

          {{-- Rating interaktif --}}
          <div class="mb-3">
            <label class="form-label fw-bold">Rating</label>
            <div id="rating" class="rating-stars">
              @for ($i = 1; $i <= 5; $i++)
                <i class="mdi {{ $i <= $testimonial->rating ? 'mdi-star text-warning' : 'mdi-star-outline text-secondary' }}"
                   data-value="{{ $i }}"
                   style="font-size: 1.5rem; cursor: pointer;"></i>
              @endfor
            </div>
            <input type="hidden" name="rating" id="rating-value" value="{{ $testimonial->rating }}">
          </div>

          {{-- Buttons --}}
          <div class="d-flex justify-content-between">
            <a href="{{ route('testimonial.index') }}" class="btn btn-secondary">Back</a>
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

{{-- Script interaktif rating --}}
<script>
document.addEventListener("DOMContentLoaded", function () {
  const stars = document.querySelectorAll("#rating .mdi");
  const ratingValue = document.getElementById("rating-value");

  stars.forEach((star, idx) => {
    star.addEventListener("click", function () {
      ratingValue.value = idx + 1; // index mulai dari 0
      updateStars();
    });

    star.addEventListener("mouseover", function () {
      highlightStars(idx + 1);
    });

    star.addEventListener("mouseout", function () {
      updateStars();
    });
  });

  function updateStars() {
    const val = parseInt(ratingValue.value);
    stars.forEach((s, i) => {
      if (i < val) {
        s.classList.remove("mdi-star-outline", "text-secondary");
        s.classList.add("mdi-star", "text-warning");
      } else {
        s.classList.remove("mdi-star", "text-warning");
        s.classList.add("mdi-star-outline", "text-secondary");
      }
    });
  }

  function highlightStars(hoverVal) {
    stars.forEach((s, i) => {
      if (i < hoverVal) {
        s.classList.remove("mdi-star-outline", "text-secondary");
        s.classList.add("mdi-star", "text-warning");
      } else {
        s.classList.remove("mdi-star", "text-warning");
        s.classList.add("mdi-star-outline", "text-secondary");
      }
    });
  }
});
</script>
@endsection
