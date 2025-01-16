<div class="card">
    <div class="card-header">
        <h3 class="card-title">Update Password</h3>
    </div>
    <div class="card-body">
        <p class="text-muted">
            Ensure your account is using a long, random password to stay secure.
        </p>

        <form method="post" action="{{ route('password.update') }}">
            @csrf
            @method('put')

            <div class="form-group">
                <label for="update_password_current_password">Current Password</label>
                <input
                    id="update_password_current_password"
                    name="current_password"
                    type="password"
                    class="form-control @error('current_password') is-invalid @enderror"
                    autocomplete="current-password"
                >
                @error('current_password')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="update_password_password">New Password</label>
                <input
                    id="update_password_password"
                    name="password"
                    type="password"
                    class="form-control @error('password') is-invalid @enderror"
                    autocomplete="new-password"
                >
                @error('password')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="update_password_password_confirmation">Confirm Password</label>
                <input
                    id="update_password_password_confirmation"
                    name="password_confirmation"
                    type="password"
                    class="form-control @error('password_confirmation') is-invalid @enderror"
                    autocomplete="new-password"
                >
                @error('password_confirmation')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>

            @if (session('status') === 'password-updated')
                <div class="alert alert-success mt-3" role="alert">
                    Password updated successfully.
                </div>
            @endif
        </form>
    </div>
</div>
