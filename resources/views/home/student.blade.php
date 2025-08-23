<div class="row">
    @foreach($students as $student)
        <div class="col-md-4">
            <div class="card h-100 shadow-sm">
                <img src="{{ asset($student->image) }}" class="card-img-top" alt="{{ $student->name }}" />
                <div class="card-body">
                    <h5 class="card-title" style="font-weight: bold">
                        {{ $student->name }}
                    </h5>
                    <p class="card-text">
                        {{ $student->designation }}
                    </p>
                </div>
            </div>
        </div>
     @endforeach


</div>

      <div class="d-flex justify-content-end py-4">
                      <a
                href="#"
                style="
                  color: #b80000;
                  text-decoration: underline;
                  font-weight: bold;
                "
                class=""
                >VIEW ALL</a
              >
      </div>

