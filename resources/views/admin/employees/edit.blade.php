@extends('admin.layout')

@section('content')
<section class="pc-container">
    <div class="pc-content">
        <div class="row">

            <div class="col-sm-12">
                <form method="POST" action="{{ route('admin.employees.update', $employee) }}">
                    @csrf
                    @method('PUT')

                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5>تعديل بيانات الموظف</h5>
                            <a href="{{ route('admin.employees.index') }}" class="btn btn-outline-primary d-inline-flex">العودة
                                    <i class="ti ti-arrow-back icon_mr"></i>
                                </a>
                        </div>

                        <div class="card-body">
                            <div class="row">

                                <!-- الاسم -->
                                <div class="col-6 mb-3">
                                    <label class="form-label">الاسم</label>
                                    <input type="text"
                                           name="name"
                                           class="form-control @error('name') is-invalid @enderror"
                                           value="{{ old('name', $employee->name) }}">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- الوظيفة -->
                                <div class="col-6 mb-3">
                                    <label class="form-label">الوظيفة</label>
                                    <input type="text"
                                           name="position"
                                           class="form-control @error('position') is-invalid @enderror"
                                           value="{{ old('position', $employee->position) }}">
                                    @error('position')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- الإدارة (Enum) -->
                                <div class="col-6 mb-3">
                                    <label class="form-label">الإدارة</label>
                                    <select name="department"
                                            class="form-select @error('department') is-invalid @enderror">
                                        <option value="">— اختر الإدارة —</option>

                                        @foreach($departments as $department)
                                            <option value="{{ $department->value }}"
                                                {{ old('department', $employee->department->value ?? $employee->department) === $department->value ? 'selected' : '' }}>
                                                {{ $department->value }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('department')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- البريد -->
                                <div class="col-6 mb-3">
                                    <label class="form-label">البريد الإلكتروني</label>
                                    <input type="email"
                                           name="email"
                                           class="form-control @error('email') is-invalid @enderror"
                                           value="{{ old('email', $employee->email) }}">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- الهاتف -->
                                <div class="col-6 mb-3">
                                    <label class="form-label">الهاتف</label>
                                    <input type="text"
                                           name="phone"
                                           class="form-control @error('phone') is-invalid @enderror"
                                           value="{{ old('phone', $employee->phone) }}">
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- المكتب -->
                                <div class="col-6 mb-3">
                                    <label class="form-label">المكتب</label>
                                    <input type="text"
                                           name="office_location"
                                           class="form-control @error('office_location') is-invalid @enderror"
                                           value="{{ old('office_location', $employee->office_location) }}">
                                    @error('office_location')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                        </div>

                        <div class="card-footer d-flex justify-content-end gap-2">

                             <button type="submit" class="btn btn-outline-success d-inline-flex"><i
                                        class="ti ti-circle-check icon_mr"></i>حفظ التعديلات</button>
                        </div>

                    </div>
                </form>
            </div>

        </div>
    </div>
</section>
@endsection
