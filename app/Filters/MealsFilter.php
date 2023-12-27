<?php
namespace App\Filters;
use App\Filters\ApiFilter;
use Illuminate\Http\Request;

class MealsFilter extends ApiFilter{
    protected $safeParms = [
        'name' => ['eq','like'],
        'description' => ['like'],
        'tags' => ['eq','like'],
        'price' => ['eq','gt','gte','lt','lte'],
        'rating' => ['eq','gt','gte','lt','lte']
    ];
    protected $columnMap = [];
    protected $operatorMap = [
        'eq' => '=',
        'gt' => '>',
        'lt' => '<',
        'gte' => '>=',
        'lte' => '<=',
        'like' => 'LIKE',
        'ne' => '!=',
    ];

}
