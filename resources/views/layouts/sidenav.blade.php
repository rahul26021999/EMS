<div class="col-sm-4 mb-3">
    <div class="card">
        <div class="card-header">
            Search Employee
        </div>
        <div class="card-body">
            <form class="form" method="get" action="{{ route('search') }}">
                <div class="form-group">
                    <input type="text" class="form-control" value="{{ $first_name ?? ""}}" name="first_name" id="first_name" placeholder="First name">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" value="{{ $last_name ?? ""}}" name="last_name" id="last_name" placeholder="Last name">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" value="{{ $phone_number ?? ""}}" name="phone_number" id="phone_number" placeholder="Phone">
                </div>
                <button type="submit" class="btn btn-success">Search</button>
            </form>
        </div>
    </div>
</div>