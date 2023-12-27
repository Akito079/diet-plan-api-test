<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use App\Filters\MealsFilter;
use Illuminate\Http\Request;
use App\Http\Resources\MealResource;
use Illuminate\Support\Facades\File;
use App\Http\Resources\MealCollection;
use App\Http\Requests\StoreMealRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateMealRequest;

class MealController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new MealsFilter();
        $mealFilter = $filter->transform($request);
        $meal = Meal::where($mealFilter);
        $includeReviews = $request->query('includeReviews');
        if ($includeReviews) {
            $meal = $meal->with('reviews');
        }
        return new MealCollection($meal->paginate(10)->appends($request->query()));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMealRequest $request)
    {
        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'tags' => $request->tags,
        ];
        $fileName = uniqid() . $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path().'/mealImage',$fileName);
        $data['image'] = $fileName;
        return new MealResource(Meal::create($data));
    }
    /**
     * Display the specified resource.
     */
    public function show(Meal $meal)
    {
        $includeReviews = request()->query('includeReviews');
        if ($includeReviews) {
            return new MealResource($meal->with('reviews'));
        }
        return new MealResource($meal);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMealRequest $request, Meal $meal)
    {

        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'tags' => $request->tags,
        ];

        if ($request->hasFile('image')) {
            $oldImage = $meal->image;
            if(File::exists(public_path().'/mealImage/'.$oldImage)){
                File::delete(public_path().'/mealImage/'.$oldImage);
            }
            $fileName = uniqid() . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path().'/mealImage',$fileName);
            $data['image'] = $fileName;
        }
        $meal->update($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Meal $meal)
    {
        $dbImage = $meal->image;
        if ($dbImage) {
            Storage::delete('public/' . $dbImage);
        }
        $meal->delete();
    }
}
