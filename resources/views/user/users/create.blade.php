@section('user-form')
<form action="{{ route('user.new') }}" method="POST" enctype="multipart/form-data" class="mb-3">
    @csrf
    <div class="mb-3">
        <label for="dni" class="form-label">DNI</label>
        <input type="text" class="form-control" id="address" name="address" aria-describedby="dni-help" pattern=/^\d{8}[a-zA-Z]$/ required>
        <div id="dni-help" class="form-text">Introduce your DNI.</div>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="text" class="form-control" id="email" name="email" aria-describedby="email-help" required>
        <div id="email-help" class="form-text">Introduce your email.</div>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" aria-describedby="password-help" required>
        <div id="password-help" class="form-text">Introduce your password.</div>
    </div>
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" aria-describedby="name-help" required>
        <div id="name-help" class="form-text">Introduce your name.</div>
    </div>
    <div class="mb-3">
        <label for="address" class="form-label">Address</label>
        <input type="text" class="form-control" id="address" name="address" aria-describedby="address-help" required>
        <div id="address-help" class="form-text">Introduce your address.</div>
    </div>
    <div class="mb-3">
        <label for="birthdate" class="form-label">Birthdate</label>
        <input type="date" class="form-control" id="birthdate" name="birthdate" aria-describedby="birthdate-help" required>
        <div id="birthdate-help" class="form-text">Introduce your birthdate.</div>
    </div>
    <div class="mb-3">
        <label for="sex" class="form-label">Sex</label>
        <select id="sex" name="sex" aria-describedby="sex-help" class="form-select" aria-label="Specify your sex" required>
            <option value="1" selected>Men</option>
            <option value="0">Woman</option>
        </select>
        <div id="sex-help" class="form-text">Introduce your sex.</div>
    </div>
    <div class="mb-3">
        <label for="federation" class="form-label">Federation number</label>
        <input type="text" class="form-control" id="federation" name="federation" aria-describedby="federation-help">
        <div id="federation-help" class="form-text">Are you federated? Introduce your federation number.</div>
    </div>
    <button type="submit" class="btn btn-primary text-white">REGISTER</button>
</form>
<div class="mb-3">
    <div id="route-login"><a href="{{ route('user.index') }}">Already a memeber?</a></div>
</div>
@show