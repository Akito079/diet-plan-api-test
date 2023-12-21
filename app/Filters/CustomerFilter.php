<?php
namespace App\Filters;
use App\Filters\ApiFilter;

class CustomerFilter extends ApiFilter {
   protected  $safeParms = [
    'name' => ['eq','like'],
    'email' => ['eq','like'],
    'address' => ['eq'],
    'phone' => ['eq'],
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
