<?php

namespace App\Services;

use App\Models\Notification;

class NotificationService
{
    /**
     * تخزين إشعار جديد
     *
     * @param string $title
     * @param string $description
     * @param string $role
     * @return \App\Models\Notification
     */
    public function store(string $title, string $description, string $role): Notification
    {
        return Notification::create([
            'title' => $title,
            'description' => $description,
            'role' => $role,
            'is_read' => false, // افتراضيًا غير مقروء
        ]);
    }
}
