@extends('admin.layout')

@push('css')
    <style>
        .form-control {
            border: 1px solid #ced4da;
            border-radius: 4px;
        }

        .br-6 {
            border-radius: 6px;
        }
    </style>
@endpush

@section('content')
    <section class="pc-container">
        <div class="pc-content">

            <div class="row">
                <div class="col-sm-12">

                    <form method="POST" action="{{ route('admin.users.update', $user) }}">
                        @csrf
                        @method('PUT')

                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5>تعديل المستخدم</h5>

                                <a href="{{ route('admin.users.index') }}" class="btn btn-outline-primary d-inline-flex">
                                    العودة
                                    <i class="ti ti-arrow-back icon_mr"></i>
                                </a>
                            </div>

                            <div class="card-body">
                                <div class="row">

                                    {{-- Name --}}
                                    <div class="col-6 mb-3">
                                        <label class="form-label">الاسم</label>
                                        <input type="text" name="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            value="{{ old('name', $user->name) }}">
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Username --}}
                                    <div class="col-6 mb-3">
                                        <label class="form-label">اسم المستخدم / الرقم الوظيفي</label>
                                        <input type="text" name="username"
                                            class="form-control @error('username') is-invalid @enderror"
                                            value="{{ old('username', $user->username) }}">
                                        @error('username')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Role --}}
                                    <div class="col-6 mb-3">
                                        <label class="form-label">نوع المستخدم</label>
                                        <select name="role" class="form-select @error('role') is-invalid @enderror">
                                            <option value="">— اختر الدور —</option>
                                            <option value="security_manager"
                                                {{ old('role', $user->role) == 'security_manager' ? 'selected' : '' }}>
                                                مدير الأمن
                                            </option>
                                            <option value="security_officer"
                                                {{ old('role', $user->role) == 'security_officer' ? 'selected' : '' }}>
                                                موظف الأمن
                                            </option>
                                            <option value="employee"
                                                {{ old('role', $user->role) == 'employee' ? 'selected' : '' }}>
                                                موظف جديد
                                            </option>
                                        </select>
                                        @error('role')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Email --}}
                                    <div class="col-6 mb-3">
                                        <label class="form-label">البريد الإلكتروني</label>
                                        <input type="email" name="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            value="{{ old('email', $user->email) }}">
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Password --}}
                                    <div class="col-6 mb-3">
                                        <label class="form-label">كلمة المرور (اختياري)</label>
                                        <input type="password" name="password"
                                            class="form-control @error('password') is-invalid @enderror">
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Password Confirmation --}}
                                    <div class="col-6 mb-3">
                                        <label class="form-label">تأكيد كلمة المرور</label>
                                        <input type="password" name="password_confirmation" class="form-control">
                                    </div>

                                </div>
                            </div>

                            <div class="card-footer d-flex justify-content-end">
                                <button type="submit" class="btn btn-outline-success d-inline-flex">
                                    <i class="ti ti-circle-check icon_mr"></i>
                                    تحديث المستخدم
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </section>
@endsection
