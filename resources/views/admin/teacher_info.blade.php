<!DOCTYPE html>
<html>
  <head>
    @include('admin.css')
  </head>
  <body>

    @include('admin.header')

    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->

      @include('admin.sidebar')

      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-6">
                        <div class="card shadow-lg p-4 rounded">
                            <h2 class="mb-4">Add Teacher Information</h2>
                                <form action="" method="POST" enctype="multipart/form-data">
                                    @csrf

                                <div class="form-group mb-3">
                                    <label for="image">Profile Image</label>
                                    <input type="file" name="image" class="form-control">
                                </div>
                                    <div class="row mb-3">
                                        <div class="col">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" name="name" class="form-control" placeholder="Enter full name" required>
                                        </div>
                                        <div class="col">
                                            <label for="designation" class="form-label">Designation</label>
                                            <input type="text" name="designation" class="form-control" placeholder="e.g. Professor, Lecturer" required>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col">
                                            <label for="university" class="form-label">University Name</label>
                                            <input type="text" name="university" class="form-control" placeholder="Enter university name" required>
                                        </div>
                                        <div class="col">
                                            <label for="location" class="form-label">Location</label>
                                            <input type="text" name="location" class="form-control" placeholder="Enter location">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col">
                                            <label for="call" class="form-label">Phone</label>
                                            <input type="text" name="call" class="form-control" placeholder="Enter phone number">
                                        </div>
                                        <div class="col">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" name="email" class="form-control" placeholder="Enter email address" required>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="biography" class="form-label">Biography</label>
                                        <textarea name="biography" class="form-control" rows="4" placeholder="Write a short biography"></textarea>
                                    </div>

                                    <h5 class="mt-4">Social Links</h5>
                                    <div class="row mb-3">
                                        <div class="col">
                                            <label for="facebook" class="form-label">Facebook</label>
                                            <input type="url" name="facebook" class="form-control" placeholder="Facebook profile link">
                                        </div>
                                        <div class="col">
                                            <label for="linkedin" class="form-label">LinkedIn</label>
                                            <input type="url" name="linkedin" class="form-control" placeholder="LinkedIn profile link">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col">
                                            <label for="github" class="form-label">Github</label>
                                            <input type="url" name="github" class="form-control" placeholder="Github profile link">
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Save Teacher</button>
                                </form>
                            </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card shadow-lg p-4 rounded">
                            <h2 class="mb-4">Add Teacher Information</h2>
                            <form action="" method="POST" enctype="multipart/form-data">
                                @csrf

                                <!-- Education Section -->
                                <h4 class="mb-3 text-primary">Education</h4>
                                <div class="form-group mb-3">
                                    <label for="image">Profile Image</label>
                                    <input type="file" name="image" class="form-control">
                                </div>
                                <div class="row mb-3">
                                    <div class="col">
                                        <label for="edu_year" class="form-label">Ending Year</label>
                                        <input type="text" name="edu_year" class="form-control" placeholder="e.g. 2024">
                                    </div>
                                    <div class="col">
                                        <label for="edu_degree" class="form-label">Degree Name</label>
                                        <input type="text" name="edu_degree" class="form-control" placeholder="e.g. MSc in Computer Science">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col">
                                        <label for="edu_university" class="form-label">University Name</label>
                                        <input type="text" name="edu_university" class="form-control" placeholder="Enter university name">
                                    </div>
                                    <div class="col">
                                        <label for="edu_location" class="form-label">Location</label>
                                        <input type="text" name="edu_location" class="form-control" placeholder="Enter location">
                                    </div>
                                </div>

                                <hr>

                                <!-- Professional Appointments Section -->
                                <h4 class="mb-3 text-success">Professional Appointments</h4>
                                <div class="row mb-3">
                                    <div class="col">
                                        <label for="pro_start" class="form-label">Start Year</label>
                                        <input type="text" name="pro_start" class="form-control" placeholder="e.g. 2020">
                                    </div>
                                    <div class="col">
                                        <label for="pro_end" class="form-label">End Year</label>
                                        <input type="text" name="pro_end" class="form-control" placeholder="e.g. 2024">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col">
                                        <label for="pro_designation" class="form-label">Designation</label>
                                        <input type="text" name="pro_designation" class="form-control" placeholder="e.g. Lecturer">
                                    </div>
                                    <div class="col">
                                        <label for="pro_organization" class="form-label">Organization Name</label>
                                        <input type="text" name="pro_organization" class="form-control" placeholder="Enter organization name">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col">
                                        <label for="pro_location" class="form-label">Location</label>
                                        <input type="text" name="pro_location" class="form-control" placeholder="Enter location">
                                    </div>
                                </div>

                                <hr>

                                <!-- Awards & Prizes Section -->
                                <h4 class="mb-3 text-warning">Awards & Prizes</h4>
                                <div class="row mb-3">
                                    <div class="col">
                                        <label for="award_year" class="form-label">Year</label>
                                        <input type="text" name="award_year" class="form-control" placeholder="e.g. 2022">
                                    </div>
                                    <div class="col">
                                        <label for="award_org" class="form-label">Organization Name</label>
                                        <input type="text" name="award_org" class="form-control" placeholder="Enter organization name">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col">
                                        <label for="award_location" class="form-label">Location</label>
                                        <input type="text" name="award_location" class="form-control" placeholder="Enter location">
                                    </div>
                                    <div class="col">
                                        <label for="award_responsibility" class="form-label">Responsibility</label>
                                        <input type="text" name="award_responsibility" class="form-control" placeholder="Enter responsibility">
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary mt-3">Save Information</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
      </div>
    </div>
@include('admin.footer')
  </body>
</html>
