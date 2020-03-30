@extends('./layout')

@section('content')
    <div class="card row justify-content-center mb-5">
        <div class="">
            <div class="card-header mb-4 text-center text-uppercase text-info" style="font-family: 'Times New Roman', Times, serif"">
                <h1>Contact Details</h1>
            </div>

            <table class="table table-striped table-hover table-light">
                <tbody>
                <tr>
                    <th>Name</th>
                    <td>{{ $contact->firstname }} {{ $contact->lastname }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $contact->email }}</td>
                </tr>
                <tr>
                    <th>Date of Birth</th>
                    <td>{{ $contact->birth }}</td>
                </tr>
                </tbody>
            </table>

            <h3 class="mt-3 text-center text-uppercase text-info">Address</h3>
            <table class="table table-striped table-hover table-secondary">
                <thead>
                <tr>
                    <th>Address Type</th>
                    <th>Street</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Zip/PO</th>
                    <th>Country</th>
                </tr>
                </thead>
                <tbody>
                @forelse($address as $address)
                    <tr>
                        <th>{{ $address->name }}</th>
                        <td>{{ $address->street }}</td>
                        <td>{{ $address->city }}</td>
                        <td>{{ $address->state }}</td>
                        <td>{{ $address->zip }}</td>
                        <td>{{ $address->country }}</td>
                    </tr>
                @empty
                    <tr><td colspan="6">No address to show.</td></tr>
                @endforelse
                </tbody>
            </table>

            <h3 class="mt-3 text-center text-uppercase text-info">Phone Number</h3>
            <table class="table table-striped table-hover table-info">
                <thead>
                <tr>
                    <th>Phone Type</th>
                    <th>Number</th>
                </tr>
                </thead>
                <tbody>
                @forelse($phone as $phone)
                    <tr>
                        <th>{{ $phone->name }}</th>
                        <td>{{ $phone->number }}</td>
                    </tr>
                @empty
                    <tr><td colspan="2">No Phone Number to Show.</td></tr>
                @endforelse
                </tbody>
            </table>
            <div class="card-footer">
                <a href="/" class="btn btn-secondary">Return Homepage</a>
            </div>

        </div>
    </div>
@endsection