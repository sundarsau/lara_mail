@extends('layouts.master')
@section('main-content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>Send Mail in Laravel</h3>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <form id = "thisForm" action="{{ route('sendmail.post') }}" method="post">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="to_email">To Email</label>
                            <input type="text" placeholder="Enter Email Id " name="to_email" class="form-control mt-2"
                                value="{{ old('to_email') }}" />
                            <div class="error">
                                @error('to_email')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="subject">Subject</label>
                            <input type="text" name="subject" placeholder="Enter Subject" class="form-control mt-2"
                                value="{{ old('subject') }}" />
                            <div class="error">
                                @error('subject')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="password">Email Body</label>
                            <textarea class="form-control mt-2" name="mail_body" placeholder="Type Text to send">{{ old('mail_body') }}</textarea>
                            <div class="error">
                                @error('mail_body')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>

                        <div class="form-group d-flex justify-content-end">
                            <button type="submit" class="submit-btn">Send</button>
                        </div>
                        <div id ="loader"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
<script>
    $("#thisForm").submit(function() {
        $(".submit-btn").attr("disabled", true);
        $("#loader").show();
    });
</script>
@endpush