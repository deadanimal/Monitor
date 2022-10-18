<?php

namespace App\Http\Controllers;

use DataTables;
use DateTime;

use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\BookingAsset;


class BookingAssetController extends Controller
{
    public function senarai_booking_asset(Request $request)
    {
        $assets = BookingAsset::all();
        return view('booking.senarai_asset', compact('assets'));
    }

    public function cipta_booking_asset(Request $request)
    {
        $user = $request->user();
        $user_id = $user->id;
        
        $asset = new BookingAsset;
        $asset->nama = $request->nama;
        $asset->deskripsi = $request->deskripsi;
        $asset->user_id = $user_id;
        $asset->save();
        
        toast('Asset berjaya dicipta!', 'success');
        return back();
    }

    public function satu_booking_asset(Request $request)
    {
        $today = date("Y-m-d");
        $id = (int)$request->route('id');
        $user = $request->user();
        $user_id = $user->id;
        $asset = BookingAsset::find($id);
        $booking_prevs = Booking::where([
            ['booking_asset_id', '=', $asset->id],
            ['tarikh', '<', $today]
        ])->orderBy('tarikh', 'ASC')->get();
        $booking_nexts = Booking::where([
            ['booking_asset_id', '=', $asset->id],
            ['tarikh', '>=', $today]
        ])->orderBy('tarikh', 'ASC')->get();
        return view(
            'booking.satu_asset',
            compact(
                'asset',
                'booking_prevs',
                'booking_nexts'
            )
        );
    }

    public function cipta_booking(Request $request)
    {
        $id = (int)$request->route('id');
        $user = $request->user();
        $user_id = $user->id;
        $asset = BookingAsset::find($id);
        $booking = new Booking;
        $booking->asset_id = $asset->id;
        $booking->tarikh = $request->tarikh;
        $booking->ulasan = $request->ulasan;
        $booking->user_id = $user_id;
        $booking->save();
        toast('Booking berjaya!', 'success');
        return back();
    }
}
