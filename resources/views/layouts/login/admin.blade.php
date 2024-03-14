@section('admin-form')
<form action="{{ route('admin.login') }}" method="POST" enctype="multipart/form-data" class="mb-3">
    @csrf
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="text" class="form-control" id="email" name="email" aria-describedby="email-help" required>
        <div id="email-help" class="form-text">Introduce an email of an admin's account.</div>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" aria-describedby="password-help" required>
        <div id="password-help" class="form-text">Introduce the password</div>
    </div>
    <button type="submit" class="btn btn-primary text-white">LOGIN</button>
</form>
@show