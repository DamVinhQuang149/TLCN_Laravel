<?php

namespace App\Http\Controllers;

use App\Models\Emails;
use Illuminate\Http\Request;
use App\Models\Advertisements;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $advertisements = Advertisements::get();
        return view('admin.advertisements.index', ['advertisements' => $advertisements]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.advertisements.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $title = $request->input('title');
        $content = $request->input('content');
        $offer = $request->input('offer');
        $contact_info = $request->input('contact_info');

        $advertisements = Advertisements::create([
            'title' => $title,
            'content' => $content,
            'offer' => $offer,
            'contact_info' => $contact_info
        ]);
        $advertisements->save();
        return redirect('admin/advertisements')->with('success', 'Add New Advertisements Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        //dd($id);
        $advertisements = Advertisements::find($id);
        //dd($advertisements);
        return view('admin.advertisements.update', ['advertisements_id'=> $advertisements]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $title = $request->input('title');
        $content = $request->input('content');
        $offer = $request->input('offer');
        $contact_info = $request->input('contact_info');
        $advertisement = Advertisements::find($id);
        $advertisement->update([
            'title'=> $title,
            'content'=> $content,
            'offer'=> $offer,
            'contact_info'=> $contact_info
        ]);

        return redirect('admin/advertisements')->with('success','Update Advertisements Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $advertisements = Advertisements::find($id);
        $advertisements->delete();
        return redirect('admin/advertisements')->with('error','Deleted Advertisements!!!');
    }

    public function sendMailAdvertisements($id){
        
        // try {

            $emails = Emails::all();
            $advertisement = Advertisements::find($id);

            if ($emails) {
                foreach ($emails as $email) {
                    // Gửi email
                    //dd($email);
                    Mail::send("emails.advertisements", ['advertisement' => $advertisement], function ($message) use ($email) {
                        $message->to($email->email); // Gửi đến địa chỉ email trong danh sách
                        $message->subject("Thông tin quảng cáo mới"); // Chủ đề của email
                    });
                }

                return redirect('admin/advertisements')->with('success', 'Send mail Advertisements Successfully!');

            }

            else {

                return redirect('admin/advertisements')->with('error', 'There are no emails signed up to receive promotional notifications!');

            }

        // } 

        // catch (\Exception $e) {

        //     Log::error('Error sending email: ' . $e->getMessage());

        //     return redirect('admin/advertisements')->with('error', 'An error may occur when sending ads via email. Please try again later.');

        // }

    }
}
