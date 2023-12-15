<?php

namespace App\Http\Controllers;

use App\Models\Emails;
use Illuminate\Http\Request;

class EmailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emails = Emails::orderBy('email_id', 'desc')->paginate(6);
        return view('admin.emails.index', ['emails' => $emails]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputEmails = $request->input('emails');
        $emails = Emails::create(['emails' => $inputEmails]);
        $emails->save();
        return redirect('index')->with('success', 'Thêm Email thành công! Cảm ơn bạn!');
    }

    public function addNotify(Request $request)
    {

        $inputEmails = $request->input('emails');

        $emails = Emails::create(['email' => $inputEmails]);

        return redirect()->route('index')->with('success', 'Cảm ơn bạn đã đăng ký Email nhận thông báo!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($email_id)
    {
        $emails = Emails::find($email_id);
        $emails->delete();
        return redirect('admin/emails')->with('success', 'Delete Email Successfully!');
    }
}