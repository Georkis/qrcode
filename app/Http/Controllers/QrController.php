<?php

namespace App\Http\Controllers;

use App\Models\User;
use BaconQrCode\Renderer\Image\ImagickImageBackEnd;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrController extends Controller
{
    public function qr()
    {
        $user = User::find(1);

        return view('welcome', compact('user'));
    }

    public function downloadQRCode(Request $request, $id)
    {
        $user = User::find($id);

        $imageName  = 'qr-code';
        $headers    = array('Content-Type' => ['png','svg','eps']);
        $type       = $request->qr_type == 'jpg' || $request->qr_type == 'transparent' ? 'png' : $request->qr_type;
        $image      = QrCode::format($type)
                    ->size(300)->errorCorrection('H')
                    ->generate($user->name."\n". $user->email);

        Storage::disk('public')->put($imageName, $image);

        if ($request->qr_type == 'jpg') {
            $type = 'jpg';
            $image = imagecreatefrompng('storage/'.$imageName);
            imagejpeg($image, 'storage/'.$imageName, 100);
            imagedestroy($image);
        }

        return response()->download('storage/'.$imageName, $imageName.'.'.$type, $headers)->deleteFileAfterSend();
    }
}
