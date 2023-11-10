<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Transactions;
use App\Models\User;
use App\Helpers\Helper;
use Auth;
use yajra\Datatables\Datatables;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function addDeposit(Request $request)
    {
        $validator = Validator::make($request->all(), [
                'amount' => 'required',
            ]);

         if ($validator->fails()) {

             foreach ($validator->errors()->getMessages() as $key => $value) {

                return response()->json(['status'=>false,'errorCode'=>1,'message' =>$value[0],'response' => $validator->errors()->all()], 200);
            }

         }

         // transactions

         $transactions= new Transactions();
         $transactions->amount=$request->amount;
         $transactions->fk_user_id=Auth::user()->id;
         $transactions->type='Credit';
         $transactions->details="Deposit";
         $transactions->created_by=Auth::user()->id;
         $transactions->balance=0;
         if($transactions->save()){

            // balance updation

            $balance = User::findorfail(Auth::user()->id);
            $balance->balance = (float)$balance->balance+(float)$request->amount;
            if($balance->save())
            {
                 $current_balance=Transactions::findorfail($transactions->id);
                 $current_balance->balance= $balance->balance;
                 $current_balance->save();

                  return response()->json(['status'=>true,'errorCode'=>-1,'message' => 'Deposit Successfully !'], 200); 

            }


            

         }
         else
         {
             return response()->json(['status'=>false,'errorCode'=>-1,'message' => 'error'], 200); 
         }

    }

     public function addWithdraw(Request $request)
     {
          $validator = Validator::make($request->all(), [
                'amount' => 'required',
            ]);

         if ($validator->fails()) {

             foreach ($validator->errors()->getMessages() as $key => $value) {

                return response()->json(['status'=>false,'errorCode'=>1,'message' =>$value[0],'response' => $validator->errors()->all()], 200);
            }

         }

          // withdraw transactions

         $transactions= new Transactions();
         $transactions->amount=$request->amount;
         $transactions->fk_user_id=Auth::user()->id;
         $transactions->type='Debit';
         $transactions->details="Withdraw";
         $transactions->created_by=Auth::user()->id;
         $transactions->balance=0;
         if($transactions->save()){

            // balance updation

            $balance = User::findorfail(Auth::user()->id);
            if($balance->balance >=$request->amount)
            {
                 $balance->balance = (float)$balance->balance-(float)$request->amount;
                 if($balance->save())
                 {
                      $current_balance=Transactions::findorfail($transactions->id);
                      $current_balance->balance= $balance->balance;
                      $current_balance->save();

                       return response()->json(['status'=>true,'errorCode'=>-1,'message' => 'Withdraw Successfully !'], 200); 


                 }
                 
            }
            else
            {
                 return response()->json(['status'=>false,'errorCode'=>-1,'message' => 'Insufficient balance  !'], 200); 
            }
           
            
         }
         else
         {
             return response()->json(['status'=>false,'errorCode'=>-1,'message' => 'error'], 200); 
         }


     }

     public function addTransfer(Request $request)
     {

          $validator = Validator::make($request->all(), [
                'amount' => 'required',
                'email'=>'required'
            ]);

         if ($validator->fails()) {

             foreach ($validator->errors()->getMessages() as $key => $value) {

                return response()->json(['status'=>false,'errorCode'=>1,'message' =>$value[0],'response' => $validator->errors()->all()], 200);
            }

         }

          // withdraw transactions

         $transactions= new Transactions();
         $transactions->amount=$request->amount;
         $transactions->fk_user_id=Auth::user()->id;
         $transactions->type='Debit';
         $transactions->email=$request->email;
         $transactions->details="Transfer to ".$request->email;
         $transactions->created_by=Auth::user()->id;
         $transactions->balance=0;
         if($transactions->save()){

            // balance updation

            $balance = User::findorfail(Auth::user()->id);
            if($balance->balance >=$request->amount)
            {
                 $balance->balance = (float)$balance->balance-(float)$request->amount;
                 if($balance->save())
                 {
                      $current_balance=Transactions::findorfail($transactions->id);
                      $current_balance->balance= $balance->balance;
                      $current_balance->save();

                       return response()->json(['status'=>true,'errorCode'=>-1,'message' => 'Transfer Successfully !'], 200); 
                      

                 }
                 
            }
            else
            {
                 return response()->json(['status'=>false,'errorCode'=>-1,'message' => 'Insufficient balance  !'], 200); 
            }
           
            
         }
         else
         {
             return response()->json(['status'=>false,'errorCode'=>-1,'message' => 'error'], 200); 
         }


     }

     public function statement(Request $request)
     {
           if ($request->ajax())
            {
                 $transactions=Transactions::select('transactions.*')
                 ->where('fk_user_id',Auth::user()->id)
                 ->orderBy('transactions.created_at','desc')
                 ->get();

                  return Datatables::of($transactions)
                 ->addIndexColumn()
                 ->editColumn('created_at', function($transactions){
                    if($transactions->created_at==NULL){
                        return '';
                    }else{
                        return date('d-m-Y H:i:s', strtotime($transactions->created_at));
                    }  
                 })
                ->rawColumns(['action'])
                ->make(true);

            }


     }
}
