<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\CardCreated;

class CardsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Card::where('is_active', 1)
            ->orderBy('id', 'desc')
            ->take(100)
            ->get();
    }

    /**
     * Display a listing of the weddings.
     *
     * @return \Illuminate\Http\Response
     */
    public function weddings()
    {
        return Card::where([['is_active', '=', 1], ['category_id', '=', 1]])
            ->orderBy('id', 'desc')
            ->take(20)
            ->get();
    }

    /**
     * Display a listing of the birthdays.
     *
     * @return \Illuminate\Http\Response
     */
    public function birthdays()
    {
        return Card::where([['is_active', '=', 1], ['category_id', '=', 2]])
            ->orderBy('id', 'desc')
            ->take(100)
            ->get();
    }

    /**
     * Display a listing of the holidays.
     *
     * @return \Illuminate\Http\Response
     */
    public function holidays()
    {
        return Card::where([['is_active', '=', 1], ['category_id', '=', 3]])
            ->orderBy('id', 'desc')
            ->take(20)
            ->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $card = new Card();

        $card->header_text = $request->data['header_text'];
        $card->card_text = $request->data['card_text'];
        $card->signature_text = $request->data['signature_text'];
        $card->color = $request->data['color'];
        $card->image_id = $request->data['image_id'];
        $card->payment_status = $request->data['payment_id'];
        $card->is_active = 0;
        $card->is_audio = $request->data['is_audio'];
        $card->category_id = $request->data['category_id'];
        $card->created_at = Carbon::now();

        if ($card->save()) {
            $this->sendmail($card);
            return response()->json(array('success' => true, 'card_id' => $card->id), 200);
        } else {
            return response()->json(array('success' => false, 'card_id' => 0), 200);
        }
    }

    /**
     * Send contact message to info.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function sendmail($card)
    {
        try {
            Mail::to('info@cestitke.online')->send(new CardCreated($card));
        } catch (\Exception $e) {
            echo 'Error - '.$e;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Card::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function edit(Card $card)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $card = Card::find($id);

        $card->is_active = 1;

        $card->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function destroy(Card $card)
    {
        //
    }
}
