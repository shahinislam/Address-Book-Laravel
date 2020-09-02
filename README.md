# Address Book

## About
The system holds contact information with multiple address and phone numbers. A user has to
register and login to use this system. <br/>
Laravel, Bootstrap, HTML, CSS

## Installation
- Run git clone https://github.com/shahinislam/Address-book.git <br/>
- Run composer install <br/>
- Keep Project in local server <br/>
- Open command prompt in project directory <br/>
- Configure your .env file <br/>
- php artisan key:generate <br/>
- php artisan config:cache <br/>
- php artisan migrate <br/>
- php db:seed <br/>
 
## Home Page
![1  Home](https://user-images.githubusercontent.com/33843231/78135763-37bdb880-7444-11ea-9189-ea717a8ed896.png)
## Login
![2  Login](https://user-images.githubusercontent.com/33843231/78135778-3e4c3000-7444-11ea-9917-2c53c2ac61fa.png)
## Register
![3  Register](https://user-images.githubusercontent.com/33843231/78135780-3ee4c680-7444-11ea-8ecb-e9020d64701e.png)
### web.php
```php
Route::get('/contacts/{contact}/details', 'DetailController@index');

Route::get('/contacts', 'ContactController@index');
Route::get('/contacts/create', 'ContactController@create');
Route::post('/contacts', 'ContactController@store');
Route::get('/contacts/{contact}', 'ContactController@show');
Route::get('/contacts/{contact}/edit', 'ContactController@edit');
Route::patch('/contacts/{contact}', 'ContactController@update');
Route::delete('/contacts/{contact}', 'ContactController@destroy');


Route::get('/contacts/{contact}/address', 'AddressController@index');
Route::get('/contacts/{contact}/address/create', 'AddressController@create');
Route::post('/contacts/{contact}/address', 'AddressController@store');
Route::get('/contacts/{contact}/address/{address}', 'AddressController@show');
Route::get('/contacts/{contact}/address/{address}/edit', 'AddressController@edit');
Route::patch('/contacts/{contact}/address/{address}', 'AddressController@update');
Route::delete('/contacts/{contact}/address/{address}', 'AddressController@destroy');


Route::get('/contacts/{contact}/phones', 'PhoneController@index');
Route::get('/contacts/{contact}/phones/create', 'PhoneController@create');
Route::post('/contacts/{contact}/phones', 'PhoneController@store');
Route::get('/contacts/{contact}/phones/{phone}', 'PhoneController@show');
Route::get('/contacts/{contact}/phones/{phone}/edit', 'PhoneController@edit');
Route::patch('/contacts/{contact}/phones/{phone}', 'PhoneController@update');
Route::delete('/contacts/{contact}/phones/{phone}', 'PhoneController@destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
   return view('welcome');
});

```
### ContactController.php
```php
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $contacts = auth()->user()->contacts()
                                  ->orderBy('firstname', 'asc')
                                  ->paginate(5);

        return view('contacts.index', compact('contacts'));
    }

    public function create()
    {
        $contact = new Contact();

        return view('contacts.create', compact('contact'));
    }

    public function store()
    {
        $data = request()->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'birth' => 'required',
        ]);

        $contact = auth()->user()->contacts()->create($data);

        return redirect('/contacts/' . $contact->id)
            ->with('success', 'Contact has been Inserted');
    }

    public function show(Contact $contact)
    {
        return view('contacts.show', compact('contact'));
    }

    public function edit(Contact $contact)
    {
        return view('contacts.edit', compact('contact'));
    }

    public function update(Contact $contact)
    {

        $data = request()->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'birth' => 'required|date',
        ]);

        auth()->user()->contacts()->update($data);

        return redirect('/contacts/' . $contact->id)
            ->with('success', 'Contact has been Updated');
    }

    public function destroy(Contact $contact)
    {
        $name = $contact->firstname .' '. $contact->lastname;
        $contact->address()->delete();
        $contact->delete();

        return redirect()->back()->with('danger', $name . ' Contact has been Deleted');
    }
```
## Contact List
![4  Contact List](https://user-images.githubusercontent.com/33843231/78135787-4015f380-7444-11ea-899d-f4f2740146d9.png)
### index.blade.php
```php
@extends('layouts.app')

@section('title', 'Address Book | Contact Page')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1 class="text-center text-uppercase" style="color: darkturquoise; font-family: 'Times New Roman', Times, serif">Contact lists</h1>
        </div>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('danger'))
            <div class="alert alert-danger">
                {{ session('danger') }}
            </div>
        @endif

        <div class="m-3">
            <a class="btn btn-success font-weight-bold" href="/contacts/create">Add New Contact</a>
        </div>

        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Date of Birth</th>
                <th>Option</th>
                <th>Address</th>
                <th>Phone</th>
            </tr>
            </thead>
            <tbody>
                @forelse($contacts as $contact)
                    <tr>
                        <td>
                            <a href="/contacts/{{ $contact->id }}/details"
                               class="text-decoration-none text-uppercase" style="color: darkslategrey;">
                                {{ $contact->firstname }} {{ $contact->lastname }}</a>
                        </td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->birth }}</td>
                        <td>
                            <div class="d-flex justify-content-start">
                                <a class="btn btn-warning btn-sm px-3 mr-1" href="/contacts/{{ $contact->id }}/edit">Edit</a>
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal">Delete</button>
                                <div class="modal fade" id="deleteModal">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title text-center">Delete Confirmation</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <p class="text-center">Are you sure you want to delete?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-info px-4" data-dismiss="modal">No</button>
                                                <form action="/contacts/{{ $contact->id }}" method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger px-4">Yes</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td><a href="/contacts/{{ $contact->id }}/address">Address List</a></td>
                        <td><a href="/contacts/{{ $contact->id }}/phones">Phone List</a></td>
                    </tr>
                @empty
                    <tr><td colspan="7">No contacts to show.</td></tr>
                @endforelse
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $contacts->links() }}
        </div>
    </div>

@endsection


```
## Contact Details
![5  Contact Details](https://user-images.githubusercontent.com/33843231/78135793-41472080-7444-11ea-8c2b-80bd44875495.png)
## Contact Create
![6  Contact Create](https://user-images.githubusercontent.com/33843231/78135794-42784d80-7444-11ea-86fd-a02d612ea60d.png)
### form.blade.php
```php
<div class="form-row">
    <div class="form-group col">
        <label for="firstname">First Name</label>
        <input type="text" name="firstname" value="{{ old('firstname') ?? $contact->firstname }}"
               class="form-control shadow-none {{ $errors->first('firstname') ? ' border-danger' : '' }}" autocomplete="off" autofocus>
        @error('firstname')
            <div class="text-danger text-capitalize">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group col">
        <label for="lastname">Last Name</label>
        <input type="text" name="lastname" value="{{ old('lastname') ?? $contact->lastname }}"
               class="form-control shadow-none {{ $errors->first('lastname') ? ' border-danger' : '' }}" autocomplete="off">
        @error('lastname')
            <div class="text-danger text-capitalize">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="form-group">
    <label for="email">Email</label>
    <input type="text" name="email" value="{{ old('email') ?? $contact->email }}"
           class="form-control shadow-none {{ $errors->first('email') ? ' border-danger' : '' }}" autocomplete="off">
    @error('email')
        <div class="text-danger text-capitalize">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="birth">Date of Birth</label>
    <input type="date" name="birth" value="{{ old('birth') ?? $contact->birth }}"
           class="form-control shadow-none {{ $errors->first('birth') ? ' border-danger' : '' }}" autocomplete="off">
    @error('birth')
        <div class="text-danger text-capitalize">{{ $message }}</div>
    @enderror
</div>
```
## Contact Show
![7  Contact Show](https://user-images.githubusercontent.com/33843231/78135720-2bd1f680-7444-11ea-8bf9-b664d963422e.png)
### show.blade.php
```php
@extends('layouts.app')

@section('title', 'Contact Show')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center text-uppercase text-info" style="font-family: 'Times New Roman';">
                    <h1>{{ $contact->firstname }} {{ $contact->lastname }}</h1>
                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="d-flex justify-content-start m-4">
                        <a class="btn btn-info btn-sm mr-2" href="/contacts/create">Add New</a>
                        <a class="btn btn-warning btn-sm px-4 mr-2"
                           href="/contacts/{{ $contact->id }}/edit">Edit</a>
                        <form action="/contacts/{{ $contact->id }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>

                    <table class="table table-striped table-hover">
                        <tr>
                            <th class="col-3">Name</th>
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
                    </table>

                    <a class="btn btn-info mt-3" href="/contacts">Back to Contacts</a>

                </div>
            </div>
        </div>
    </div>
@endsection
```
## Contact Edit
![8  Contact Edit](https://user-images.githubusercontent.com/33843231/78135735-2ecce700-7444-11ea-9d07-1626b4a3ce61.png)
## Contact Delete
![15  Contact Delete](https://user-images.githubusercontent.com/33843231/78135760-368c8b80-7444-11ea-8b94-d34c6961ac46.png)
## Address Create
![9  Address Create](https://user-images.githubusercontent.com/33843231/78135738-2ffe1400-7444-11ea-97a6-047b055dff66.png)
## Address Show
![10  Address Show](https://user-images.githubusercontent.com/33843231/78135744-312f4100-7444-11ea-8e4a-e96f2159f243.png)
## Address List
![11  Address List](https://user-images.githubusercontent.com/33843231/78135746-32606e00-7444-11ea-9dab-087b73ebd8f9.png)
## Phone Create
![12  Phone Create](https://user-images.githubusercontent.com/33843231/78135748-33919b00-7444-11ea-9f5c-7dcc39ce7764.png)
## Phone Show
![13  Phone Show](https://user-images.githubusercontent.com/33843231/78135751-34c2c800-7444-11ea-808f-f17373f3bff8.png)
## Phone Lists
![14  Phone Lists](https://user-images.githubusercontent.com/33843231/78135754-355b5e80-7444-11ea-9dc3-6d73c3a5a50c.png)



