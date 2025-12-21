@extends('employees.layout')

@section('content')
    <section class="policy">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center py-5">
                <h4 class="tajawal-bold">السياسات والإرشادات</h4>
                <span class="badge rounded-pill text-bg-success tajawal-medium fs-14 disp">{{ $policies->count() ?? 0 }} سياسة متاحة</span>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="mb-5">
                        <h5 class="tajawal-bold fs-18 mb-3"><i class="bi bi-archive" style="color: #00471F;;"></i>
                            &nbsp; فئات السياسات</h5>
                        <ul class="cats">
                            @foreach ($categories as $category)
                                <li>
                                    <a href="#" class="tajawal-medium fs-14">
                                        {{ $category->name }}
                                    </a>
                                    <span>{{ $category->policies_count ?? 0 }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div>
                        <h5 class="tajawal-bold fs-18 mb-2"><i class="bi bi-filter-circle" style="color: #00471F;;"></i>
                            &nbsp; تصفية</h5>
                        <form action="">
                            <div>
                                <label for="" class="tajawal-medium fs-14 mb-2">حسب التاريخ</label>
                                <div class="select-wrapper position-relative">
                                    <select class="form-select form-select-lg mb-3" aria-label="Large select example">
                                        <option value="value1" class="tajawal-regular fs-14">جميع الفترات</option>
                                        <option class="tajawal-regular fs-14">جميع الفترات</option>
                                        <option class="tajawal-regular fs-14">جميع الفترات</option>
                                    </select>
                                    <i class="bi bi-caret-down-fill select-icon"></i>
                                </div>
                            </div>
                            <div>
                                <label for="" class="tajawal-medium fs-14 mb-2">حسب التاريخ</label>
                                <div class="select-wrapper position-relative">
                                    <select class="form-select form-select-lg mb-3" aria-label="Large select example">
                                        <option value="value1" class="tajawal-regular fs-14">جميع الفترات</option>
                                        <option class="tajawal-regular fs-14">جميع الفترات</option>
                                        <option class="tajawal-regular fs-14">جميع الفترات</option>
                                    </select>
                                    <i class="bi bi-caret-down-fill select-icon"></i>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
                <div class="col-md-8">
                     @foreach($policies as $policy)
                        <div class="box mb-5">
                            <div class="d-flex mb-3 policy__single">
                                <span class="key tajawal-bold fs-18"><i class="bi bi-shield-check d-flex fs-20"></i></span>
                                <div style="flex: 1;">
                                    <h4 class="tajawal-bold fs-20 mb-2"> {{ $policy->title }} <span
                                            class="tajawal-medium fs-12"> {{ $policy->priority }} </span></h4>
                                    <p class="tajawal-regular fs-14 mb-2">{{ $policy->description }}</p>
                                    <ul class="d-flex details mb-2 p-0 cats">
                                        <li class="tajawal-regular fs-14"><i class="bi bi-folder"></i>&nbsp; {{ $policy->category->name }}
                                            </li>
                                        <li class="tajawal-regular fs-14"><i class="bi bi-calendar2-minus"></i>&nbsp; آخر
                                            تحديث: {{ \Carbon\Carbon::parse($policy->updated_at)->locale('ar')->diffForHumans() }}</li>
                                        <li class="tajawal-regular fs-14"><i class="bi bi-download"></i>&nbsp; {{ $policy->downloads }} تنزيل
                                        </li>
                                    </ul>
                                </div>
                                <span class="badge rounded-pill text-bg-success tajawal-medium fs-12 disp"
                                    style="height: fit-content;">نشطة</span>
                            </div>
                            <div class="actions d-flex mb-3">
                                <div style="flex: 1;">
                                    <a href="{{ asset('storage/'.$policy->pdf_path) }}" target="_blank" class="btn btn-primary tajawal-regular fs-14" type="submit"><i
                                            class="bi bi-eye"></i>&nbsp; <span>عرض</span> </a>
                                    <a href="{{ asset('storage/'.$policy->pdf_path) }}" download="{{ $policy->title }}.pdf" class="btn btn-primary tajawal-regular fs-14" type="submit"><i
                                            class="bi bi-download"></i>&nbsp; تنزيل PDF </a>
                                    <a href="" class="btn btn-primary tajawal-regular fs-14" type="submit"><i
                                            class="bi bi-share"></i>&nbsp; مشاركة </a>
                                </div>
                                <a href="" class="btn btn-primary tajawal-regular fs-14 last" type="submit"><i
                                        class="bi bi-pencil"></i>&nbsp; تعديل </a>
                            </div>
                            <div class="progress__rate">
                                <div class="d-flex justify-content-between">
                                    <p class="tajawal-medium fs-14">معدل الاطلاع</p>
                                    <strong class="percent tajawal-bold fs-14">73%</strong>
                                </div>
                                <div class="progress" role="progressbar" aria-label="Success example" aria-valuenow="25"
                                    style="height: 8px;" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar bg-success" style="width: 25%;">
                                    </div>
                                </div>
                                <p class="tajawal-regular fs-12">130 موظف اطلع على هذه السياسة</p>
                            </div>
                        </div>
                     @endforeach

                </div>
            </div>
        </div>
    </section>
@endsection
