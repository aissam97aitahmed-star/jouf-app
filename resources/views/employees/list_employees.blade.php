@extends('employees.layout')

@section('content')
    <section class="employees__list">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center py-5">
                <h4 class="tajawal-bold">قائمة الموظفين المرشدين</h4>
                <span class="badge rounded-pill text-bg-success tajawal-medium fs-14">6 مرشد متاح</span>
            </div>
            <div class="row pb-5">
                <div class="col-md-4 mb-4">
                    <div class="box">
                        <div class="d-flex align-items-center mb-3">
                            <span class="key tajawal-bold fs-18">م ز</span>
                            <div>
                                <h5 class="tajawal-bold fs-18 m-0">عمرو زيد</h5>
                                <p class="tajawal-regular fs-14" style="color: #4B5563;">مسوول الدعم الفني</p>
                            </div>
                        </div>
                        <div>
                            <ul class="info">
                                <li class="tajawal-regular fs-14 mb-2"><i class="bi bi-bookmark-check"></i>&nbsp;&nbsp;
                                    إدارة تقنية المعلومات</li>
                                <li class="tajawal-regular fs-14 mb-2"><i class="bi bi-envelope-at"></i>&nbsp;&nbsp;
                                    azaid@aljouf.com.sa</li>
                                <li class="tajawal-regular fs-14 mb-2"><i class="bi bi-telephone"></i>&nbsp;&nbsp;
                                    055-691-5391</li>
                                <li class="tajawal-regular fs-14 mb-2"><i class="bi bi-geo-alt"></i>&nbsp;&nbsp; الادارة
                                    العامة - بسيطاء</li>
                            </ul>
                        </div>
                        <div class="d-flex gap-2 actions">
                            <a class="btn btn-primary flex-fill tajawal-regular fs-14" href="javascript:void(0)"
                                data-bs-toggle="modal" data-bs-target="#AppelModal" role="button">
                                <i class="bi bi-telephone"></i>&nbsp; اتصال
                            </a>
                            <a class="btn btn-primary flex-fill tajawal-regular fs-14" href="javascript:void(0)"
                                data-bs-toggle="modal" data-bs-target="#MessageModal" role="button">
                                <i class="bi bi-chat"></i>&nbsp; رسالة
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="box">
                        <div class="d-flex align-items-center mb-3">
                            <span class="key tajawal-bold fs-18">م ز</span>
                            <div>
                                <h5 class="tajawal-bold fs-18 m-0">عمرو زيد</h5>
                                <p class="tajawal-regular fs-14" style="color: #4B5563;">مسوول الدعم الفني</p>
                            </div>
                        </div>
                        <div>
                            <ul class="info">
                                <li class="tajawal-regular fs-14 mb-2"><i class="bi bi-bookmark-check"></i>&nbsp;&nbsp;
                                    إدارة تقنية المعلومات</li>
                                <li class="tajawal-regular fs-14 mb-2"><i class="bi bi-envelope-at"></i>&nbsp;&nbsp;
                                    azaid@aljouf.com.sa</li>
                                <li class="tajawal-regular fs-14 mb-2"><i class="bi bi-telephone"></i>&nbsp;&nbsp;
                                    055-691-5391</li>
                                <li class="tajawal-regular fs-14 mb-2"><i class="bi bi-geo-alt"></i>&nbsp;&nbsp; الادارة
                                    العامة - بسيطاء</li>
                            </ul>
                        </div>
                        <div class="d-flex gap-2 actions">
                            <a class="btn btn-primary flex-fill tajawal-regular fs-14" href="javascript:void(0)"
                                data-bs-toggle="modal" data-bs-target="#AppelModal" role="button">
                                <i class="bi bi-telephone"></i>&nbsp; اتصال
                            </a>
                            <a class="btn btn-primary flex-fill tajawal-regular fs-14" href="javascript:void(0)"
                                data-bs-toggle="modal" data-bs-target="#MessageModal" role="button">
                                <i class="bi bi-chat"></i>&nbsp; رسالة
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="box">
                        <div class="d-flex align-items-center mb-3">
                            <span class="key tajawal-bold fs-18">م ز</span>
                            <div>
                                <h5 class="tajawal-bold fs-18 m-0">عمرو زيد</h5>
                                <p class="tajawal-regular fs-14" style="color: #4B5563;">مسوول الدعم الفني</p>
                            </div>
                        </div>
                        <div>
                            <ul class="info">
                                <li class="tajawal-regular fs-14 mb-2"><i class="bi bi-bookmark-check"></i>&nbsp;&nbsp;
                                    إدارة تقنية المعلومات</li>
                                <li class="tajawal-regular fs-14 mb-2"><i class="bi bi-envelope-at"></i>&nbsp;&nbsp;
                                    azaid@aljouf.com.sa</li>
                                <li class="tajawal-regular fs-14 mb-2"><i class="bi bi-telephone"></i>&nbsp;&nbsp;
                                    055-691-5391</li>
                                <li class="tajawal-regular fs-14 mb-2"><i class="bi bi-geo-alt"></i>&nbsp;&nbsp; الادارة
                                    العامة - بسيطاء</li>
                            </ul>
                        </div>
                        <div class="d-flex gap-2 actions">
                            <a class="btn btn-primary flex-fill tajawal-regular fs-14" href="javascript:void(0)"
                                data-bs-toggle="modal" data-bs-target="#AppelModal" role="button">
                                <i class="bi bi-telephone"></i>&nbsp; اتصال
                            </a>
                            <a class="btn btn-primary flex-fill tajawal-regular fs-14" href="javascript:void(0)"
                                data-bs-toggle="modal" data-bs-target="#MessageModal" role="button">
                                <i class="bi bi-chat"></i>&nbsp; رسالة
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Start Appel Modal -->
    <div class="modal fade employees__call" id="AppelModal" tabindex="-1" aria-labelledby="AppelModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="d-flex flex-column justify-content-center align-items-center w-100">
                        <span class="tajawal-bold fs-30 mb-3">ع ز</span>
                        <h5 class="tajawal-bold fs-24" style="color: #FFFFFF;">عمرو زيد</h5>
                        <p class="tajawal-regular fs-16" style="color: #E0E7FF;">مسؤول الدعم الفني</p>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="d-flex item">
                        <i class="fa fa-phone"></i>
                        <div class="d-flex flex-column">
                            <strong class="tajawal-bold fs-14" style="color: #111827;">رقم الهاتف</strong>
                            <strong class="tajawal-medium fs-16" style="color: #4F46E5;">055-691-5391</strong>
                        </div>
                    </div>
                    <div class="d-flex item">
                        <i class="fa fa-envelope mail"></i>
                        <div class="d-flex flex-column">
                            <strong class="tajawal-bold fs-14" style="color: #111827;">البريد الإلكتروني</strong>
                            <strong class="tajawal-medium fs-16" style="color: #166534;">azaid@aljouf.com.sa</strong>
                        </div>
                    </div>
                    <div class="d-flex item">
                        <i class="fa fa-map-marker map"></i>
                        <div class="d-flex flex-column">
                            <strong class="tajawal-bold fs-14" style="color: #111827;">المكتب</strong>
                            <strong class="tajawal-medium fs-16" style="color: #F97316;">الادارة العامة -
                                بسيطاء</strong>
                        </div>
                    </div>
                    <a class="btn btn-primary w-100 action"> <i class="fa fa-phone"></i><span
                            class="tajawal-bold fs-16">مكالمة صوتية</span></a>
                    <a class="btn btn-primary w-100 action"> <i class="fa fa-video-camera"></i><span
                            class="tajawal-bold fs-16">مكالمة فيديو</span></a>
                    <a class="btn btn-primary w-100 action" data-bs-dismiss="modal" href="javascript:void(0)"
                        aria-label="Close"> <i class="fa fa-times"></i><span class="tajawal-bold fs-16"> إغلاق</span></a>

                    <div class="add mb-4">
                        <h6 class="tajawal-bold fs-14" style="color: #3730A3;"> <i class="fa fa-info"
                                aria-hidden="true"></i> معلومات إضافية</h6>
                        <p class="tajawal-regular fs-14" style="color: #4338CA;">متاح للمساعدة في جميع الاستفسارات
                            المتعلقة بـالموارد البشرية</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Appel Modal -->

    <!-- Start Message Modal -->
    <div class="modal fade employees__message" id="MessageModal" tabindex="-1" aria-labelledby="MessageModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="d-flex flex-column justify-content-center align-items-center w-100">
                        <span class="tajawal-bold fs-30 mb-3">ع ز</span>
                        <h5 class="tajawal-bold fs-24" style="color: #FFFFFF;">عمرو زيد</h5>
                        <p class="tajawal-regular fs-16" style="color: #E0E7FF;">مسؤول الدعم الفني</p>
                    </div>
                </div>
                <div class="modal-body">
                    <form action="" method="">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label tajawal-bold fs-14"
                                style="color: #111827;">موضوع الرسالة</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1"
                                placeholder="اكتب موضوع الرسالة...">
                        </div>
                        <div class="">
                            <label for="exampleFormControlTextarea1" class="form-label tajawal-bold fs-14"
                                style="color: #111827;"><i class="bi bi-chat-dots"></i> <span>محتوى الرسالة</span>
                            </label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="اكتب رسالتك هنا..." rows="3"></textarea>
                        </div>
                        <div class="d-flex justify-content-between mb-4">
                            <span class="tajawal-regular fs-12" style="color: #6B7280;">الحد الأقصى 500 حرف</span>
                            <span class="tajawal-regular fs-12" style="color: #6B7280;">0/500</span>
                        </div>
                        <div>
                            <label class="form-label tajawal-bold fs-14" style="color: #111827;"> <span>قوالب
                                    سريعة</span>
                            </label>
                            <div class="templates mb-3">
                                <div class="item">
                                    <h6 class="tajawal-medium fs-14" style="color: #00471F;">ترحيب بالموظف الجديد</h6>
                                    <p class="tajawal-regular fs-12" style="color: #166534;">مرحباً بك في فريقنا! نحن
                                        سعداء بانضمامك إلينا ونتطلع للعمل معك.</p>
                                </div>
                                <div class="item">
                                    <h6 class="tajawal-medium fs-14" style="color: #00471F;">ترحيب بالموظف الجديد</h6>
                                    <p class="tajawal-regular fs-12" style="color: #166534;">مرحباً بك في فريقنا! نحن
                                        سعداء بانضمامك إلينا ونتطلع للعمل معك.</p>
                                </div>
                                <div class="item">
                                    <h6 class="tajawal-medium fs-14" style="color: #00471F;">ترحيب بالموظف الجديد</h6>
                                    <p class="tajawal-regular fs-12" style="color: #166534;">مرحباً بك في فريقنا! نحن
                                        سعداء بانضمامك إلينا ونتطلع للعمل معك.</p>
                                </div>
                                <div class="item">
                                    <h6 class="tajawal-medium fs-14" style="color: #00471F;">ترحيب بالموظف الجديد</h6>
                                    <p class="tajawal-regular fs-12" style="color: #166534;">مرحباً بك في فريقنا! نحن
                                        سعداء بانضمامك إلينا ونتطلع للعمل معك.</p>
                                </div>
                            </div>

                        </div>
                        <div class="priority mb-4">
                            <label for="exampleFormControlTextarea1" class="form-label tajawal-bold fs-14 m-0"
                                style="color: #111827; "><i class="bi bi-flag"></i> <span>مستوى الأولوية</span>
                            </label>
                            <div>
                                <span class="tajawal-medium fs-14"><i class="bi bi-flag"></i>
                                    <strong>منخفضة</strong></span>
                                <span class="tajawal-medium fs-14"><i class="bi bi-flag-fill"></i>
                                    <strong>متوسطة</strong></span>
                                <span class="tajawal-medium fs-14"><i class="bi bi-info-circle-fill"></i>
                                    <strong>عالية</strong></span>
                            </div>
                        </div>
                        <div class="row action g-2 mb-4">
                            <div class="col-md-6">
                                <button class="btn btn-primary w-100 tajawal-bold fs-16 first-btn"><span><i
                                            class="bi bi-send-fill"></i></span>إرسال الرسالة</button>
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-primary w-100 tajawal-bold fs-16"><i
                                        class="bi bi-arrow-clockwise"></i>مسح</button>
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-primary w-100 tajawal-bold fs-16" data-bs-dismiss="modal"
                                    aria-label="Close"><i class="bi bi-x"></i>إغلاق</button>
                            </div>
                        </div>

                        <div class="end mb-4">
                            <h6 class="tajawal-bold fs-14"><i class="bi bi-info-circle"></i><span>معلومات
                                    إضافية</span></h6>
                            <ul>
                                <li class="tajawal-regular fs-14"><i
                                        class="bi bi-envelope"></i><span>azaid@aljouf.com.sa</span></li>
                                <li class="tajawal-regular fs-14"><i
                                        class="bi bi-telephone"></i><span>azaid@aljouf.com.sa</span></li>
                                <li class="tajawal-regular fs-14"><i
                                        class="bi bi-buildings"></i><span>azaid@aljouf.com.sa</span></li>
                                <li class="tajawal-regular fs-14"><i
                                        class="bi bi-geo-alt"></i><span>azaid@aljouf.com.sa</span></li>
                            </ul>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Message Modal -->
@endsection
