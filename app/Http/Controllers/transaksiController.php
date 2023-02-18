<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class transaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

   
    public function gettransaksi(Request $request)
    {
        $id = $request->input('AccountID');
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        if ( $start_date> $end_date )
        {
            return back()->withErrors('inputan tanggal salah');
        }



       // 
          $results =DB::table('transaksi')->where('AccountID', $id)->whereBetween('TransactionDate', [$start_date, $end_date])
                ->orderBy('TransactionDate', 'asc')
                ->get();
          if(!$results){
                return back()->withErrors('data tidak ditemukan');
            }
        
          return view('liattransaksi',compact('results'));
        
        
    }
    public function posttransaksi(Request $request)
    {
        $validatedData = $request->validate([
            'amount' => 'integer|min:1|',
        ]);

        if(!$validatedData){
            return back()->withErrors('masukan angka');
        } 
        
        $user = DB::table('users')->where("AccountID",$request->AccountID)->first(); 
        if(!$user){
            return  back()->withErrors('id tidak ada / masukan id dengan benar');
        } 
        $saldo = $user->amount;
        $pointUser = $user->Points;
        
        $deskripsi ="";
        $status ="";
        $nominal =0;
        $point = 0;

        if ($request->DebitCreditStatus != "C" && $request->DebitCreditStatus !="D")
        {
            return back()->withErrors('pilih transaksi');
        }
        else if ($request->DebitCreditStatus == "C" )
        {
            $status ="C";
            $nominal = $saldo + $request->amount;
            $deskripsi = "setor Tunai";
        }
        else 
        {   
            $status ="D";
            if ($request->deskripsi == "beli pulsa"  ){
                $deskripsi = "beli pulsa";
                if($request->amount< 30.000 && $request->amount> 10000 ){
                    $point = $request->ammount/1000;
                }
                if($request->amount> 30.000){
                    $point = ($request->amount/1000)*2;
                }
            }
            if ($request->deskripsi == "beli listrik"){
                $deskripsi = "beli listrik";
                if($request->amount< 1000000 && $request->amount> 50000 ){
                    $point = $request->amount/2000;
                }
                if($request->amount> 100000){
                    $point = ($request->amount/2000)*2;
                }
            }else{

                $nominal = $saldo - $request->amount;
                $deskripsi = "tarik tunai";
            }
        }
        if ($nominal <0)
        {
            return back()->withErrors('saldo tidak cukup');
        }
        DB::table('transaksi')->
        insert([
            'AccountID' => $request->AccountID,
            'Description' => $deskripsi,
            'TransactionDate' => $request->TransactionDate,
            'DebitCreditStatus' =>$status,
            'amount' =>  $request->amount,
        ]);

        DB::table('users')->update([
            'AccountID' => $request->AccountID,
            'amount' => $nominal,
            'Points' => $point + $pointUser,
        ]);
        return redirect()->back()->with('message', 'data berhasil dimasukan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
 
   
}
