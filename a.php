<?php



$request->validate([
    'title'=>'required',
    'image'=>'required',
    'sub_title'=>'required',
    'reviews'=>'required',
    'recommended_credit'=>'required',
    'short_description'=>'required',
    'sign_up_bones'=>'required',
    'rewards_rate'=>'required',
    'intro_apr'=>'required',
    'annual_fee'=>'required',
    'credit_score_needed'=>'required',
    'card_brand'=>'required',
    'product_details'=>'required',
    'url'=>'required',
]);

$filename="";
if($request->file('image')){
    $filename=$request->file('image')->store('cards','public');
}


$card->title=$request->title;
$card->image=$filename;
$card->sub_title=$request->sub_title;
$card->reviews=$request->reviews;
$card->recommended_credit=$request->recommended_credit;
$card->short_description=$request->short_description;
$card->sign_up_bones=$request->sign_up_bones;
$card->rewards_rate=$request->rewards_rate;
$card->intro_apr=$request->intro_apr;
$card->annual_fee=$request->annual_fee;
$card->credit_score_needed=$request->credit_score_needed;
$card->card_brand=$request->card_brand;
$card->product_details=$request->product_details;
$card->url=$request->url;
$card->save();




?>