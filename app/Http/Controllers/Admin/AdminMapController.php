<?php

namespace App\Http\Controllers\Admin;

use App\Models\Facility;
use App\Models\Location;
use Illuminate\Http\Request;
use App\Events\NotifyEmployee;
use App\Http\Controllers\Controller;
use App\Services\NotificationService;
use Devrabiul\ToastMagic\Facades\ToastMagic;

class AdminMapController extends Controller
{

    protected $notificationService;

    public function __construct(NotificationService $notificationService)
    {
        $this->notificationService = $notificationService;
    }

    public function index()
    {
        $facilities = Facility::all();
        $locations = Location::with('facilities')
            ->where('is_active', true)
            ->get();
        return view('admin.map.index', compact('locations', 'facilities'));
    }

    public function create()
    {
        $facilities = Facility::all();
        return view('admin.locations.create', compact('facilities'));
    }


    public function edit(Location $location)
    {
        $facilities = Facility::all();
        return view('admin.map.edit', compact('location', 'facilities'));
    }


    public function show(Location $location)
    {
        return view('admin.map.show', compact('location'));
    }

    public function store(Request $request)
    {
        // return $request->all();

        $data = $request->validate([
            'name'           => 'required|string|max:255',
            'category'       => 'nullable|string|max:255',
            'phone'          => 'nullable|string|max:50',
            'working_hours'  => 'nullable|string|max:255',
            'access_info'    => 'nullable|string',
            'facilities'     => 'nullable|array',
            'facilities.*'   => 'exists:facilities,id',
            'is_active'      => 'boolean',
            'lat'           => 'nullable|numeric',
            'lng'           => 'nullable|numeric',
        ]);

        $location = Location::create($data);

        if ($request->filled('facilities')) {
            $location->facilities()->sync($request->facilities);
        }
        try {
            broadcast(new NotifyEmployee('تنبيه : تم إضافة موقع جديد'));
            $this->notificationService->store(
                'موقع جديد',
                'تم إضافة موقع جديد من طرف الإدارة',
                'employee'
            );
        } catch (\Throwable $th) {
            return $th;
        }
        ToastMagic::success('تم إنشاء الموقع بنجاح');
        return redirect()->back();
    }

    public function update(Request $request, Location $location)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:50',
            'working_hours' => 'nullable|string|max:50',
            'access_info' => 'nullable|string',
            'lat' => 'nullable|numeric',
            'lng' => 'nullable|numeric',
            'facilities' => 'nullable|array',
        ]);

        $location->update($data);

        // Sync facilities
        $location->facilities()->sync($request->facilities ?? []);
        ToastMagic::success('تم تحديث الموقع بنجاح');
        return redirect()->route('admin.map.index');
    }


    public function destroy(Location $location)
    {
        $location->facilities()->detach(); // افصل العلاقات
        $location->delete();

        return response()->json([
            'success' => true,
            'message' => 'تم حذف الموقع بنجاح'
        ]);
    }
}
