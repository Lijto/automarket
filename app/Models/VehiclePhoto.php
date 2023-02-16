<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class VehiclePhoto extends Model
{
    use HasFactory;

    protected $fillable = [
        'link'
    ];

    public $timestamps = false;

    public function announcement(): BelongsTo
    {
        return $this->belongsTo(Announcement::class);
    }

    public function storeAnnouncementPhoto(int $announcementId, array $photos)
    {
        $links = [];
        $records = [];

        $imagePath = 'photos' . '/' . $announcementId . '/';

        for ($i = 0; $i < count($photos); $i++) {
            Storage::move(
                'tmp/' . $photos[$i],
                $imagePath . $photos[$i]
            );
            $links[] = $imagePath . $photos[$i];
        }

        foreach ($links as $link) {
            $record = [
                'announcement_id' => $announcementId,
                'link' => $link
            ];
            $records[] = $record;
        }
        VehiclePhoto::upsert($records, ['announcement_id'], ['announcement_id', 'link']);
    }

    public function deleteAnnouncementPhoto()
    {
        $photoLink = $this->link;
        $this->delete();
        Storage::delete($photoLink);
    }
}
