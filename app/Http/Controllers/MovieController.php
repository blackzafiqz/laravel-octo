<?php

namespace App\Http\Controllers;

use App\Models\Director;
use App\Models\Genre;
use App\Models\Language;
use App\Models\Movie;
use App\Models\MovieGenre;
use App\Models\MovieLanguage;
use App\Models\Performer;
use App\Models\Personnel;
use App\Models\Theater;
use App\Models\TimeSlot;
use DateInterval;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class MovieController extends Controller
{
    public function create(Request $request)
    {
        try {
            $movie = new Movie();
            $movie->title = $request->title;
            $movie->release = $request->release;
            $movie->length = $request->length;
            $movie->description = $request->description;
            $movie->mpaa_rating = $request->mpaa_rating;
            $movie->save();

            /*  Convert non-array value to array so we can use same function
             *  for both array and non-array values.
             */

            if (!is_array($request->genre))
                $genres = [$request->genre];
            else
                $genres = $request->genre;

            if (!is_array($request->director))
                $directors = [$request->director];
            else
                $directors = $request->director;
            if (!is_array($request->performer))
                $performers = [$request->performer];
            else
                $performers = $request->performer;
            if (!is_array($request->language))
                $languages = [$request->language];
            else
                $languages = $request->language;

            /*  Iterate through all the values and create new data if
             *  referred data does not exist else get the id of found data
             *  and append to their parent.
             */
            foreach ($genres as $item) {
                $movieGenre = new MovieGenre();
                $movieGenre->movie_id = $movie->id;

                $genreCollection = Genre::all()->where('name', $item);

                if ($genreCollection->count() == 0) {
                    $genre = new Genre();
                    $genre->name = $item;
                    $genre->save();

                    $movieGenre->genre_id = $genre->id;
                } else
                    $movieGenre->genre_id = $genreCollection->first()->id;
                $movieGenre->save();
            }

            foreach ($directors as $item) {
                $director = new Director();
                $director->movie_id = $movie->id;

                $personnelCollection = Personnel::all()->where('name', $item);

                if ($personnelCollection->count() == 0) {
                    $personnel = new Personnel();
                    $personnel->name = $item;
                    $personnel->save();

                    $director->personnel_id = $personnel->id;
                } else
                    $director->personnel_id = $personnelCollection->first()->id;
                $director->save();
            }

            foreach ($performers as $item) {
                $performer = new Performer();
                $performer->movie_id = $movie->id;

                $personnelCollection = Personnel::all()->where('name', $item);

                if ($personnelCollection->count() == 0) {
                    $personnel = new Personnel();
                    $personnel->name = $item;
                    $personnel->save();

                    $performer->personnel_id = $personnel->id;
                } else
                    $performer->personnel_id = $personnelCollection->first()->id;
                $performer->save();
            }

            foreach ($languages as $item) {
                $movieLanguage = new MovieLanguage();
                $movieLanguage->movie_id = $movie->id;

                $languageCollection = Language::all()->where('name', $item);

                if ($languageCollection->count() == 0) {
                    $language = new Language();
                    $language->name = $item;
                    $language->save();

                    $movieLanguage->language_id = $language->id;
                } else
                    $movieLanguage->language_id = $languageCollection->first()->id;
                $movieLanguage->save();
            }
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred: ' . $e->getMessage(),
                'success' => false
            ], ResponseAlias::HTTP_INTERNAL_SERVER_ERROR);
        }
        return response()->json([
            'message' => 'Successfully added movie ' . $movie->title . 'with Movie_ID ' . $movie->id,
            'success' => true
        ], ResponseAlias::HTTP_OK);
    }

    public function findByGenre(Request $request)
    {

        if (Genre::whereName($request->genre)->count() == 0)
            return response()->json([
                'message' => 'Genre does not exists',

            ], Response::HTTP_NOT_FOUND);
        $movies = Genre::whereName($request->genre)->first()->Movie;

        $data = array();

        foreach ($movies as $movie) {
            $array = [
                'Movie_ID' => $movie->id,
                'Title' => $movie->title,
                'Genre' => $request->genre,
                'Description' => $movie->description
            ];
            $as = $movie->title;
            $data[] = $array;
        }
        return [
            'data' => $data
        ];
    }

    public function findByTimeSlot(Request $request)
    {
        if (Theater::whereName($request->theater_name)->count() == 0)
            return response()->json([
                'message' => 'Theater does not exists',

            ], Response::HTTP_NOT_FOUND);
        $timeslots = Theater::whereName($request->theater_name)->first()->TimeSlot->whereBetween('time_start', [$request->time_start, $request->time_end]);
        $data = array();
        foreach ($timeslots as $timeslot) {
            $movie = Movie::whereId($timeslot->movie_id)->first();
            $array = [
                'Movie_ID' => $movie->id,
                'Title' => $movie->title,
                'Theater_name' => $request->theater_name,
                'Start_time' => $timeslot->time_start,
                'End_time' => date('Y-m-d H:i:s', (strtotime($timeslot->time_start) + 60 * $movie->length)),
                'Description' => $movie->description,
                'Theater_room_no' => $timeslot->room
            ];
            $data[] = $array;
        }
        return [
            'data' => $data
        ];
    }

    public function findByTheater(Request $request)
    {
        if (Theater::whereName($request->theater_name)->count() == 0)
            return response()->json([
                'message' => 'Theater does not exists',

            ], Response::HTTP_NOT_FOUND);
        $timeslots = Theater::whereName($request->theater_name)->first()->TimeSlot->whereBetween('time_start', [$request->d_date, (new DateTime($request->d_date))->add(new DateInterval('P1D'))->format('Y-m-d')]);
        $data = array();
        foreach ($timeslots as $timeslot) {
            $movie = Movie::whereId($timeslot->movie_id)->first();
            $array = [
                'Movie_ID' => $movie->id,
                'Title' => $movie->title,
                'Theater_name' => $request->theater_name,
                'Start_time' => $timeslot->time_start,
                'End_time' => date('Y-m-d H:i:s', (strtotime($timeslot->time_start) + 60 * $movie->length)),
                'Description' => $movie->description,
                'Theater_room_no' => $timeslot->room
            ];
            $data[] = $array;
        }
        return [
            'data' => $data
        ];
    }

    public function findByPerformer(Request $request)
    {

        if (Personnel::whereName($request->performer_name)->count() == 0)
            return response()->json([
                'message' => 'Performer does not exists',

            ], Response::HTTP_NOT_FOUND);
        $performers = Personnel::whereName($request->performer_name)->first()->Performer;
        $data = array();
        foreach ($performers as $performer) {
            $movie = Movie::whereId($performer->movie_id)->first();
            $array = [
                'Movie_ID' => $movie->id,
                'Overall_rating'=> floatval(number_format(floatval($movie->Rating()->average('rating')),1)),
                'Title' => $movie->title,
                'Description' => $movie->description,
            ];
            $data[] = $array;
        }
        return [
            'data' => $data
        ];
    }
    public function findByLatest(Request $request)
    {

        $movies = Movie::where('release','<',$request->r_date)->orderBy('release','desc')->get();
        //return $movies->count();
        $data = array();
        foreach ($movies as $movie) {
            $array = [
                'Movie_ID' => $movie->id,
                'Overall_rating'=> floatval(number_format(floatval($movie->Rating()->average('rating')),1)),
                'Title' => $movie->title,
                'Description' => $movie->description,
            ];
            $data[] = $array;
        }
        return [
            'data' => $data
        ];
    }
}
