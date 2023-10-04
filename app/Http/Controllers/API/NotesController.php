<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Notes;
use App\User;
use Illuminate\Http\Request;
use App\Http\Resources\NotesResource;
use Validator;

class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notes = Notes::all();
        return response(['success'=>true,'data'=>NotesResource::collection($notes),'message'=>'Notes fetched succesffully.']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'user_id' => 'required',
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        if($validator->fails()){
            return response(['error' => $validator->errors(), 'Validation Error']);
        }

        $note = Notes::create($data);

        return response(['success'=>true,'note'=>new NotesResource($note),'message'=>'Note Created successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return response(['notes' => new NotesResource($product)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notes $note)
    {

        $data = $request->all();

        //print_r($data);
        //die();

        $validator = Validator::make($data, [
            'id' => 'required',
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        if($validator->fails()){
            return response(['error' => $validator->errors(), 'Validation Error']);
        }

        $note->update($data);

        return response(['note' => new NotesResource($note), 'message' => 'Notes updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notes $note)
    {
        $note->delete();

        return response(['message' => 'Notes deleted successfully']);
    }
    public function showNotesByUserID(Request $request)
    {
        $id = $request->userid;
        $notes = Notes::where('user_id', $id)->get(['id','title','content','created_at']);

        return response(['success'=>true,'data'=>$notes,'message' => 'Notes fetched successfully']);
    }
    public function fetchNoteById(Request $request){
        $id = $request->noteid;
        $note = Notes::with('user')->where('id', $id)->first(['notes.id as id','title','content']);
        //$notes = Notes::where('user_id', $id)->get(['id','title','content','created_at']);
        return response(['success'=>true,'data'=>$note,'message' => 'Notes fetched successfully']);   
    }
    public function fetchNoteUserById(Request $request){
        $id = $request->noteid;
        $note = Notes::with('user')->where('id', $id)->first(['notes.id as id','title','content']);
        //$notes = Notes::where('user_id', $id)->get(['id','title','content','created_at']);
        return response(['success'=>true,'data'=>$note,'message' => 'Notes fetched successfully']);   
    }
    public function updateNote(Request $request){
        $id = $request->id;
        $title = $request->title;
        $content = $request->content;
        $note = Notes::where('id',$id)->update(['title'=>$title,'content'=>$content]);
        return response(['success'=>true,'data'=>$note,'message' => 'Notes Updated Successfully']);
    }
    public function deleteNoteById(Request $request){
        $id = $request->id;
        $note=Notes::find($id);
        $note->delete();
        return response(['message' => 'Notes deleted successfully']);
    }
    public function rateVerify(Request $request){
        /**
         * Requires libcurl
         */

        $curl = curl_init();

        $payload = array(
          "name" => "Pramod Thomson",
          "address1" => "30 Clearview Dr",
          "address2" => "Lot 2",
          "city" => "Rock Springs",
          "province_code" => "WY",
          "postal_code" => "82901",
          "country_code" => "US",
          "weight_unit" => "lbs",
          "weight" => 0.6,
          "length" => 9,
          "width" => 12,
          "height" => 1,
          "size_unit" => "cm",
          "package_contents" => "Two pair of socks",
          "value" => 10,
          "currency" => "CAD",
          "package_type" => "Parcel",
          "signature_confirmation" => true,
          "purchase_label" => true,
          "insured" => true,
          "region" => NULL
        );

        curl_setopt_array($curl, [
          CURLOPT_HTTPHEADER => [
            "Authorization: Bearer YDchLhos8bDsSrdCn23jmjya08azjdaJ56Shu6tywNjb7ATFwRr8Zm8viM7S",
            "Content-Type: application/json"
          ],
          CURLOPT_POSTFIELDS => json_encode($payload),
          CURLOPT_URL => "https://sandbox.stallionexpress.ca/api/v3/rates",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_CUSTOMREQUEST => "POST",
        ]);

        $response = curl_exec($curl);
        $error = curl_error($curl);

        curl_close($curl);

        if ($error) {
          echo "cURL Error #:" . $error;
        } else {
          echo $response;
        }
    }
}