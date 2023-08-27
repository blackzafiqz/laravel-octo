<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Personnel;
use App\Models\Rating;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RatingController extends Controller
{
    public function rateMovie(Request $request)
    {
        $movie=Movie::whereTitle($request->movie_title)->first();
        if ($movie == null)
            return response()->json([
                'message' => 'Movie does not exists',
                'title'=> $request->movie_title

            ], Response::HTTP_NOT_FOUND);
        if(!is_numeric($request->rating))
            return response()->json([
                'message' => 'Rating is not a valid number',
                'rating'=>$request->rating

            ], Response::HTTP_NOT_FOUND);
        $ratingValue=(int)$request->rating;
        if($ratingValue<0 || $ratingValue>10)
            return response()->json([
                'message' => 'Rating must be within 0 and 10',


            ], Response::HTTP_NOT_FOUND);

        $user = User::whereUsername($request->username)->first();
        if($user==null)
        {
            $user = new User();
            $user->username=$request->username;
            $user->save();
        }

        $rating = new Rating();
        $rating->movie_id= $movie->id;
        $rating->user_id=$user->id;
        $rating->rating=$ratingValue;
        $rating->description=$request->r_description;
        $rating->save();
        return response()->json([
            'message' => 'Successfully added review for ' . $movie->title . ' by user: ' . $user->username,
            'success'=> true


        ], Response::HTTP_OK);
    }
}
