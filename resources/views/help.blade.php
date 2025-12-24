@extends('manager_security.layout')

@section('content')
<section class="alerts__security">
    <div class="container">
        <div class="div">
            <div class="d-flex justify-content-between align-items-center notification__head">
                <h3 class="tajawal-bold fs-24 m-0" style="color: #111827; flex: 1;">التنبيهات الأمنية</h3>
                <a href="#" class="btn btn-primary tajawal-regular fs-16 read__all">
                    <i class="bi bi-check2-all"></i> تحديد الكل كمقروء
                </a>
            </div>

            <div class="alerts__security__all">
                @foreach($notifications as $notification)
                <div class="alert__single d-flex justify-content-between" data-id="{{ $notification->id }}">
                    <div class="alert__info d-flex">
                        <i class="bi bi-clock"></i>
                        <div>
                            <h3 class="tajawal-bold fs-18" style="color: #111827;">{{ $notification->title }}
                                <span class="tajawal-medium fs-12">عاجل</span>
                            </h3>
                            <p class="tajawal-regular fs-16" style="color: #4B5563;">{{ $notification->description }}</p>
                            <p class="tajawal-regular fs-14" style="color: #6B7280;">{{ $notification->created_at->locale('ar')->diffForHumans() }}</p>
                        </div>
                    </div>
                    <div class="alert__status">
                        <a href="#" class="btn btn-primary tajawal-regular fs-16 read-btn">
                            <i class="bi bi-check"></i> تحديد كمقروء
                        </a>
                        <a href="#" class="btn btn-danger tajawal-regular fs-16 delete-btn">
                            <i class="bi bi-trash"></i> حذف
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection

@push('js')
<script>
document.addEventListener('DOMContentLoaded', function() {

    // تحديد إشعار واحد كمقروء
    document.querySelectorAll('.read-btn').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            let alertDiv = this.closest('.alert__single');
            let id = alertDiv.dataset.id;

            fetch(`/manager/security/notifications/read/${id}`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                }
            }).then(res => res.json())
              .then(data => {
                  if(data.success){
                      alertDiv.remove();
                  }
              });
        });
    });

    // حذف إشعار
    document.querySelectorAll('.delete-btn').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            let alertDiv = this.closest('.alert__single');
            let id = alertDiv.dataset.id;

            if(!confirm('هل أنت متأكد من الحذف؟')) return;

            fetch(`/manager/security/notifications/delete/${id}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                }
            }).then(res => res.json())
              .then(data => {
                  if(data.success){
                      alertDiv.remove();
                  }
              });
        });
    });

    // تحديد كل الإشعارات كمقروء
    document.querySelector('.read__all').addEventListener('click', function(e){
        e.preventDefault();

        fetch(`/manager/security/notifications/read-all`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            }
        }).then(res => res.json())
          .then(data => {
              if(data.success){
                  document.querySelectorAll('.alert__single').forEach(el => el.remove());
              }
          });
    });

});
</script>
@endpush
