<?php

namespace app\Library;

class BaseClass
{
    public static function getAllClips($clips)
    {
        return $clips
            ->with('site')
            ->with('user')
            ->with('categories')
            ->orderBy('updated_at', 'DESC')
            ->get();
    }

    public static function getYourClips($clips, $user)
    {
        return $clips
            ->with('site')
            ->with('user')
            ->with('categories')
            ->where('clips.user_id', $user->id)
            ->orderBy('updated_at', 'DESC')
            ->get();
    }
}
