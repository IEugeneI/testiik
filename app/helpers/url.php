<?php
function getUrlToImage($path)
{
    return env('APP_URL') . Storage::url($path);
}
