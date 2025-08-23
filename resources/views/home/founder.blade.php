    <!-- Left Profile Section -->
    <div class="col-md-4">
      <div class="card border-0">
        @if($teacher_personal)
        <img src="{{ asset($teacher_personal->image) }}" class="card-img-top" alt="{{ $teacher_personal->name }}">
        <div class="card-body bg-light">
          <h6 class="fw-bold mb-2">{{ $teacher_personal->name }}</h6>
          <p style="font-size: 14px;">
            {{ $teacher_personal->designation }}
          </p>
          <a href="#" class="text-danger fw-bold" style="font-size: 13px;">READ MORE</a>
        </div>
        @else
        <p>No teacher data found</p>
        @endif
      </div>
    </div>

    <!-- Right Timeline Section -->
@php
$colors = ['bg-success','bg-danger','bg-warning','bg-primary','bg-info','bg-dark']; // timeline dot colors
$textColors = ['text-success','text-danger','text-warning','text-primary','text-info','text-dark']; // degree title colors
@endphp

<div class="col-md-8">
  <div class="timeline">
    @foreach($teacherDetails as $key => $teacherDetail)
      @php
        $dotColor = $colors[$key % count($colors)];
        $titleColor = $textColors[$key % count($textColors)];
      @endphp

      <div class="timeline-item">
        <span class="timeline-dot {{ $dotColor }}"></span>
        <div class="d-flex">
          <div class="event-date">{{ $teacherDetail->edu_year }}</div>
          <div class="event-content">
            <div class="event-title {{ $titleColor }}">{{ $teacherDetail->edu_degree }}</div>
            <div class="event-sub">{{ $teacherDetail->edu_university }}, {{ $teacherDetail->edu_location }}</div>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>
