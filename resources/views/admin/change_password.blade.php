@extends('admin.layout')

@section('content')
    <section class="pc-container">
        <div class="pc-content">
            <div class="row">

                <div class="col-sm-12">
                    <form method="POST" action="{{ route('admin.password.reset') }}">
                        @csrf

                        <div class="card">



                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5>تغيير كلمة المرور</h5>
                                <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-primary d-inline-flex">
                                    العودة
                                    <i class="ti ti-arrow-back icon_mr"></i>
                                </a>
                            </div>

                            <div class="card-body">

                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul class="mb-0">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                <div class="row">

                                    {{-- كلمة المرور الحالية --}}
                                    <div class="col-6 mb-3">
                                        <label class="form-label">كلمة المرور الحالية</label>
                                        <input type="password" name="current_password"
                                            class="form-control @error('current_password') is-invalid @enderror" required>
                                        @error('current_password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- كلمة المرور الجديدة --}}
                                    <div class="col-6 mb-3">
                                        <label class="form-label">كلمة المرور الجديدة</label>
                                        <input type="password" name="new_password"
                                            class="form-control @error('new_password') is-invalid @enderror" required>
                                        @error('new_password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- تأكيد كلمة المرور الجديدة --}}
                                    <div class="col-6 mb-3">
                                        <label class="form-label">تأكيد كلمة المرور الجديدة</label>
                                        <input type="password" name="new_password_confirmation" class="form-control"
                                            required>
                                    </div>

                                </div>
                            </div>

                            <div class="card-footer d-flex justify-content-end gap-2">
                                <button type="submit" class="btn btn-outline-success">
                                    <i class="ti ti-circle-check icon_mr"></i>
                                    حفظ التعديلات
                                </button>
                            </div>

                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>
@endsection
