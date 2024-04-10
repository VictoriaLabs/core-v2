<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contract;
use App\Models\User;

class AdvertiserController extends Controller
{

    public function index()
    {
        $userId = auth()->id();
        $contracts = Contract::where('sender_user_id', $userId)->with('receiver')->get();
        $users = User::where('id', '!=', $userId)->get(); // Récupérer tous les utilisateurs sauf l'utilisateur actuel
        return view('annonceurs', ['userId' => $userId, 'contracts' => $contracts, 'users' => $users]);
    }

    public function saveContract(Request $request)
    {
        $contracts = $request->json()->all();

        foreach ($contracts as $contractData) {
            $contract = new Contract();
            $contract->sender_user_id = $contractData['sender_user_id'];
            $contract->receiver_user_id = $contractData['receiver_user_id'];
            $contract->event = $contractData['event'];
            $contract->action = $contractData['action'];
            $contract->message = $contractData['message'];
            $contract->save();
        }

        return response()->json(['status' => 'success']);
    }

    public function deleteContract($contractId)
    {
        $contract = Contract::find($contractId);
        if ($contract) {
            $contract->delete();
            return response()->json(['status' => 'success']);
        } else {
            return response()->json(['status' => 'error'], 404);
        }
    }
}
