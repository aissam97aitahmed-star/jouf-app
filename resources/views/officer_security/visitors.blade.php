@extends('officer_security.layout')

@section('content')

    <section class="visitors__security">
        <div class="container">
            <div class="div">
                <div class="d-flex justify-content-between search__form">
                    <h3 class="tajawal-bold fs-24 mb-3" style="color: #111827; flex: 1;">قائمة زوار اليوم</h3>
                    <form action="">
                        <input type="text" name="" id="" placeholder="البحث في الزوار...">
                        <button class="btn btn-primary tajawal-regular fs-16"> <i class="bi bi-search"></i> بحث</button>
                    </form>
                </div>
                <div class="data__vistors">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">الزائر</th>
                                <th scope="col" >نوع الزيارة</th>
                                <th scope="col">الموظف المستضيف</th>
                                <th scope="col" >الوقت</th>
                                <th scope="col"  >الحالة</th>
                                <th scope="col" >الإجراءات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td  data-label="الزائر">
                                    <div class="visitor__info d-flex">
                                        <i class="bi bi-person"></i>
                                        <div>
                                            <h6 class="tajawal-medium fs-14 m-0" style="color: #111827;">عبدالرحمن
                                                العمودي</h6>
                                            <p class="tajawal-regular fs-14" style="color: #6B7280;">شركة NitKit </p>
                                        </div>
                                    </div>
                                </td>
                                <td data-label="نوع الزيارة">
                                    <p class="tajawal-regular fs-14"> <i class="bi bi-briefcase"></i> زيارة عمل</p>
                                </td>
                                <td  data-label="الموظف المستضيف">
                                    <div>
                                        <h6 class="tajawal-medium fs-14 m-0" style="color: #111827;">عمرو زيد
                                        </h6>
                                        <p class="tajawal-regular fs-14" style="color: #6B7280;">تقنية المعلومات</p>
                                    </div>
                                </td>
                                <td  data-label="الوقت">
                                    <div>
                                        <h6 class="tajawal-medium fs-14 m-0" style="color: #111827;"> 09:00
                                        </h6>
                                        <p class="tajawal-regular fs-14" style="color: #6B7280;">2 ساعة</p>
                                    </div>
                                </td>
                                <td data-label="الحالة">
                                    <span class="status tajawal-medium fs-12">مُوافق عليه</span>
                                </td>
                                <td data-label="الإجراءات">
                                    <div class="actions">
                                        <a href="" class="fs-18" style="color: #4F46E5;"><i class="bi bi-eye"></i></a>
                                        <a href="" class="fs-18" style="color: #16A34A;"><i class="bi bi-box-arrow-in-right"></i></a>
                                        <a href="" class="fs-18" style="color: #DC2626;"><i class="bi bi-box-arrow-left"></i></a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

@endsection
