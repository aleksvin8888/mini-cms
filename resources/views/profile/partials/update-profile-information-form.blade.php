<div class="card">
    <div class="card-header">
        <h3 class="card-title">Profile Information</h3>
    </div>
    <div class="card-body">
        <p class="text-muted">
            Update your account's profile information and email address.
        </p>

        <!-- Form to update profile -->
        <form method="post" action="{{ route('profile.update') }}">
            @csrf
            @method('patch')

            <!-- Name Field -->
            <div class="form-group">
                <label for="name">Name</label>
                <input
                    id="name"
                    name="name"
                    type="text"
                    class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name', $user->name) }}"
                    required
                    autofocus
                    autocomplete="name"
                >
                @error('name')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <!-- Email Field -->
            <div class="form-group">
                <label for="email">Email</label>
                <input
                    id="email"
                    name="email"
                    type="email"
                    class="form-control @error('email') is-invalid @enderror"
                    value="{{ old('email', $user->email) }}"
                    required
                    autocomplete="username"
                >
                @error('email')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <!-- Email Verification -->
            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="alert alert-warning mt-3" role="alert">
                    Your email address is unverified.
                    <form id="send-verification" method="post" action="{{ route('verification.send') }}" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-link p-0">Click here to re-send the verification email.</button>
                    </form>
                </div>
                @if (session('status') === 'verification-link-sent')
                    <div class="alert alert-success mt-2" role="alert">
                        A new verification link has been sent to your email address.
                    </div>
                @endif
            @endif

            <!-- Save Button -->
            <button type="submit" class="btn btn-primary mt-3">Save</button>

            <!-- Success Message -->
            @if (session('status') === 'profile-updated')
                <div class="alert alert-success mt-3" role="alert">
                    Profile updated successfully.
                </div>
            @endif
        </form>
    </div>
</div>
